<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
    <meta charset="utf-8" />
    <title>Terms Of Service</title>
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
                  
       <h2>Syarat & Ketentuan (Terms Of Service)</h2> 
       <hr>
<p>Si Peminjam</p>
1.  Si Peminjam yang melakukan order pinjam online melalui website kami, harap memperhatikan harga ansuran, syarat pinjam dan tanggal pinjaman.<br>
2.  barang yang di pinjam harus dijaga dan dipakai dengan baik.<br>
3.  Barang akan di verifikasi oleh admin sebelum barang di pinjamkan.<br>
4.  Harga asuransi ½ dari harga barang yang bernilai lebih dari Rp.50.000.<br>
5.  Jika barang yang dipinjam kemudian dikembalikan dengan keadaan yang tidak baik maka 60% uang asuransi akan di potong.<br>
6.  Barang yang di pinjam kemudian telat dalam pengembalian akan di denda pemotongan asuransi 10% per hari.<br>
7.  Barang yang di pinjam kemudian barangnya rusak akan di denda uang asuransi tidak dikembalikan pada si peminjam.<br>
<hr>
<p>Si Meminjamkan</p>
1.  barang yang akan di berikan pinjaman tidak berupa barang-barang yang melanggar ketentuan hukum yang berlaku dan/atau hak pribadi pihak ketiga.<br>
2.  Barang harus diberikan keterangan sesuai dengan kondisi barangnya.<br>
3.  perharikan tanggal atau lama barang dipinjamkan.<br>
4.  utamakan foto yang asli dalam menampilkan barang yang akan dipinjamkan.<br>
5.  jika barang hilang atau rusak maka siolong akan mengganti rugi sesuai dengan barnag rusak dan harga barang.<br>
 

    
    <div class="form-actions">
                
                {!! link_to('auth/register','Back'
                 ,array('type'=>'button','class'=>'btn'))!!}
                         
            </div>
            </form>
            </div>
    <!-- BEGIN COPYRIGHT -->
    <div class="copyright">
        2016 &copy; siOlong Terms Of Service
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