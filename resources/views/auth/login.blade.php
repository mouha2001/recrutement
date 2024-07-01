<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background: linear-gradient(to right, #6a11cb, #2575fc);
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        nav {
            background-color: #ffffff;
            border-bottom: 1px solid #eaeaea;
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            z-index: 999;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0 20px;
            height: 80px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        nav img {
            height: 50px;
        }
        nav a {
            text-decoration: none;
            color: #333;
            font-weight: bold;
            padding: 8px 16px;
            border-radius: 4px;
            transition: background-color 0.3s;
        }
        nav a:hover {
            background-color: #eaeaea;
        }
        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            width: 100%;
            max-width: 420px;
            margin-top: 80px;
        }
        .login-form {
            background-color: #fff;
            padding: 40px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            width: 100%;
            text-align: center;
        }
        .login-form h2 {
            margin-bottom: 20px;
            color: #333;
        }
        .login-form label {
            display: block;
            margin-bottom: 6px;
            font-weight: bold;
            color: #555;
        }
        .login-form input[type="email"], .login-form input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 12px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 16px;
            box-shadow: inset 0 1px 3px rgba(0,0,0,0.1);
            transition: border-color 0.3s;
        }
        .login-form input[type="email"]:focus, .login-form input[type="password"]:focus {
            border-color: #007bff;
            outline: none;
        }
        .login-form button {
            width: 100%;
            padding: 12px;
            background-color: #007bff;
            border: none;
            color: white;
            border-radius: 4px;
            font-size: 18px;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        .login-form button:hover {
            background-color: #0056b3;
        }
        .login-form .forgot-password {
            margin-top: 18px;
            text-align: right;
            font-size: 14px;
            color: #007bff;
            text-decoration: none;
            transition: color 0.3s;
        }
        .login-form .forgot-password:hover {
            color: #0056b3;
        }
        .form-actions {
            display: flex;
            align-items: center;
            justify-content: flex-start;
            margin-top: 18px;
            margin-bottom: 12px;
        }
        .form-actions .remember-me {
            display: flex;
            align-items: center;
            font-size: 14px;
        }
        .form-actions .remember-me input {
            margin-right: 8px;
        }
    </style>
</head>
<body>

<nav>
    <div>
        <img src="/img/logo.png" alt="Logo UADB">
    </div>
    <a href="/">Accueil</a>
</nav>

<div class="container">
    <div class="login-form">
        <h2>Connexion</h2>
        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <form method="POST" action="{{ route('login') }}">
            @csrf
            <!-- Email Address -->
            <div>
                <label for="email">E-mail</label>
                <input id="email" type="email" name="email" :value="old('email')" required autofocus autocomplete="username">
                <x-input-error :messages="$errors->get('email')" />
            </div>

            <!-- Password -->
            <div>
                <label for="password">Mot de passe</label>
                <input id="password" type="password" name="password" required autocomplete="current-password">
                <x-input-error :messages="$errors->get('password')" />
            </div>

            <!-- Remember Me -->
            <div class="form-actions">
                <div class="remember-me">
                    <input id="remember_me" type="checkbox" name="remember">
                    <label for="remember_me">{{ __('Remember me') }}</label>
                </div>
            </div>

            <button type="submit" class="login-button">
                {{ __('Connecter') }}
            </button>
            @if (Route::has('password.request'))
                <a class="forgot-password" href="{{ route('password.request') }}">
                    {{ __('Mot de passe oublié?') }}
                </a>
            @endif
        </form>
    </div>
</div>

</body>
</html>
