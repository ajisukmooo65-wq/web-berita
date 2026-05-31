@extends('front.layouts.app')

@section('title', $article->title)

@section('content')
<div class="container">
    <div class="row gx-5 mb-5">
        <div class="col-lg-8">
            <div class="mb-3">
                <a href="{{ route('front.news.index') }}" class="text-decoration-none text-primary">← Back to news</a>
            </div>

            <div class="bg-white rounded-4 shadow-sm overflow-hidden mb-4">
                @if($article->thumbnail)
                <img src="{{ asset('storage/' . $article->thumbnail) }}" class="img-fluid w-100" alt="{{ $article->title }}">
                @endif
                <div class="p-4">
                    <div class="d-flex gap-3 align-items-center mb-3">
                        <span class="badge bg-primary bg-opacity-15 text-primary text-capitalize">{{ $article->status }}</span>
                        <small class="text-muted">{{ $article->category->name ?? 'Uncategorized' }}</small>
                    </div>
                    <h1 class="h2 mb-3">{{ $article->title }}</h1>
                    <p class="text-muted mb-4">By {{ $article->author->name ?? 'Editorial' }} · {{ $article->published_at->format('d M Y') }}</p>
                    <div class="article-content text-muted">{!! nl2br(e($article->content)) !!}</div>
                </div>
            </div>

            <div class="card rounded-4 shadow-sm border-0 p-4">
                <h5 class="mb-3">Related stories</h5>
                <div class="list-group list-group-flush">
                    @forelse($related as $relatedArticle)
                        <a href="{{ route('front.news.show', $relatedArticle->slug) }}" class="list-group-item list-group-item-action py-3">
                            <div class="d-flex justify-content-between align-items-center">
                                <span>{{ $relatedArticle->title }}</span>
                                <small class="text-muted">{{ $relatedArticle->published_at->format('d M Y') }}</small>
                            </div>
                        </a>
                    @empty
                        <div class="text-muted">No related articles available yet.</div>
                    @endforelse
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="card rounded-4 shadow-sm border-0 p-4 mb-4">
                <h6 class="mb-3">Article details</h6>
                <ul class="list-unstyled mb-0 text-muted">
                    <li><strong>Author:</strong> {{ $article->author->name ?? 'Editorial' }}</li>
                    <li><strong>Category:</strong> {{ $article->category->name ?? 'Uncategorized' }}</li>
                    <li><strong>Status:</strong> {{ ucfirst($article->status) }}</li>
                    <li><strong>Published:</strong> {{ $article->published_at->format('d M Y') }}</li>
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection
