<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register as EO</title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        body {
            background-color: #f0f4f8;
            font-family: 'Nunito', sans-serif;
            height: 100vh;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        #auth {
            display: flex;
            justify-content: center;
            align-items: center;
            position: relative;
            z-index: 1;
        }
        .auth-background {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-image: url('https://via.placeholder.com/1920x1080');
            background-size: cover;
            background-position: center;
            z-index: 0;
            filter: blur(5px);
        }
        .register-container {
            padding: 2rem;
            border-radius: 10px;
            background-color: #001f54;
            color: white;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            position: relative;
            z-index: 1;
            max-width: 700px;
            width: 100%;
        }
        .auth-logo {
            text-align: center;
            font-size: 2.5rem;
            font-weight: bold;
            color: white;
            margin-bottom: 1rem;
        }
        .auth-title {
            font-size: 2rem;
            margin-bottom: 1rem;
            text-align: center;
        }
        .auth-subtitle {
            margin-bottom: 2rem;
            text-align: center;
        }
        .form-control-icon {
            position: absolute;
            left: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: #999;
            font-size: 1.2rem;
            pointer-events: none;
        }
        .form-group {
            position: relative;
            margin-bottom: 1.5rem;
        }
        .form-control {
            padding-left: 40px;
            background-color: #ffffff;
            color: #000;
        }
        .form-control::placeholder {
            color: #999;
            opacity: 1;
        }
        .btn-primary {
            background-color: #ffc107;
            border-color: #ffc107;
        }
        .btn-primary:hover {
            background-color: #dda704;
            color: white;
        }
        .text-gray-600 {
            color: #ffffff;
        }
        .footer-links {
            margin-top: 1.5rem;
            text-align: center;
        }
        .footer-links a {
            color: #ffc107;
            text-decoration: none;
            transition: color 0.3s;
        }
        .footer-links a:hover {
            color: #ffffff;
        }
    </style>
</head>

<body>
    <div class="auth-background"></div>
    <div id="auth">
        <div class="register-container">
            <div class="auth-logo">spoTix</div>
            <h1 class="auth-title">Register as EO</h1>
            <p class="auth-subtitle mb-5">Register with your EO details.</p>

            <form method="POST" action="{{ route('registerEO') }}">
                @csrf
                <div class="form-group position-relative has-icon-left mb-4">
                    <input id="name" class="form-control form-control-xl" type="text" name="name" placeholder="Name" :value="old('name')" required autofocus autocomplete="name" />
                    <div class="form-control-icon">
                        <i class="bi bi-person"></i>
                    </div>
                </div>
                <div class="form-group position-relative has-icon-left mb-4">
                    <input id="email" class="form-control form-control-xl" type="email" name="email" placeholder="Email" :value="old('email')" required autocomplete="username" />
                    <div class="form-control-icon">
                        <i class="bi bi-envelope"></i>
                    </div>
                </div>
                <div class="form-group position-relative has-icon-left mb-4">
                    <input id="password" class="form-control form-control-xl" type="password" name="password" placeholder="Password" required autocomplete="new-password" />
                    <div class="form-control-icon">
                        <i class="bi bi-shield-lock"></i>
                    </div>
                </div>
                <div class="form-group position-relative has-icon-left mb-4">
                    <input id="password_confirmation" class="form-control form-control-xl" type="password" name="password_confirmation" placeholder="Confirm Password" required autocomplete="new-password" />
                    <div class="form-control-icon">
                        <i class="bi bi-shield-lock"></i>
                    </div>
                </div>
                <button class="btn btn-primary btn-block btn-lg shadow-lg" style="width: 100%;">Register as EO</button>
            </form>
            <div class="footer-links">
                <a href="{{ route('login') }}" class="text-light">Already registered?</a>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html> 