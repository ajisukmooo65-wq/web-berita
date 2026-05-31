@extends('admin.layouts.app')

@section('title', 'Articles')

@section('content')
<div class="container-fluid py-4">
    @include('admin.partials.alerts')
    <div class="d-flex flex-column flex-md-row align-items-start align-items-md-center justify-content-between gap-3 mb-4">
        <div>
            <h1 class="h3 mb-1">Article Management</h1>
            <p class="text-muted mb-0">Add, edit, and publish news stories for the frontend site.</p>
        </div>
        <a href="{{ route('admin.articles.create') }}" class="btn btn-warning">Add Article</a>
    </div>

    <div class="card shadow-sm rounded-4 border-0 mb-4">
        <div class="card-body p-4">
            <form method="GET" class="row gy-3 gx-3 align-items-center mb-4">
                <div class="col-12 col-md-4">
                    <div class="form-floating">
                        <input type="text" name="search" id="search" class="form-control" placeholder="Search articles" value="{{ request('search') }}">
                        <label for="search">Search articles</label>
                    </div>
                </div>
                <div class="col-12 col-md-3">
                    <div class="form-floating">
                        <select name="status" id="status" class="form-select">
                            <option value="">Any status</option>
                            <option value="published" {{ request('status') == 'published' ? 'selected' : '' }}>Published</option>
                            <option value="draft" {{ request('status') == 'draft' ? 'selected' : '' }}>Draft</option>
                        </select>
                        <label for="status">Filter by status</label>
                    </div>
                </div>
                <div class="col-12 col-md-3">
                    <div class="form-floating">
                        <select name="category" id="category" class="form-select">
                            <option value="">All categories</option>
                            @foreach($categories as $cat)
                                <option value="{{ $cat->slug }}" {{ request('category') == $cat->slug ? 'selected' : '' }}>{{ $cat->name }}</option>
                            @endforeach
                        </select>
                        <label for="category">Filter by category</label>
                    </div>
                </div>
                <div class="col-auto">
                    <button type="submit" class="btn btn-outline-secondary">Filter</button>
                </div>
            </form>

            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="text-uppercase small text-muted border-bottom">
                        <tr>
                            <th>Title</th>
                            <th>Category</th>
                            <th>Author</th>
                            <th>Status</th>
                            <th>Published</th>
                            <th class="text-end">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($articles as $article)
                            <tr>
                                <td>{{ $article->title }}</td>
                                <td>{{ $article->category->name ?? 'Uncategorized' }}</td>
                                <td>{{ $article->author->name ?? 'Unknown' }}</td>
                                <td class="text-capitalize">{{ $article->status }}</td>
                                <td>{{ optional($article->published_at)->format('d M Y') ?? '-' }}</td>
                                <td class="text-end">
                                    <a href="{{ route('admin.articles.edit', $article) }}" class="btn btn-sm btn-outline-primary">Edit</a>
                                    <a href="{{ route('admin.articles.show', $article) }}" class="btn btn-sm btn-outline-secondary">View</a>
                                    <form action="{{ route('admin.articles.destroy', $article) }}" method="POST" class="d-inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('Delete this article?')">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center py-4 text-muted">No articles found.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="mt-4">{{ $articles->links() }}</div>
        </div>
    </div>
</div>
@endsection
