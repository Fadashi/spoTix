<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pilih Pendaftaran</title>
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
        .choose-container {
            padding: 2rem;
            border-radius: 10px;
            background-color: #001f54;
            color: white;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            position: relative;
            z-index: 1;
            max-width: 700px;
            width: 100%;
            text-align: center;
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
        .btn-primary {
            background-color: #ffc107;
            border-color: #ffc107;
        }
        .btn-primary:hover {
            background-color: #dda704;
            color: white;
        }
        .btn-secondary {
            background-color: #0056b3;
            border-color: #0056b3;
            color: white;
            padding: 10px 20px;
            border-radius: 5px;
            transition: background-color 0.3s, border-color 0.3s;
        }
        .btn-secondary:hover {
            background-color: #004494;
            border-color: #004494;
        }
    </style>
</head>
<body>
    <div class="auth-background"></div>
    <div id="auth">
        <div class="choose-container">
            <div class="auth-logo">spoTix</div>
            <h1 class="auth-title">Pilih Pendaftaran</h1>
            <p class="auth-subtitle mb-5">Choose your registration type.</p>
            <a href="{{ route('register') }}" class="btn btn-primary btn-lg mb-3">Register as User</a>
            <a href="{{ route('registerEO') }}" class="btn btn-secondary btn-lg">Register as Event Organizer</a>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html> 