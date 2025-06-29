<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registro - Cancheo</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #F5F5F5;
            font-family: 'Poppins', sans-serif;
        }
        .auth-wrapper {
            display: flex;
            min-height: 100vh;
        }
        .auth-left {
            background-color: #00B873;
            color: white;
            flex: 1;
            padding: 3rem 2rem;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }
        .auth-left h1 {
            font-size: 2.5rem;
            margin-bottom: 1rem;
        }
        .auth-left p {
            font-size: 1.2rem;
            max-width: 300px;
            text-align: center;
        }
        .auth-right {
            background-color: #ffffff;
            flex: 1;
            padding: 3rem 2rem;
            display: flex;
            flex-direction: column;
            justify-content: center;
            max-width: 400px;
        }
        .form-control,
        .form-select {
            border-radius: 0.75rem;
            padding: 0.75rem;
        }
        .btn-google {
            background-color: #F1F1F1;
            border-radius: 0.75rem;
            padding: 0.75rem;
            font-weight: 500;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .btn-google img {
            width: 20px;
            margin-right: 8px;
        }
        .btn-cancha {
            background-color: #00B873;
            color: white;
            border-radius: 0.75rem;
            padding: 0.75rem;
            font-weight: bold;
        }
    </style>
</head>
<body>

<div class="auth-wrapper">
    <!-- Columna izquierda -->
    <div class="auth-left">
        <img src="https://via.placeholder.com/100x100.png?text=Logo" alt="Logo Cancheo" class="mb-4">
        <h1>Bienvenido a Cancheo</h1>
        <p>Registrate y empezá a reservar o gestionar canchas en segundos.</p>
    </div>

    <!-- Columna derecha -->
    <div class="auth-right">
        <h3 class="mb-4">Crear cuenta</h3>

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div class="mb-3">
                <input type="text" class="form-control" name="name" placeholder="Nombre completo" required autofocus>
            </div>

            <div class="mb-3">
                <input type="email" class="form-control" name="email" placeholder="Correo electrónico" required>
            </div>

            <div class="mb-3">
                <input type="password" class="form-control" name="password" placeholder="Contraseña" required>
            </div>

            <div class="mb-3">
                <input type="password" class="form-control" name="password_confirmation" placeholder="Confirmar contraseña" required>
            </div>

            <div class="mb-4">
                <select class="form-select" name="role" required>
                    <option value="">Seleccioná tu rol</option>
                    <option value="player">Jugador</option>
                    <option value="owner">Dueño de cancha</option>
                </select>
            </div>

            <div class="d-grid mb-3">
                <button type="submit" class="btn btn-cancha">Registrarme</button>
            </div>
        </form>

        <div class="text-center mb-3 text-muted">o</div>

        <a href="{{ route('auth.google') }}" class="btn btn-google">
            <img src="https://www.gstatic.com/firebasejs/ui/2.0.0/images/auth/google.svg" alt="Google logo">
            Registrarse con Google
        </a>

        <p class="mt-4 text-center text-muted">
            ¿Ya tenés una cuenta? <a href="{{ route('login') }}" class="text-decoration-none" style="color: #1E88E5;">Iniciar sesión</a>
        </p>
    </div>
</div>

</body>
</html>
