<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title') - {{ config('app.name', 'Laravel') }}</title>
    <link rel="shortcut icon" href="{{ asset('admin/images/logo-mini.svg') }}" type="image/svg">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="stylesheet" href="{{ asset('admin/vendors/mdi/css/materialdesignicons.min.css') }}">

    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.0.7/dist/css/splide.min.css">
    @stack('styles')
    <script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.0.7/dist/js/splide.min.js"></script>
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img src="{{ asset('admin/images/logo.svg') }}" alt="logo" height="30" />
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <li class="mx-2 nav-item">
                            <a href="{{ route('home') }}"
                                class="nav-link {{ Request::is('/') ? 'active' : '' }}">{{ __('Beranda') }}</a>
                        </li>
                        <li class="mx-2 nav-item">
                            <a href="{{ route('produk') }}"
                                class="nav-link {{ Request::is('produk*') ? 'active' : '' }}">{{ __('Produk') }}</a>
                        </li>
                        <li class="mx-2 nav-item">
                            <a href="{{ route('kuliner') }}"
                                class="nav-link {{ Request::is('kuliner*') ? 'active' : '' }}">{{ __('Kuliner') }}</a>
                        </li>
                        <li class="mx-2 nav-item">
                            <a href="{{ route('artikel') }}"
                                class="nav-link {{ Request::is('artikel*') ? 'active' : '' }}">{{ __('Artikel') }}</a>
                        </li>
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link btn btn-sm btn-warning py-1 px-3" href="{{ route('login') }}">
                                        <i class="mdi mdi-login"></i>
                                        {{ __('Login') }}
                                    </a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item">
                                <a class="nav-link">
                                    <i class="mdi mdi-cart-outline"></i>
                                    <span class="badge bg-warning">2</span>
                                </a>
                            </li>
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>
                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            <div class="container">
                @yield('content')
            </div>
        </main>

        <footer class="text-center text-lg-start bg-light text-muted">
            <section class="container d-flex justify-content-center justify-content-lg-between p-4 border-bottom">
                <div class="me-5 d-none d-lg-block">
                    <span>Terhubung dengan kami di social media : </span>
                </div>
                <div>
                    <a href="" class="me-4 text-reset">
                        <i class="mdi mdi-facebook"></i>
                    </a>
                    <a href="" class="me-4 text-reset">
                        <i class="mdi mdi-twitter"></i>
                    </a>
                    <a href="" class="text-reset">
                        <i class="mdi mdi-instagram"></i>
                    </a>
                </div>
            </section>
            <section class="">
                <div class="container text-center text-md-start mt-5">
                    <div class="row mt-3">
                        <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
                            <h6 class="text-uppercase fw-bold mb-4">Pusaka Indatu</h6>
                            <p>
                                Here you can use rows and columns to organize your footer content. Lorem ipsum
                                dolor sit amet, consectetur adipisicing elit.
                            </p>
                        </div>
                        <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
                            <h6 class="text-uppercase fw-bold mb-4">
                                Produk
                            </h6>
                            <p>
                                <a href="{{ route('produk') }}" class="text-reset">Bahan Masakan</a>
                            </p>
                            <p>
                                <a href="{{ route('kuliner') }}" class="text-reset">Kuliner</a>
                            </p>
                        </div>
                        <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
                            <h6 class="text-uppercase fw-bold mb-4">
                                Kontak
                            </h6>
                            <p>Jl. Banda Aceh - Medan, No. 2A, Lampoih Saka - Sigli</p>
                            <p>info@pusakaindatu.com</p>
                            <p>+ 01 234 567 88</p>
                        </div>
                    </div>
                </div>
            </section>
            <div class="text-center p-4 bg-light">
                © 2021 Copyright |
                <a class="text-reset fw-bold" href="{{ route('home') }}">Pusaka Indatu</a>
            </div>
        </footer>
    </div>
    @stack('scripts')
</body>

</html>
