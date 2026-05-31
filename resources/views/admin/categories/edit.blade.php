@extends('admin.layouts.app')

@section('title', 'Edit Category')

@section('content')
<div class="container-fluid py-4">
    @include('admin.partials.alerts')
    <div class="d-flex align-items-center justify-content-between mb-4">
        <div>
            <h1 class="h3 mb-1">Edit Category</h1>
            <p class="text-muted mb-0">Update the category details.</p>
        </div>
        <a href="{{ route('admin.categories.index') }}" class="btn btn-outline-secondary">Back to categories</a>
    </div>

    <div class="card rounded-4 shadow-sm border-0">
        <div class="card-body p-4">
            <form action="{{ route('admin.categories.update', $category) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="row g-3">
                    <div class="col-md-6">
                        <div class="form-floating">
                            <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" placeholder="Category name" value="{{ old('name', $category->name) }}" required>
                            <label for="name">Category Name</label>
                            @error('name')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-floating">
                            <input type="text" name="slug" id="slug" class="form-control @error('slug') is-invalid @enderror" placeholder="URL slug" value="{{ old('slug', $category->slug) }}" required>
                            <label for="slug">Slug</label>
                            @error('slug')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-floating">
                            <textarea name="description" id="description" class="form-control @error('description') is-invalid @enderror" placeholder="Description" style="height: 120px">{{ old('description', $category->description) }}</textarea>
                            <label for="description">Description</label>
                            @error('description')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-success mt-4">Update Category</button>
            </form>
        </div>
    </div>
</div>
@endsection
