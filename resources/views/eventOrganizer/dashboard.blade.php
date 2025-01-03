@extends('layouts.sidebar-eo')

@section('title', 'Dashboard')

@section('header-title', 'Dashboard')

@section('content')
<!-- Statistik -->
<div class="row g-3 mb-4">
    <div class="col-md-4 col-lg-2">
        <div class="card">
            <div class="card-body text-center">
                <i class="bi bi-bar-chart" style="font-size: 24px; color: #6c757d;"></i>
                <h5 class="mt-3">Omzet</h5>
                <p>Rp {{ number_format($totalProfit, 0, ',', '.') }}</p>
            </div>
        </div>
    </div>
    {{-- <div class="col-md-4 col-lg-2">
        <div class="card">
            <div class="card-body text-center">
                <i class="bi bi-arrow-repeat" style="font-size: 24px; color: #6c757d;"></i>
                <h5 class="mt-3">Refunds</h5>
                <p>Rp {{ number_format($totalRefund, 0, ',', '.') }}</p>
            </div>
        </div>
    </div> --}}
    <div class="col-md-4 col-lg-2">
        <div class="card">
            <div class="card-body text-center">
                <i class="bi bi-basket-fill" style="font-size: 24px; color: #6c757d;"></i>
                <h5 class="mt-3">Sold Today</h5>
                <p>{{ $soldToday }}</p>
            </div>
        </div>
    </div>
    <div class="col-md-4 col-lg-2">
        <div class="card">
            <div class="card-body text-center">
                <i class="bi bi-cart-check" style="font-size: 24px; color: #6c757d;"></i>
                <h5 class="mt-3">Orders</h5>
                <p>{{ $totalOrders }}</p>
            </div>
        </div>
    </div>
    <div class="col-md-4 col-lg-2">
        <div class="card">
            <div class="card-body text-center">
                <i class="bi bi-ticket-perforated-fill" style="font-size: 24px; color: #6c757d;"></i>
                <h5 class="mt-3">Ticket Sold</h5>
                <p>{{ $totalTicketsSold }}</p>
            </div>
        </div>
    </div>
    <div class="col-md-4 col-lg-2">
        <div class="card">
            <div class="card-body text-center">
                <i class="bi bi-people-fill" style="font-size: 24px; color: #6c757d;"></i>
                <h5 class="mt-3">Customers</h5>
                <p>{{ $totalCustomers }}</p>
            </div>
        </div>
    </div>
</div>

<!-- Grafik Keuntungan -->
<h4 class="section-title">Keuntungan</h4>
<div class="chart-container bg-white p-4 rounded shadow-sm">
    <canvas id="chart"></canvas>
</div>
@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const ctx = document.getElementById('chart').getContext('2d');
    const chart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: @json(array_keys($monthlyProfits->toArray())),
            datasets: [{
                label: 'Keuntungan',
                data: @json(array_values($monthlyProfits->toArray())),
                backgroundColor: 'rgba(0, 31, 84, 0.5)',
                borderColor: '#001f54',
                borderWidth: 2
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    display: false
                }
            }
        }
    });
</script>
@endpush
