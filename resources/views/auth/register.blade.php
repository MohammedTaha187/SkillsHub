<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
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
        .register-container {
            background: #ffffff;
            padding: 40px 30px;
            border-radius: 10px;
            box-shadow: 0px 10px 20px rgba(0, 0, 0, 0.2);
            width: 100%;
            max-width: 450px;
        }
        .register-container h1 {
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
        .btn-register {
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
        .btn-register:hover {
            background-color: #1cc88a;
        }
        .already-account {
            display: block;
            margin-top: 10px;
            text-align: center;
            font-size: 14px;
            color: #6c757d;
            text-decoration: none;
        }
        .already-account a {
            color: #4e73df;
            font-weight: bold;
        }
        .already-account a:hover {
            text-decoration: underline;
        }
        .input-error {
            color: #e74a3b;
            font-size: 13px;
        }
    </style>
</head>
<body>

<div class="register-container">
    <h1>Create an Account</h1>
    <form accept="{{ route('register') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Full Name</label>
            <input type="text" value="{{ old('name') }}" class="form-control" id="name" name="name" placeholder="Enter your full name" required>
            @error('name')
                <span class="input-error">{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email Address</label>
            <input type="email" value="{{ old('email') }}" class="form-control" id="email" name="email" placeholder="Enter your email" required>
            @error('email')
                <span class="input-error">{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password" required>
            @error('password')
                <span class="input-error">{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="password_confirmation" class="form-label">Confirm Password</label>
            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Re-enter your password" required>
            @error('password_confirmation')
                <span class="input-error">{{ $message }}</span>
            @enderror
        </div>
        <button type="submit" class="btn btn-register">Register</button>
    </form>
    <p class="already-account">
        Already have an account? <a href="{{ url('login') }}">Login</a>
    </p>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
