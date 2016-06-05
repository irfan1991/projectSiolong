@extends('admin.layout.layout')
@section('content')
<!-- page content -->
      <div class="right_col" role="main">

        <br />
     <div class="panel panel-dafault">
           <div class="panel-heading"> Table Peminjam  </div>
        <div class="col-md-4"></div>
           <div  class="col-md-4"></div>
           <div  class="col-md-4" > 
           {!! Form::open(array('url'=>'pinjam/search')) !!}
{!! Form::text('keyword','',['class'=>'form-control','placeholder'=>'masukan nama']) !!}
{!! Form::submit('lakukan pencarian',['class'=>'btn btn-danger btn-sm']) !!}
{!! Form::close() !!}
</div>
<br>
<hr>
<hr>

         <table class="table table-hover table-striped">
           @include('flash::message')
                      <tr>
                      <th>Nama Barang</th>
                      <th>Photo</th>
                      
                      <th>Dipinjam oleh</th>
                      <th>Status</th>
                      <th>Kirim Pesan ke Peminjam</th>
                     <th>Tanggal Peminjaman</th>
                     <th>Tanggal Pengembalian</th>
                        </tr>

                     @foreach ($member as $members)
                    <tr>
                      {!! Form::open(array('class'=>'form-inline')) !!}
                        <td>{{ $members->nama_barang}}</td>

  <td>{{Html::image('/img/barang/'.$members->photo,'',array('class'=>'thumbnail','widht'=>'70%' ))}}</td>
                     
                        <td>{{$members->name}}</td>
                        @if($members->is_returned==0)

                          <td>{{'Sedang Dipinjam'}}</td>
                        @else
                            <td>{{'Sudah Dikembalikan'}}</td>
                            @endif
                <td>{!! link_to_route('contact','Kirim Email',array($members->id),array('class'=>'btn btn-xs  btn-info')) !!}</td>
                <td>{{$members->created_at}}</td>
              @if($members->is_returned==0)

                          <td>{{'Sedang Dipinjam'}}</td>
                        @else
                            <td>{{$members->updated_at}}</td>
                            @endif
                        {!! Form::close() !!}

                    </tr>
                        @endforeach
                    </table>

                
                 
                      <p>{!! $member->render() !!}</p>
            </div>
            </div>      

@stop