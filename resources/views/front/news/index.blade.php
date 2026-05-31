@extends('front.layouts.app')

@section('title', 'News Archive')

@section('content')
<div class="container">
    <div class="row align-items-center mb-4">
        <div class="col-md-8">
            <h1 class="h3 mb-2">News archive</h1>
            <p class="text-muted">Search and browse all published stories.</p>
        </div>
        <div class="col-md-4">
            <form action="{{ route('front.news.index') }}" method="GET" class="d-flex gap-2">
                <input type="search" name="search" class="form-control" placeholder="Search articles" value="{{ request('search') }}">
                <button class="btn btn-primary" type="submit">Search</button>
            </form>
        </div>
    </div>

    <div class="row g-4">
        <div class="col-lg-8">
            @forelse($articles as $article)
                <div class="card rounded-4 shadow-sm border-0 mb-4 overflow-hidden">
                    <div class="row g-0 align-items-center">
                        @if($article->thumbnail)
                            <div class="col-md-4">
                                <img src="{{ asset('storage/' . $article->thumbnail) }}" class="img-fluid h-100 object-fit-cover" alt="{{ $article->title }}">
                            </div>
                        @endif
                        <div class="col">
                            <div class="card-body py-4 px-4">
                                <div class="mb-2 text-muted small text-uppercase">{{ $article->category->name ?? 'News' }}</div>
                                <h4 class="card-title mb-2">{{ $article->title }}</h4>
                                <p class="card-text text-muted">{{ Str::limit($article->excerpt, 140) }}</p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <small class="text-muted">By {{ $article->author->name ?? 'Staff' }} · {{ $article->published_at->format('d M Y') }}</small>
                                    <a href="{{ route('front.news.show', $article->slug) }}" class="text-primary text-decoration-none">Read story →</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="alert alert-secondary">No articles found for this search.</div>
            @endforelse

            <div class="mt-4">{{ $articles->links() }}</div>
        </div>

        <div class="col-lg-4">
            <div class="card rounded-4 shadow-sm border-0 p-4 mb-4">
                <h5 class="mb-3">Browse categories</h5>
                @foreach($categories as $category)
                    <a href="{{ route('front.category', $category->slug) }}" class="d-block py-2 text-decoration-none text-dark border-bottom">{{ $category->name }}</a>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
