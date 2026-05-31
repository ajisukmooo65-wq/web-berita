@extends('front.layouts.app')

@section('title', 'News Portal')

@section('content')
<div class="container">
    <div class="row align-items-center gx-5 mb-5">
        <div class="col-lg-7">
            <h1 class="display-5 fw-bold">Stay informed with the latest news.</h1>
            <p class="lead text-muted">A modern news portal built with Laravel and Bootstrap.</p>
            <div class="d-flex gap-2 flex-wrap">
                <a href="{{ route('front.news.index') }}" class="btn btn-primary btn-lg">Browse news</a>
                <a href="{{ route('front.about') }}" class="btn btn-outline-secondary btn-lg">Learn more</a>
            </div>
        </div>
        <div class="col-lg-5">
            <div class="card rounded-4 shadow-sm border-0 overflow-hidden">
                <div class="card-body p-4">
                    <h4 class="fw-semibold">Featured stories</h4>
                    <p class="text-muted">Explore the latest editor-picked articles.</p>
                    <div class="row g-3">
                        @foreach($featured as $article)
                            <div class="col-12">
                                <a href="{{ route('front.news.show', $article->slug) }}" class="text-decoration-none text-dark">
                                    <div class="d-flex gap-3 align-items-center">
                                        <div class="flex-shrink-0 bg-primary bg-opacity-10 rounded-4 p-3 text-primary">
                                            <i class="bi bi-newspaper fs-4"></i>
                                        </div>
                                        <div>
                                            <h6 class="mb-1">{{ $article->title }}</h6>
                                            <small class="text-muted">{{ $article->category->name ?? 'Uncategorized' }}</small>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row gy-4">
        <div class="col-lg-8">
            <div class="d-flex align-items-center justify-content-between mb-4">
                <div>
                    <h2 class="h4 mb-1">Latest articles</h2>
                    <p class="text-muted mb-0">Read the newest published news items.</p>
                </div>
                <a href="{{ route('front.news.index') }}" class="text-decoration-none">View all articles</a>
            </div>

            <div class="row g-4">
                @foreach($latestArticles as $article)
                    <div class="col-md-6">
                        <div class="card h-100 rounded-4 shadow-sm border-0">
                            @if($article->thumbnail)
                                <img src="{{ asset('storage/' . $article->thumbnail) }}" class="card-img-top" alt="{{ $article->title }}">
                            @endif
                            <div class="card-body">
                                <span class="badge bg-primary bg-opacity-15 text-primary mb-2">{{ $article->category->name ?? 'News' }}</span>
                                <h5 class="card-title">{{ $article->title }}</h5>
                                <p class="card-text text-muted">{{ Str::limit($article->excerpt, 100) }}</p>
                                <a href="{{ route('front.news.show', $article->slug) }}" class="stretched-link text-decoration-none">Read more</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <div class="col-lg-4">
            <div class="card rounded-4 shadow-sm border-0 mb-4">
                <div class="card-body p-4">
                    <h5 class="mb-3">Categories</h5>
                    <div class="list-group list-group-flush">
                        @foreach($categories as $category)
                            <a href="{{ route('front.category', $category->slug) }}" class="list-group-item list-group-item-action py-3">{{ $category->name }} <span class="badge bg-primary rounded-pill float-end">{{ $category->articles_count }}</span></a>
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="card rounded-4 shadow-sm border-0 p-4 bg-primary text-white">
                <h5>Subscribe to updates</h5>
                <p class="mb-0">Get the latest headlines delivered to your inbox.</p>
            </div>
        </div>
    </div>
</div>
@endsection
