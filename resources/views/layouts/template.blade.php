<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Game Set Match!</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@300;400;600;700;800;900&display=swap"
    rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/elegant-icons.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/magnific-popup.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/nice-select.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/owl.carousel.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/slicknav.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}" type="text/css">

</head>

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Offcanvas Menu Begin Mobile-->
    <div class="offcanvas-menu-overlay"></div>
    <div class="offcanvas-menu-wrapper">
        <div class="offcanvas__option">
            <div class="offcanvas__links">
                @guest
                    <!-- Si el usuario NO está autenticado -->
                    <a href="{{ route('register') }}">Registrarse</a>
                    <a href="{{ route('login') }}">Iniciar Sesión</a>
                @endguest

                @auth
                    <!-- Si el usuario está autenticado -->
                    <a href="{{ route('profile.show') }}">Mi Cuenta</a>
                    <a href="{{ route('logout') }}" 
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    Cerrar Sesión
                    </a>

                    <!-- Formulario para cerrar sesión -->
                    <form id="logout-form" action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit">Cerrar Sesión</button>
                    </form>
                @endauth
            </div>
        </div>

        <div class="offcanvas__nav__option">
            <a href="#" class="search-switch"><img src="{{ asset('img/icon/search.png') }}" alt=""></a>
            <a href="#"><img src="{{ asset('img/icon/heart.png') }}" alt=""></a>
            <a href="#"><img src="{{ asset('img/icon/cart.png') }}" alt=""> <span>0</span></a>
            <div class="price">$0.00</div>
        </div>
        <div id="mobile-menu-wrap"></div>
        <div class="offcanvas__text">
            <p>Game Set Match | Los mejores precios de la ciudad!</p>
        </div>
    </div>
    <!-- Offcanvas Menu End -->

    <!-- Header Section Begin -->
    <header class="header">
        <div class="header__top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-7">
                        <div class="header__top__left">
                            <p>Los mejores precios de la ciudad!</p>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-5">
                        <div class="header__top__right">
                            <div class="header__top__links">
                                @guest
                                    <!-- Si el usuario NO está autenticado -->
                                    <a href="{{ route('register') }}">Registrarse</a>
                                    <a href="{{ route('login') }}">Iniciar Sesión</a>
                                @endguest

                                @auth
                                    <!-- Si el usuario está autenticado -->
                                    <a href="{{ route('profile.show') }}">Mi Cuenta</a>
                                    <a href="{{ route('logout') }}" 
                                    onclick="event.preventDefault(); document.getElementById('logout-form-header').submit();">
                                    Cerrar Sesión
                                    </a>

                                    <!-- Formulario para cerrar sesión en el header -->
                                    <form id="logout-form-header" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                @endauth
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-3">
                    <div class="header__logo">
                        <a href="{{ route('home') }}"><img src="{{ asset('img/logo.png') }}" alt="Logo"></a>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <nav class="header__menu mobile-menu">
                        <ul>
                            <li class="active"><a href="{{ route('home') }}">Inicio</a></li>
                            <li><a href="{{ route('productos.index') }}">Productos</a>
                                <ul class="dropdown">
                                    <li><a href="#">Tennis</a></li>
                                    <li><a href="#">Pádel</a></li>
                                    <li><a href="#">Accesorios</a></li>
                                </ul>
                            </li>
                            <li><a href="{{ route('blog.index') }}">Blog</a></li>
                        </ul>
                    </nav>
                </div>
                <div class="col-lg-3 col-md-3">
                    <div class="header__nav__option">
                        <a href="#" class="search-switch"><img src="{{ asset('img/icon/search.png') }}" alt="Search"></a>
                        <a href="#"><img src="{{ asset('img/icon/heart.png') }}" alt="Heart"></a>
                        <a href="#"><img src="{{ asset('img/icon/cart.png') }}" alt="Cart"> <span>0</span></a>
                        <div class="price">$0.00</div>
                    </div>
                </div>
            </div>
            <div class="canvas__open"><i class="fa fa-bars"></i></div>
        </div>
    </header>
    <!-- Header Section End -->

    <!-- Content -->
    <main class="py-4">
        @yield('content')
    </main>

    <!-- Footer Section Begin -->
    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="footer__about">
                        <div class="footer__logo">
                            <a href="#"><img src="{{ asset('img/footer-logo.png') }}" alt="Footer Logo"></a>
                        </div>
                        <p>El cliente está en el centro de nuestro modelo de negocio único, 
                            que incluye diseño, innovación y ofrecer equipo de tenis de la más alta calidad para todos los niveles de jugadores.</p>
                        <a href="#"><img src="{{ asset('img/payment.png') }}" alt="Payment"></a>
                    </div>
                </div>
                <div class="col-lg-2 offset-lg-1 col-md-3 col-sm-6">
                    <div class="footer__widget">
                        <h6>Comprar</h6>
                        <ul>
                            <li><a href="#">Tennis</a></li>
                            <li><a href="#">Pádel</a></li>
                            <li><a href="#">Accesorios</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-2 col-md-3 col-sm-6">
                    <div class="footer__widget">
                        <h6>Contacto</h6>
                        <ul>
                            <li><a href="#">Av. Federer 73, Zapopan Jalisco</a></li>
                            <li><a href="#">Celular: +123 456 7890</a></li>
                            <li><a href="#">Email: info@gamesetmatch.com</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 offset-lg-1 col-md-6 col-sm-6">
                    <div class="footer__widget">
                        <h6>NewsLetter</h6>
                        <div class="footer__newslatter">
                            <p>Sé el primero en enterarse sobre nuestras promociones y nuevos productos!</p>
                            <form action="#">
                                <input type="text" placeholder="Tu email">
                                <button type="submit"><span class="icon_mail_alt"></span></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="footer__copyright__text">
                        <p>Copyright ©
                            <script>
                                document.write(new Date().getFullYear());
                            </script>| Colorlib
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer Section End -->

    <!-- Search Begin -->
    <div class="search-model">
        <div class="h-100 d-flex align-items-center justify-content-center">
            <div class="search-close-switch">+</div>
            <form class="search-model-form">
                <input type="text" id="search-input" placeholder="Busca aquí.....">
            </form>
        </div>
    </div>
    <!-- Search End -->

    <!-- Js Plugins -->
    <script src="{{ asset('js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/jquery.nice-select.min.js') }}"></script>
    <script src="{{ asset('js/jquery.nicescroll.min.js') }}"></script>
    <script src="{{ asset('js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('js/jquery.countdown.min.js') }}"></script>
    <script src="{{ asset('js/jquery.slicknav.js') }}"></script>
    <script src="{{ asset('js/mixitup.min.js') }}"></script>
    <script src="{{ asset('js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>

</body>

</html>
