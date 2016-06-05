<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <!-- Meta, title, CSS, favicons, etc.<link href="{{ asset('assets/admin/production/fonts/css/floatexamples.css') }} " rel="stylesheet" type="text/css"/> -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Halaman Administrator </title>

  <!-- Bootstrap core CSS -->
  <link href="{{ asset('assets/admin/production/css/bootstrap.min.css') }} " rel="stylesheet" type="text/css"/>
  <link href="{{ asset('assets/admin/production/fonts/css/font-awesome.min.css') }} " rel="stylesheet" type="text/css"/>
  <link href="{{ asset('dist/css/selectize.bootstrap3.css') }} " rel="stylesheet" type="text/css"/>
   <link href="{{ asset('dist/css/selectize.css') }} " rel="stylesheet" type="text/css"/>
  <link href="{{ asset('assets/admin/production/css/animate.min.css') }} " rel="stylesheet" type="text/css"/>
  <link href="{{ asset('css/jquery.dataTables.css') }}" rel="stylesheet">
<link href="{{ asset('css/dataTables.bootstrap.css') }}" rel="stylesheet">
 <link href="{{ asset('dist/css/selectize.bootstrap3.css') }} " rel="stylesheet" type="text/css"/>
   <link href="{{ asset('dist/css/selectize.css') }} " rel="stylesheet" type="text/css"/>
    <link href="{{ asset('dist/css/sweetalert.css') }} " rel="stylesheet" type="text/css"/>

  <!-- Custom styling plus plugins -->
  
  <link href="{{ asset('assets/admin/production/css/custom.css') }} " rel="stylesheet" type="text/css"/>
  <link href="{{ asset('assets/admin/production/css/maps/jquery-jvectormap-2.0.3.css') }} " rel="stylesheet" type="text/css"/>
  <link href="{{ asset('assets/admin/production/css/icheck/flat/green.css') }} " rel="stylesheet" type="text/css"/>
  
  
  
  <!--[if lt IE 9]>
        <script src="../assets/js/ie8-responsive-file-warning.js"></script>
        <![endif]-->

  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
  <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

</head>


<body class="nav-md">

  <div class="container body">


    <div class="main_container">

      <div class="col-md-3 left_col">
        <div class="left_col scroll-view">

          <div class="navbar nav_title" style="border: 0;">
          <a href="{{url('/admin') }}" class="site_title"><i class="fa fa-align-justify"></i> <span>SiOLong</span></a>
           
           <span class="fa fa-chevron-down"> 
          </div>
          <div class="clearfix"></div>


          <!-- menu prile quick info -->
          <div class="profile">
            <div class="profile_pic">
              <img src="{{ URL::to('/') }}/img/{{ Auth::user()->image }}" alt="..." class="img-circle profile_img">
            </div>
            <div class="profile_info">
              <span>Welcome,</span>
              <h2>{{Auth::user()->name}}</h2>
            </div>
          </div>
          <!-- /menu prile quick info -->
  <br />
        
          <!-- sidebar menu -->
          <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">

            <div class="menu_section">
              <br/>
          <br />
          <br/>
             
              <ul class="nav side-menu">
                <li><a><i class="fa fa-home"></i> Home <span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu" style="display: none">
                    <li><a href="#">Dashboard Admin</a>
                    </li>
                    <li><a href="{{url('/')}}">Kembali Ke Home</a>
                    </li>
                    
                  </ul>
                </li>
                <li><a><i class="fa fa-edit"></i>Daftar <span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu" style="display: none">
                    <li><a href="{{url('admin/barang')}}">Daftar Barang</a>
                    </li>
                    <li><a href="{{url('listuser')}}">Daftar Custumor</a>
                    </li>
                    <li><a href="{{url('kategori')}}">Daftar Kategori</a>
                    </li>
                    <li><a href="{{url('admin/peminjaman')}}">Daftar Peminjaman</a>
                    </li>
                    <li><a href="{{url('/reward')}}">Daftar Point</a>
                    </li>
                   
                    </li>
                  </ul>
                </li>
              <li><a><i class="fa fa-bar-chart-o"></i> Data Presentation <span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu" style="display: none">
                    <li><a href="{{url('/grafpin')}}">Grafik Point</a>
                    </li>
                    <li><a href="{{url('/grafpij')}}">Grafik Meminjam</a>
                    </li>
                    <li><a href="{{url('grafme')}}">Grafik Meminjamkan</a>
                    </li>
                                      </ul>
                </li>
                
              </ul>
            </div>
            <div class="menu_section">
              <h3>Live On</h3>
              <ul class="nav side-menu">
                <li><a><i class="fa fa-bug"></i> Additional Pages <span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu" style="display: none">
                    <li><a href="#">Manage Admin</a>
                    </li>
                    <li><a href="#">Project Detail</a>
                    </li>
                    <li><a href="#">Manage Pesan</a>
                    </li>
                   
                  </ul>
                </li>
                              
              </ul>
            </div>

          </div>
          <!-- /sidebar menu -->

          <!-- /menu footer buttons -->
          <div class="sidebar-footer hidden-small">
           
           
            <a href = "{{url('auth/logout')}}" data-toggle="tooltip" data-placement="top" title="Logout">
              <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
            </a>
          </div>
          <!-- /menu footer buttons -->
        </div>
      </div>

      <!-- top navigation -->
      <div class="top_nav">

        <div class="nav_menu">
          <nav class="" role="navigation">
            <div class="nav toggle">
              <a id="menu_toggle"><i class="fa fa-bars"></i></a>
            </div>

         
          </nav>
        </div>

      </div>


      @yield('content')

        <!-- footer content -->
       
      </div>
      <!-- /page content -->
    </div>


  </div>

  <div id="custom_notifications" class="custom-notifications dsp_none">
    <ul class="list-unstyled notifications clearfix" data-tabbed_notifications="notif-group">
    </ul>
    <div class="clearfix"></div>
    <div id="notif-group" class="tabbed_notifications"></div>
  </div>
   <script src="{{ asset('assets/plugins/jquery-1.10.1.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('js/bootstrap.js') }}" type="text/javascript"></script>
 <script src="{{ asset('dist/js/standalone/selectize.js') }}" type="text/javascript"></script>
  <script src="{{ asset('js/bloc.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('js/dataTables.bootstrap.min.js') }}"></script>
 <script src="{{ asset('dist/js/sweetalert.min.js') }}" type="text/javascript"></script>
      <!-- /top navigation -->
       @yield('scripts')
 
  <script src="{{ asset('assets/admin/production/js/nicescroll/jquery.nicescroll.min.js') }}" type="text/javascript"></script>
 
 
  <!-- bootstrap progress js -->
  <script src="{{ asset('assets/admin/production/js/progressbar/bootstrap-progressbar.min.js') }}" type="text/javascript"></script>
   <!-- icheck -->
  <script src="{{ asset('assets/admin/production/js/icheck/icheck.min.js') }}" type="text/javascript"></script>
    <!-- daterangepicker -->
  <script src="{{ asset('assets/admin/production/js/moment/moment.min.js') }}" type="text/javascript"></script>
  <script src="{{ asset('assets/admin/production/js/datepicker/daterangepicker.js') }}" type="text/javascript"></script>
    <!-- chart js -->
 
  <script src="{{ asset('assets/admin/production/js/sparkline/jquery.sparkline.min.js') }}" type="text/javascript"></script>
  <script src="{{ asset('assets/admin/production/js/custom.js') }}" type="text/javascript"></script>
  <!-- flot js -->
  <!--[if lte IE 8]><script type="text/javascript" src="js/excanvas.min.js"></script><![endif]-->
<!--<script src="{{ asset('assets/admin/production/js/flot/jquery.flot.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/admin/production/js/flot/jquery.flot.pie.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/admin/production/js/flot/jquery.flot.orderBars.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/admin/production/js/flot/jquery.flot.time.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/admin/production/js/flot/date.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/admin/production/js/flot/jquery.flot.spline.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/admin/production/js/flot/jquery.flot.stack.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/admin/production/js/flot/curvedLines.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/admin/production/js/flot/jquery.flot.resize.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/admin/production/js/flot/jquery.flot.resize.js') }}" type="text/javascript"></script>-->

   <!-- pace -->
  <script src="{{ asset('assets/admin/production/js/pace/pace.min.js') }}" type="text/javascript"></script>




</body>

</html>
