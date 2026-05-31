@extends('admin.layouts.app')

@section('title', 'Edit Article')

@section('content')
<div class="container-fluid py-4">
    @include('admin.partials.alerts')
    <div class="d-flex align-items-center justify-content-between mb-4">
        <div>
            <h1 class="h3 mb-1">Edit Article</h1>
            <p class="text-muted mb-0">Update the current article details.</p>
        </div>
        <a href="{{ route('admin.articles.index') }}" class="btn btn-outline-secondary">Back to articles</a>
    </div>

    <div class="card rounded-4 shadow-sm border-0">
        <div class="card-body p-4">
            <form action="{{ route('admin.articles.update', $article) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row g-3">
                    <div class="col-md-6">
                        <div class="form-floating">
                            <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror" placeholder="Article title" value="{{ old('title', $article->title) }}" required>
                            <label for="title">Title</label>
                            @error('title')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-floating">
                            <input type="text" name="slug" id="slug" class="form-control @error('slug') is-invalid @enderror" placeholder="URL slug" value="{{ old('slug', $article->slug) }}" required>
                            <label for="slug">Slug</label>
                            @error('slug')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-floating">
                            <select name="category_id" id="category_id" class="form-select @error('category_id') is-invalid @enderror">
                                <option value="">Choose category</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}" {{ old('category_id', $article->category_id) == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                                @endforeach
                            </select>
                            <label for="category_id">Category</label>
                            @error('category_id')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-floating">
                            <select name="user_id" id="user_id" class="form-select @error('user_id') is-invalid @enderror" required>
                                <option value="">Choose author</option>
                                @foreach($authors as $author)
                                    <option value="{{ $author->id }}" {{ old('user_id', $article->user_id) == $author->id ? 'selected' : '' }}>{{ $author->name }}</option>
                                @endforeach
                            </select>
                            <label for="user_id">Author</label>
                            @error('user_id')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="thumbnail" class="form-label">Thumbnail</label>
                            <input class="form-control @error('thumbnail') is-invalid @enderror" type="file" id="thumbnail" name="thumbnail">
                            @error('thumbnail')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                        @if($article->thumbnail)
                            <div class="small text-muted">Current file: {{ basename($article->thumbnail) }}</div>
                        @endif
                    </div>
                    <div class="col-md-6">
                        <div class="form-floating">
                            <select name="status" id="status" class="form-select @error('status') is-invalid @enderror" required>
                                <option value="draft" {{ old('status', $article->status) == 'draft' ? 'selected' : '' }}>Draft</option>
                                <option value="published" {{ old('status', $article->status) == 'published' ? 'selected' : '' }}>Published</option>
                            </select>
                            <label for="status">Status</label>
                            @error('status')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-floating">
                            <input type="datetime-local" name="published_at" id="published_at" class="form-control @error('published_at') is-invalid @enderror" placeholder="Publish date" value="{{ old('published_at', optional($article->published_at)->format('Y-m-d\TH:i')) }}">
                            <label for="published_at">Published Date</label>
                            @error('published_at')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-floating">
                            <textarea name="excerpt" id="excerpt" class="form-control @error('excerpt') is-invalid @enderror" placeholder="Article excerpt" style="height: 110px">{{ old('excerpt', $article->excerpt) }}</textarea>
                            <label for="excerpt">Excerpt</label>
                            @error('excerpt')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-floating">
                            <textarea name="content" id="content" class="form-control @error('content') is-invalid @enderror" placeholder="Content" style="height: 260px">{{ old('content', $article->content) }}</textarea>
                            <label for="content">Content</label>
                            @error('content')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                    </div>
                </div>

                <button type="submit" class="btn btn-warning mt-4">Update Article</button>
            </form>
        </div>
    </div>
</div>
@endsection
