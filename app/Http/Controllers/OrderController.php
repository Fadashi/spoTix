<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Event;
use Illuminate\Support\Facades\Auth;
use Midtrans\Config;
use Midtrans\Snap;

class OrderController extends Controller
{
    public function store(Request $request)
    {
        // Validasi input
        $validated = $request->validate([
            'event_id' => 'required|exists:events,id',
            'quantity' => 'required|integer|min:1|max:5',
        ]);

        // Simpan pesanan
        $order = new Order();
        $order->event_id = $validated['event_id'];
        $order->user_id = Auth::id();
        $order->quantity = $validated['quantity'];
        $order->total_price = $validated['quantity'] * Event::find($validated['event_id'])->price;
        $order->save();

        return redirect()->route('user.order.confirmation', ['id' => $order->id])
            ->with('success', 'Tiket berhasil dipesan!');
    }

    public function confirmation($id)
    {
        $order = Order::findOrFail($id);

        return view('user.order.confirmation', compact('order'));
    }

    public function pay(Request $request)
    {
        // Ambil data order berdasarkan ID
        $order = Order::findOrFail($request->order_id);

        // Konfigurasi Midtrans
        Config::$serverKey = config('midtrans.server_key');
        Config::$isProduction = config('midtrans.is_production');
        Config::$isSanitized = config('midtrans.is_sanitized');
        Config::$is3ds = config('midtrans.is_3ds');

        // Data pembayaran
        $params = [
            'transaction_details' => [
                'order_id' => $order->id . '-' . time(), // ID transaksi unik
                'gross_amount' => $order->total_price, // Total pembayaran
            ],
            'customer_details' => [
                'first_name' => $order->user->name,
                'email' => $order->user->email,
                'phone' => $order->user->phone ?? '08123456789',
            ],
        ];

        // Buat URL Snap untuk pembayaran
        $snapToken = Snap::getSnapToken($params);

        return view('user.order.pay', compact('snapToken', 'order'));
    }

    public function notification(Request $request)
    {
        $serverKey = config('midtrans.server_key');
        $json = $request->getContent();
        $notification = json_decode($json);

        // Validasi Signature Key
        $signatureKey = hash('sha512', $notification->order_id . $notification->status_code . $notification->gross_amount . $serverKey);
        if ($signatureKey !== $notification->signature_key) {
            return response()->json(['message' => 'Invalid signature'], 403);
        }

        // Update status pembayaran di database
        $orderIdParts = explode('-', $notification->order_id); // Memisahkan ID asli
        $order = Order::find($orderIdParts[0]);
        if ($order) {
            $order->status = $notification->transaction_status; // capture, settlement, etc.
            $order->save();
        }

        return response()->json(['message' => 'Notification processed']);
    }


    public function paymentSuccess(Request $request)
    {
        $orderId = $request->input('order_id'); // Format: "13-1735098136"
        $statusCode = $request->input('status_code');
        $transactionStatus = $request->input('transaction_status');

        $orderIdParts = explode('-', $orderId);
        $order = Order::find($orderIdParts[0]);

        if (!$order) {
            return redirect()->route('user.dashboard')->with('error', 'Order tidak ditemukan!');
        }

        if ($transactionStatus === 'capture' || $transactionStatus === 'settlement') {
            $order->status = 'paid'; // Atur status ke 'paid'
            $order->save();
        }

        return view('user.order.success', compact('order', 'transactionStatus', 'statusCode'));
    }



    public function paymentError()
    {
        return view('user.order.error');
    }

    public function paymentCancel()
    {
        return view('user.order.cancel');
    }
}