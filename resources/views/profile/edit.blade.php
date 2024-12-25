@extends('layouts.layout')

@section('title', 'Edit Profile')

@section('content')
<div class="container mt-5">
    <h3 class="mb-4 section-title">Edit Profil</h3>
    <div class="p-4 bg-white shadow-sm rounded">
        @if(session('status') === 'profile-updated')
        <div class="alert alert-success">{{ __('Profile updated successfully.') }}</div>
        @endif

        <form method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data">
            @csrf
            @method('patch')
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $user->name) }}" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ old('email', $user->email) }}" required>
            </div>
            <button type="submit" class="btn btn-primary-custom">Update Profile</button>
        </form>
    </div>

    <!-- Include Update Password Form -->
    <div class="mt-5">
        <h3 class="mb-4 section-title">Update Password</h3>
        <div class="p-4 bg-white shadow-sm rounded">
            <form method="post" action="{{ route('password.update') }}">
                @csrf
                @method('put')
                <div class="mb-3">
                    <label for="current_password" class="form-label">Current Password</label>
                    <input type="password" class="form-control" id="current_password" name="current_password" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">New Password</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                </div>
                <div class="mb-3">
                    <label for="password_confirmation" class="form-label">Confirm Password</label>
                    <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
                </div>
                <button type="submit" class="btn btn-primary-custom">Update Password</button>
            </form>
        </div>
    </div>

    <!-- Include Delete User Form -->
    <div class="mt-5">
        <h3 class="mb-4 section-title">Delete Account</h3>
        <div class="p-4 bg-white shadow-sm rounded">
            <form method="post" action="{{ route('profile.destroy') }}">
                @csrf
                @method('delete')
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                </div>
                <button type="submit" class="btn btn-danger">Delete Account</button>
            </form>
        </div>
    </div>
</div>
@endsection
