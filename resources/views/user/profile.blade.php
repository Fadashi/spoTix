@extends('layouts.layout')

@section('title', 'Edit Profile')

@section('content')
<div class="container my-5">
   <h3 class="mb-4">Edit Profile</h3>
   @if(session('success'))
       <div class="alert alert-success">{{ session('success') }}</div>
   @endif
   <form method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data">
       @csrf
       <div class="mb-3">
           <label for="name" class="form-label">Name</label>
           <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $user->name) }}" required>
       </div>
       <div class="mb-3">
           <label for="email" class="form-label">Email</label>
           <input type="email" class="form-control" id="email" name="email" value="{{ old('email', $user->email) }}" required>
       </div>
       <button type="submit" class="btn btn-primary">Update Profile</button>
   </form>
</div>
@endsection