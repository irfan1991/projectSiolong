@extends('admin.layout.layout')
@section('content')
<!-- page content -->
      <div class="right_col" role="main">

        <br />
     <div class="panel panel-dafault">
           <div class="panel-heading"> Table Point</div>
                   <div class="col-md-4"></div>
           <div  class="col-md-4"></div>
           <div  class="col-md-4" > 
           {!! Form::open(array('url'=>'point/search')) !!}
{!! Form::text('keyword','',['class'=>'form-control','placeholder'=>'masukan nama']) !!}
{!! Form::submit('lakukan pencarian',['class'=>'btn btn-danger btn-sm']) !!}
{!! Form::close() !!}
</div>
<br>
<hr>
<hr>   <table class="table table-hover table-striped">
           @include('flash::message')
                      <tr>
                      <th>Nama Customer</th>
                      <th>Photo</th>
                      <th>Email</th>
                      <th>Barang Kepunyaan</th>
                      <th>Peminjaman</th>
                      <th>Jumlah Point</th>
                        
                      </tr>

                     @foreach ($member as $members)
                    <tr>
                      {!! Form::open(array('class'=>'form-inline')) !!}
                        <td>{{ $members->name}}</td>

  <td>{{Html::image('/img/user/'.$members->image,'',array('class'=>'thumbnail','widht'=>'70%' ))}}</td>
                       <td>{{ $members->email}}</td>

                        <td>{{ $members->barang->count()}}</td>
                        <td>{{ $members->borrowLogs()->borrowed()->count()}}</td>
                        <td>{{ $members->barang->count() + $members->borrowLogs()->borrowed()->count()}}</td>
                        {!! Form::close() !!}

                    </tr>
                        @endforeach
                    </table>

                
                 
                     
            </div>
            </div>      

@stop