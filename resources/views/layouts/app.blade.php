<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-commerce</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 text-gray-900">

    <!-- Navbar -->
    <nav class="bg-white shadow p-4 flex justify-between">
        <a href="{{ url('/products') }}" class="font-bold text-lg">MyShop</a>
        <div>
            <a href="{{ url('/products') }}" class="mr-4">Products</a>
            <a href="{{ route('cart.index') }}" class="mr-4">Cart</a>
            @auth
                <span>{{ auth()->user()->name }}</span>
                <form action="{{ route('logout') }}" method="POST" class="inline">
                    @csrf
                    <button type="submit" class="ml-2 text-red-500">Logout</button>
                </form>
            @else
                <a href="{{ route('login') }}" class="mr-2">Login</a>
                <a href="{{ route('register') }}">Register</a>
            @endauth
        </div>
    </nav>

    <!-- Page Content -->
    <main class="container mx-auto py-8">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-white shadow p-4 text-center mt-8">
        <p>&copy; {{ date('Y') }} MyShop. All rights reserved.</p>
    </footer>
</body>
</html>
