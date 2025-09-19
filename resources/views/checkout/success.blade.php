@extends('layouts.app')

@section('content')
    <div class="bg-white p-8 rounded-lg shadow text-center">
        <h1 class="text-3xl font-bold text-green-600 mb-4">Payment Successful 🎉</h1>
        <p>Thank you for your order! We’ll process it shortly.</p>
        <a href="{{ url('/products') }}" 
           class="mt-4 inline-block bg-blue-500 text-white px-6 py-2 rounded hover:bg-blue-600">
           Continue Shopping
        </a>
    </div>
@endsection
