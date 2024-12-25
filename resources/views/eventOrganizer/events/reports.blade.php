@extends('layouts.sidebar-eo')

@section('title', 'Reports')

@section('header-title', 'Laporan Event')

@section('content')
<div class="container my-5">
    <h3 class="section-title">Laporan Event Anda</h3>
    <div class="row row-cols-1 row-cols-md-4 g-4">
        @forelse ($events as $event)
            <div class="col">
                <a href="{{ route('eventOrganizer.events.show', $event->id) }}" class="text-decoration-none text-dark">
                    <div class="card event-card shadow-sm" style="height: 100%; display: flex; flex-direction: column; justify-content: space-between;">
                        <img 
                            src="{{ asset($event->thumbnail ?? 'https://via.placeholder.com/300x200') }}" 
                            class="card-img-top" 
                            alt="{{ $event->name }}" 
                            style="height: 200px; object-fit: cover;"
                        >
                        <div class="card-body" style="flex-grow: 1;">
                            <h5 class="card-title" style="font-size: 1.2rem; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">{{ $event->name }}</h5>
                            <span class="badge bg-{{ $event->status == 'Upcoming' ? 'primary' : ($event->status == 'Ongoing' ? 'success' : 'secondary') }}">
                                {{ ucfirst($event->status) }}
                            </span>
                            <div class="d-flex align-items-center mb-2">
                                <i class="bi bi-geo-alt-fill text-secondary me-2"></i>
                                <span style="font-size: 0.9rem;">{{ $event->location }}</span>
                            </div>
                            <div class="d-flex align-items-center mb-2">
                                <i class="bi bi-calendar-event-fill text-secondary me-2"></i>
                                <span style="font-size: 0.9rem;">{{ \Carbon\Carbon::parse($event->date)->format('d F Y') }}</span>
                            </div>
                            <div class="d-flex justify-content-between align-items-center">
                                <span class="fw-bold text-orange">Rp {{ number_format($event->price, 0, ',', '.') }}</span>
                                @if ($event->available_tickets <= 0)
                                    <span class="badge bg-danger">Sold Out</span>
                                @else
                                    <span class="badge bg-success">Available</span>
                                @endif
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        @empty
            <div class="col-12">
                <div class="alert alert-info text-center">Belum ada event yang dibuat.</div>
            </div>
        @endforelse
    </div>
</div>
@endsection
