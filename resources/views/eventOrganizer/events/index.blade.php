@extends('layouts.sidebar-eo')

@section('title', 'Events')

@section('header-title', 'Event')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4">Daftar Event</h2>
    <a href="{{ route('eventOrganizer.events.create') }}" class="btn btn-primary mb-3">+ Event Baru</a>
    
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="table-responsive">
        <table class="table table-bordered table-striped">
            <thead class="thead-dark">
                <tr>
                    <th>#</th>
                    <th>Thumbnail</th>
                    <th>Nama Event</th>
                    <th>Deskripsi</th>
                    <th>Kategori</th>
                    <th>Tanggal</th>
                    <th>Lokasi</th>
                    <th>Harga</th>
                    <th>Kapasitas</th>
                    <th>Sisa</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($events as $event)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>
                            <img src="{{ asset($event->thumbnail) }}" alt="Thumbnail" class="img-thumbnail" style="width: 100px;">
                        </td>
                        <td>{{ $event->name }}</td>
                        <td>{{ Str::limit($event->description, 50) }}</td>
                        <td>{{ $event->category }}</td>
                        <td>{{ \Carbon\Carbon::parse($event->date)->format('d M Y') }}</td>
                        <td>{{ $event->location }}</td>
                        <td>Rp {{ number_format($event->price, 0, ',', '.') }}</td>
                        <td>{{ $event->capacity }}</td>
                        <td>{{ $event->available_tickets }}</td>
                        <td>
                            <!-- Tombol Edit -->
                            <a href="{{ route('eventOrganizer.events.edit', $event->id) }}" class="btn btn-sm btn-warning">
                                <i class="bi bi-pencil-square"></i> <!-- Bootstrap Icon untuk edit -->
                            </a>
                        
                            <!-- Tombol Hapus -->
                            <form action="{{ route('eventOrganizer.events.destroy', $event->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus event ini?')">
                                    <i class="bi bi-trash-fill"></i> <!-- Bootstrap Icon untuk hapus -->
                                </button>
                            </form>
                        </td>
                        
                    </tr>
                @empty
                    <tr>
                        <td colspan="9" class="text-center">Tidak ada event yang tersedia.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
