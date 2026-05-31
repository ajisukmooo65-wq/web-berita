@extends('admin.layouts.app')

@section('title', 'Article Details')

@section('content')
<div class="container-fluid py-4">
    @include('admin.partials.alerts')
    <div class="d-flex align-items-center justify-content-between mb-4">
        <div>
            <h1 class="h3 mb-1">Article Details</h1>
            <p class="text-muted mb-0">Review the article content and metadata.</p>
        </div>
        <a href="{{ route('admin.articles.index') }}" class="btn btn-outline-secondary">Back to articles</a>
    </div>

    <div class="card rounded-4 shadow-sm border-0">
        <div class="card-body p-4">
            <div class="row g-4">
                <div class="col-lg-8">
                    <h2 class="h4 mb-3">{{ $article->title }}</h2>
                    <div class="mb-3">
                        <span class="badge bg-secondary bg-opacity-15 text-secondary text-capitalize">{{ $article->status }}</span>
                        <span class="badge bg-primary bg-opacity-15 text-primary">{{ $article->category->name ?? 'Uncategorized' }}</span>
                    </div>
                    @if($article->thumbnail)
                        <img src="{{ asset('storage/' . $article->thumbnail) }}" alt="{{ $article->title }}" class="img-fluid rounded-4 mb-4">
                    @endif
                    <p class="text-muted mb-4">By {{ $article->author->name ?? 'Unknown' }} · {{ optional($article->published_at)->format('d M Y') ?? 'Not published yet' }}</p>
                    <div class="article-content">{!! nl2br(e($article->content)) !!}</div>
                </div>
                <div class="col-lg-4">
                    <div class="bg-light rounded-4 p-4 h-100">
                        <h3 class="h6 mb-3">Article summary</h3>
                        <p class="text-muted">{{ $article->excerpt ?? Str::limit($article->content, 120) }}</p>
                        <hr>
                        <dl class="row">
                            <dt class="col-6 text-muted">Slug</dt>
                            <dd class="col-6 text-end">{{ $article->slug }}</dd>
                            <dt class="col-6 text-muted">Author</dt>
                            <dd class="col-6 text-end">{{ $article->author->name ?? '-' }}</dd>
                            <dt class="col-6 text-muted">Category</dt>
                            <dd class="col-6 text-end">{{ $article->category->name ?? '-' }}</dd>
                        </dl>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
