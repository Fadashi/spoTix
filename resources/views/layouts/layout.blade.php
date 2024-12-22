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