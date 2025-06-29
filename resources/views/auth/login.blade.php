<!-- resources/views/auth/login.blade.php -->
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar sesión - Cancheo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        body, html {
            height: 100%;
            margin: 0;
            font-family: 'Poppins', sans-serif;
        }
        .container-fluid {
            height: 100vh;
        }
        .left-panel {
            background-color: #00B873;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
            padding: 2rem;
            color: white;
        }
        .left-panel img {
            width: 120px;
            margin-bottom: 1.5rem;
        }
        .left-panel h1 {
            font-weight: 700;
            font-size: 2rem;
            margin-bottom: 0.5rem;
        }
        .left-panel p {
            font-size: 1rem;
            color: #e6fff3;
        }
        .right-panel {
            background-color: #F5F5F5;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .login-form {
            width: 100%;
            max-width: 400px;
            background: #ffffff;
            padding: 2rem;
            border-radius: 1.5rem;
            border: 1px solid #ddd;
        }
        .btn-login {
            background-color: #00B873;
            color: #fff;
            font-weight: 600;
            border-radius: 0.75rem;
        }
        .btn-google {
            background-color: #f1f3f5;
            border: 1px solid #ccc;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 500;
            border-radius: 0.75rem;
        }
        .btn-google img {
            width: 20px;
            margin-right: 10px;
        }
        .form-control, .form-select {
            border-radius: 0.75rem;
        }
        .form-check-label, .form-check-input {
            cursor: pointer;
        }
        a {
            color: #1E88E5;
            font-weight: 500;
        }
    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="row h-100">
            <div class="col-md-6 left-panel">
                <img src="https://via.placeholder.com/120x120.png?text=Logo" alt="Logo Cancheo">
                <h1>¡Bienvenido a Cancheo!</h1>
                <p>Reservá, jugá y viví la experiencia deportiva al máximo</p>
                <a href="/" class="mt-4 text-white">← Volver al inicio</a>
            </div>
            <div class="col-md-6 right-panel">
                <div class="login-form">
                    <h4 class="text-center mb-4">Iniciar sesión</h4>

                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="mb-3">
                            <input type="email" name="email" class="form-control" placeholder="Correo electrónico" required autofocus>
                        </div>
                        <div class="mb-3">
                            <input type="password" name="password" class="form-control" placeholder="Contraseña" required>
                        </div>
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember">
                                <label class="form-check-label" for="remember">Recordarme</label>
                            </div>
                            <a href="#">¿Olvidaste tu contraseña?</a>
                        </div>
                        <div class="d-grid mb-3">
                            <button type="submit" class="btn btn-login">Iniciar sesión</button>
                        </div>
                    </form>

                    <div class="text-center text-muted my-2">O</div>

                    <a href="{{ route('auth.google') }}" class="btn btn-google w-100 mb-3">
                        <img src="https://www.gstatic.com/firebasejs/ui/2.0.0/images/auth/google.svg" alt="Google logo">
                        Continuar con Google
                    </a>

                    <div class="text-center">
                        <small>¿No tenés cuenta? <a href="{{ route('register') }}">Crear cuenta</a></small>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
