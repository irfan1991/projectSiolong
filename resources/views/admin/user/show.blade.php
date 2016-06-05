  @extends('admin.layout.layout')
@section('content')
<!-- page content -->
      <div class="right_col" role="main">

        <br />
<br/>

        <div class="container">
      <div class="row">
      <div class="col-md-6  toppad  pull-right col-md-offset-3 ">
            <br>

      </div>
      @include('flash::message')
   
          <div class="panel panel-info">
            <div class="panel-heading">
              <h3 class="panel-title">{{$user->name}}</h3>
            </div>
            <div class="panel-body">
              <div class="row">
                <div class="col-md-3 col-lg-3 " align="center"> <img src="{{ asset('/img/user/'.$user->image)}}" class="img-responsive"> </div>
                               
                <div class=" col-md-9 col-lg-9 "> 
                  <table class="table table-user-information">
                    <tbody>
                      <tr>
                        <td>Nama Customer</td>
                        <td>{{$user->name}}</td>
                      </tr>
                      <tr>
                        <td>Username</td>
                        <td>{{$user->username}}</td>
                      </tr>
                      <tr>
                        <td>Email</td>
                        <td>{{$user->email}}</td>
                      </tr>
                   
                                                <tr>
                        <td>Alamat</td>
                        <td>{{$user->addres}}</td>
                      </tr>

                      <tr>
                        <td>Kota</td>
                        <td>{{$user->city}}</td>
                      </tr>


                      <tr>
                        <td>Negara</td>
                        <td>{{$user->country}}</td>
                      </tr>



                      <tr>
                        <td>Kategori</td>
                        <td>@foreach ($user->barang as $barangs)
<span class="label label-primary">
<i class="fa fa-btn fa-tags"></i>
{{ $barangs->nama_barang }}</span>
@endforeach</td>
                      </tr>
                       
                           
                      </tr>
                     
                    </tbody>
                  </table>
                  
                  <a href="{{url('listuser')}}" class="btn btn-primary">Kembali</a>
                 
                </div>
              </div>
            
  
</div>

@endsection