@extends('front.layouts.app')

@section('title', $category->name)

@section('content')
<div class="container">
    <div class="row align-items-center mb-4">
        <div class="col-md-8">
            <h1 class="h3 mb-2">{{ $category->name }}</h1>
            <p class="text-muted mb-0">Articles tagged in this category.</p>
        </div>
        <div class="col-md-4 text-md-end">
            <a href="{{ route('front.news.index') }}" class="text-decoration-none">Browse all news</a>
        </div>
    </div>

    <div class="row g-4">
        <div class="col-lg-8">
            @forelse($articles as $article)
                <div class="card rounded-4 shadow-sm border-0 mb-4">
                    <div class="card-body">
                        <h5 class="card-title">{{ $article->title }}</h5>
                        <p class="card-text text-muted">{{ Str::limit($article->excerpt, 120) }}</p>
                        <div class="d-flex justify-content-between align-items-center">
                            <small class="text-muted">{{ $article->published_at->format('d M Y') }}</small>
                            <a href="{{ route('front.news.show', $article->slug) }}" class="text-primary text-decoration-none">Read more →</a>
                        </div>
                    </div>
                </div>
            @empty
                <div class="alert alert-secondary">No published articles available in this category yet.</div>
            @endforelse

            <div class="mt-4">{{ $articles->links() }}</div>
        </div>

        <div class="col-lg-4">
            <div class="card rounded-4 shadow-sm border-0 p-4">
                <h6>Category details</h6>
                <p class="text-muted mb-0">{{ $category->description ?? 'Browse news in this category.' }}</p>
            </div>
        </div>
    </div>
</div>
@endsection
