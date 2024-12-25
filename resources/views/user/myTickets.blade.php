@extends('layouts.layout')
@section('title', 'Riwayat Pemesanan Tiket')
@section('header-title', 'Riwayat Pemesanan Tiket')

@section('content')
<div class="container my-5">
    <h3 class="mb-4">Riwayat Pemesanan Tiket</h3>
    @if ($orders->isEmpty())
        <div class="alert alert-info">Anda belum memesan tiket.</div>
    @else
        <div class="row row-cols-1 row-cols-md-2 g-4">
            @foreach ($orders as $order)
                <div class="col">
                    <div class="card h-100">
                        <div class="row g-0">
                            <div class="col-md-4">
                                <img src="{{ asset($order->event->thumbnail ?? 'https://via.placeholder.com/150') }}" class="img-fluid rounded-start" alt="{{ $order->event->name }}">
                            </div>
                            <div class="col-md-8">
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
                                        <span class="fw-bold">Status:</span>
                                        <span class="badge bg-{{ $order->status == 'paid' ? 'success' : 'warning' }}">
                                            {{ ucfirst($order->status) }}
                                        </span>
                                    </p>
                                    @if ($order->status == 'paid')
                                        <a href="{{ route('user.ticketDetail', $order->id) }}" class="btn btn-primary-custom">Lihat Tiket</a>
                                    @elseif ($order->status == 'pending')
                                        <a href="{{ route('user.order.confirmation', $order->id) }}" class="btn btn-warning mt-3">Bayar Sekarang</a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>
@endsection
