<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
    <meta charset="utf-8" />
    <title>Kebijakan privasi</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <meta content="" name="description" />
    <meta content="" name="author" />
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="{{ asset('assets/plugins/bootstrap/css/bootstrap.min.css') }} " rel="stylesheet" type="text/css"/>
    <link href="{{ asset('assets/plugins/bootstrap/css/bootstrap-responsive.min.css') }} " rel="stylesheet" type="text/css"/>
    <link href="{{ asset('assets/plugins/font-awesome/css/font-awesome.min.css') }} " rel="stylesheet" type="text/css"/>
    <link href="{{ asset('assets/css/style-metro.css') }} " rel="stylesheet" type="text/css"/>
    <link href="{{ asset('assets/css/style.css') }} " rel="stylesheet" type="text/css"/>
    <link href="{{ asset('assets/css/style-responsive.css') }} " rel="stylesheet" type="text/css"/>
    <link href="{{ asset('assets/css/themes/default.css') }} " rel="stylesheet" type="text/css" id="style_color"/>
    <link href="{{ asset('assets/plugins/uniform/css/uniform.default.css') }} " rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/plugins/select2/select2_metro.css') }} " />
    <!-- END GLOBAL MANDATORY STYLES -->
    <!-- BEGIN PAGE LEVEL STYLES -->
    <link href="{{ asset('assets/css/pages/login-soft.css') }} " rel="stylesheet" type="text/css"/>
    <!-- END PAGE LEVEL STYLES -->
    <link rel="shortcut icon" href="{{ asset('assets/img/icon.png') }}"/>
    
</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<body class="login">
    <!-- BEGIN LOGO -->
    <div class="logo">
        <!-- PUT YOUR LOGO HERE -->
        <img src="{{ asset('assets/img/logo.png') }}" width="200" height="150" alt=""/> </div>
        <!-- PUT YOUR LOGO HERE -->
    </div>
    <!-- END LOGO -->
      <div class="content" style="color:white" align="justify">
        <form class="form-vertical register-form" action="{{ url('auth/register') }}" method="post" enctype='multipart/form-data' file="true"> 
                  
       <h2>Kebijakan privasi</h2> 
       <hr>
<p>Kebijakan privasi yang dimaksud di siolong adalah acuan yang mengatur dan melindungi penggunaan data dan informasi penting para pengguna situs siolong. Data dan informasi yang telah dikumpulkan pada saat mendaftar, mengakses dan menggunakan layanan di Siolong, seperti alamat e-mail, nomor telepon, foto, gambar, dan lain-lain.</p>
<br>
<p>Kebijakan - kebijakan tersebut di antaranya:</p>

1. Siolong melindungi segala informasi yang diberikan pengguna pada saat pendaftaran, mengakses, dan menggunakan seluruh layanan Siolong.<br>
2. Siolong melindungi segala hak pribadi yang muncul atas informasi mengenai suatu produk yang ditampilkan oleh pengguna layanan Siolong, baik berupa berupa foto, username, logo, dan lain-lain.<br>
3. Siolong berhak menggunakan data dan informasi para pengguna situs demi meningkatkan mutu dan pelayanan di Siolong.<br>
4. Siolong tidak bertanggung jawab atas pertukaran data yang dilakukan sendiri di antara pengguna situs.<br>
5. Siolong hanya dapat memberitahukan data dan informasi yang dimiliki oleh para pengguna situs bila diwajibkan dan/atau diminta oleh institusi yang berwenang berdasarkan ketentuan hukum yang berlaku, perintah resmi dari pengadilan, dan/atau perintah resmi dari instansi/aparat yang bersangkutan.<br>
6. Pengguna situs siolong dapat berhenti berlangganan beragam informasi promo terbaru dan penawaran eksklusif (unsubsribe) jika tidak ingin menerima informasi tersebut.<br>

 

    
    <div class="form-actions">
                
                {!! link_to('auth/register','Back'
                 ,array('type'=>'button','class'=>'btn'))!!}
                         
            </div>
            </form>
            </div>
    <!-- BEGIN COPYRIGHT -->
    <div class="copyright">
        2016 &copy; siOlong Kebijakan privasi
    </div>
    <!-- END COPYRIGHT -->
    <!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
    <!-- BEGIN CORE PLUGINS -->   <script src="{{ asset('assets/plugins/jquery-1.10.1.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/plugins/jquery-migrate-1.2.1.min.js') }}" type="text/javascript"></script>
    <!-- IMPORTANT! Load jquery-ui-1.10.1.custom.min.js before bootstrap.min.js to fix bootstrap tooltip conflict with jquery ui tooltip -->
    <script src="{{ asset('assets/plugins/jquery-ui/jquery-ui-1.10.1.custom.min.js') }}" type="text/javascript"></script>      
    <script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/plugins/bootstrap-hover-dropdown/twitter-bootstrap-hover-dropdown.min.js') }}" type="text/javascript" ></script>
    <!--[if lt IE 9]>
    <script src="{{ asset('assets/plugins/excanvas.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/respond.min.js') }}"></script>  
    <script src="{{ asset('assets/scripts/login-soft.js') }}" type="text/javascript"></script> 
    <![endif]-->   
    <script src="{{ asset('assets/plugins/jquery-slimscroll/jquery.slimscroll.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/plugins/jquery.blockui.min.js') }}" type="text/javascript"></script>  
    <script src="{{ asset('assets/plugins/jquery.cookie.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/plugins/uniform/jquery.uniform.min.js') }}" type="text/javascript" ></script>
    <!-- END CORE PLUGINS -->
    <!-- BEGIN PAGE LEVEL PLUGINS -->
    <script src="{{ asset('assets/plugins/jquery-validation/dist/jquery.validate.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/plugins/backstretch/jquery.backstretch.min.js') }}" type="text/javascript"></script>
    <script type="text/javascript" src="{{ asset('assets/plugins/select2/select2.min.js') }}"></script>
    <!-- END PAGE LEVEL PLUGINS -->
    <!-- BEGIN PAGE LEVEL SCRIPTS -->
    <script src="{{ asset('assets/scripts/app.js') }}" type="text/javascript"></script>
  
    <!-- END PAGE LEVEL SCRIPTS --> 
    <script>
        jQuery(document).ready(function() {     
          App.init();
          Login.init();
        });
    </script>
    <script >
      $.backstretch([
             "{{ asset('assets/img/bg/bg.png') }}",
              "{{ asset('assets/img/bg/bg2.png') }}",
               "{{ asset('assets/img/bg/bg3.png') }}",
               "{{ asset('assets/img/bg/bg4.png') }}"
                ], {
                  fade: 1000,
                  duration: 8000
            });
  
       
    </script>
   
  {{ Html::script('assets/scripts/login-soft.js') }} 
    <!-- END JAVASCRIPTS -->
   
</body>
<!-- END BODY -->
</html>