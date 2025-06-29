<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Bienvenido a Cancheo</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #F5F5F5;
            color: #2E2E2E;
        }
        .hero {
            background: linear-gradient(135deg, #00B873, #1E88E5);
            color: white;
            padding: 6rem 2rem;
            text-align: center;
        }
        .hero h1 {
            font-size: 3rem;
            font-weight: bold;
        }
        .btn-cta {
            background-color: #FF7043;
            border: none;
            padding: 0.75rem 2rem;
            font-weight: bold;
        }
        .section {
            padding: 4rem 2rem;
        }
        .icon-circle {
            width: 60px;
            height: 60px;
            background-color: #00B873;
            color: white;
            border-radius: 50%;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
        }
    </style>
</head>
<body>

    <section class="hero">
        <div class="container">
            <h1>Reservá tu cancha en segundos</h1>
            <p class="lead mt-3 mb-4">Cancheo conecta jugadores con canchas disponibles cerca de ellos. Simple, rápido y al toque.</p>
            <a href="{{ route('login') }}" class="btn btn-cta">¡Jugar ya!</a>
        </div>
    </section>

    <section class="section text-center bg-white">
        <div class="container">
            <h2 class="mb-4">¿Qué es Cancheo?</h2>
            <p class="mb-5">Cancheo es la plataforma para reservar canchas deportivas en Costa Rica. Desde fútbol 5 hasta pádel y más, encontrá el espacio perfecto para tu partido.</p>

            <div class="row text-start">
                <div class="col-md-4 mb-4">
                    <div class="icon-circle mb-3"><i class="bi bi-geo-alt"></i></div>
                    <h5>Canchas cerca de vos</h5>
                    <p>Ubicá espacios deportivos por zona o cercanía con geolocalización integrada.</p>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="icon-circle mb-3"><i class="bi bi-clock-history"></i></div>
                    <h5>Reservá en tiempo real</h5>
                    <p>Accedé a disponibilidad actualizada y bloqueá tu horario con pocos clics.</p>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="icon-circle mb-3"><i class="bi bi-phone"></i></div>
                    <h5>Paga fácil</h5>
                    <p>Confirmá tu reserva con SINPE móvil o pago al llegar, sin complicaciones.</p>
                </div>
            </div>
        </div>
    </section>

    <footer class="text-center py-4 bg-light text-muted">
        © {{ date('Y') }} Cancheo. Todos los derechos reservados.
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <link href=\"https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css\" rel=\"stylesheet\">
</body>
</html>
