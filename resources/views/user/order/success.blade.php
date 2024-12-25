@extends('layouts.layout')
@section('title', 'Pembayaran Sukses')
@section('content')
<div class="container my-5">
    <h2 class="text-success">Pembayaran Berhasil!</h2>
    <p>Order ID: <strong>{{ $order->id }}</strong></p>
    <p>Status Transaksi: <strong>{{ $transactionStatus }}</strong></p>
    <p>Kode Status: <strong>{{ $statusCode }}</strong></p>
    <a href="{{ route('user.dashboard') }}" class="btn btn-primary">Kembali ke Dashboard</a>
</div>
@endsection
