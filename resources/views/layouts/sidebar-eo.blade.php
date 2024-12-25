<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Dashboard Event Organizer')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 0;
        }

        /* Sidebar styles */
        .sidebar {
            background-color: #001f54;
            color: white;
            height: 100vh;
            padding-top: 20px;
            position: fixed;
            width: 250px;
        }

        .sidebar .nav-link {
            color: white;
            padding: 15px;
            display: flex;
            align-items: center;
        }

        .sidebar .nav-link:hover {
            background-color: #003b8e;
            text-decoration: none;
        }

        .sidebar .nav-link .bi {
            margin-right: 10px;
        }

        .sidebar .btn {
            width: 90%;
            margin: 10px auto;
        }

        /* Logout button styles */
        .logout-btn {
            position: absolute;
            bottom: 20px;
            width: 90%;
            left: 5%;
        }

        .logout-btn button:hover {
            background-color: #b22222 !important; /* Merah tua saat hover */
            border-color: #b22222 !important;
            color: white; /* Teks putih */
        }

        /* Content styles */
        .content {
            margin-left: 250px;
            padding: 20px;
        }

        /* Header styles */
        header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
            background-color: white;
            padding: 15px 20px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            border-radius: 5px;
        }

        header select, header button {
            margin-left: 10px;
        }
    </style>
    @stack('styles')
</head>
<body>
    <!-- Sidebar -->
    <div class="sidebar">
        <div class="d-grid gap-2">
            <a href="{{ route('eventOrganizer.events.create') }}" class="btn btn-primary">+ Event Baru</a>
        </div>
        <nav class="nav flex-column">
            <a class="nav-link" href="{{ route('eventOrganizer.dashboard') }}">
                <i class="bi bi-grid"></i> Dashboard
            </a>
            <a class="nav-link" href="{{ route('eventOrganizer.events.index') }}">
                <i class="bi bi-calendar-event"></i> Event
            </a>
            <a class="nav-link" href="{{ route('eventOrganizer.events.reports') }}">
                <i class="bi bi-file-bar-graph"></i> Report
            </a>
        </nav>
        <form method="POST" action="{{ route('logout') }}" class="logout-btn">
            @csrf
            <button type="submit" class="btn btn-danger">Log Out</button>
        </form>
    </div>

    <!-- Content -->
    <div class="content">
        <!-- Header -->
        <header>
            <h4>@yield('header-title', 'Dashboard')</h4>
            <div class="d-flex align-items-center">
                <select class="form-select" style="width: auto;">
                    <option selected>Semua Event</option>
                    <option value="1">Event A</option>
                    <option value="2">Event B</option>
                </select>
                <button class="btn btn-outline-dark">Pilih Tanggal</button>
                <i class="bi bi-person-circle ms-3" style="font-size: 24px;"></i>
            </div>
        </header>

        <!-- Main Content -->
        @yield('content')
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
    @stack('scripts')
</body>
</html>
