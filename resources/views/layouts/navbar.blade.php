<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-custom fixed-top">
    <div class="container navbar-container">
        <!-- Logo -->
        @if (Auth::check() && Auth::user()->role == 'user')
        <a class="navbar-brand fw-bold" href={{ route('user.dashboard') }}>
            <img src="{{ asset('logo/logo-white.svg') }}" alt="Logo" style="height: 30px;">
        </a>
        @else
        <a class="navbar-brand fw-bold" href=#>
            <img src="{{ asset('logo/logo-white.svg') }}" alt="Logo" style="height: 30px;">
        </a>
        @endif

        <!-- Toggler for mobile -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarContent">
            <!-- Search Bar -->
            <form class="d-flex align-items-center me-auto ms-3" style="max-width: 400px; width: 100%;" method="GET" action="{{ route('events.search') }}">
                <input class="form-control" type="search" name="query" placeholder="Cari Event Di sini" aria-label="Search">
            </form>

            <!-- Navbar Links -->
            <ul class="navbar-nav ms-auto">
                <li class="nav-item nav-item-spacing">
                    <a class="nav-link text-light d-flex align-items-center" href="#">
                        <i class="bi bi-envelope me-1"></i>Contact Us
                    </a>
                </li>
            </ul>

            <!-- User Dropdown -->
            @if (Auth::check() && Auth::user()->role == 'user')
            <div class="dropdown">
                <button class="btn btn-light border-0 dropdown-toggle d-flex align-items-center shadow-sm px-2 py-1" 
                    type="button" id="userDropdown" data-bs-toggle="dropdown" aria-expanded="false" style="gap: 0.5rem;">
                    <img src="{{ Auth::user()->profile_picture ?? 'https://ui-avatars.com/api/?name='.urlencode(Auth::user()->name).'&background=random&size=128' }}" 
                        alt="Profile Picture" 
                        class="rounded-circle" style="width: 35px; height: 35px; object-fit: cover;">
                    <span class="fw-semibold text-truncate" style="max-width: 120px;">{{ Auth::user()->name }}</span>
                </button>
                <ul class="dropdown-menu dropdown-menu-end shadow-sm" style="min-width: 220px;">
                    <li class="dropdown-header text-muted small">Pengaturan Akun</li>
                    <li>
                        <a class="dropdown-item d-flex align-items-center" href="{{ route('profile.edit') }}">
                            <i class="bi bi-pencil-square me-2 text-primary"></i>Edit Profil
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item d-flex align-items-center" href="{{ route('user.myTickets') }}">
                            <i class="bi bi-ticket-perforated me-2 text-success"></i>Tiket Saya
                        </a>
                    </li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button class="dropdown-item d-flex align-items-center text-danger" type="submit">
                                <i class="bi bi-box-arrow-right me-2"></i>Logout
                            </button>
                        </form>
                    </li>
                </ul>
            </div>
                @else
                <a href="{{ route('login') }}" class="btn btn-outline-light d-flex align-items-center me-2 fw-bold">
                    <i class="bi bi-box-arrow-in-right me-1"></i>Masuk
                </a>
                <a href="{{ route('chooseRegister') }}" class="btn btn-light text-dark d-flex align-items-center fw-bold">
                    <i class="bi bi-person-plus me-1"></i>Daftar
                </a>
                @endif
            </div>
        </div>
    </div>
</nav>
