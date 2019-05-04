<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>CNE</title>
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="{{ asset('plugins/bootstrap/css/bootstrap.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">

        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="{{ asset('plugins/jquery/js/jquery.min.js') }}"></script>
        <script src="{{ asset('plugins/bootstrap/js/bootstrap.js') }}"></script>

        <!-- Styles -->
        <style>
            @font-face{
                font-family: Roboto-Black;
                src: url("{{ asset('fonts/Roboto-Black.ttf') }}") format("opentype");
            }
            @font-face{
                font-family: Roboto-Light;
                src: url("{{ asset('fonts/Roboto-Light.ttf') }}") format("opentype");
            }

            body {
                font-family: "Roboto-Light";
                font-size: 13px;
                transition: background-color .5s;
            }

            .panel-primary{
                border-color: #ddd;
            }

            .panel-primary > .panel-heading {
              color: black;
              background-color: #F5F5DC;
              border-color: #F5F5DC;
            }

            .btn-info{
                background-color: #A9A9A9;
                border-color: #A9A9A9;
            }

            .btn-info:hover{
                background-color: #778899;
                border-color: #778899;
            }

            .btn-info:focus,
            .btn-info.focus {
              color: #fff;
              background-color: black;
              border-color: black;
            }

            .btn-info:active,
            .btn-info.active,
            .open > .dropdown-toggle.btn-info {
              color: #fff;
              background-color: black;
              border-color: black;
            }

            .btn-info:active:hover,
            .btn-info.active:hover,
            .open > .dropdown-toggle.btn-info:hover,
            .btn-info:active:focus,
            .btn-info.active:focus,
            .open > .dropdown-toggle.btn-info:focus,
            .btn-info:active.focus,
            .btn-info.active.focus,
            .open > .dropdown-toggle.btn-info.focus {
              color: #fff;
              background-color: black;
              border-color: black;
            }

            .btn-info.disabled:hover,
            .btn-info[disabled]:hover,
            fieldset[disabled] .btn-info:hover,
            .btn-info.disabled:focus,
            .btn-info[disabled]:focus,
            fieldset[disabled] .btn-info:focus,
            .btn-info.disabled.focus,
            .btn-info[disabled].focus,
            fieldset[disabled] .btn-info.focus {
              background-color: black;
              border-color: black;
            }

            .btn-success{
                background-color: #B8860B;
                border-color: #B8860B;
            }

            .btn-success:hover{
                background-color: #D2B48C;
                border-color: #D2B48C;
            }

            .btn-success:focus,
            .btn-success.focus {
              color: #fff;
              background-color: black;
              border-color: black;
            }

            .btn:focus,.btn:active:focus,.btn.active:focus,
            .btn.focus,.btn:active.focus,.btn.active.focus {
                outline: none;
            }    

            .btn-success:active,
            .btn-success.active,
            .open > .dropdown-toggle.btn-success {
              color: #fff;
              background-color: black;
              border-color: black;
            }

            .btn-success:active:hover,
            .btn-success.active:hover,
            .open > .dropdown-toggle.btn-success:hover,
            .btn-success:active:focus,
            .btn-success.active:focus,
            .open > .dropdown-toggle.btn-success:focus,
            .btn-success:active.focus,
            .btn-success.active.focus,
            .open > .dropdown-toggle.btn-success.focus {
              color: #fff;
              background-color: black;
              border-color: black;
            }

            .btn-success.disabled:hover,
            .btn-success[disabled]:hover,
            fieldset[disabled] .btn-success:hover,
            .btn-success.disabled:focus,
            .btn-success[disabled]:focus,
            fieldset[disabled] .btn-success:focus,
            .btn-success.disabled.focus,
            .btn-success[disabled].focus,
            fieldset[disabled] .btn-success.focus {
              background-color: black;
              border-color: black;
            }

            .btn-warning{
                background-color: #696969;
                border-color: #696969;
            }

            .btn-warning:hover{
                background-color: #C0C0C0;
                border-color: #C0C0C0;
            }

            .btn_vip{
                background-color: #B8860B;
                border-color: #B8860B;
            }

            .btn_vip:hover{
                background-color: #D2B48C;
                border-color: #D2B48C;
            }

            .traer_frente{
                position: relative;
            }

            .titulo{
                font-family: 'Roboto-Black', serif;
                float: right;  
            }

            .color{
                background-color: #F5F5DC;
            }

            .web{
                color: #B8860B;
            }

            .img_logo{
                width: 15%;
                height: 15%;
                float: center;

            }

            .pos{
                position: sticky;
            }

            .form-control:focus {
              color: #495057;
              background-color: #fff;
              border-color: #B8860B;
              outline: 0;
              box-shadow: 0 0 0 0.2rem rgba(184, 134, 11, 0.25);
            }

            .display-4{
                color: #696969;
            }
            .jumbotron-fluid{
                background-color: #F5F5DC;
            }
            .sidenav {
                height: 100%;
                width: 0;
                position: absolute;
                z-index: 1;
                top: 0;
                left: 0;
                background-color: #F5F5DC;
                overflow-x: hidden;
                transition: 0.5s;
                padding-top: 60px;
            }

            .sidenav a {
                padding: 8px 8px 8px 32px;
                text-decoration: none;
                font-size: 25px;
                color: #696969;
                display: block;
                transition: 0.3s;
            }

            .sidenav a:hover {
                color:#C0C0C0;
                /*background-color: #FFFFF0;
                border-bottom-right-radius: 30px;
                border-top-right-radius: 30px;*/
            }

            .sidenav .closebtn {
                position: absolute;
                top: 0;
                right: 25px;
                font-size: 30px;
                margin-left: 50px;
            }

            #main {
                transition: margin-left .5s;
                padding: 16px;
            }

            @media screen and (max-height: 450px) {
              .sidenav {padding-top: 30px;}
              .sidenav a {font-size: 20px;}
            }

            /*AntiClockWise Effect*/
            .antiClock{
                display: inline;
                text-indent: 8px;
            }
            .antiClock {
                animation: anti 20s linear infinite 0s;
                -ms-animation: anti 20s linear infinite 0s;
                -webkit-animation: anti 20s linear infinite 0s;
                /*color: #00abe9;
                opacity: 0;*/
                /*overflow: hidden;*/
                position: absolute;
                /*opacity: 0.1;*/
            }
            .antiClock:nth-child(2){
                animation-delay: 20s;
                -ms-animation-delay: 20s;
                -webkit-animation-delay: 20s;
                opacity: 0.1;
            }

            /*AntiClockWise Effect Animation*/
            @-moz-keyframes anti{
                0% { opacity: 0.1; }
                5% { opacity: 0.1; -moz-transform: rotateX(180deg); }
                10% { opacity: 0.1; -moz-transform: translateY(0px); }
                25% { opacity: 0.1; -moz-transform: translateY(0px); }
                30% { opacity: 0.1; -moz-transform: translateY(0px); }
                80% { opacity: 0.1; }
                100% { opacity: 0.1;}
            }
            @-webkit-keyframes anti{
                0% { opacity: 0.1; }
                5% { opacity: 0.1; -webkit-transform: rotate(180deg); }
                10% { opacity: 0.1; -webkit-transform: translateY(0px); }
                25% { opacity: 0.1; -webkit-transform: translateY(0px); }
                30% { opacity: 0.1; -webkit-transform: translateY(0px); }
                80% { opacity: 0.1; }
                100% { opacity: 0.1; }
            }
            @-ms-keyframes anti{
                0% { opacity: 0.1; }
                5% { opacity: 0.1; -ms-transform: rotate(180deg); }
                10% { opacity: 0.1; -ms-transform: translateY(0px); }
                25% { opacity: 0.1; -ms-transform: translateY(0px); }
                30% { opacity: 0.1; -ms-transform: translateY(0px); }
                80% { opacity: 0.1; }
                100% { opacity: 0.1; }
            }
            
        </style>
    </head>
    <body>
    @if (session()->has('flash_message'))
    <div class="alert alert-success {{ Session()->has('flash_message_important') ? 'alert-important' : '' }}">
       <!-- <div class="alert alert-success">
                <button type="button"
                    class="close"
                    data-dismiss="alert"
                    aria-hidden="true"
                 >&times;</button>-->
            {{ session('flash_message') }}
    </div>
            {{ session()->forget('flash_message') }}
    @endif

    <script>
           $('div.alert').not('.alert-important').delay(3000).slideUp(300);
    </script>

        <div class="alert alert-warning" role="alert" id="exit">
            <div style="background-color: transparent;">
                <form method="POST" action="{{route ('logout')}}">
                    {{ csrf_field() }}
                    <div style="text-align: right;">DESEA SALIR DE SESION <button class="btn btn-success btn-xs">SI</button></div>  
                </form>
            </div>
        </div>

        <div id="usr" style="margin-top: 10px; margin-right: 10px; text-align: right; cursor: pointer;"> 
            <img src="{{asset('img/usuario.png')}}" style="width: 1%; height: 1%;" class="cerrar_sesion">
               <span class="cerrar_sesion">{{ Auth::user()->NB_LOGIN_USUARIO }}</span>
               <span class="cerrar_sesion">{{ Auth::user()->roles()->first()->TX_ROL }}</span>

        </div>
        
        <div id="particles-js"></div>
        <div class="container">
            <div class="row" >
                <div id="main" class="col-sm-1  col-md-1  col-lg-1  col-xl-12">
                    <span class="glyphicon glyphicon-menu-hamburger" style="font-size:30px; color:#696969;cursor:pointer;width: 10%;" onclick="openNav()"></span>
                </div>
            </div>
            <div class="jumbotron jumbotron-fluid col-sm-12 col-md-12 col-lg-12 col-xl-12">
                <div class="container">
                    <img class="img_logo" src="{{ asset('img/CNE_logo.png') }}">
                    <h1 class="titulo">
                        <span></span>
                        <span class="antiClock">WEB</span><span class="web">WEB</span>    
                    </h1>
                    <marquee></marquee>
                </div>
            </div>
            <div id="mySidenav" class=" col-1 sidenav">
                <a href="javascript:void(0)" class="closebtn glyphicon glyphicon-remove-sign cerrar" onclick="closeNav()"></a><br>
                <?php $i=1; $j=1; $s=0;?>
                <?php  
                $verintencion = 0;
                    if (count(Auth::user()->getJornada()) == 1){
                        if (Auth::user()->getJornada()->first()->TX_PRECOMPRA == 1){
                            $verintencion = 1;
                        }
                    }
                ?>
                <?php $i=1; $j=1; $s=0?>
                @foreach (Auth::user()->getMenu() as $m)
                            @if ($m->PADRE == 0)
                               <a class="menu_primario{{$i}}" href="#">{{ $m->TX_TITULO }}</a>                               
                               @foreach (Auth::user()->getMenu() as $subM)
                                    @if ($subM->PADRE != 0)
                                         @if (($subM->ID_MENU == 8 & $verintencion == 1) || $subM->ID_MENU != 8)
                                                @if ($m->ID_MENU == $subM->PADRE)
                                                    <a class="menu_secundario{{$j}} element{{$s}}" style="text-align: right; right; font-size: 17px;" href="{{ $subM->URL }}">{{ $subM->TX_TITULO }}</a>
                                                    <?php $s=$s+1;?>
                                                @endif     
                                         @endif    
                                     @endif          
                                @endforeach
                <?php $i=$i +1; $j=$j+1;?>
                            @endif 
                @endforeach
            </div> 
            <div class="row">            
                <div class="traer_frente col-sm-12 col-md-12 col-lg-12 col-xl-12">      
                    @yield('contenido')
                </div>  
            </div>     
        </div>      
        <script>
            function openNav() {
                document.getElementById("mySidenav").style.width = "300px";
                document.getElementById("mySidenav").style.position = "fixed";
                //document.getElementById("main").hidden();
                //document.body.style.backgroundColor = "rgba(0,0,0,0.4)";
                iniciar();
                ruta();
            }

            function closeNav() {
                document.getElementById("mySidenav").style.width = "0";
                //document.getElementById("main").style.marginLeft= "0";
                //document.body.style.backgroundColor = "white";
                //location.reload();
            }
        </script>
        <script type="text/javascript" src="{{ asset('js/menu.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/particles.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/app2.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/lib/stats.js') }}"></script>
    </body>
</html>