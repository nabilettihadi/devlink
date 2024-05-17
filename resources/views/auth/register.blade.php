<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f3f4f6;
            font-family: 'Roboto', sans-serif;
        }

        .register-container {
            max-width: 500px;
            margin: auto;
            padding: 2rem;
            background-color: #fff;
            border-radius: 12px;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
        }

        .register-header {
            text-align: center;
            margin-bottom: 1.5rem;
        }

        .register-header h1 {
            font-size: 2rem;
            color: #4a5568;
            margin-bottom: 0.5rem;
        }

        .register-header p {
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

        .register-button {
            width: 100%;
            padding: 0.75rem;
            background-color: #4c51bf;
            color: #fff;
            border-radius: 8px;
            font-weight: 600;
            transition: background-color 0.3s;
        }

        .register-button:hover {
            background-color: #5a67d8;
        }

        .login-link {
            display: block;
            text-align: center;
            margin-top: 1rem;
            color: #4c51bf;
            font-weight: 600;
        }

        .login-link:hover {
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
    <div class="register-container">
        <div class="register-header">
            <h1>Register</h1>
            <p>Create your account. It's free and only takes a minute.</p>
        </div>
        @if ($errors->any())
            <div class="alert">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('register') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" value="{{ old('name') }}" autocomplete="name" placeholder="Your Name">
            </div>
            <div class="form-group">
                <label for="email">Email address</label>
                <input type="email" name="email" id="email" value="{{ old('email') }}" autocomplete="email" placeholder="e.g. alex@email.com">
                <p class="mt-2 text-sm text-gray-500">We'll never share your email with anyone else.</p>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" autocomplete="new-password" placeholder="Enter your password">
            </div>
            <div class="form-group">
                <label for="password_confirmation">Confirm Password</label>
                <input type="password" name="password_confirmation" id="password_confirmation" autocomplete="new-password" placeholder="Confirm your password">
            </div>
            <button type="submit" class="register-button">Register</button>
        </form>
        <a href="{{ route('login') }}" class="login-link">Already have an account? Login</a>
    </div>
</body>

</html>



