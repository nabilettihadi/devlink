<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'LinkShare') }}</title>

    <!-- External Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">

    <!-- Tailwind CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.7/dist/tailwind.min.css" rel="stylesheet">

    <!-- Custom Styles -->
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #f5f7fa;
            color: #374151;
        }

        .btn {
            display: inline-block;
            padding: 12px 24px;
            background-color: #4CAF50;
            color: white;
            font-size: 16px;
            text-align: center;
            cursor: pointer;
            border-radius: 4px;
            transition: background-color 0.3s ease;
        }

        .btn:hover {
            background-color: #45a049;
        }

        /* Animations */
        @keyframes fadeIn {
            0% {
                opacity: 0;
                transform: translateY(-20px);
            }

            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .animated {
            animation: fadeIn 1s ease-in-out;
        }

        /* Header Style */
        header {
            background-color: #4c51bf;
            color: #ffffff;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        /* Main Section Style */
        main {
            padding: 40px 20px;
        }

        .section-title {
            font-size: 2.5rem;
            font-weight: 700;
            color: #4c51bf;
            margin-bottom: 20px;
        }

        .section-text {
            font-size: 1.25rem;
            color: #6b7280;
            margin-bottom: 30px;
        }

        /* Dashboard Style */
        .dashboard {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 20px;
            margin-top: 30px;
        }

        .widget {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .section-title {
                font-size: 2rem;
            }

            .section-text {
                font-size: 1rem;
            }

            .btn {
                padding: 10px 20px;
                font-size: 14px;
            }
        }
    </style>
</head>

<body>
    <header class="flex justify-between items-center py-4 px-8">
        <h1 class="text-2xl font-bold">LinkShare</h1>
        <nav>
            @if (Auth::check())
                <!-- Formulaire de déconnexion -->
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf <!-- Inclure le jeton CSRF -->
                </form>
                <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="btn btn-red">Déconnexion</a>
            @else
                <a href="{{ route('login') }}" class="btn bg-green-500 hover:bg-green-600">Login</a>
                <a href="{{ route('register') }}" class="btn bg-green-500 hover:bg-green-600 ml-4">Register</a>
            @endif
        </nav>
    </header>
    <main class="container mx-auto">
        <div class="animated">
            <h2 class="section-title">Share with Ease</h2>
            <p class="section-text">Effortlessly share links with friends, family, and colleagues. Upload your files,
                generate a unique link, and grant instant access.</p>
            <a href="{{ route('links.create') }}"
                class="btn bg-gradient-to-r from-green-400 to-green-600 hover:from-green-500 hover:to-green-700">Get
                Started</a>
        </div>
        <div class="dashboard">
            <div class="widget bg-gradient-to-r from-green-200 to-green-100">
                <h3 class="text-lg font-semibold mb-2">Notifications</h3>
                <ul>
                    <li>New link shared!</li>
                    <li>Your file is downloaded!</li>
                    <li>Updated security settings.</li>
                </ul>
            </div>
            <div class="widget bg-gradient-to-r from-purple-200 to-purple-100">
                <h3 class="text-lg font-semibold mb-2">File Preview</h3>
                <img src="preview.jpg" alt="File Preview" class="w-full h-auto rounded">
            </div>
            <div class="widget bg-gradient-to-r from-blue-200 to-blue-100">
                <h3 class="text-lg font-semibold mb-2">User Dashboard</h3>
                <p>Welcome back, John Doe!</p>
                <p>Total shares: 25</p>
                <p>Most shared link: example.com</p>
            </div>
            <div class="widget bg-gradient-to-r from-yellow-200 to-yellow-100">
                <h3 class="text-lg font-semibold mb-2">Real-time Analytics</h3>
                <p>Link clicks today: 150</p>
                <p>Top referrer: Google</p>
            </div>
        </div>
    </main>
    <footer class="text-center text-sm text-gray-500 py-4">
        © {{ date('Y') }} {{ config('app.name') }}
    </footer>
</body>

</html>

