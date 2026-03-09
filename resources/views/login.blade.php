<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <style>
        body {
            font-family: 'Nunito', sans-serif;
            background-color: #f3f4f6;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .login-card {
            background: white;
            padding: 2rem;
            border-radius: 0.5rem;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
            text-align: center;
            width: 100%;
            max-width: 400px;
        }

        .btn-google {
            background-color: #4285F4;
            color: white;
            padding: 0.75rem 1.5rem;
            border-radius: 0.25rem;
            text-decoration: none;
            display: inline-block;
            font-weight: 600;
            transition: background-color 0.2s;
        }

        .btn-google:hover {
            background-color: #3367D6;
        }
    </style>
</head>

<body>
    <div class="login-card">
        <h2 style="margin-bottom: 1.5rem; color: #1f2937;">Welcome Back</h2>
        <a href="{{ url('auth/google') }}" class="btn-google">
            Login with Google
        </a>
    </div>
</body>

</html>