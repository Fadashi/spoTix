<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Login - SpoTix</title>
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
            background-image: url('https://via.placeholder.com/1920x1080'); /* Placeholder background */
            background-size: cover;
            background-position: center;
            z-index: 0;
            filter: blur(5px);
        }
        .login-container {
            padding: 2rem;
            border-radius: 10px;
            background-color: #001f54; /* Match the navbar color */
            color: white; /* Change text color to white for contrast */
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            position: relative;
            z-index: 1;
            max-width: 700px; /* Set a max width for the card */
            width: 100%; /* Make it responsive */
        }
        .auth-logo {
            text-align: center;
            font-size: 2.5rem; /* Increase font size for logo */
            font-weight: bold;
            color: white; /* Logo color */
            margin-bottom: 1rem;
        }
        .auth-title {
            font-size: 2rem;
            margin-bottom: 1rem;
            text-align: center; /* Center the title */
        }
        .auth-subtitle {
            margin-bottom: 2rem;
            text-align: center; /* Center the subtitle */
        }
        .form-control-icon {
            position: absolute;
            left: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: #999; /* Change icon color to gray */
            font-size: 1.2rem; /* Increase icon size */
            pointer-events: none; /* Prevent interaction with the icon */
        }
        .form-group {
            position: relative;
            margin-bottom: 1.5rem;
        }
        .form-control {
            padding-left: 40px; /* Ensure space for the icon */
            background-color: #ffffff; /* Keep input background white */
            color: #000; /* Input text color */
        }
        .form-control::placeholder {
            color: #999; /* Placeholder color */
            opacity: 1; /* Ensure placeholder is fully opaque */
        }
        .btn-primary {
            background-color: #ffc107; /* Change button color */
            border-color: #ffc107;
        }
        .btn-primary:hover {
            background-color: #dda704; /* Darker shade for hover effect */
            color: white;
        }
        .text-gray-600 {
            color: #ffffff; /* Change text color to white */
        }
        .footer-links {
            margin-top: 1.5rem;
            text-align: center;
        }
        .footer-links a {
            color: #ffc107; /* Link color */
            text-decoration: none;
            transition: color 0.3s;
        }
        .footer-links a:hover {
            color: #ffffff; /* Change link color on hover */
        }
        .btn-secondary {
            background-color: #0056b3; /* New color for the button */
            border-color: #0056b3; /* Match border color */
            color: white; /* Text color */
            padding: 10px 20px; /* Padding for the button */
            border-radius: 5px; /* Rounded corners */
            transition: background-color 0.3s, border-color 0.3s; /* Smooth transition */
        }
        .btn-secondary:hover {
            background-color: #004494; /* Darker shade on hover */
            border-color: #004494; /* Match border color */
        }
    </style>
</head>

<body>
    <div class="auth-background"></div>
    <div id="auth">
        <div class="login-container">
            <div class="auth-logo">spoTix</div>
            <h1 class="auth-title">Register as EO</h1>
            <p class="auth-subtitle mb-5">Log in with your data that you entered during registration.</p>

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
                <button class="btn btn-primary btn-block btn-lg shadow-lg" style="width: 100%;">Register</button>
            </form>
            <div class="footer-links">
                <a href="{{ route('loginEO') }}" class="text-light">Already registered?</a>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
