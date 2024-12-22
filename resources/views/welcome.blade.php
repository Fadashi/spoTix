@extends('layouts.layout')
@section('title','Dashboard')
@section('header-title','Dashboard')
@section('content')
<!-- Hero Section -->
<div class="container my-4">
    <div class="row">
        <div class="col-12">
            <div class="bg-secondary text-white d-flex align-items-center justify-content-center" 
                 style="height: 200px; border-radius: 10px;">
                <h2>Selamat Datang di SpoTix</h2>
            </div>
        </div>
    </div>
</div>

<!-- Event Terdekat -->
<div class="container my-5">
    <h3 class="section-title">Event Terdekat</h3>
    <div class="row row-cols-1 row-cols-md-4 g-4">
        <!-- Card Example -->
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

        <!-- Repeat the card for other events -->
    </div>
</div>

<!-- Rekomendasi Event -->
<div class="container my-5">
    <div class="rekomendasi-event p-5 rounded-3" style="background: linear-gradient(135deg, #2c3e50, #34495e); box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);">
        <h3 class="section-title text-white mb-4">Rekomendasi Event</h3>
        
        <div class="row row-cols-1 row-cols-md-4 g-4">
            <!-- Example Card -->
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
            <!-- More cards go here -->
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
            <!-- More cards go here -->
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
        </div>
        <p class="text-light mt-4 text-center">Event rekomendasi dari SpoTix, dijamin bikin momen kamu lebih seru!</p>
    </div>
</div>


<!-- Semua Event -->
<div class="container my-5">
    <h3 class="section-title">Semua Event</h3>
    <div class="row row-cols-1 row-cols-md-4 g-4">
        <!-- Event Card Example -->
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
        <!-- Repeat the card for other events -->
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
    </div>
    
    <!-- Button "Lihat Semua" -->
    <div class="container my-5">
        <div class="text-end mt-3">
            <button class="btn btn-primary-custom">Lihat Semua</button>
        </div>
    </div>
</div>
@endSection