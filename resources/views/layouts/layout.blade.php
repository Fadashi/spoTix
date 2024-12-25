<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>

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
            border-radius: 10px;
        }

        .event-card:hover {
            transform: scale(1.02);
        }

        .card-img-top {
            height: 150px;
            object-fit: cover;
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
            color: #ffc107;
        }

        .text-orange {
            color: #FFA500;
        }

        /* Styling for the "Lihat Semua" button */
        .btn-primary-custom {
            background-color: #001f54;
            border-color: #001f54;
            color: white;
            padding: 10px 20px;
            font-weight: bold;
            text-transform: uppercase;
            border-radius: 50px;
        }

        .btn-primary-custom:hover {
            background-color: #ffc107;
            border-color: #ffc107;
            color: #001f54;
        }

        .btn-secondary-custom {
            background-color: #ff2121;
            border-color: #ff2121;
            color: white;
            padding: 10px 20px;
            font-weight: bold;
            text-transform: uppercase;
            border-radius: 50px;
        }

        .btn-secondary-custom:hover {
            background-color: #b20000;
            border-color: #b20000;
            color: #ffffff;
        }

        /* Improved background color for the "Rekomendasi Event" section */
        .rekomendasi-event {
            background: linear-gradient(to right, #001f54, #003366);
            color: white;
            border-radius: 15px;
            padding: 30px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        .card-body {
            background-color: #ffffff;
            padding: 15px;
            border-radius: 10px;
            transition: background-color 0.3s ease;
        }

        .card-body:hover {
            background-color: #f1f1f1;
        }

        .card-title {
            color: #001f54;
            font-size: 1.2rem;
        }
        
        /* Styling carousel slide background */
        .custom-slide {
            height: 400px;
            background: linear-gradient(135deg, #4A90E2, #9013FE);
            border-radius: 10px;
            color: #fff;
        }

        /* Custom carousel indicators */
        .carousel-indicators button {
            background-color: #FF6F61;
            width: 12px;
            height: 12px;
            border-radius: 50%;
            border: none;
        }

        .carousel-indicators .active {
            background-color: #FFAA00;
            transform: scale(1.3);
        }

        /* Custom carousel controls */
        .carousel-control-prev-icon,
        .carousel-control-next-icon {
            background-color: rgba(0, 0, 0, 0.5);
            border-radius: 50%;
            padding: 10px;
            width: 40px;
            height: 40px;
            filter: invert(1);
        }

        .modern-buttons .carousel-control-prev,
        .modern-buttons .carousel-control-next {
            background-color: #FFFFFF;
            border-radius: 50%;
            width: 45px;
            height: 45px;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            transition: background-color 0.3s ease;
        }

        .modern-buttons .carousel-control-prev:hover,
        .modern-buttons .carousel-control-next:hover {
            background-color: #FF6F61;
        }

        .modern-buttons .carousel-control-prev-icon,
        .modern-buttons .carousel-control-next-icon {
            filter: none;
            background-size: 20px;
        }

        /* Breadcrumb */
        .breadcrumb {
            background-color: #f8f9fa; /* Warna latar belakang */
            padding: 10px 15px; /* Padding */
            border-radius: 5px; /* Sudut melengkung */
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1); /* Bayangan */
        }

        .breadcrumb-item a {
            color: #001f54; /* Warna link */
            text-decoration: none;
            transition: color 0.3s;
            font-weight: bold;
        }

        .breadcrumb-item.active {
            color: #6c757d; /* Warna untuk item aktif */
        }
    </style>
</head>

<body>
    <div id="app">
        <div id="main">
            <!-- Page Heading Section -->
            <div class="page-heading">
                <h3>@yield('page_title')</h3>
            </div>
            <!-- End of Page Heading Section -->

            <!-- Navbar Section -->
            @include('layouts.navbar')
            <!-- End of Navbar Section -->

            <!-- Content Section -->
            @yield('content')
            <!-- End of Content Section -->

            <!-- Footer Section -->
            @include('layouts.footer')
            <!-- End of Footer Section -->
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>