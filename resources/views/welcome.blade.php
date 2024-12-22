@extends('layouts.layout')
@section('title','Dashboard')
@section('header-title','Dashboard')
@section('content')
<div class="container my-4">
    <div class="row">
        <div class="col-12">
            <div class="bg-secondary" style="height: 200px; border-radius: 10px;"></div>
        </div>
    </div>
</div>

<!-- Event Terdekat -->
<div class="container">
    <h3 class="section-title">Event Terdekat</h3>
    <div class="row row-cols-1 row-cols-md-4 g-4">
        <div class="col">
            <div class="card event-card">
                <img src="https://via.placeholder.com/300x150" class="card-img-top" alt="Event Image">
                <div class="card-body">
                    <h5 class="card-title">UMKM Fest</h5>
                    <div class="d-flex align-items-center">
                        <i class="bi bi-geo-alt-fill text-secondary me-2"></i>
                        <span>Bandung</span>
                    </div>
                    <div class="d-flex align-items-center mt-2">
                        <i class="bi bi-calendar-event-fill text-secondary me-2"></i>
                        <span>25 Desember 2024</span>
                    </div>
                    <p class="card-text">Rp 50.000</p>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card event-card">
                <img src="https://via.placeholder.com/300x150" class="card-img-top rounded-top" alt="Gambar Tech Expo">
                <div class="card-body">
                    <h5 class="card-title">Tech Expo</h5>
                    <p class="card-text">Rp 100.000</p>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card event-card">
                <img src="https://via.placeholder.com/300x150" class="card-img-top rounded-top" alt="Gambar Music Concert">
                <div class="card-body">
                    <h5 class="card-title">Music Concert</h5>
                    <p class="card-text">Rp 75.000</p>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card event-card">
                <img src="https://via.placeholder.com/300x150" class="card-img-top rounded-top" alt="Gambar Art Festival">
                <div class="card-body">
                    <h5 class="card-title">Art Festival</h5>
                    <p class="card-text">Rp 30.000</p>
                </div>
            </div>
        </div>
    </div>
    <div class="text-end mt-3">
        <button class="btn btn-primary">Lihat Semua</button>
    </div>
</div>

<!-- Rekomendasi Event -->
<div class="container">
    <h3 class="section-title">Rekomendasi Event</h3>
    <div class="row row-cols-1 row-cols-md-4 g-4">
        <div class="col">
            <div class="card event-card">
                <div class="card-body">
                    <h5 class="card-title">Startup Meet</h5>
                    <p class="card-text">Rp 25.000</p>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card event-card">
                <div class="card-body">
                    <h5 class="card-title">Cultural Night</h5>
                    <p class="card-text">Rp 40.000</p>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card event-card">
                <div class="card-body">
                    <h5 class="card-title">Coding Bootcamp</h5>
                    <p class="card-text">Rp 60.000</p>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card event-card">
                <div class="card-body">
                    <h5 class="card-title">Food Bazaar</h5>
                    <p class="card-text">Rp 20.000</p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Semua Event -->
<div class="container">
    <h3 class="section-title">Semua Event</h3>
    <div class="row row-cols-1 row-cols-md-4 g-4">
        <div class="col">
            <div class="card event-card">
                <div class="card-body">
                    <h5 class="card-title">UMKM Fest</h5>
                    <p class="card-text">Rp 50.000</p>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card event-card">
                <div class="card-body">
                    <h5 class="card-title">Tech Expo</h5>
                    <p class="card-text">Rp 100.000</p>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card event-card">
                <div class="card-body">
                    <h5 class="card-title">Music Concert</h5>
                    <p class="card-text">Rp 75.000</p>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card event-card">
                <div class="card-body">
                    <h5 class="card-title">Art Festival</h5>
                    <p class="card-text">Rp 30.000</p>
                </div>
            </div>
        </div>
    </div>
    <div class="text-end mt-3">
        <button class="btn btn-primary">Lihat Semua</button>
    </div>
</div>
@endSection