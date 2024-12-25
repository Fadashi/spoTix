@extends('layouts.layout')
@section('title', 'Event')
@section('header-title', 'Event')

@section('content')
<div class="container my-5">
    
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ route('dashboard') }}">Dashboard</a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">{{ $event->name }}</li>
        </ol>
    </nav>

    <h2 class="mb-3">{{ $event->name }}</h2>
    <p><i class="bi bi-geo-alt-fill text-secondary"></i> {{ $event->location }}</p>

    <div class="row">
        <!-- Thumbnail -->
        <div class="col-md-6">
            <img 
                src="{{ asset($event->thumbnail ?? 'https://via.placeholder.com/300x200') }}" 
                class="img-fluid rounded" 
                style="object-fit: cover; max-height: 400px; width: 100%;" 
                alt="{{ $event->name }}"
            >
        </div>
        
        <!-- Detail Event -->
        <div class="col-md-6">
            <h5 class="mb-3">Tentang Event Ini</h5>
            <p>{{ $event->description }}</p>
            
            <h5 class="mb-3">Pilihan Tiket</h5>
            <div class="card p-3">
                <h5>{{ $event->title }}</h5>
                <p><i class="bi bi-calendar-event-fill text-secondary"></i> {{ \Carbon\Carbon::parse($event->date)->format('l, d F Y') }}</p>
                <p><i class="bi bi-geo-alt-fill text-secondary"></i> {{ $event->location }}</p>
                <hr>
                <p><strong>Normal</strong></p>
                <p>Harga: <strong>Rp {{ number_format($event->price, 0, ',', '.') }}</strong></p>
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <i class="bi bi-exclamation-triangle-fill me-2"></i>
                    Kamu belum login, silahkan login atau buat akun sebelum membeli tiket!
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

<script>
    const price = {{ $event->price }};
    const maxTickets = 5;

    function updateTotal() {
        const quantity = parseInt(document.getElementById('quantity').value) || 0;
        document.getElementById('totalPrice').innerText = `Rp ${new Intl.NumberFormat('id-ID').format(price * quantity)}`;
    }

    function showError(message) {
        const errorElement = document.getElementById('quantityError');
        errorElement.style.display = 'block';
        errorElement.innerText = message;
    }

    function hideError() {
        const errorElement = document.getElementById('quantityError');
        errorElement.style.display = 'none';
    }

    function increaseQuantity() {
        const quantityField = document.getElementById('quantity');
        const currentQuantity = parseInt(quantityField.value) || 0;

        if (currentQuantity < maxTickets) {
            quantityField.value = currentQuantity + 1;
            updateTotal();
            hideError(); // Sembunyikan pesan error jika kuantitas di bawah maksimum
        } else {
            showError(`Maksimal pembelian adalah ${maxTickets} tiket.`);
        }
    }

    function decreaseQuantity() {
        const quantityField = document.getElementById('quantity');
        const currentQuantity = parseInt(quantityField.value) || 0;

        if (currentQuantity > 0) {
            quantityField.value = currentQuantity - 1;
            updateTotal();
            hideError(); // Sembunyikan pesan error jika kuantitas valid
        }
    }
</script>
