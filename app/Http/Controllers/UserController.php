<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

use App\Models\Event;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Ambil event dengan tanggal terdekat (tanggal >= hari ini)
        $startDate = Carbon::now(); // Hari ini
        $endDate = Carbon::now()->addMonth(); // Satu bulan ke depan

        $eventTerdekat = Event::whereBetween('date', [$startDate, $endDate])
            ->orderBy('date', 'asc')
            ->limit(8)
            ->get();
        
            $recommendedEvents = Event::withCount(['orders as tickets_sold' => function ($query) {
                $query->select(DB::raw('SUM(quantity)'));
            }])
            ->orderByDesc('tickets_sold')
            ->limit(8) // Ambil maksimal 8 event
            ->get();

        // Ambil event rekomendasi (misalnya berdasarkan rating atau kategori tertentu)
        // $rekomendasiEvent = Event::where('rekomendasi', true) // Asumsikan ada field 'rekomendasi' di tabel Event
        //     ->orderBy('created_at', 'desc') // Tampilkan rekomendasi terbaru
        //     ->limit(8) // Batasi jumlah event rekomendasi
        //     ->get();

        // Ambil semua event
        $allEvents = Event::orderBy('date', 'asc')->get();

        // Kirim data ke view
        return view('user.dashboard', compact('eventTerdekat','recommendedEvents', 'allEvents'));
    }

    public function welcome()
    {
        // Ambil event dengan tanggal terdekat (tanggal >= hari ini)
        $startDate = Carbon::now(); // Hari ini
        $endDate = Carbon::now()->addMonth(); // Satu bulan ke depan

        $eventTerdekat = Event::whereBetween('date', [$startDate, $endDate])
            ->orderBy('date', 'asc')
            ->limit(8)
            ->get();
        
            $recommendedEvents = Event::withCount(['orders as tickets_sold' => function ($query) {
                $query->select(DB::raw('SUM(quantity)'));
            }])
            ->orderByDesc('tickets_sold')
            ->limit(8) // Ambil maksimal 8 event
            ->get();

        // Ambil event rekomendasi (misalnya berdasarkan rating atau kategori tertentu)
        // $rekomendasiEvent = Event::where('rekomendasi', true) // Asumsikan ada field 'rekomendasi' di tabel Event
        //     ->orderBy('created_at', 'desc') // Tampilkan rekomendasi terbaru
        //     ->limit(8) // Batasi jumlah event rekomendasi
        //     ->get();

        // Ambil semua event
        $allEvents = Event::orderBy('date', 'asc')->get();

        // Kirim data ke view
        return view('welcome', compact('eventTerdekat','recommendedEvents','allEvents'));
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
