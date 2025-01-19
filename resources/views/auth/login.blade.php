<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #4e73df, #1cc88a);
            color: #ffffff;
            font-family: 'Arial', sans-serif;
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .login-container {
            background: #ffffff;
            padding: 40px 30px;
            border-radius: 10px;
            box-shadow: 0px 10px 20px rgba(0, 0, 0, 0.2);
            width: 100%;
            max-width: 450px;
        }

        .login-container h1 {
            font-size: 28px;
            font-weight: 600;
            color: #4e73df;
            text-align: center;
            margin-bottom: 20px;
        }

        .form-label {
            font-weight: 600;
            color: #4e73df;
        }

        .form-control {
            border-radius: 5px;
            border: 1px solid #4e73df;
        }

        .btn-login {
            background-color: #4e73df;
            border: none;
            width: 100%;
            padding: 12px;
            border-radius: 5px;
            color: #ffffff;
            font-weight: bold;
            font-size: 16px;
            transition: background-color 0.3s ease;
            margin-top: 10px;
        }

        .btn-login:hover {
            background-color: #1cc88a;
        }

        .forgot-password {
            display: block;
            margin-top: 10px;
            text-align: center;
            font-size: 14px;
            color: #6c757d;
            text-decoration: none;
        }

        .forgot-password:hover {
            color: #4e73df;
        }

        .input-error {
            color: #e74a3b;
            font-size: 13px;
        }

        .text-muted {
            text-align: center;
            margin-top: 15px;
        }

        .text-muted a {
            color: #4e73df;
            font-weight: bold;
            text-decoration: none;
        }

        .text-muted a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>

    <div class="login-container">
        <h1>Login to Your Account</h1>
        <form accept="{{ route("login") }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="email" class="form-label">Email Address</label>
                <input type="email" value="{{ old("email") }}" class="form-control" id="email" name="email"
                    placeholder="Enter your email" required>
                @error("email")
                    <span class="input-error">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password"
                    placeholder="Enter your password" required>
                @error("password")
                    <span class="input-error">{{ $message }}</span>
                @enderror
            </div>
            <button type="submit" class="btn btn-login">Login</button>
            <a href="#" class="forgot-password">Forgot your password?</a>
        </form>
        <p class="text-muted">
            Don't have an account? <a href="{{ url("register") }}">Sign Up</a>
        </p>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
