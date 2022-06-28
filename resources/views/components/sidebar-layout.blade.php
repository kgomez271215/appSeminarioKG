<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Transport') }}</title>
    <link rel="shortcut icon" href="{{ url('img/logos/favicon.png') }}" sizes="32x32">
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Inter" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>
    <div class="d-flex flex-column flex-lg-row h-lg-full bg-gray-100">
        <!-- Vertical Navbar -->
        <nav class="navbar show navbar-vertical h-lg-screen navbar-expand-lg px-0 py-3 py-lg-0  navbar-dark bg-dark border-end-lg text-white"
            id="navbarVertical">
            <div class="container-fluid" style="justify-content: space-between;">
                <!-- Toggler -->
                <button class="navbar-toggler ms-n2" type="button" data-bs-toggle="collapse"
                    data-bs-target="#sidebarCollapse" aria-controls="sidebarCollapse" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <!-- Brand -->
                <a class="navbar-brand px-lg-6 " href="#">
                    <img src="{{ asset('img/logos/logoWhite.png') }}" class="h-10" alt="...">
                </a>
                <!-- User menu (mobile) -->
                <div class="navbar-user d-lg-none">
                    <!-- Dropdown -->
                    <div class="dropdown">
                        <!-- Toggle -->
                        <a href="#" id="sidebarAvatar" role="button" data-bs-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false">
                            <div class="avatar bg-warning rounded-circle text-white">
                                <img alt="..."
                                    src="{{asset('img/icons/user.gif')}}">
                            </div>
                        </a>
                        <!-- Menu -->
                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton">
                            <div class="dropdown-item">
                                <span class="d-block text-sm text-muted mb-1">Usuario</span>
                                <span class="d-block text-heading font-semibold">{{ session('nombres') }}</span>
                                <span class="d-block text-heading font-semibold">{{ session('email') }}</span>
                            </div>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Action</a>
                            <a class="dropdown-item" href="#">Another action</a>
                            <a class="dropdown-item" href="#">Something else here</a>
                            <div class="dropdown-divider"></div>
                            <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                                <i class="bi bi-box-arrow-left"></i> Cerrar Sesion
                            </a>
                        </div>
                    </div>
                </div>
                <!-- Collapse -->
                <div class="collapse navbar-collapse" id="sidebarCollapse">
                    <!-- Navigation -->
                    <ul class="navbar-nav">
                        <li class="nav-item px-3">Administracion</li>
                        <hr class="navbar-divider my-5 opacity-20">
                        @if (session('rol')==1)
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('empresas') }}">
                                <i class="bi bi-house"></i> Empresas
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('tipoSedes')}}">
                                <i class="bi bi-bar-chart"></i> Tipo de Sedes
                            </a>
                        </li>
                        @endif
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('sedes')}}">
                                <i class="bi bi-bookmarks"></i> Sedes
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('usuarios')}}">
                                <i class="bi bi-people"></i> Usuarios
                            </a>
                        </li>
                    </ul>
                    <!-- Divider -->
                    <hr class="navbar-divider my-5 opacity-20">
                    <!-- Navigation -->
                    <ul class="navbar-nav mb-md-4">
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <i class="bi bi-gear"></i> Settings
                            </a>
                        </li>
                    </ul>
                    <!-- Push content down -->
                    <div class="mt-auto"></div>
                    <!-- User (md) -->
                    <ul class="navbar-nav mb-5">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                                <i class="bi bi-box-arrow-left"></i> Cerrar Sesion
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Main content -->
        <div class="h-screen flex-grow-1 overflow-y-lg-auto">
            <header class="bg-surface-secondary border-top ">
                <div class="d-lg-none d-flex justify-content-center shadow-sm" style="background: #f0efef">
                    <a class="nav-link font-weight-bold" href="#">
                        <i class="bi bi-bell"></i> Notificaciones
                        <span
                            class="badge bg-soft-danger text-danger rounded-pill d-inline-flex align-items-center ms-auto">23</span>
                    </a>
                    <a class="nav-link" href="#">
                        <i class="bi bi-chat"> </i> Mensajes
                        <span
                            class="badge bg-soft-primary text-primary rounded-pill d-inline-flex align-items-center ms-auto">6</span>
                    </a>
                </div>
                <div class="container-xl barUserLg shadow-sm" style="background: #f0efef">
                    <div class="row align-items-center border-bottom">
                        <div class="col-md-5 col-12 mb-3 mb-md-0">
                            <h4 class="mb-0 ls-tight text-muted">{{ session('email') }}</h4>
                        </div>
                        <!-- Actions -->
                        <div class="col-md-5 col-12 py-2 d-flex justify-content-center">
                            <span>
                                <a class="nav-link" href="#">
                                    <i class="bi bi-bell"></i> Notificaciones
                                    <span
                                        class="badge bg-soft-danger text-danger rounded-pill d-inline-flex align-items-center ms-auto">23</span>
                                </a>
                            </span>
                            <span>
                                <a class="nav-link" href="#">
                                    <i class="bi bi-chat"></i> Mensajes
                                    <span
                                        class="badge bg-soft-primary text-primary rounded-pill d-inline-flex align-items-center ms-auto">6</span>
                                </a>
                            </span>
                        </div>
                        <div class="col-md-2 col-12 py-2">
                            <div class="navbar-user ">
                                <!-- Dropdown -->
                                <div class="dropdown">
                                    <!-- Toggle -->
                                    <a href="#" id="sidebarAvatar" role="button" data-bs-toggle="dropdown"
                                        aria-haspopup="true" aria-expanded="false">
                                        <div class="avatar bg-warning rounded-circle text-white">
                                            <img alt="..."
                                                src="{{asset('img/icons/user.gif')}}">
                                        </div>
                                    </a>
                                    <!-- Menu -->
                                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton">
                                        <div class="dropdown-item">
                                            <span class="d-block text-heading text-muted mb-1">Usuario</span>
                                            <span
                                                class="d-block text-sm text-muted mb-1 ">{{ session('nombres')}}</span>
                                            <span
                                                class="d-block text-sm text-muted mb-1 ">{{session('email') }}</span>
                                        </div>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="#">Perfil</a>
                                        <a class="dropdown-item" href="#">Another action</a>
                                        <a class="dropdown-item" href="#">Something else here</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                                            <i class="bi bi-box-arrow-left"></i> Cerrar Sesion
                                        </a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                            class="d-none">
                                            @csrf
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            <main class="bg-surface-secondary">
                <div class="container-xl">
                    {{ $slot }}
                </div>
            </main>
        </div>
    </div>

    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="{{ asset('js/script.js') }}" defer></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

</body>

</html>
