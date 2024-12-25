@extends('layouts.layout')
@section('title', 'Konfirmasi Pemesanan')

@section('content')
<div class="container my-5">
    <h2 class="mb-3">Konfirmasi Pemesanan</h2>
    <p>Terima kasih telah memesan tiket!</p>

    <!-- Detail Pesanan -->
    <div class="card p-4">
        <h5>Detail Pemesanan</h5>
        <p><strong>Event:</strong> {{ $order->event->title }}</p>
        <p><strong>Jumlah Tiket:</strong> {{ $order->quantity }}</p>
        <p><strong>Total Harga:</strong> Rp {{ number_format($order->total_price, 0, ',', '.') }}</p>
    </div>

    <!-- Tombol Bayar -->
    <div class="mt-4">
        <form action="{{ route('user.order.pay') }}" method="POST">
            @csrf
            <input type="hidden" name="order_id" value="{{ $order->id }}">
            <button type="submit" class="btn btn-primary">Bayar Sekarang</button>
        </form>
    </div>

    <!-- Tombol Kembali -->
    <div class="mt-3">
        <a href="{{ route('user.dashboard') }}" class="btn btn-secondary">Kembali ke Dashboard</a>
    </div>
</div>
@endsection
