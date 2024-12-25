@extends('layouts.layout')
@section('title', 'Pembayaran')

@section('content')
<div class="container my-5">
    <h2 class="mb-3">Pembayaran</h2>
    <p>Silakan selesaikan pembayaran Anda dengan Midtrans.</p>

    <!-- Breadcrumb -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('user.dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('user.show', $order->event->id) }}">Pesanan</a></li>
            <li class="breadcrumb-item"><a href="{{ route('user.order.confirmation', $order->id) }}">Konfirmasi Pemesanan</a></li>
            <li class="breadcrumb-item active" aria-current="page">Pembayaran</li>
        </ol>
    </nav>

    <!-- Tombol Bayar -->
    <button id="pay-button" class="btn btn-warning btn-lg rounded-pill shadow">
        <i class="bi bi-credit-card"></i> Bayar Sekarang
    </button>

    <!-- Script Midtrans -->
    <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ config('midtrans.client_key') }}"></script>
    <script>
        var payButton = document.getElementById('pay-button');
        payButton.addEventListener('click', function () {
            snap.pay('{{ $snapToken }}');
        });
    </script>
</div>
@endsection
