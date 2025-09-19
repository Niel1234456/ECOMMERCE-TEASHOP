@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-6">
    <h1 class="text-3xl font-bold mb-6">Your Cart</h1>

    @if(count($cart) > 0)
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            @php $grandTotal = 0; @endphp
            @foreach($cart as $id => $item)
                @php 
                    $total = $item['price'] * $item['quantity']; 
                    $grandTotal += $total; 
                @endphp

                <div class="bg-white shadow-lg rounded-2xl p-5 flex flex-col justify-between">
                    <div>
                        {{-- Product Name --}}
                        <h2 class="text-xl font-semibold text-gray-800 mb-2">
                            {{ $item['name'] }}
                        </h2>

                        {{-- Price --}}
                        <p class="text-gray-600">
                            Price: <span class="font-bold">₱{{ number_format($item['price'], 2) }}</span>
                        </p>

                        {{-- Quantity --}}
                        <p class="text-gray-600">
                            Quantity: <span class="font-bold">{{ $item['quantity'] }}</span>
                        </p>

                        {{-- Total --}}
                        <p class="text-gray-800 mt-2">
                            Total: <span class="font-bold text-green-600">₱{{ number_format($total, 2) }}</span>
                        </p>
                    </div>

                    {{-- Remove Button --}}
                    <div class="mt-4">
                        <form action="{{ route('cart.remove', $id) }}" method="POST" onsubmit="return confirm('Remove this product?')">
                            @csrf
                            @method('DELETE')
                            <button class="w-full bg-red-500 text-white py-2 rounded-lg hover:bg-red-600 transition">
                                Remove
                            </button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>

        {{-- Grand Total & Checkout --}}
        <div class="mt-8 bg-gray-100 p-6 rounded-xl shadow-inner text-right">
            <h2 class="text-2xl font-bold text-gray-800 mb-4">
                Grand Total: ₱{{ number_format($grandTotal, 2) }}
            </h2>
            <a href="{{ route('checkout') }}" 
               class="inline-block bg-green-600 text-white px-6 py-3 rounded-xl hover:bg-green-700 transition">
               Proceed to Checkout
            </a>
        </div>
    @else
        <div class="text-center py-12">
            <p class="text-lg text-gray-500">Your cart is empty.</p>
            <a href="{{ route('products.index') }}" 
               class="mt-4 inline-block bg-blue-500 text-white px-6 py-2 rounded-lg hover:bg-blue-600">
               Shop Now
            </a>
        </div>
    @endif
</div>
@endsectio