<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Order;
use App\Models\Event;
use Illuminate\Support\Facades\Auth;

class EventOrganizerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $today = Carbon::today();
        $userId = Auth::id();

        // Statistik untuk Event yang dibuat oleh user
        $totalProfit = Order::where('status', 'paid')
            ->whereHas('event', fn($query) => $query->where('user_id', $userId))
            ->sum('total_price');

        $totalRefund = Order::where('status', 'refund')
            ->whereHas('event', fn($query) => $query->where('user_id', $userId))
            ->sum('total_price');

        $soldToday = Order::whereDate('created_at', $today)
            ->where('status', 'paid')
            ->whereHas('event', fn($query) => $query->where('user_id', $userId))
            ->sum('quantity');

        $totalOrders = Order::whereHas('event', fn($query) => $query->where('user_id', $userId))->count();

        $totalTicketsSold = Order::where('status', 'paid')
            ->whereHas('event', fn($query) => $query->where('user_id', $userId))
            ->sum('quantity');

        $totalCustomers = Order::whereHas('event', fn($query) => $query->where('user_id', $userId))
            ->distinct('user_id')
            ->count('user_id');

        // Data untuk Chart Keuntungan per bulan (hanya untuk event user)
        $monthlyProfits = Order::selectRaw('MONTH(created_at) as month, SUM(total_price) as profit')
            ->where('status', 'paid')
            ->whereHas('event', fn($query) => $query->where('user_id', $userId))
            ->groupBy('month')
            ->pluck('profit', 'month');

        return view('eventOrganizer.dashboard', [
            'totalProfit' => $totalProfit,
            'totalRefund' => $totalRefund,
            'soldToday' => $soldToday,
            'totalOrders' => $totalOrders,
            'totalTicketsSold' => $totalTicketsSold,
            'totalCustomers' => $totalCustomers,
            'monthlyProfits' => $monthlyProfits,
        ]);
    }

    public function reports()
    {
        // Ambil semua event yang dibuat oleh Event Organizer yang sedang login
        $events = Event::where('user_id', Auth::id())->get();

        return view('eventOrganizer.events.reports', compact('events'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
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
    public function show($id)
    {
        // Ambil data event berdasarkan ID
        $event = Event::with('orders', 'orders.user')->findOrFail($id);
    
        // Hitung data laporan berdasarkan event yang sedang ditampilkan
        $ticketSold = $event->capacity - $event->available_tickets;
        $totalOrders = $event->orders()->count(); // Total pesanan untuk event ini
        $totalCustomers = $event->orders()
            ->distinct('user_id')
            ->count('user_id'); // Total pelanggan unik untuk event ini
        $omzet = $ticketSold * $event->price; // Menghitung omzet
    
        return view('eventOrganizer.events.show', compact('event', 'ticketSold', 'totalOrders', 'totalCustomers', 'omzet'));
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
