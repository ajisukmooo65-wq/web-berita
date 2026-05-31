@extends('admin.layouts.app')

@section('title', 'Create User')

@section('content')
<div class="container-fluid py-4">
    @include('admin.partials.alerts')
    <div class="d-flex align-items-center justify-content-between mb-4">
        <div>
            <h1 class="h3 mb-1">Create New User</h1>
            <p class="text-muted mb-0">Add a new admin, editor, or writer account.</p>
        </div>
        <a href="{{ route('admin.users.index') }}" class="btn btn-outline-secondary">Back to users</a>
    </div>

    <div class="card rounded-4 shadow-sm border-0">
        <div class="card-body p-4">
            <form action="{{ route('admin.users.store') }}" method="POST">
                @csrf
                <div class="row g-3">
                    <div class="col-md-6">
                        <div class="form-floating">
                            <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" placeholder="Name" value="{{ old('name') }}" required>
                            <label for="name">Name</label>
                            @error('name')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-floating">
                            <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email" value="{{ old('email') }}" required>
                            <label for="email">Email</label>
                            @error('email')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-floating">
                            <select name="role" id="role" class="form-select @error('role') is-invalid @enderror" required>
                                <option value="">Choose role</option>
                                <option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}>Administrator</option>
                                <option value="editor" {{ old('role') == 'editor' ? 'selected' : '' }}>Editor</option>
                                <option value="writer" {{ old('role') == 'writer' ? 'selected' : '' }}>Writer</option>
                            </select>
                            <label for="role">Role</label>
                            @error('role')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-floating">
                            <input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password" required>
                            <label for="password">Password</label>
                            @error('password')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-floating">
                            <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" placeholder="Confirm Password" required>
                            <label for="password_confirmation">Confirm Password</label>
                        </div>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary mt-4">Create User</button>
            </form>
        </div>
    </div>
</div>
@endsection
