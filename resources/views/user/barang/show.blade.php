 @extends('template')
      @section('content')
      <hr>
      <hr>
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
              <h3 class="panel-title">{{$barang->nama_barang}}</h3>
            </div>
            
            <div class="panel-body">
              <div class="row">
                <div class="col-md-3 col-lg-3 " align="center"> <img src="{{ asset('/img/barang/'.$barang->photo)}}" class="img-responsive"> </div>
                               
                <div class=" col-md-9 col-lg-9 "> 
                  <table class="table table-user-information">
                    <tbody>
                      <tr>
                        <td>Nama Barang</td>
                        <td>{{$barang->nama_barang}}</td>
                      </tr>
                      <tr>
                        <td>Model</td>
                        <td>{{$barang->model}}</td>
                      </tr>
                      <tr>
                        <td>Harga Barang</td>
                        <td>{{$barang->price}}</td>
                      </tr>
                                         
                         <tr>
                        <td>Harga Jaminan</td>
                        <td>{{$barang->price/2}}</td>
                      </tr>
                            
                  

                                          <tr>
                        <td>Deskripsi</td>
                        <td>{{$barang->deskripsi}}</td>
                      </tr>
                   
                         <tr>
                             <tr>
                        <td>Kategori</td>
                        <td>@foreach ($barang->kategori as $category)
<span class="label label-primary">
<i class="fa fa-btn fa-tags"></i>
{{ $category->title }}</span>
@endforeach</td>
                      </tr>
                        <tr>
                        <td>Nama Pemilik</td>
                        <td>{{$barang->user->name}}</td>
                      </tr>
                      <tr>
                        <td>Email Pemilik</td>
                        <td>{{$barang->user->email}}</td>
                      </tr>
                      
                           
                     
                    </tbody>
                  </table>
                  
                  <a href="{{url('/listpro')}}" class="btn btn-primary">Kembali</a>&nbsp; &nbsp; &nbsp; &nbsp; 
                   <a class="btn btn-primary" href="{{route('user.barang.borrow', $barang->id)}}">Pinjam</a>
                </div>
              </div>
        </div>    
  </div>
</div>
</div>

@endsection