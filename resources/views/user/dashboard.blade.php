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
            <!-- First Carousel Item with 4 Cards -->
            <div class="carousel-item active">
                <div class="row row-cols-1 row-cols-md-4 g-4">
                    <div class="col">
                        <div class="card event-card shadow-sm">
                            <img src="https://via.placeholder.com/300x200" class="card-img-top" alt="Event Image">
                            <div class="card-body">
                                <h5 class="card-title">Cultural Night</h5>
                                <div class="d-flex align-items-center">
                                    <i class="bi bi-geo-alt-fill text-secondary me-2"></i>
                                    <span>Yogyakarta</span>
                                </div>
                                <div class="d-flex align-items-center mt-2">
                                    <i class="bi bi-calendar-event-fill text-secondary me-2"></i>
                                    <span>20 Januari 2025</span>
                                </div>
                                <div class="d-flex justify-content-between align-items-center mt-3">
                                    <span class="fw-bold text-orange">Rp 40.000</span>
                                    <span class="badge bg-danger">Sold Out</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Repeat for other events in the first group -->
                    <div class="col">
                        <div class="card event-card shadow-sm">
                            <img src="https://via.placeholder.com/300x200" class="card-img-top" alt="Event Image">
                            <div class="card-body">
                                <h5 class="card-title">Music Fest</h5>
                                <div class="d-flex align-items-center">
                                    <i class="bi bi-geo-alt-fill text-secondary me-2"></i>
                                    <span>Surabaya</span>
                                </div>
                                <div class="d-flex align-items-center mt-2">
                                    <i class="bi bi-calendar-event-fill text-secondary me-2"></i>
                                    <span>22 Februari 2025</span>
                                </div>
                                <div class="d-flex justify-content-between align-items-center mt-3">
                                    <span class="fw-bold text-orange">Rp 60.000</span>
                                    <span class="badge bg-success">Available</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card event-card shadow-sm">
                            <img src="https://via.placeholder.com/300x200" class="card-img-top" alt="Event Image">
                            <div class="card-body">
                                <h5 class="card-title">Tech Expo</h5>
                                <div class="d-flex align-items-center">
                                    <i class="bi bi-geo-alt-fill text-secondary me-2"></i>
                                    <span>Jakarta</span>
                                </div>
                                <div class="d-flex align-items-center mt-2">
                                    <i class="bi bi-calendar-event-fill text-secondary me-2"></i>
                                    <span>30 Januari 2025</span>
                                </div>
                                <div class="d-flex justify-content-between align-items-center mt-3">
                                    <span class="fw-bold text-orange">Rp 100.000</span>
                                    <span class="badge bg-danger">Sold Out</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card event-card shadow-sm">
                            <img src="https://via.placeholder.com/300x200" class="card-img-top" alt="Event Image">
                            <div class="card-body">
                                <h5 class="card-title">Startup Meet</h5>
                                <div class="d-flex align-items-center">
                                    <i class="bi bi-geo-alt-fill text-secondary me-2"></i>
                                    <span>Bandung</span>
                                </div>
                                <div class="d-flex align-items-center mt-2">
                                    <i class="bi bi-calendar-event-fill text-secondary me-2"></i>
                                    <span>5 Maret 2025</span>
                                </div>
                                <div class="d-flex justify-content-between align-items-center mt-3">
                                    <span class="fw-bold text-orange">Rp 25.000</span>
                                    <span class="badge bg-success">Available</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Add more carousel items as needed, grouping every 4 events in each item -->
            <div class="carousel-item">
                <div class="row row-cols-1 row-cols-md-4 g-4">
                    <!-- Repeat event cards here (card 5 to card 8) -->
                    <div class="col">
                        <div class="card event-card shadow-sm">
                            <img src="https://via.placeholder.com/300x200" class="card-img-top" alt="Event Image">
                            <div class="card-body">
                                <h5 class="card-title">Event 5</h5>
                                <div class="d-flex align-items-center">
                                    <i class="bi bi-geo-alt-fill text-secondary me-2"></i>
                                    <span>Location</span>
                                </div>
                                <div class="d-flex align-items-center mt-2">
                                    <i class="bi bi-calendar-event-fill text-secondary me-2"></i>
                                    <span>8 April 2025</span>
                                </div>
                                <div class="d-flex justify-content-between align-items-center mt-3">
                                    <span class="fw-bold text-orange">Rp 50.000</span>
                                    <span class="badge bg-success">Available</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Repeat for more events -->
                </div>
            </div>
            <!-- Continue adding more items if necessary -->
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
                <!-- Slider Item 1 -->
                <div class="carousel-item active">
                    <div class="row row-cols-1 row-cols-md-4 g-4">
                        <div class="col">
                            <div class="card event-card shadow-lg border-0">
                                <img src="https://via.placeholder.com/300x200" class="card-img-top rounded-3" alt="Event Image">
                                <div class="card-body">
                                    <h5 class="card-title">Startup Meet</h5>
                                    <div class="d-flex align-items-center">
                                        <i class="bi bi-geo-alt-fill text-secondary me-2"></i>
                                        <span>Jakarta</span>
                                    </div>
                                    <div class="d-flex align-items-center mt-2">
                                        <i class="bi bi-calendar-event-fill text-secondary me-2"></i>
                                        <span>15 Januari 2025</span>
                                    </div>
                                    <div class="d-flex justify-content-between align-items-center mt-3">
                                        <span class="fw-bold text-orange">Rp 25.000</span>
                                        <span class="badge bg-success">Available</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Repeat for other events -->
                        <div class="col">
                            <div class="card event-card shadow-lg border-0">
                                <img src="https://via.placeholder.com/300x200" class="card-img-top rounded-3" alt="Event Image">
                                <div class="card-body">
                                    <h5 class="card-title">Startup Meet</h5>
                                    <div class="d-flex align-items-center">
                                        <i class="bi bi-geo-alt-fill text-secondary me-2"></i>
                                        <span>Jakarta</span>
                                    </div>
                                    <div class="d-flex align-items-center mt-2">
                                        <i class="bi bi-calendar-event-fill text-secondary me-2"></i>
                                        <span>15 Januari 2025</span>
                                    </div>
                                    <div class="d-flex justify-content-between align-items-center mt-3">
                                        <span class="fw-bold text-orange">Rp 25.000</span>
                                        <span class="badge bg-success">Available</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Repeat for other events -->
                        <div class="col">
                            <div class="card event-card shadow-lg border-0">
                                <img src="https://via.placeholder.com/300x200" class="card-img-top rounded-3" alt="Event Image">
                                <div class="card-body">
                                    <h5 class="card-title">Startup Meet</h5>
                                    <div class="d-flex align-items-center">
                                        <i class="bi bi-geo-alt-fill text-secondary me-2"></i>
                                        <span>Jakarta</span>
                                    </div>
                                    <div class="d-flex align-items-center mt-2">
                                        <i class="bi bi-calendar-event-fill text-secondary me-2"></i>
                                        <span>15 Januari 2025</span>
                                    </div>
                                    <div class="d-flex justify-content-between align-items-center mt-3">
                                        <span class="fw-bold text-orange">Rp 25.000</span>
                                        <span class="badge bg-success">Available</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Repeat for other events -->
                        <div class="col">
                            <div class="card event-card shadow-lg border-0">
                                <img src="https://via.placeholder.com/300x200" class="card-img-top rounded-3" alt="Event Image">
                                <div class="card-body">
                                    <h5 class="card-title">Startup Meet</h5>
                                    <div class="d-flex align-items-center">
                                        <i class="bi bi-geo-alt-fill text-secondary me-2"></i>
                                        <span>Jakarta</span>
                                    </div>
                                    <div class="d-flex align-items-center mt-2">
                                        <i class="bi bi-calendar-event-fill text-secondary me-2"></i>
                                        <span>15 Januari 2025</span>
                                    </div>
                                    <div class="d-flex justify-content-between align-items-center mt-3">
                                        <span class="fw-bold text-orange">Rp 25.000</span>
                                        <span class="badge bg-success">Available</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Repeat for other events -->
                    </div>
                    <p class="text-light mt-4 text-center">Event rekomendasi dari SpoTix, dijamin bikin momen kamu lebih seru!</p>
                </div>
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
        <div class="col">
            <div class="card event-card shadow-sm">
                <img src="https://via.placeholder.com/300x200" class="card-img-top" alt="Event Image">
                <div class="card-body">
                    <h5 class="card-title">Tech Expo</h5>
                    <div class="d-flex align-items-center">
                        <i class="bi bi-geo-alt-fill text-secondary me-2"></i>
                        <span>Jakarta</span>
                    </div>
                    <div class="d-flex align-items-center mt-2">
                        <i class="bi bi-calendar-event-fill text-secondary me-2"></i>
                        <span>30 Januari 2025</span>
                    </div>
                    <div class="d-flex justify-content-between align-items-center mt-3">
                        <span class="fw-bold text-orange">Rp 100.000</span>
                        <span class="badge bg-danger">Sold Out</span>
                    </div>
                </div>
            </div>
        </div>
        <!-- Repeat for other events -->
        <div class="col">
            <div class="card event-card shadow-sm">
                <img src="https://via.placeholder.com/300x200" class="card-img-top" alt="Event Image">
                <div class="card-body">
                    <h5 class="card-title">Tech Expo</h5>
                    <div class="d-flex align-items-center">
                        <i class="bi bi-geo-alt-fill text-secondary me-2"></i>
                        <span>Jakarta</span>
                    </div>
                    <div class="d-flex align-items-center mt-2">
                        <i class="bi bi-calendar-event-fill text-secondary me-2"></i>
                        <span>30 Januari 2025</span>
                    </div>
                    <div class="d-flex justify-content-between align-items-center mt-3">
                        <span class="fw-bold text-orange">Rp 100.000</span>
                        <span class="badge bg-danger">Sold Out</span>
                    </div>
                </div>
            </div>
        </div>
        <!-- Repeat for other events -->
        <div class="col">
            <div class="card event-card shadow-sm">
                <img src="https://via.placeholder.com/300x200" class="card-img-top" alt="Event Image">
                <div class="card-body">
                    <h5 class="card-title">Tech Expo</h5>
                    <div class="d-flex align-items-center">
                        <i class="bi bi-geo-alt-fill text-secondary me-2"></i>
                        <span>Jakarta</span>
                    </div>
                    <div class="d-flex align-items-center mt-2">
                        <i class="bi bi-calendar-event-fill text-secondary me-2"></i>
                        <span>30 Januari 2025</span>
                    </div>
                    <div class="d-flex justify-content-between align-items-center mt-3">
                        <span class="fw-bold text-orange">Rp 100.000</span>
                        <span class="badge bg-danger">Sold Out</span>
                    </div>
                </div>
            </div>
        </div>
        <!-- Repeat for other events -->
        <div class="col">
            <div class="card event-card shadow-sm">
                <img src="https://via.placeholder.com/300x200" class="card-img-top" alt="Event Image">
                <div class="card-body">
                    <h5 class="card-title">Tech Expo</h5>
                    <div class="d-flex align-items-center">
                        <i class="bi bi-geo-alt-fill text-secondary me-2"></i>
                        <span>Jakarta</span>
                    </div>
                    <div class="d-flex align-items-center mt-2">
                        <i class="bi bi-calendar-event-fill text-secondary me-2"></i>
                        <span>30 Januari 2025</span>
                    </div>
                    <div class="d-flex justify-content-between align-items-center mt-3">
                        <span class="fw-bold text-orange">Rp 100.000</span>
                        <span class="badge bg-danger">Sold Out</span>
                    </div>
                </div>
            </div>
        </div>
        <!-- Repeat for other events -->
        <div class="col">
            <div class="card event-card shadow-sm">
                <img src="https://via.placeholder.com/300x200" class="card-img-top" alt="Event Image">
                <div class="card-body">
                    <h5 class="card-title">Tech Expo</h5>
                    <div class="d-flex align-items-center">
                        <i class="bi bi-geo-alt-fill text-secondary me-2"></i>
                        <span>Jakarta</span>
                    </div>
                    <div class="d-flex align-items-center mt-2">
                        <i class="bi bi-calendar-event-fill text-secondary me-2"></i>
                        <span>30 Januari 2025</span>
                    </div>
                    <div class="d-flex justify-content-between align-items-center mt-3">
                        <span class="fw-bold text-orange">Rp 100.000</span>
                        <span class="badge bg-danger">Sold Out</span>
                    </div>
                </div>
            </div>
        </div>
        <!-- Repeat for other events -->
        <div class="col">
            <div class="card event-card shadow-sm">
                <img src="https://via.placeholder.com/300x200" class="card-img-top" alt="Event Image">
                <div class="card-body">
                    <h5 class="card-title">Tech Expo</h5>
                    <div class="d-flex align-items-center">
                        <i class="bi bi-geo-alt-fill text-secondary me-2"></i>
                        <span>Jakarta</span>
                    </div>
                    <div class="d-flex align-items-center mt-2">
                        <i class="bi bi-calendar-event-fill text-secondary me-2"></i>
                        <span>30 Januari 2025</span>
                    </div>
                    <div class="d-flex justify-content-between align-items-center mt-3">
                        <span class="fw-bold text-orange">Rp 100.000</span>
                        <span class="badge bg-danger">Sold Out</span>
                    </div>
                </div>
            </div>
        </div>
        <!-- Repeat for other events -->
        <div class="col">
            <div class="card event-card shadow-sm">
                <img src="https://via.placeholder.com/300x200" class="card-img-top" alt="Event Image">
                <div class="card-body">
                    <h5 class="card-title">Tech Expo</h5>
                    <div class="d-flex align-items-center">
                        <i class="bi bi-geo-alt-fill text-secondary me-2"></i>
                        <span>Jakarta</span>
                    </div>
                    <div class="d-flex align-items-center mt-2">
                        <i class="bi bi-calendar-event-fill text-secondary me-2"></i>
                        <span>30 Januari 2025</span>
                    </div>
                    <div class="d-flex justify-content-between align-items-center mt-3">
                        <span class="fw-bold text-orange">Rp 100.000</span>
                        <span class="badge bg-danger">Sold Out</span>
                    </div>
                </div>
            </div>
        </div>
        <!-- Repeat for other events -->
        <div class="col">
            <div class="card event-card shadow-sm">
                <img src="https://via.placeholder.com/300x200" class="card-img-top" alt="Event Image">
                <div class="card-body">
                    <h5 class="card-title">Tech Expo</h5>
                    <div class="d-flex align-items-center">
                        <i class="bi bi-geo-alt-fill text-secondary me-2"></i>
                        <span>Jakarta</span>
                    </div>
                    <div class="d-flex align-items-center mt-2">
                        <i class="bi bi-calendar-event-fill text-secondary me-2"></i>
                        <span>30 Januari 2025</span>
                    </div>
                    <div class="d-flex justify-content-between align-items-center mt-3">
                        <span class="fw-bold text-orange">Rp 100.000</span>
                        <span class="badge bg-danger">Sold Out</span>
                    </div>
                </div>
            </div>
        </div>
        <!-- Repeat for other events -->
    </div>
    
    <!-- Button "Lihat Semua" -->
    <div class="container my-5">
        <div class="text-end mt-3">
            <button class="btn btn-primary-custom">Lihat Semua</button>
        </div>
    </div>
</div>

@endsection
