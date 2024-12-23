@extends('layouts.sidebar-eo')

@section('title', 'Event Create')

@section('header-title', 'Event Create')

@section('content')
<div class="container mt-5">
    <h1>Buat Event Baru</h1>
    <form action="{{ route('eventOrganizer.events.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="thumbnail" class="form-label">Thumbnail</label>
            <input type="file" name="thumbnail" id="thumbnail" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="name" class="form-label">Nama Event</label>
            <input type="text" name="name" id="name" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Deskripsi</label>
            <textarea name="description" id="description" class="form-control" rows="4" required></textarea>
        </div>

        <div class="mb-3">
            <label for="category" class="form-label">Kategori</label>
            <input type="text" name="category" id="category" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="date" class="form-label">Tanggal</label>
            <input type="date" name="date" id="date" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="location" class="form-label">Lokasi</label>
            <input type="text" name="location" id="location" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="price" class="form-label">Harga Tiket</label>
            <input type="number" name="price" id="price" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="capacity" class="form-label">Kapasitas Penonton</label>
            <input type="number" class="form-control" id="capacity" name="capacity" value="{{ old('capacity') }}" min="1" required>
        </div>

        <button type="submit" class="btn btn-success">Buat Event</button>
    </form>
</div>
@endsection
