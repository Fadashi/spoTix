@extends('layouts.sidebar-eo')

@section('title', 'Event Edit')

@section('header-title', 'Event Edit')
@section('content')
<div class="container mt-4">
    <h2 class="mb-4">Edit Event</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('eventOrganizer.events.update', $event->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="thumbnail" class="form-label">Thumbnail Event</label>
            <input type="file" name="thumbnail" id="thumbnail" class="form-control">
            <small class="text-muted">Biarkan kosong jika tidak ingin mengganti gambar.</small>
            @if ($event->thumbnail)
                <div class="mt-2">
                    <img src="{{ asset('storage/' . $event->thumbnail) }}" alt="Thumbnail" class="img-thumbnail" style="width: 150px;">
                </div>
            @endif
        </div>

        <div class="mb-3">
            <label for="name" class="form-label">Nama Event</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $event->name) }}" required>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Deskripsi Event</label>
            <textarea name="description" id="description" rows="4" class="form-control" required>{{ old('description', $event->description) }}</textarea>
        </div>

        <div class="mb-3">
            <label for="category" class="form-label">Kategori Event</label>
            <input type="text" name="category" id="category" class="form-control" value="{{ old('category', $event->category) }}" required>
        </div>

        <div class="mb-3">
            <label for="date" class="form-label">Tanggal Event</label>
            <input type="date" name="date" id="date" class="form-control" value="{{ old('date', $event->date) }}" required>
        </div>

        <div class="mb-3">
            <label for="location" class="form-label">Lokasi Event</label>
            <input type="text" name="location" id="location" class="form-control" value="{{ old('location', $event->location) }}" required>
        </div>

        <div class="mb-3">
            <label for="price" class="form-label">Harga Event</label>
            <input type="number" name="price" id="price" class="form-control" value="{{ old('price', $event->price) }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
        <a href="{{ route('eventOrganizer.events.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
