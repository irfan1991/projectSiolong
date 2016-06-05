@extends('template')
@section('content')
<!-- page content -->


 <!-- Bootstrap core CSS -->
  <link href="{{ asset('assets/admin/production/css/bootstrap.min.css') }} " rel="stylesheet" type="text/css"/>
  <link href="{{ asset('assets/admin/production/fonts/css/font-awesome.min.css') }} " rel="stylesheet" type="text/css"/>
  <link href="{{ asset('assets/admin/production/css/animate.min.css') }} " rel="stylesheet" type="text/css"/>
  

  <!-- Custom styling plus plugins -->
  <link href="{{ asset('assets/admin/production/css/maps/cus.css') }} " rel="stylesheet" type="text/css"/>
  <link href="{{ asset('assets/admin/production/css/maps/jquery-jvectormap-2.0.3.css') }} " rel="stylesheet" type="text/css"/>
  <link href="{{ asset('assets/admin/production/css/icheck/flat/green.css') }} " rel="stylesheet" type="text/css"/>
  
  
  <script src="{{ asset('assets/admin/production/js/jquery.min.js') }}" type="text/javascript"></script>
</br>
</br>
</br>
</br>
 @include('flash::message')
<div class="container">
    <div class="row user-menu-container square">
        <div class="col-md-7 user-details">
            <div class="row coralbg white">
                <div class="col-md-6 no-pad">
                    <div class="user-pad">
                   
                        <h3>Selamat Datang, {{Auth::user()->name}} ,</h3>
                         <h4 class="white"><i class="fa fa-home"></i> {{Auth::user()->addres}}</h4>
                        <h4 class="white"><i class="fa fa-map-marker"></i> {{Auth::user()->city}}, TX</h4>
    {!! link_to_route('profile.edit','Edit',array(Auth::user()->id),array('class'=>'btn btn-info')) !!}
                    </div>
                </div>
                <div class="col-md-6 no-pad">
                    <div class="user-image">
                        <img src="{{ URL::to('/') }}/img/user/{{ Auth::user()->image }}" class="img-responsive thumbnail">
                    </div>
                </div>
            </div>
            <div class="row overview">
                <div class="col-md-4 user-pad text-center">
                    <h3>MEMINJAM</h3>
                    <h4>{{$borrowLogs->count()}}</h4>
                </div>
                <div class="col-md-4 user-pad text-center">
                    <h3>MEMINJAMKAN</h3>
                    <h4>{{$barangku->count()}}</h4>
                </div>
                <div class="col-md-4 user-pad text-center">
                    <h3>POINT</h3>
                    <h4>{{$borrowLogs->count()+$barangku->count()}}</h4>
                </div>
            </div>
        </div>
        <div class="col-md-1 user-menu-btns">
            <div class="btn-group-vertical square" id="responsive">
                <a href="#" class="btn btn-block btn-default active">
                  <i class="fa fa-bell-o fa-3x"></i>
                </a>
                <a href="#" class="btn btn-default">
                  <i class="fa fa-gift fa-3x"></i>
                </a>
                <a href="#" class="btn btn-default">
                  <i class="fa fa-shopping-cart fa-3x"></i>
                </a>
               
            </div>
        </div>
        <div class="col-md-4 user-menu user-pad">
            <div class="user-menu-content active">
                <h3 align="center">BARANG YANG SEDANG DIPINJAM</h3>
                    <hr>
                    @if ($borrowLogs->count() == 0)
                Tidak ada buku dipinjam
                @endif

                <ul class="user-menu-list">
                  @foreach ($borrowLogs->slice(0,6) as $borrowLog)
      <div class="col-lg-4 col-sm-12 text-center"> <img class="img-circle"  style="width: 70px; height: 70px;" src="{{ URL::to('/') }}/img/barang/{{$borrowLog->barang->photo}}" data-holder-rendered="true">
        <h5>{{ $borrowLog->barang->nama_barang }}</h5>
              </div>
      @endforeach
              </ul>
              <hr>
                <ul class="user-menu-list" align="center">
             {!! link_to('/listpinjam','View All Products'
                 ,array('type'=>'button','class'=>'btn btn-labeled btn-danger','align'=>'center'))!!}
                         
                    </ul>
            </div>
            <div class="user-menu-content">
                <h3>
                    Your Reward
                </h3>
                <ul class="user-menu-list">
                @if($borrowLogs->count()+$barangku->count() == 4)
                    <li>
                        <h4><small class="fa fa-money">ANDA MENDAPATTKAN TUTORIAL LARAVEL FREE </small></h4>
                    </li>
                @elseif($borrowLogs->count()+$barangku->count() == 5)
                    <li>
                        <h4><small class="fa fa-money"> ANDA MENDAPATKAN MAKAN GRATIS DI EMAK</small></h4>
                    </li>
                   @else
                    <li>
                        <h4><small class="fa fa-money"> AYO SEMANGAT MEMINJAM DAN MEMINJAMKAN BARANG</small></h4>
                    </li>
                    @endif
                </ul>
            </div>
            <div class="user-menu-content">
                <h3>
                    Your Products
                </h3>
                <div class="row">
                 @if (Auth::check())
                 @if(empty(Auth::user()->barang->id))
                             @foreach(Auth::user()->barang->slice(0, 2) as $brg)
                    <div class="col-sm-6 col-md-6 col">
                                            
                       <div class="view">
                            <div class="caption">
                                <p></p>
                                <a href="{{URL::to('user/barang/'.$brg->id.'/edit')}}" rel="tooltip" title="Edit"><span class="fa fa-cogs fa-2x"></span></a>
                                <a href="{{URL::to('user/barang/'.$brg->id)}}" rel="tooltip" title="View"><span class="fa fa-search fa-2x"></span></a>
                                <a href="{{URL::to('user/barang/'.$brg->id.'/destroy')}}" rel="tooltip" title="Delete"><span class="fa fa-close fa-2x"></span></a>
                            </div><img class="thumbnail" src="{{ URL::to('/') }}/img/barang/{{$brg->photo}}" width="200" height="200"> </div>
                            
                    
                        <div class="info">
                            <p class="small" style="text-overflow: ellipsis"></p>
                <p class="small coral text-right"><i class="fa fa-clock-o"></i> {{$brg->nama_barang}}</p></small>
                        </div>
                        
                          
                    </div>
                    @endforeach
                          @endif
                          @endif

                           
                 </div>
            <ul class="user-menu-list" align="center">
             {!! link_to('/listpro','View All Products'
                 ,array('type'=>'button','class'=>'btn btn-labeled btn-danger','align'=>'center'))!!}
                         
                    </ul>
        </div>
    </div>
</div>
</br>
</br>


@stop