@extends('admin.layout.layout')
@section('content')
<!-- page content -->
      <div class="right_col" role="main">

        <br />
     <div class="panel panel-dafault">
              <h3>Table Barang<small><a href="{{ route('admin.barang.create') }}" class="btn btn-warning btn-sm">Tambah barang</a></small> </h3>
             <p class="errors">{!!$errors->first('keyword') !!}</p>
              @if(Session::has('error'))
              <p class="errors">{!! Session::get('error') !!}</p>
              @endif
           <div class="col-md-4"></div>
           <div  class="col-md-4"></div>
           <div  class="col-md-4" > 
           {!! Form::open(array('url'=>'barang/search')) !!}
{!! Form::text('keyword','',['class'=>'form-control','placeholder'=>'masukan nama']) !!}
{!! Form::submit('lakukan pencarian',['class'=>'btn btn-danger btn-sm']) !!}
{!! Form::close() !!}
</div>
<br>
<hr>
<hr>

        @include('flash::message')
               <h1 align="center">:(</h1>
<p align="center">Masukkan data di kolom pencarian</p>

<p align="center"><a href="{{ url('admin/barang') }}">Lihat semua data <i class="fa fa-arrow-left"></i></a></p>
                 
                 
                     
            </div>
            </div>      

@stop