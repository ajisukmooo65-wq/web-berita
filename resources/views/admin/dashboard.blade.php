@extends('admin.layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="container-fluid py-4">
    <div class="d-flex flex-column flex-md-row align-items-start align-items-md-center justify-content-between gap-3 mb-4">
        <div>
            <span class="badge bg-soft-primary text-primary mb-2">Admin Dashboard</span>
            <h1 class="h3 fw-bold mb-2">Welcome back, {{ auth()->user()->name }}</h1>
            <p class="text-muted mb-0">A modern overview of your news portal metrics, recent activity, and quick actions.</p>
        </div>
        <div class="text-muted small d-flex flex-column align-items-start align-items-md-end">
            <span>Today</span>
            <span class="fw-semibold">{{ now()->format('l, d F Y') }}</span>
        </div>
    </div>

    <div class="row g-4 mb-4">
        <div class="col-lg-4 col-md-6">
            <div class="card border-start border-4 border-primary shadow-sm h-100 hover-lift">
                <div class="card-body">
                    <div class="d-flex align-items-center justify-content-between mb-3">
                        <div>
                            <p class="text-uppercase text-muted small mb-1">Total Users</p>
                            <h2 class="mb-0 fw-bold">{{ number_format($users) }}</h2>
                        </div>
                        <div class="icon-box bg-primary-soft text-primary">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-people-fill" viewBox="0 0 16 16">
                                <path d="M13 7a2 2 0 1 0-4 0 2 2 0 0 0 4 0z"/>
                                <path fill-rule="evenodd" d="M6 7a2 2 0 1 0-4 0 2 2 0 0 0 4 0zm-6 6s1 0 1-1 1-4 6-4 6 3 6 4-1 1-1 1H0z"/>
                            </svg>
                        </div>
                    </div>
                    <p class="mb-0 text-muted">Active registered users on the portal.</p>
                </div>
            </div>
        </div>

        <div class="col-lg-4 col-md-6">
            <div class="card border-start border-4 border-success shadow-sm h-100 hover-lift">
                <div class="card-body">
                    <div class="d-flex align-items-center justify-content-between mb-3">
                        <div>
                            <p class="text-uppercase text-muted small mb-1">Total Categories</p>
                            <h2 class="mb-0 fw-bold">{{ number_format($categories) }}</h2>
                        </div>
                        <div class="icon-box bg-success-soft text-success">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-tags-fill" viewBox="0 0 16 16">
                                <path d="M3 2a1 1 0 0 0-1 1v4.586a1 1 0 0 0 .293.707l5 5a1 1 0 0 0 1.414 0l5-5a1 1 0 0 0 0-1.414l-5-5A1 1 0 0 0 8.586 1H4a1 1 0 0 0-1 1zm4.5 1a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3z"/>
                                <path d="M1 5.5V1a1 1 0 0 1 1-1h4.5a1 1 0 0 1 .707.293l5 5a1 1 0 0 1 0 1.414l-5 5A1 1 0 0 1 6.5 12H2a1 1 0 0 1-1-1V5.5z"/>
                            </svg>
                        </div>
                    </div>
                    <p class="mb-0 text-muted">Categories available for article organization.</p>
                </div>
            </div>
        </div>

        <div class="col-lg-4 col-md-6">
            <div class="card border-start border-4 border-warning shadow-sm h-100 hover-lift">
                <div class="card-body">
                    <div class="d-flex align-items-center justify-content-between mb-3">
                        <div>
                            <p class="text-uppercase text-muted small mb-1">Total Articles</p>
                            <h2 class="mb-0 fw-bold">{{ number_format($articles) }}</h2>
                        </div>
                        <div class="icon-box bg-warning-soft text-warning">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-journal-richtext" viewBox="0 0 16 16">
                                <path d="M5 10.5a.5.5 0 0 1 .5-.5H11a.5.5 0 0 1 0 1H5.5a.5.5 0 0 1-.5-.5zm0-2a.5.5 0 0 1 .5-.5H11a.5.5 0 0 1 0 1H5.5a.5.5 0 0 1-.5-.5zm0-2A.5.5 0 0 1 5.5 6H11a.5.5 0 0 1 0 1H5.5a.5.5 0 0 1-.5-.5z"/>
                                <path d="M3 1.5A1.5 1.5 0 0 1 4.5 0h7A1.5 1.5 0 0 1 13 1.5v13A1.5 1.5 0 0 1 11.5 16h-7A1.5 1.5 0 0 1 3 14.5v-13zm1 0a.5.5 0 0 0-.5.5v13a.5.5 0 0 0 .5.5h7a.5.5 0 0 0 .5-.5v-13a.5.5 0 0 0-.5-.5h-7z"/>
                            </svg>
                        </div>
                    </div>
                    <p class="mb-0 text-muted">Stories and news items published on the portal.</p>
                </div>
            </div>
        </div>
    </div>

    <div class="row g-4 mb-4">
        <div class="col-xl-8">
            <div class="card shadow-sm border-0 h-100 hover-lift">
                <div class="card-body">
                    <div class="d-flex flex-column flex-sm-row align-items-start align-items-sm-center justify-content-between gap-3 mb-4">
                        <div>
                            <h2 class="h5 fw-semibold mb-1">Quick Actions</h2>
                            <p class="text-muted mb-0">Jump straight into content management.</p>
                        </div>
                        <small class="text-muted">One click access for the most common tasks.</small>
                    </div>
                    <div class="row g-3">
                        <div class="col-sm-4">
                            <a href="{{ route('register') }}" class="btn btn-primary w-100 py-3 shadow-sm">Add User</a>
                        </div>
                        <div class="col-sm-4">
                            <a href="#" class="btn btn-outline-secondary w-100 py-3 shadow-sm">Add Category</a>
                        </div>
                        <div class="col-sm-4">
                            <a href="#" class="btn btn-outline-warning w-100 py-3 shadow-sm">Add Article</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-4">
            <div class="card shadow-sm border-0 h-100 hover-lift">
                <div class="card-body">
                    <h2 class="h5 fw-semibold mb-3">Stats Snapshot</h2>
                    <div class="d-flex align-items-center justify-content-between border-bottom py-3">
                        <div>
                            <p class="text-muted small mb-1">User growth</p>
                            <h3 class="mb-0">{{ number_format($users) }}</h3>
                        </div>
                        <span class="badge bg-primary bg-opacity-10 text-primary">Stable</span>
                    </div>
                    <div class="d-flex align-items-center justify-content-between border-bottom py-3">
                        <div>
                            <p class="text-muted small mb-1">Categories</p>
                            <h3 class="mb-0">{{ number_format($categories) }}</h3>
                        </div>
                        <span class="badge bg-success bg-opacity-10 text-success">Organized</span>
                    </div>
                    <div class="d-flex align-items-center justify-content-between py-3">
                        <div>
                            <p class="text-muted small mb-1">Articles</p>
                            <h3 class="mb-0">{{ number_format($articles) }}</h3>
                        </div>
                        <span class="badge bg-warning bg-opacity-10 text-warning">Tracked</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="card shadow-sm border-0 hover-lift">
        <div class="card-body">
            <div class="d-flex flex-column flex-md-row align-items-start align-items-md-center justify-content-between gap-3 mb-4">
                <div>
                    <h2 class="h5 fw-semibold mb-1">Recent Articles</h2>
                    <p class="text-muted mb-0">The latest published content from your news portal.</p>
                </div>
                <a href="#" class="small text-decoration-none">View all articles</a>
            </div>

            @if($recentArticles->isEmpty())
                <div class="border rounded-3 p-5 text-center bg-white">
                    <div class="mb-3 text-primary">
                        <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" fill="currentColor" class="bi bi-inbox" viewBox="0 0 16 16">
                            <path d="M4.98 1a1 1 0 0 0-.95.684L2.4 6H0v8a1 1 0 0 0 1 1h14a1 1 0 0 0 1-1V6h-2.4l-1.63-4.316A1 1 0 0 0 11.02 1H4.98zM2.163 6h11.674l1.29 3.42a1 1 0 0 1-.94 1.38H3.813a1 1 0 0 1-.94-1.38L2.163 6z"/>
                        </svg>
                    </div>
                    <h5 class="fw-semibold mb-2">No recent articles yet</h5>
                    <p class="text-muted mb-0">Once articles are published, they will appear here with category and author details.</p>
                </div>
            @else
                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0">
                        <thead class="text-muted small text-uppercase">
                            <tr>
                                <th scope="col">Title</th>
                                <th scope="col">Category</th>
                                <th scope="col">Author</th>
                                <th scope="col">Published</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($recentArticles as $article)
                                <tr>
                                    <td class="fw-semibold text-dark">{{ $article->title }}</td>
                                    <td>
                                        <span class="badge rounded-pill bg-secondary bg-opacity-15 text-secondary">{{ $article->category ?? 'Uncategorized' }}</span>
                                    </td>
                                    <td>{{ $article->author ?? 'Unknown' }}</td>
                                    <td class="text-muted">{{ \Carbon\Carbon::parse($article->created_at)->format('d M Y') }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection
