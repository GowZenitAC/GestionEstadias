<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <!-- Primary Meta Tags -->
    <title>@yield('titulo')</title>
    <!-- inicio font -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" rel="stylesheet">
    <!-- <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css"> -->
    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.1.1/css/all.css">
    <!-- fin font -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="title" content="Volt - Free Bootstrap 5 Dashboard">
    <meta name="author" content="Themesberg">
    <meta name="description" content="Volt Pro is a Premium Bootstrap 5 Admin Dashboard featuring over 800 components, 10+ plugins and 20 example pages using Vanilla JS.">
    <meta name="keywords" content="bootstrap 5, bootstrap, bootstrap 5 admin dashboard, bootstrap 5 dashboard, bootstrap 5 charts, bootstrap 5 calendar, bootstrap 5 datepicker, bootstrap 5 tables, bootstrap 5 datatable, vanilla js datatable, themesberg, themesberg dashboard, themesberg admin dashboard" />
    <link rel="canonical" href="https://themesberg.com/product/admin-dashboard/volt-premium-bootstrap-5-dashboard">

    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="120x120" href="../../assets/img/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="../../assets/img/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="../../assets/img/favicon/favicon-16x16.png">
    <link rel="manifest" href="../../assets/img/favicon/site.webmanifest">
    <link rel="mask-icon" href="../../assets/img/favicon/safari-pinned-tab.svg" color="#ffffff">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="theme-color" content="#ffffff">

    

    <!--Katex-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/katex@0.16.9/dist/katex.min.css" integrity="sha384-n8MVd4RsNIU0tAv4ct0nTaAbDJwPJzDEaqSD1odI+WdtXRGWt2kTvGFasHpSy3SV" crossorigin="anonymous">
    <!-- Sweet Alert -->
    <link type="text/css" href="{{ asset('vendor/sweetalert2/dist/sweetalert2.min.css') }}" rel="stylesheet">

    <!-- Notyf -->
    <link type="text/css" href="{{ asset('vendor/notyf/notyf.min.css') }}" rel="stylesheet">

    <!-- Volt CSS -->
    <link type="text/css" href="{{ asset('assets/css/volt.css') }}" rel="stylesheet">

    <!-- NOTICE: You can use the _analytics.html partial to include production code specific code & trackers -->
    <meta name="token" id="token" value="{{ csrf_token() }}">
    <script src="{{asset('js/vue.js')}}" type="text/javascript"></script>
</head>

<body>

    <!-- NOTICE: You can use the _analytics.html partial to include production code specific code & trackers -->


    <nav class="navbar navbar-dark navbar-theme-primary px-4 col-12 d-lg-none">
        <a class="navbar-brand me-lg-5" href="../../index.html">
            <img class="navbar-brand-dark" src="../../assets/img/brand/light.svg" alt="Volt logo" /> <img class="navbar-brand-light" src="../../assets/img/brand/dark.svg" alt="Volt logo" />
        </a>
        <div class="d-flex align-items-center">
            <button class="navbar-toggler d-lg-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
    </nav>

    <nav id="sidebarMenu" class="sidebar d-lg-block bg-gray-800 text-white collapse" data-simplebar>
        <div class="sidebar-inner px-4 pt-3">
            <div class="user-card d-flex d-md-none align-items-center justify-content-between justify-content-md-center pb-4">
                <div class="d-flex align-items-center">
                    <div class="avatar-lg me-4">

                    </div>
                    <div class="d-block">
                        <!-- <p>Bienvenid@: <b>{{auth()->user()->name}}</b></p> -->
                        <!-- <li><a href="{{ route('login.destroy') }}" class="btn btn-outline-danger">Cerrar sesión</a></li> -->
                    </div>
                </div>
                <div class="collapse-close d-md-none">
                    <a href="#sidebarMenu" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="true" aria-label="Toggle navigation">
                        <svg class="icon icon-xs" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                        </svg>
                    </a>
                </div>
            </div>
            <ul class="nav flex-column pt-3 pt-md-0">

                <p>Bienvenid@: <b>{{auth()->user()->name}}</b></p>
                <li role="separator" class="dropdown-divider mt-4 mb-3 border-gray-700"></li>

                <li class="nav-item  active ">
                    <a href="inicio" class="nav-link">
                        <span class="sidebar-icon">
                            <svg class="icon icon-xs me-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path d="M2 10a8 8 0 018-8v8h8a8 8 0 11-16 0z"></path>
                                <path d="M12 2.252A8.014 8.014 0 0117.748 8H12V2.252z"></path>
                            </svg>
                        </span>
                        <span class="sidebar-text">Inicio</span>
                    </a>
                </li>
                <!-- inicio boton de categorias -->
                <!-- <li class="nav-item ">
                    <a href="categorias" class="nav-link">
                        <span class="sidebar-icon">
                        <i class="fa-regular fa-list"></i>
                        </span>
                        <span class="sidebar-text">Categorías</span>
                    </a>
                </li> -->
                <!-- fin boton de categorias -->
                <!-- inicio boton de Opciones -->
                <!-- <li class="nav-item ">
                    <a href="opciones" class="nav-link">
                        <span class="sidebar-icon">
                        <i class="fa-duotone fa-option"></i>
                        </span>
                        <span class="sidebar-text">Opciones</span>
                    </a>
                </li> -->
                <!-- fin boton de Opciones -->


                <li class="nav-item">
                    <span class="nav-link  collapsed  d-flex justify-content-between align-items-center" data-bs-toggle="collapse" data-bs-target="#submenu-components">
                        <span>
                            <span class="sidebar-icon">
                                <svg class="icon icon-xs me-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M4 3a2 2 0 100 4h12a2 2 0 100-4H4z"></path>
                                    <path fill-rule="evenodd" d="M3 8h14v7a2 2 0 01-2 2H5a2 2 0 01-2-2V8zm5 3a1 1 0 011-1h2a1 1 0 110 2H9a1 1 0 01-1-1z" clip-rule="evenodd"></path>
                                </svg>
                            </span>
                            <span class="sidebar-text">Preguntas prepa</span>
                        </span>
                        <span class="link-arrow">
                            <svg class="icon icon-sm" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                            </svg>
                        </span>
                    </span>
                    <div class="multi-level collapse " role="list" id="submenu-components" aria-expanded="false">
                        <ul class="flex-column nav">
                            <!-- inicio boton de categorias -->
                            <li class="nav-item ">
                                <a href="preguntas" class="nav-link">
                                    <span class="sidebar-icon">
                                        <i class="fa-duotone fa-question"></i>
                                    </span>
                                    <span class="sidebar-text">Preguntas</span>
                                </a>
                            </li>
                            <!-- fin boton de categorias -->
                            <!-- inicio boton de categorias -->
                            <li class="nav-item ">
                                <a href="categorias" class="nav-link">
                                    <span class="sidebar-icon">
                                        <i class="fa-regular fa-list"></i>
                                    </span>
                                    <span class="sidebar-text">Categorías</span>
                                </a>
                            </li>
                            <!-- fin boton de categorias -->
                            <!-- inicio boton de Opciones -->
                            <li class="nav-item ">
                                <a href="opciones" class="nav-link">
                                    <span class="sidebar-icon">
                                        <i class="fa-duotone fa-option"></i>
                                    </span>
                                    <span class="sidebar-text">Opciones</span>
                                </a>
                            </li>
                            <!-- fin boton de Opciones -->
                            <!-- inicio boton de Equipos -->
                            <li class="nav-item ">
                                <a href="equipos" class="nav-link">
                                    <span class="sidebar-icon">
                                        <i class="fa-solid fa-users"></i>
                                    </span>
                                    <span class="sidebar-text">Equipos</span>
                                </a>
                            </li>
                            <!-- fin boton de Equipos -->
                            <!-- inicio boton de resultados -->
                            <li class="nav-item ">
                                <a href="resultados" class="nav-link">
                                    <span class="sidebar-icon">
                                    <i class="fa-duotone fa-square-poll-vertical"></i>
                                    </span>
                                    <span class="sidebar-text">Resultados</span>
                                </a>
                            </li>
                            <!-- fin boton de resultados -->
                        </ul>
                    </div>
                </li>
                <li role="separator" class="dropdown-divider mt-4 mb-3 border-gray-700"></li>

                <!-- area tsu -->
                <li class="nav-item">
        <span
          class="nav-link  collapsed  d-flex justify-content-between align-items-center"
          data-bs-toggle="collapse" data-bs-target="#submenu-app">
          <span>
            <span class="sidebar-icon">
              <svg class="icon icon-xs me-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5 4a3 3 0 00-3 3v6a3 3 0 003 3h10a3 3 0 003-3V7a3 3 0 00-3-3H5zm-1 9v-1h5v2H5a1 1 0 01-1-1zm7 1h4a1 1 0 001-1v-1h-5v2zm0-4h5V8h-5v2zM9 8H4v2h5V8z" clip-rule="evenodd"></path></svg>
            </span> 
            <span class="sidebar-text">Preguntas TSU</span>
          </span>
          <span class="link-arrow">
            <svg class="icon icon-sm" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
          </span>
        </span>
        <div class="multi-level collapse "
          role="list" id="submenu-app" aria-expanded="false">
          <ul class="flex-column nav">
                            <!-- inicio boton de categorias -->
                            <li class="nav-item ">
                                <a href="preguntasTSU" class="nav-link">
                                    <span class="sidebar-icon">
                                        <i class="fa-duotone fa-question"></i>
                                    </span>
                                    <span class="sidebar-text">Preguntas</span>
                                </a>
                            </li>
                            <!-- fin boton de categorias -->
                            <!-- inicio boton de categorias -->
                            <li class="nav-item ">
                                <a href="categoriasTSU" class="nav-link">
                                    <span class="sidebar-icon">
                                        <i class="fa-regular fa-list"></i>
                                    </span>
                                    <span class="sidebar-text">Categorías</span>
                                </a>
                            </li>
                            <!-- fin boton de categorias -->
                            <!-- inicio boton de Opciones -->
                            <li class="nav-item ">
                                <a href="opcionesTSU" class="nav-link">
                                    <span class="sidebar-icon">
                                        <i class="fa-duotone fa-option"></i>
                                    </span>
                                    <span class="sidebar-text">Opciones</span>
                                </a>
                            </li>
                            <!-- fin boton de Opciones -->
                            <!-- inicio boton de carreras -->
                            <li class="nav-item ">
                                <a href="carreras" class="nav-link">
                                    <span class="sidebar-icon">
                                    <i class="fa-duotone fa-graduation-cap"></i>
                                    </span>
                                    <span class="sidebar-text">Carreras</span>
                                </a>
                            </li>
                            <!-- fin boton de carreras -->
                            <!-- inicio boton de resultados -->
                            <li class="nav-item ">
                                <a href="equiposTSU" class="nav-link">
                                    <span class="sidebar-icon">
                                    <i class="fa-solid fa-users"></i>
                                    </span>
                                    <span class="sidebar-text">Equipos TSU</span>
                                </a>
                            </li>
                            <!-- fin boton de resultados -->
                            <!-- inicio boton de resultados -->
                            <li class="nav-item ">
                                <a href="resultadostsu" class="nav-link">
                                    <span class="sidebar-icon">
                                    <i class="fa-duotone fa-square-poll-vertical"></i>
                                    </span>
                                    <span class="sidebar-text">Resultados TSU</span>
                                </a>
                            </li>
                            <!-- fin boton de resultados -->
                        </ul>
        </div>
      </li>
                <!-- fin area tsu -->

                

                <!-- <li class="nav-item">
                                <a href="{{ route('login.destroy') }}" class="btn btn-danger d-flex align-items-center justify-content-center btn-upgrade-pro"><span class="sidebar-icon d-inline-flex align-items-center justify-content-center"><svg class="icon icon-xs me-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" d="M12.395 2.553a1 1 0 00-1.45-.385c-.345.23-.614.558-.822.88-.214.33-.403.713-.57 1.116-.334.804-.614 1.768-.84 2.734a31.365 31.365 0 00-.613 3.58 2.64 2.64 0 01-.945-1.067c-.328-.68-.398-1.534-.398-2.654A1 1 0 005.05 6.05 6.981 6.981 0 003 11a7 7 0 1011.95-4.95c-.592-.591-.98-.985-1.348-1.467-.363-.476-.724-1.063-1.207-2.03zM12.12 15.12A3 3 0 017 13s.879.5 2.5.5c0-1 .5-4 1.25-4.5.5 1 .786 1.293 1.371 1.879A2.99 2.99 0 0113 13a2.99 2.99 0 01-.879 2.121z" clip-rule="evenodd"></path>
                                        </svg> </span><span>Cerrar sesión</span></a>

                            </li> -->

            </ul>
        </div>
        <a href="{{ route('login.destroy') }}" class="btn btn-danger d-flex align-items-center justify-content-center btn-upgrade-pro">Cerrar sesión</a>
    </nav>

    <main class="content">

        <nav class="navbar navbar-top navbar-expand navbar-dashboard navbar-dark ps-0 pe-2 pb-0">
            <div class="container-fluid px-0">
                <div class="d-flex justify-content-between w-100" id="navbarSupportedContent">
                    <div class="d-flex align-items-center">

                    </div>
                    <!-- Navbar links -->
                    <ul class="navbar-nav align-items-center">
                        <li class="nav-item dropdown">

                            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-center mt-2 py-0">
                                <div class="list-group list-group-flush">
                                    <a href="#" class="text-center text-primary fw-bold border-bottom border-light py-3">Notifications</a>


                                </div>
                            </div>
                        </li>
                        <li class="nav-item dropdown ms-lg-3">
                            <a class="nav-link dropdown-toggle pt-1 px-0" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <div class="media d-flex align-items-center">
                                    <!-- <img class="avatar rounded-circle" alt="Image placeholder" src="../../assets/img/team/profile-picture-3.jpg"> -->
                                    <div class="media-body ms-2 text-dark align-items-center d-none d-lg-block">
                                        <!-- botones login -->
                                        @if(auth()->check())
                                        <!-- <li>
                            <br>
                            <p style="color: black;">Bienvenid@: <b>{{auth()->user()->name}}</b></p>

                        </li> -->
                                        <div class="topbar-divider d-none d-sm-block"></div>
                                        <!-- <li><a href="{{ route('login.destroy') }}" class="btn btn-outline-danger">Cerrar sesión</a></li> -->
                                        @else
                        <li><a href="{{ route('login.index') }}">Iniciar</a></li>
                        <li><a href="{{ route('register.index') }}">Registrar</a></li>

                        @endif
                        <!-- fin de botones login -->

                </div>
            </div>
            </a>

            </li>
            </ul>
            </div>
            </div>
        </nav>
        <!-- ubicacion del contenido -->
        <div class="py-2">
            <div class="col-12">
                @yield('contenido')

            </div>
        </div>
        <!--fin de la ubicacion del contenido-->





        <footer class="bg-white rounded shadow p-5 mb-4 mt-4">
            <div class="row">
                <div class="col-12 col-md-4 col-xl-6 mb-4 mb-md-0">
                    <p class="mb-0 text-center text-lg-start">© 2019-<span class="current-year"></span> <a class="text-primary fw-normal" href="https://themesberg.com" target="_blank">Themesberg</a></p>
                </div>
                <div class="col-12 col-md-8 col-xl-6 text-center text-lg-start">
                    <!-- List -->

                </div>
            </div>
        </footer>
    </main>

    <!-- Core -->
    @stack('scripts')
    <script src=""></script>
    <!-- <script src="vendor/jquery-easing/jquery.easing.min.js"></script> -->

    <script src="vendor/jquery/jquery.min.js"></script>

    <script src="{{asset('vendor/bootstrap/dist/js/bootstrap.bundle.min.js')}}"></script>

    <!-- Vendor JS -->

    <script src="{{asset('vendor/onscreen/dist/on-screen.umd.min.js')}}"></script>

    <!-- Slider -->

    <script src="{{asset('vendor/nouislider/dist/nouislider.min.js')}}"></script>

    <!-- Smooth scroll -->

    <script src="{{asset('vendor/smooth-scroll/dist/smooth-scroll.polyfills.min.js')}}"></script>
    <!-- Charts -->

    <script src="{{asset('vendor/chartist/dist/chartist.min.js')}}"></script>

    <script src="{{asset('vendor/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.min.js')}}"></script>
    <!-- Datepicker -->
    <script src="{{asset('vendor/vanillajs-datepicker/dist/js/datepicker.min.js')}}"></script>

    <!-- Sweet Alerts 2 -->
    <script src="{{asset('vendor/sweetalert2/dist/sweetalert2.all.min.js')}}"></script>

    <!-- Moment JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.27.0/moment.min.js"></script>

    <!-- Vanilla JS Datepicker -->
    <script src="{{asset('vendor/vanillajs-datepicker/dist/js/datepicker.min.js')}}"></script>


    <!-- Simplebar -->
    <script src="{{asset('vendor/simplebar/dist/simplebar.min.js')}}"></script>


    <!-- Volt JS -->
    <script src="{{asset('assets/js/volt.js')}}"></script>
    
    <!-- KATEX JS -->
    <script defer src="https://cdn.jsdelivr.net/npm/katex@0.16.9/dist/katex.min.js" integrity="sha384-XjKyOOlGwcjNTAIQHIpgOno0Hl1YQqzUOEleOLALmuqehneUG+vnGctmUb0ZY0l8" crossorigin="anonymous"></script>

</body>

</html>