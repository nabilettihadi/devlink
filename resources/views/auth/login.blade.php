<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f3f4f6;
            font-family: 'Roboto', sans-serif;
        }

        .login-container {
            max-width: 400px;
            margin: auto;
            padding: 2rem;
            background-color: #fff;
            border-radius: 12px;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
        }

        .login-header {
            text-align: center;
            margin-bottom: 1.5rem;
        }

        .login-header h1 {
            font-size: 2rem;
            color: #4a5568;
            margin-bottom: 0.5rem;
        }

        .login-header p {
            color: #718096;
            font-size: 1rem;
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        .form-group label {
            display: block;
            margin-bottom: 0.5rem;
            color: #4a5568;
            font-weight: 600;
        }

        .form-group input {
            width: 100%;
            padding: 0.75rem;
            border: 1px solid #cbd5e0;
            border-radius: 8px;
            transition: border-color 0.3s;
        }

        .form-group input:focus {
            border-color: #4c51bf;
            outline: none;
        }

        .login-button {
            width: 100%;
            padding: 0.75rem;
            background-color: #4c51bf;
            color: #fff;
            border-radius: 8px;
            font-weight: 600;
            transition: background-color 0.3s;
        }

        .login-button:hover {
            background-color: #5a67d8;
        }

        .register-link {
            display: block;
            text-align: center;
            margin-top: 1rem;
            color: #4c51bf;
            font-weight: 600;
        }

        .register-link:hover {
            color: #5a67d8;
        }

        .alert {
            background-color: #fed7d7;
            border: 1px solid #fc8181;
            color: #c53030;
            padding: 0.75rem;
            border-radius: 8px;
            margin-bottom: 1rem;
            text-align: center;
        }
    </style>
</head>

<body class="flex items-center justify-center min-h-screen">
    <div class="login-container">
        <div class="login-header">
            <h1>Login</h1>
            <p>Welcome back! Please login to your account.</p>
        </div>
        @if ($errors->any())
            <div class="alert">
                <strong>{{ $errors->first() }}</strong>
            </div>
        @endif
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="form-group">
                <label for="email">Email address</label>
                <input type="email" name="email" id="email" placeholder="e.g. alex@email.com">
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" placeholder="Enter your password">
            </div>
            <button type="submit" class="login-button">Login</button>
        </form>
        <a href="{{ route('register') }}" class="register-link">Don't have an account? Register</a>
    </div>
</body>

</html>

