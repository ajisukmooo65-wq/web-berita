@extends('admin.layouts.app')

@section('title', 'User Details')

@section('content')
<div class="container-fluid py-4">
    @include('admin.partials.alerts')
    <div class="d-flex align-items-center justify-content-between mb-4">
        <div>
            <h1 class="h3 mb-1">User Details</h1>
            <p class="text-muted mb-0">View the details of a user account.</p>
        </div>
        <a href="{{ route('admin.users.index') }}" class="btn btn-outline-secondary">Back to users</a>
    </div>

    <div class="card rounded-4 shadow-sm border-0">
        <div class="card-body p-4">
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="bg-secondary bg-opacity-10 rounded-4 p-4 text-center">
                        <div class="rounded-circle bg-white border d-inline-flex align-items-center justify-content-center mb-3" style="width: 96px; height: 96px;">
                            <i class="fas fa-user text-secondary fa-2x"></i>
                        </div>
                        <h4 class="h5 mb-1">{{ $user->name }}</h4>
                        <p class="text-muted mb-0 text-capitalize">{{ $user->role }}</p>
                    </div>
                </div>
                <div class="col-md-8">
                    <dl class="row">
                        <dt class="col-sm-4 text-muted">Email</dt>
                        <dd class="col-sm-8">{{ $user->email }}</dd>

                        <dt class="col-sm-4 text-muted">Role</dt>
                        <dd class="col-sm-8 text-capitalize">{{ $user->role }}</dd>

                        <dt class="col-sm-4 text-muted">Joined</dt>
                        <dd class="col-sm-8">{{ $user->created_at->format('d M Y') }}</dd>
                    </dl>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
