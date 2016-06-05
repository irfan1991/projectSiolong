<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="{{ asset('assets/img/icon.png') }}">

    <title>Sistem Tolong Menolong (SIOLONG)</title>
 
    <!-- Bootstrap core CSS -->
     <link href="{{ asset('css/bootstrap.css') }} " rel="stylesheet" type="text/css"/>
            <script src="{{ asset('assets/plugins/bootstrap/css/bootstrap-hover-dropdown.min.css') }}" type="text/css"></script>
          <script src="{{ asset('assets/plugins/bootstrap/css/animate.min.css') }}" type="text/css"></script>
    <!-- Custom styles for this template -->
    <link href="{{ asset('css/navbar-fixed-top.css') }}" rel="stylesheet">
 <link href="{{ asset('css/jquery.dataTables.min.css') }} " rel="stylesheet" type="text/css"/>

  <link href="{{ asset('dist/css/selectize.bootstrap3.css') }} " rel="stylesheet" type="text/css"/>
   <link href="{{ asset('dist/css/selectize.css') }} " rel="stylesheet" type="text/css"/>
    <link href="{{ asset('dist/css/sweetalert.css') }} " rel="stylesheet" type="text/css"/>
   

 
    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <link href="{{ asset('assets/admin/production/fonts/css/font-awesome.min.css') }} " rel="stylesheet" type="text/css"/>
  <link href="{{ asset('assets/admin/production/css/animate.min.css') }} " rel="stylesheet" type="text/css"/>
  

  <!-- Custom styling plus plugins -->

  <link href="{{ asset('assets/admin/production/css/icheck/flat/green.css') }} " rel="stylesheet" type="text/css"/>
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="../../assets/js/ie-emulation-modes-warning.js"></script>

   
  </head>

  <body>

    <!-- Fixed navbar -->
    
      <div class="container">
       <div class="row">
      
        <div id="carousel1" class="carousel slide">
          <ol class="carousel-indicators">
            <li data-target="#carousel1" data-slide-to="0" class="active"> </li>
            <li data-target="#carousel1" data-slide-to="1" class=""> </li>
            <li data-target="#carousel1" data-slide-to="2" class=""> </li>
          </ol>
           <div class="carousel-inner">
            <div class="item"> <img class="img-responsive" src={{ asset("img/features.png") }} style="width: 1500px; height: 500px; alt="thumb">
              <!-- <div class="carousel-caption"> Carousel caption 1. Here goes slide description. Lorem ipsum dolor set amet. </div> -->
            </div>
            <div class="item active"> <img class="img-responsive" src={{asset("img/product.png" ) }} style="width: 1500px; height: 500px; alt="thumb">
              <!-- <div class="carousel-caption"> Carousel caption 2. Here goes slide description. Lorem ipsum dolor set amet. </div> -->
            </div>
            <div class="item"> <img class="img-responsive" src={{asset("img/banner.png") }} style="width: 1500px; height: 500px;  alt="thumb">
              <!-- <div class="carousel-caption"> Carousel caption 3. Here goes slide description. Lorem ipsum dolor set amet. </div> -->
           
          </div>
          </div>
          <a class="left carousel-control" href="#carousel1" data-slide="prev"><span class="icon-prev"></span></a> <a class="right carousel-control" href="#carousel1" data-slide="next"><span class="icon-next"></span></a></div>
      </div>
</div>
    <hr>
    <nav class="navbar navbar-default navbar-fixed-top">
      <div class="container">
       <div class="row">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
         
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-left">
           <li><img src="{{ asset('assets/img/logo.png') }} " alt="rounded image" class="img-rounded" width="120" height="50">   &nbsp; &nbsp; </li>

           </ul>
          
          <ul class="nav navbar-nav">
             <li class="active"><a href="{{url('/')}}"><span class="glyphicon glyphicon-home" aria-hidden="true"></span> Home</a></li>               
            @if (Auth::check())
              @if(Auth::user()->role=='admin')
               
               <li class="dropdown">
              <a href="{{ url('/admin') }}"><span class="glyphicon glyphicon-calendar" aria-hidden="true"></span> Manage</a>
              
            </li>
                        @endif
                         @endif
                
    <li><a href="{{ url('user/barang/create') }}"><span class="glyphicon glyphicon-camera" aria-hidden="true"></span> Pinjamkan Barang</a></li>
           
                  
          </ul>
   <ul class="nav navbar-nav navbar-right">

   @if(Auth::guest())
   <li><a href="{{ url('auth/login') }}"><span class="glyphicon glyphicon-user" aria-hidden="true" data-toggle="tooltip" data-placement="bottom" title="Login untuk masuk sistem" ></span> Login</a></li>
       @else
              <li class="">
                <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                  <img src="{{ URL::to('/') }}/img/user/{{ Auth::user()->image }}" alt=""> {{Auth::user()->username}}
                  <span class=" fa fa-angle-down"></span>
                </a> 
                <ul class="dropdown-menu dropdown-usermenu animated fadeInDown pull-right">
                @if (Auth::check())
              @if(Auth::user()->role!=='admin')
               
                  <li><a href="{{ url('/profile') }}">  Profile</a>
                  </li>
                  @endif
                  @endif
                 
                  <li><a href="{{ url('auth/logout') }}"><i class="fa fa-sign-out pull-right"></i> Log Out</a>
                  </li>
                </ul>
              </li>

               <li >
                <a href="{{url('/cart')}}" class="user-profile dropdown-toggle" dria-hidden="true" data-toggle="tooltip" data-placement="bottom" title="Chart Barang">
                <span class=" fa fa-shopping-cart fa-2x"></span>{{ $cart->totalProduct() > 0 ? '(' . $cart->totalProduct() . ')' : ''}}
                </a>
               
              </li>
                @endif
            </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>

<hr>


    @yield('content')

     <hr>
<div class="container">
    <div class="row">
            <div class="col-xs-3" align="center">
                <ul class="list-unstyled">
                    
                    <li><a class="social" href="https://plus.google.com/u/0/109082171660140315213/posts"></a><a href="https://plus.google.com/u/0/109082171660140315213/posts" target="_blank"><span class="fa fa-google-plus fa-5x"></span></a></li>
                   
                    <li><a href="#">GooglePlus</a></li>
                </ul>
            </div>
            <div class="col-xs-3"  align="center">
                <ul class="list-unstyled">
                                      
                   
                    <li><a class="social" href="https://www.facebook.com/si.0long/" target="_blank"><span class="fa fa-facebook fa-5x"></span></a></li>
                    <li><a href="https://www.facebook.com/si.0long/">Faceebook</a></li>
                </ul>
            </div>
            <div class="col-xs-3" align="center">
                <ul class="list-unstyled">
<li> <a class="social" href="https://twitter.com/si0long" target="_blank"><span class="fa fa-twitter fa-5x"></span></a></li>
                    <li><a href="https://twitter.com/si0long">Twitter</a></li>
                </ul>
            </div>
            <div class="col-xs-3">
                <ul class="list-unstyled">
                <li>
                     <address>
        <strong>SiOlong, Inc.</strong><br>
        Jl. Lenteng Agung Raya No.20<br>
        Jakarta Selatan 12640<br>
        <abbr title="Contact">Contact:</abbr> 0878-8826-2825
      </address>
        <address>
        <strong>SiOlong</strong><br>
        <a href="mailto:#">siolong@gmail.com</a>
        </address>
        </li>
                </ul>
            </div>
    </div>
    <hr>
    <div class="row">
            <div class="col-xs-8">
                <ul class="list-unstyled list-inline pull-left">
                    <li><a href="#">Terms of Service</a></li>
                    <li><a href="#">Contact Us</a></li>
                    <li><a href="#">Privacy</a></li>
                </ul>
            </div>

<footer class="text-center">
  <div class="container">
    <div class="row">
      <div class="col-xs-12">
        <p>Copyright © Si Olong. All rights reserved.</p>
      </div>
    </div>
  </div>
</footer>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
     <script src="{{ asset('assets/plugins/jquery-1.10.1.min.js') }}" type="text/javascript"></script>
     <script src="{{ asset('js/bootstrap.js') }}" type="text/javascript"></script>
     <script src="{{ asset('dist/js/standalone/selectize.js') }}" type="text/javascript"></script>
  <script src="{{ asset('js/blocs.js') }}" type="text/javascript"></script>

  @if (Session::has('flash_product_name'))
@include('katalog._product-added', ['product_name' => Session::get('flash_product_name')])
@endif
  <script src="{{ asset('dist/js/sweetalert.min.js') }}" type="text/javascript"></script>
  <script src="{{ asset('assets/plugins/bootstrap/js/bootstrap-hover-dropdown.js') }}" type="text/javascript"></script>
   <script src="{{ asset('js/jquery.dataTables.min.js') }}" type="text/javascript"></script>
      <script type="text/javascript">
        

      </script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="{{ asset('js/ie10-viewport-bug-workaround.js') }}"></script>
  </body>
</html>