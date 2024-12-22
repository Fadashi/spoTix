<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">


    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            padding-top: 75px;
            
        }
        .navbar-custom {
            background-color: #001f54;
            padding: 1rem 0.5rem;
        }
        .navbar-custom .navbar-brand {
            font-size: 1.5rem;
            font-weight: bold;
            color: white;
        }
        .navbar-custom .nav-link {
            color: white;
            padding: 0.5rem 1rem;
            font-size: 0.8rem;
        }
        .navbar-custom .nav-link:hover {
            text-decoration: underline;
        }
        .navbar-custom .btn-outline-light {
            border-color: white;
            color: white;
        }
        .navbar-custom .btn-outline-light:hover {
            background-color: white;
            color: #001f54;
        }
        .navbar-custom .form-control {
            border-radius: 20px;
            border: none;
            padding: 0.5rem 1rem;
        }
        .navbar-custom .form-control:focus {
            box-shadow: none;
        }
        .navbar-toggler {
            border: none;
        }
        .navbar-toggler-icon {
            background-image: url('data:image/svg+xml,%3Csvg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 30 30"%3E%3Cpath stroke="rgba(255, 255, 255, 1)" stroke-width="2" stroke-linecap="round" stroke-miterlimit="10" d="M4 7h22M4 15h22M4 23h22"/%3E%3C/svg%3E');
        }
        .nav-item-spacing {
            margin-right: 10px;
        }
        @media (max-width: 768px) {
            .navbar-custom .form-control {
                margin-top: 0.5rem;
            }
            .d-flex .btn {
                margin-top: 0.5rem;
            }
        }
        .footer {
            background-color: #001f54;
            color: white;
            text-align: center;
            padding: 20px 0;
            margin-top: 30px;
        }
        .event-card {
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            transition: transform 0.2s;
        }
        .event-card:hover {
            transform: scale(1.02);
        }
        .card-img-top {
            height: 150px;
            object-fit: cover; /* Memastikan gambar memenuhi ukuran dengan proporsi yang sesuai */
        }
        .section-title {
            margin-top: 30px;
            margin-bottom: 15px;
            font-weight: bold;
            color: #001f54;
        }
        .footer .fa-lg {
            font-size: 1.5rem;
        }

        .footer a {
            transition: transform 0.2s ease-in-out;
        }

        .footer a:hover {
            transform: scale(1.2);
            color: #ffc107; /* Warna highlight saat ikon dihover */
        }
    </style>
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-custom fixed-top">
    <div class="container navbar-container">
        <!-- Logo -->
        <a class="navbar-brand fw-bold" href="#">spoTix</a>

        <!-- Toggler for mobile -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarContent">
            <!-- Search Bar -->
            <form class="d-flex align-items-center me-auto ms-3" style="flex-grow: 1;">
                <input class="form-control" type="search" placeholder="Cari Event Di sini" aria-label="Search">
            </form>

            <!-- Navbar Links -->
            <ul class="navbar-nav ms-auto">
                <li class="nav-item nav-item-spacing">
                    <a class="nav-link" href="#">Event</a>
                </li>
                <li class="nav-item nav-item-spacing">
                    <a class="nav-link" href="#">Buat Event</a>
                </li>
                <li class="nav-item nav-item-spacing">
                    <a class="nav-link" href="#">Contact us</a>
                </li>
            </ul>

            <!-- Buttons -->
            <div class="d-flex">
                <a href="{{ route('login') }}" class="btn btn-outline-light me-2">Masuk</a>
                <a href="{{ route('chooseRegister') }}" class="btn btn-light text-dark">Daftar</a>
            </div>
        </div>
    </div>
</nav>

<!-- Banner -->
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

<!-- Footer -->
<footer class="footer">
    <div class="container">
        <p>&copy; 2024 spoTix. All rights reserved.</p>
        <div class="d-flex justify-content-center">
            <a href="#" class="text-light me-3">
                <i class="fab fa-facebook fa-lg"></i>
            </a>
            <a href="#" class="text-light me-3">
                <i class="fab fa-twitter fa-lg"></i>
            </a>
            <a href="#" class="text-light">
                <i class="fab fa-instagram fa-lg"></i>
            </a>
        </div>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

