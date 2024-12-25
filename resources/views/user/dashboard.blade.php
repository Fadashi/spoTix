@extends('layouts.layout')
@section('title', 'Dashboard')
@section('header-title', 'Dashboard')
@section('content')

<!-- Hero Section / Banner Slider -->
<div class="container mt-5">
    <!-- Carousel Section -->
    <div id="customCarousel" class="carousel slide" data-bs-ride="carousel">
        <!-- Carousel Indicators -->
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#customCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#customCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#customCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>

        <!-- Carousel Items -->
        <div class="carousel-inner">
            <div class="carousel-item active">
                <div class="custom-slide d-flex align-items-center justify-content-center">
                    <h2 class="text-white">Selamat Datang di SpoTix!</h2>
                </div>
            </div>
            <div class="carousel-item">
                <div class="custom-slide d-flex align-items-center justify-content-center">
                    <h2 class="text-white">Temukan Event yang Menarik</h2>
                </div>
            </div>
            <div class="carousel-item">
                <div class="custom-slide d-flex align-items-center justify-content-center">
                    <h2 class="text-white">Dapatkan Tiket dengan Mudah!</h2>
                </div>
            </div>
        </div>

        <!-- Carousel Controls -->
        <button class="carousel-control-prev" type="button" data-bs-target="#customCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#customCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</div>

<!-- Event Terdekat Slider -->
<div class="container my-5">
    <h3 class="section-title">Event Terdekat</h3>
    <div id="eventTerdekatCarousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            @foreach ($eventTerdekat->chunk(4) as $chunkIndex => $eventsChunk)
                <div class="carousel-item {{ $chunkIndex === 0 ? 'active' : '' }}">
                    <div class="row row-cols-1 row-cols-md-4 g-4">
                        @foreach ($eventsChunk as $event)
                            <div class="col">
                                <a href="{{ route('user.show', $event->id) }}" class="text-decoration-none text-dark">
                                    <div class="card event-card shadow-sm">
                                        <img 
                                            src="{{ asset($event->thumbnail ?? 'https://via.placeholder.com/300x200') }}" 
                                            class="card-img-top" 
                                            alt="{{ $event->name }}"
                                        >
                                        <div class="card-body">
                                            <h5 class="card-title">{{ $event->name }}</h5>
                                            <span class="badge bg-{{ $event->status == 'Upcoming' ? 'primary' : ($event->status == 'Ongoing' ? 'success' : 'secondary') }}">
                                                {{ ucfirst($event->status) }}
                                            </span>
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
                                                @if ($event->is_sold_out)
                                                    <span class="badge bg-danger">Sold Out</span>
                                                @else
                                                    <span class="badge bg-success">Available</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Carousel Controls -->
        <button class="carousel-control-prev" type="button" data-bs-target="#eventTerdekatCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#eventTerdekatCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</div>




<!-- Rekomendasi Event Slider -->
<div class="container my-5">
    <div class="rekomendasi-event p-5 rounded-3" style="background: linear-gradient(135deg, #2c3e50, #34495e); box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);">
        <h3 class="section-title text-white mb-4">Rekomendasi Event</h3>
        <div id="rekomendasiEventCarousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                @foreach ($recommendedEvents->chunk(4) as $index => $chunk)
                    <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                        <div class="row row-cols-1 row-cols-md-4 g-4">
                            @foreach ($chunk as $event)
                                <div class="col">
                                    <a href="{{ route('user.show', $event->id) }}" class="text-decoration-none text-dark">
                                    <div class="card event-card shadow-lg border-0">
                                        <img src="{{ asset($event->thumbnail ?? 'https://via.placeholder.com/300x200') }}" class="card-img-top rounded-3" alt="{{ $event->name }}">
                                        <div class="card-body">
                                            <h5 class="card-title">{{ $event->name }}</h5>
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
                    </div>
                @endforeach
            </div>

            <!-- Carousel controls -->
            <button class="carousel-control-prev" type="button" data-bs-target="#rekomendasiEventCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#rekomendasiEventCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
</div>


<!-- Semua Event -->
<div class="container my-5">
    <h3 class="section-title">Semua Event</h3>
    <div class="row row-cols-1 row-cols-md-4 g-4">
        @forelse ($allEvents as $event)
            <div class="col">
                <a href="{{ route('user.show', $event->id) }}" class="text-decoration-none text-dark">
                <div class="card event-card shadow-sm">
                    
                    <img 
                        src="{{ asset($event->thumbnail ?? 'https://via.placeholder.com/300x200') }}" 
                        class="card-img-top" 
                        alt="{{ $event->name }}"
                    >
                    <div class="card-body">
                        <h5 class="card-title">{{ $event->name }}</h5>
                        <span class="badge bg-{{ $event->status == 'Upcoming' ? 'primary' : ($event->status == 'Ongoing' ? 'success' : 'secondary') }}">
                            {{ ucfirst($event->status) }}
                        </span>
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
                            @if ($event->is_sold_out)
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
            <p class="text-center">Belum ada event yang tersedia.</p>
        @endforelse
    </div>

    <!-- Button "Lihat Semua" -->
    <div class="container my-5">
        <div class="text-end mt-3">
            <button class="btn btn-primary-custom">Lihat Semua</button>
        </div>
    </div>
</div>

@endsection
