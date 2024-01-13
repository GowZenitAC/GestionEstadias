<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <link rel="icon" href="img/fav-icon.png" type="image/x-icon" />
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <title>@yield('appblade')</title>

        //aqui se modifica el diseño del login y register
        
        <link href="css/style.css" rel="stylesheet">
        <meta name="token" id="token" value="{{ csrf_token() }}">
    </head>
    <body>
        
        <!--================Main Header Area =================-->
        <!-- inicio prueba -->
        <!-- fin prueba -->
    <header class="main_header_area five_header">
      
      <div class="main_menu_two">
        <div class="container">
          <nav class="navbar navbar-expand-lg">
            <a class="navbar-brand" href="index.html"><img src="" alt=""></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="my_toggle_menu">
                              <span></span>
                              <span></span>
                              <span></span>
                            </span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav justify-content-end">
                
                @if(auth()->check())
                <li>
                  <br>
                  <p>Bienvenido: <b>{{auth()->user()->name}}</b></p>

                </li>
                <li><a href="{{ route('login.destroy') }}" class="btn btn-outline-danger">Cerrar sesión</a></li>
                @else
                &nbsp;

                @endif
               
              </ul>
            </div>
          </nav>
        </div>
      </div>
     
    </header>
        <!--================End Main Header Area =================-->
        
        <!--================Slider Area =================-->
        <section class="main_slider_area">
           <div>
         @yield('contenido')
               
           </div>
           
        </section>
      
    </body>
</html>