@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4">Products</h2>

    <a href="{{ route('admin.products.create') }}" class="btn btn-primary mb-3">+ Add Product</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>Image</th>
                <th>Name</th>
                <th>Description</th>
                <th>Price Range</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($products as $product)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>
                        @if($product->image)
                            <img src="{{ asset('assets/img/' . $product->image) }}" alt="{{ $product->name }}" width="70">
                        @else
                            <img src="{{ asset('assets/img/image.png') }}" alt="Default" width="70">
                        @endif
                    </td>
                    <td>{{ $product->name }}</td>
                    <td>{{ Str::limit($product->description, 50) }}</td>
                    <td>${{ number_format($product->price_min, 2) }} - ${{ number_format($product->price_max, 2) }}</td>
                    <td>
                        <a href="{{ route('admin.products.show', $product->id) }}" class="btn btn-info btn-sm">View</a>
                        <a href="{{ route('admin.products.edit', $product->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('admin.products.destroy', $product->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure?')">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr><td colspan="6" class="text-center">No products found.</td></tr>
            @endforelse
        </tbody>
    </table>

    {{ $products->links() }}
</div>
@endsection
