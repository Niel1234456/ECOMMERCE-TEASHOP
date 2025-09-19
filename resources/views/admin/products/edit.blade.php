@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Product</h2>

    <form action="{{ route('admin.products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Name</label>
            <input type="text" name="name" value="{{ $product->name }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Description</label>
            <textarea name="description" class="form-control">{{ $product->description }}</textarea>
        </div>

        <div class="mb-3">
            <label class="form-label">Price Min</label>
            <input type="number" step="0.01" name="price_min" value="{{ $product->price_min }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Price Max</label>
            <input type="number" step="0.01" name="price_max" value="{{ $product->price_max }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Current Image</label><br>
            @if($product->image)
                <img src="{{ asset('assets/img/' . $product->image) }}" alt="{{ $product->name }}" width="100">
            @else
                <img src="{{ asset('assets/img/image.png') }}" alt="Default" width="100">
            @endif
        </div>

        <div class="mb-3">
            <label class="form-label">Change Image</label>
            <input type="file" name="image" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('admin.products.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
