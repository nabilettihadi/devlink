<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'LinkShare') }}</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.7/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/feather-icons/dist/feather.min.css">

    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f5f7fa;
            color: #374151;
        }

        .btn-primary {
            padding: 12px 24px;
            background-color: #4CAF50;
            color: white;
            font-size: 16px;
            text-align: center;
            cursor: pointer;
            border-radius: 4px;
            transition: background-color 0.3s ease;
        }

        .btn-primary:hover {
            background-color: #45a049;
        }

        #burger-menu {
            display: none;
        }

        #burger-menu:checked+.burger-nav {
            display: block;
        }

        .burger-nav {
            display: none;
            flex-direction: column;
            position: absolute;
            top: 64px;
            right: 8px;
            background-color: #ffffff;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            z-index: 1000;
        }

        .burger-nav a {
            padding: 8px 16px;
            display: block;
            color: #374151;
            text-decoration: none;
            transition: background-color 0.3s ease;
        }

        .burger-nav a:hover {
            background-color: #f0f4f8;
        }

        @media (max-width: 768px) {
            .burger-nav {
                right: 0;
            }

            .burger-nav a {
                color: #ffffff;
            }
        }
    </style>
</head>

<body>
    <input type="checkbox" id="burger-menu" class="hidden">
    <div class="burger-nav shadow-md" id="burgerNav">
        <a href="#" class="btn-primary text-white bg-green-500 hover:bg-green-600">Home</a>
        @auth
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
            <button type="submit" class="btn-primary bg-red-500 hover:bg-red-600 mt-2"
                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Déconnexion</button>
        @else
            <a href="{{ route('login') }}" class="btn-primary text-white bg-blue-500 hover:bg-blue-600 mt-2">Login</a>
            <a href="{{ route('register') }}"
                class="btn-primary text-white bg-indigo-500 hover:bg-indigo-600 mt-2">Register</a>
        @endauth
    </div>

    <header class="flex justify-between items-center py-4 px-8 bg-white shadow-md">
        <h1 class="text-2xl font-bold text-gray-800">LinkShare</h1>
        <label for="burger-menu" class="block cursor-pointer lg:hidden">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16">
                </path>
            </svg>
        </label>
        <nav class="hidden lg:flex items-center">
            <a href="#" class="btn-primary text-white bg-green-500 hover:bg-green-600">Home</a>
            @auth
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
                <button type="submit" class="btn-primary bg-red-500 hover:bg-red-600 ml-4"
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Déconnexion</button>
            @else
                <a href="{{ route('login') }}" class="btn-primary text-white bg-blue-500 hover:bg-blue-600 ml-4">Login</a>
                <a href="{{ route('register') }}"
                    class="btn-primary text-white bg-indigo-500 hover:bg-indigo-600 ml-4">Register</a>
            @endauth
        </nav>
    </header>


    <section class="hero bg-cover bg-center flex items-center justify-center h-screen"
        style="background-image: url('https://picsum.photos/1500/600')">
        <div class="text-center text-white">
            <h1 class="text-4xl font-bold mb-4">Share Links Effortlessly</h1>
            <p class="text-lg mb-8">With LinkShare, sharing links has never been easier. Create, share, and track your
                links seamlessly.</p>
            @auth
                <a href="{{ route('links.create') }}" class="btn-primary">Get Started</a>
            @else
                <a href="{{ route('login') }}" class="btn-primary">Get Started</a>
            @endauth
        </div>
    </section>

    <section class="features py-16">
        <h2 class="text-3xl font-semibold text-center mb-8">Why Choose LinkShare?</h2>
        <div class="flex justify-center gap-8">
            <div class="feature-item text-center">
                <i data-feather="check-circle"
                    class="text-4xl mb-4 hover:text-green-500 transition-colors duration-300"></i>
                <h3 class="text-xl font-semibold mb-2 text-gray-800">Easy to Use</h3>
                <p class="text-base text-gray-700">Our platform is designed to be user-friendly and intuitive.</p>
            </div>
            <div class="feature-item text-center">
                <i data-feather="lock" class="text-4xl mb-4 hover:text-blue-500 transition-colors duration-300"></i>
                <h3 class="text-xl font-semibold mb-2 text-gray-800">Secure</h3>
                <p class="text-base text-gray-700">We prioritize your privacy and security with top-notch encryption.
                </p>
            </div>
            <div class="feature-item text-center">
                <i data-feather="bar-chart-2"
                    class="text-4xl mb-4 hover:text-purple-500 transition-colors duration-300"></i>
                <h3 class="text-xl font-semibold mb-2 text-gray-800">Real-time Analytics</h3>
                <p class="text-base text-gray-700">Track your link performance with detailed analytics.</p>
            </div>
        </div>
    </section>

    <footer class="bg-gray-800 text-white py-4">
        <p class="text-center">&copy; {{ date('Y') }} {{ config('app.name') }}. All rights reserved.</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/feather-icons/dist/feather.min.js"></script>
    <script>
        feather.replace();
    </script>
</body>

</html>
