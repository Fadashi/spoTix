@extends('layouts.layout')

@section('title', 'Search Results')

@section('content')
<div class="container my-5">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ route('user.dashboard') }}">Dashboard</a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">Search Results for "{{ $query }}"</li>
        </ol>
    </nav>
    <h3 class="section-title mb-4 fw-bold">Hasil Pencarian</h3>
    @if($events->isEmpty())
        <div class="alert alert-info">Tidak ada event yang cocok.</div>
    @else
        <div class="row row-cols-1 row-cols-md-4 g-4">
            @foreach ($events as $event)
                <div class="col">
                    <a href="{{ route('show-event', $event->id) }}" class="text-decoration-none text-dark">
                        <div class="card event-card shadow-sm">
                            <img src="{{ asset($event->thumbnail ?? 'https://via.placeholder.com/300x200') }}" class="card-img-top" alt="{{ $event->name }}">
                            <div class="card-body">
                                <h5 class="card-title fw-bold">{{ $event->name }}</h5>
                                <div class="d-flex align-items-center">
                                    <i class="bi bi-geo-alt-fill text-secondary me-2"></i>
                                    <span>{{ $event->location }}</span>
                                </div>
                                <div class="d-flex align-items-center mt-2">
                                    <i class="bi bi-calendar-event-fill text-secondary me-2"></i>
                                    <span>{{ \Carbon\Carbon::parse($event->date)->format('d F Y') }}</span>
                                </div>
                                <div class="d-flex justify-content-between align-items-center mt-3">
                                    <span class="fw-bold text-orange">Rp {{ number_format($event->price, 0, ',', '.') }}</span>
                                    <span class="badge bg-{{ $event->available_tickets > 0 ? 'success' : 'danger' }}">
                                        {{ $event->available_tickets > 0 ? 'Available' : 'Sold Out' }}
                                    </span>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    @endif
</div>
@endsection