<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\Payment;
use Illuminate\Support\Str;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $params = [
            'transaction_details' => [
                'order_id' => Str::uuid(),
                'gross_amount' => $request->price,
            ],
            'item_details' => [
                [
                    'price' => $request->price,
                    'quantity' => 1,
                    'name' => $request->item_name,
                ],
            ],
            'customer_details' => [
                'email' => $request->customer_email,
                'name' => $request->customer_name,
            ],
            'enabled_payments' => [
                'gopay',
                'bca_va',
                'bri_va',
                'bni_va',
            ]
        ];

        $auth = base64_encode(env('MIDTRANS_SERVER_KEY'));

        $response = Http::withHeaders([
            'Content-Type' => 'application/json',
            'Authorization' => 'Basic ' . $auth
        ])->post('https://app.sandbox.midtrans.com/snap/v1/transactions', $params);

        $response = json_decode($response->body());

        $payment = new Payment;
        $payment->fill([
            'order_id' => $params['transaction_details']['order_id'],
            'status' => 'pending',
            'customer_name' => $request->customer_name,
            'customer_email' => $request->customer_email,
            'item_name' => $request->item_name,
            'checkout_link' => $response->redirect_url,
        ]);
        $payment->save();

        return response()->json($payment);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
