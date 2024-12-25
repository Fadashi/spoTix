@extends('layouts.layout')
@section('title', 'Konfirmasi Pemesanan')

@section('content')
<div class="container my-5">
    <!-- Breadcrumb -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('user.dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('user.show', $order->event->id) }}">Pesanan</a></li>
            <li class="breadcrumb-item active" aria-current="page">Konfirmasi Pemesanan</li>
        </ol>
    </nav>

    <h2 class="mb-4 text-center">Konfirmasi Pemesanan</h2>
    <p class="text-center">Terima kasih telah memesan tiket!</p>

    <!-- Detail Pesanan -->
    <div class="card shadow-sm mb-4" style="border-color: #001f54;">
        <div class="card-header" style="background-color: #001f54; color: white;">
            <h5 class="mb-0">Detail Pemesanan</h5>
        </div>
        <div class="card-body">
            <div class="row align-items-center">
                <div class="col-md-6 mb-3">
                    <img src="{{ asset($order->event->thumbnail ?? 'https://via.placeholder.com/300x200') }}" class="img-fluid rounded" alt="{{ $order->event->name }}">
                </div>
                <div class="col-md-6">
                    <h5 class="fw-bold">{{ $order->event->name }}</h5>
                    <p class="text-muted"><strong>Deskripsi:</strong> {{ $order->event->description }}</p>
                    <p class="text-muted"><strong>Tanggal:</strong> {{ \Carbon\Carbon::parse($order->event->date)->format('d F Y') }}</p>
                    <p class="text-muted"><strong>Lokasi:</strong> {{ $order->event->location }}</p>
                    <div class="fw-bold">
                        <p><strong>Jumlah Tiket:</strong> <span class="text-primary">{{ $order->quantity }}</span></p>
                        <p><strong>Total Harga:</strong> <span class="text-danger" style="font-size: 1.5rem;">Rp {{ number_format($order->total_price, 0, ',', '.') }}</span></p>
                    </div>
                    <div class="d-flex justify-content-center mt-4 mb-4">
                        <form action="{{ route('user.order.pay') }}" method="POST" class="me-2">
                            @csrf
                            <input type="hidden" name="order_id" value="{{ $order->id }}">
                            <button type="submit" class="btn btn-warning btn-lg rounded-pill shadow">
                                <i class="bi bi-credit-card"></i> Bayar Sekarang
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
