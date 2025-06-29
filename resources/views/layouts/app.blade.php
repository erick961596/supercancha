<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cancheo</title>

    <!-- Fuentes y estilos -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Scripts de Breeze -->
 
    <style>
        :root {
            --primary-color: #00B873;
            --secondary-color: #2D3748;
            --menu-height: 60px;
            --sidebar-width: 250px;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background-color: #F8F9FA;
        }

        /* ===== MOBILE FIRST ===== */
        /* Header */
        .app-header {
            background: white;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            height: 70px;
            display: flex;
            align-items: center;
            justify-content: center;
            position: sticky;
            top: 0;
            z-index: 100;
        }

        .app-logo {
            font-weight: 700;
            color: var(--primary-color);
            font-size: 1.5rem;
            text-decoration: none;
        }

        /* Main Content - Mobile */
        .main-content {
            padding: 1.5rem;
            min-height: calc(100vh - 70px - var(--menu-height));
            padding-bottom: 2rem;
        }

        /* Bottom Navigation - Mobile */
        .bottom-nav {
            position: fixed;
            bottom: 0;
            left: 0;
            right: 0;
            height: var(--menu-height);
            background: white;
            box-shadow: 0 -2px 10px rgba(0, 0, 0, 0.1);
            display: flex;
            z-index: 100;
        }

        .nav-item {
            flex: 1;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            color: var(--secondary-color);
            text-decoration: none;
            font-size: 0.75rem;
            transition: all 0.3s;
        }

        .nav-item i {
            font-size: 1.25rem;
            margin-bottom: 4px;
        }

        .nav-item:hover, .nav-item.active {
            color: var(--primary-color);
        }

        /* ===== DESKTOP ===== */
        @media (min-width: 992px) {
            body {
                display: flex;
                min-height: 100vh;
                padding-bottom: 0;
            }

            /* Sidebar */
            .sidebar {
                width: var(--sidebar-width);
                background: white;
                box-shadow: 2px 0 10px rgba(0, 0, 0, 0.1);
                position: sticky;
                top: 0;
                height: 100vh;
                z-index: 100;
            }

            .sidebar-header {
                padding: 1.5rem;
                border-bottom: 1px solid #eee;
                height: 70px;
                display: flex;
                align-items: center;
                justify-content: center;
            }

            .sidebar-brand {
                font-weight: 700;
                color: var(--primary-color);
                font-size: 1.2rem;
                text-decoration: none;
            }

            .sidebar-menu {
                padding: 1rem 0;
            }

            .sidebar-menu .nav-link {
                padding: 0.75rem 1.5rem;
                color: var(--secondary-color);
                border-radius: 0.5rem;
                margin: 0.25rem 1rem;
                display: flex;
                align-items: center;
            }

            .sidebar-menu .nav-link i {
                margin-right: 10px;
                font-size: 1.1rem;
                width: 24px;
                text-align: center;
            }

            .sidebar-menu .nav-link:hover,
            .sidebar-menu .nav-link.active {
                background-color: rgba(0, 184, 115, 0.1);
                color: var(--primary-color);
            }

            /* Main Content - Desktop */
            .main-content {
                flex: 1;
                padding: 2rem;
                min-height: auto;
                padding-bottom: 2rem;
            }

            /* Hide mobile elements on desktop */
            .app-header,
            .bottom-nav {
                display: none;
            }
        }

        /* Card Styles */
        .card-custom {
            border-radius: 1rem;
            box-shadow: 0 0.5rem 1rem rgba(0,0,0,0.1);
            border: none;
        }

        /* Profile Dropdown */
        .profile-dropdown {
            position: relative;
        }

        .profile-dropdown .dropdown-menu {
            left: auto;
            right: 0;
        }
    </style>
</head>
<body>
    <!-- ===== MOBILE VIEW ===== -->
    <!-- Header con Logo -->
    <header class="app-header d-lg-none">
       <a href="{{ auth()->check() ? route('player.dashboard') : route('home') }}" class="app-logo">
    Cancheo
</a>
    </header>

    <!-- ===== DESKTOP VIEW ===== -->
    <!-- Sidebar -->
    <aside class="sidebar d-none d-lg-block">
        <div class="sidebar-header">
            <a href="{{ route('player.dashboard') }}" class="sidebar-brand">Cancheo</a>
        </div>
        <div class="sidebar-menu">
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}" href="{{ route('player.dashboard') }}">
                        <i class="fas fa-home"></i>
                        <span>Inicio</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('reservations*') ? 'active' : '' }}" href="#">
                        <i class="fas fa-calendar-alt"></i>
                        <span>Reservas</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('pitches*') ? 'active' : '' }}" href="#">
                        <i class="fas fa-map-marker-alt"></i>
                        <span>Canchas</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('teams*') ? 'active' : '' }}" href="#">
                        <i class="fas fa-users"></i>
                        <span>Equipos</span>
                    </a>
                </li>
            </ul>
        </div>
    </aside>

    <!-- Contenido Principal -->
    <div class="main-content">
        <!-- Desktop Top Bar (solo en desktop) -->
        <div class="d-none d-lg-flex justify-content-end mb-4">
            <div class="profile-dropdown">
                <button class="btn btn-light dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown">
                    <i class="fas fa-user-circle me-2"></i>
                    {{ Auth::user()->name }}
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <li><a class="dropdown-item" href="{{ route('profile.edit') }}"><i class="fas fa-user me-2"></i> Perfil</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="dropdown-item">
                                <i class="fas fa-sign-out-alt me-2"></i> Cerrar sesión
                            </button>
                        </form>
                    </li>
                </ul>
            </div>
        </div>

        <!-- Contenido Dinámico -->
        @yield('content')
    </div>

    <!-- ===== MOBILE VIEW ===== -->
    <!-- Menú Inferior -->
    <nav class="bottom-nav d-lg-none">
        <a href="{{ route('dashboard') }}" class="nav-item {{ request()->routeIs('dashboard') ? 'active' : '' }}">
            <i class="fas fa-home"></i>
            <span>Inicio</span>
        </a>
        <a href="#" class="nav-item {{ request()->routeIs('reservations*') ? 'active' : '' }}">
            <i class="fas fa-calendar-alt"></i>
            <span>Reservas</span>
        </a>
        <a href="#" class="nav-item {{ request()->routeIs('pitches*') ? 'active' : '' }}">
            <i class="fas fa-map-marker-alt"></i>
            <span>Canchas</span>
        </a>
        <a href="{{ route('profile.edit') }}" class="nav-item {{ request()->routeIs('profile.edit') ? 'active' : '' }}">
            <i class="fas fa-user"></i>
            <span>Perfil</span>
        </a>
    </nav>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Activar elemento del menú al hacer clic (mobile)
        document.querySelectorAll('.bottom-nav .nav-item').forEach(item => {
            item.addEventListener('click', function() {
                document.querySelectorAll('.bottom-nav .nav-item').forEach(i => i.classList.remove('active'));
                this.classList.add('active');
            });
        });
    </script>
</body>
</html>
