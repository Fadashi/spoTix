@extends('layouts.layout')
@section('title', 'Pembayaran')

@section('content')
<div class="container my-5">
    <h2 class="mb-3">Pembayaran</h2>
    <p>Silakan selesaikan pembayaran Anda dengan Midtrans.</p>

    <!-- Tombol Bayar -->
    <button id="pay-button" class="btn btn-primary">Bayar Sekarang</button>

    <!-- Script Midtrans -->
    <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ config('midtrans.client_key') }}"></script>
    <script>
        var payButton = document.getElementById('pay-button');
        payButton.addEventListener('click', function () {
            snap.pay('{{ $snapToken }}');
        });
    </script>
</div>
@endsection
