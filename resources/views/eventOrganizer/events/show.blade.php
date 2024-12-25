@extends('layouts.sidebar-eo')

@section('title', 'Laporan Event')

@section('header-title', 'Laporan Detail Event')

@section('content')
<div class="container my-5">
    <div class="card mb-4">
        <div class="card-header">
            <h4 class="mb-0">{{ $event->name }}</h4>
        </div>
        <div class="card-body">
            <p><strong>Lokasi:</strong> {{ $event->location }}</p>
            <p><strong>Tanggal:</strong> {{ \Carbon\Carbon::parse($event->date)->format('d F Y') }}</p>
            <p><strong>Harga Tiket:</strong> Rp {{ number_format($event->price, 0, ',', '.') }}</p>
            <p><strong>Kapastias:</strong> {{ $event->capacity }}</p>
            <p><strong>Sisa Tiket:</strong> {{ $event->available_tickets }}</p>
        </div>
    </div>

    <div class="row g-3">
        <div class="col-md-3">
            <div class="card text-center">
                <div class="card-body">
                    <h5>Omzet</h5>
                    <p class="fw-bold">Rp {{ number_format($omzet, 0, ',', '.') }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-center">
                <div class="card-body">
                    <h5>Ticket Sold</h5>
                    <p class="fw-bold">{{ $ticketSold }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-center">
                <div class="card-body">
                    <h5>Orders</h5>
                    <p class="fw-bold">{{ $totalOrders }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-center">
                <div class="card-body">
                    <h5>Customers</h5>
                    <p class="fw-bold">{{ $totalCustomers }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
