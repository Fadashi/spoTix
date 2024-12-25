@extends('layouts.layout')
@section('title', 'Detail Tiket')
@section('header-title', 'Detail Tiket')

@section('content')
<div class="container my-5">
    <h3 class="mb-4">Detail Tiket</h3>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ $order->event->name }}</h5>
            <p class="card-text">
                <i class="bi bi-calendar-event-fill text-secondary me-2"></i>
                {{ \Carbon\Carbon::parse($order->event->date)->format('d F Y') }}
            </p>
            <p class="card-text">
                <i class="bi bi-geo-alt-fill text-secondary me-2"></i>
                {{ $order->event->location }}
            </p>
            <p class="card-text">
                <span class="fw-bold">Jumlah Tiket:</span> {{ $order->quantity }}
            </p>
            <p class="card-text">
                <span class="fw-bold">Harga:</span> Rp {{ number_format($order->event->price, 0, ',', '.') }}
            </p>
            <p class="card-text">
                <span class="fw-bold">Total:</span> Rp {{ number_format($order->quantity * $order->event->price, 0, ',', '.') }}
            </p>
            <p class="card-text">
                <span class="fw-bold">Status:</span>
                <span class="badge bg-success">Paid</span>
            </p>
        </div>
    </div>
</div>
@endsection
