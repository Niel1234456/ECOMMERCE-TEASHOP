@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Product Details</h2>

    <div class="card p-3">
        <div class="mb-3">
            @if($product->image)
                <img src="{{ asset('assets/img/' . $product->image) }}" alt="{{ $product->name }}" width="200">
            @else
                <img src="{{ asset('assets/img/image.png') }}" alt="Default" width="200">
            @endif
        </div>

        <h4>{{ $product->name }}</h4>
        <p>{{ $product->description }}</p>
        <p><strong>Price:</strong> ${{ number_format($product->price_min, 2) }} - ${{ number_format($product->price_max, 2) }}</p>

        <a href="{{ route('admin.products.index') }}" class="btn btn-secondary">Back</a>
    </div>
</div>
@endsection
