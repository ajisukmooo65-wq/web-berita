@extends('admin.layouts.app')

@section('title', 'Edit Profile')

@section('content')
<div class="container-fluid py-4">
    @include('admin.partials.alerts')
    <div class="d-flex align-items-center justify-content-between mb-4">
        <div>
            <h1 class="h3 mb-1">Edit Profile</h1>
            <p class="text-muted mb-0">Update your account details and avatar.</p>
        </div>
        <a href="{{ route('admin.dashboard') }}" class="btn btn-outline-secondary">Back to dashboard</a>
    </div>

    <div class="card rounded-4 shadow-sm border-0">
        <div class="card-body p-4">
            <form action="{{ route('admin.profile.update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row g-3">
                    <div class="col-md-6">
                        <div class="form-floating">
                            <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" placeholder="Name" value="{{ old('name', $user->name) }}" required>
                            <label for="name">Name</label>
                            @error('name')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-floating">
                            <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email" value="{{ old('email', $user->email) }}" required>
                            <label for="email">Email</label>
                            @error('email')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-floating">
                            <input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror" placeholder="New Password">
                            <label for="password">New Password</label>
                            @error('password')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-floating">
                            <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" placeholder="Confirm Password">
                            <label for="password_confirmation">Confirm Password</label>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="mb-3">
                            <label for="avatar" class="form-label">Profile Avatar</label>
                            <input class="form-control @error('avatar') is-invalid @enderror" type="file" id="avatar" name="avatar">
                            @error('avatar')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                        @if($user->avatar)
                            <p class="small text-muted mb-0">Current avatar: {{ basename($user->avatar) }}</p>
                        @endif
                    </div>
                </div>

                <button type="submit" class="btn btn-warning mt-4">Save profile</button>
            </form>
        </div>
    </div>
</div>
@endsection
