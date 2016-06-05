@extends('admin.layout.layout')

</div>
</div>

@section('content')
<!-- page content -->
      <div class="right_col" role="main">

        <br />
        @if (session()->has('flash_notification.message'))
        @endif
<div class="container">

<hr>
     <div class="panel panel-dafault">
         <h3>Table Kategori <small><a href="{{ route('kategori.create') }}" class="btn btn-warning 
         btn-sm"> Tambah Kategori</a></small> </h3>
          <div class="col-md-4"></div>
           <div  class="col-md-4"></div>
           <div  class="col-md-4" > 
             {!! Form::open(array('url'=>'kategori/search')) !!}
{!! Form::text('keyword','',['class'=>'form-control','placeholder'=>'masukan title']) !!}
{!! Form::submit('lakukan pencarian',['class'=>'btn btn-danger btn-sm']) !!}
{!! Form::close() !!}
</div>
<br>
<hr>
<hr>
 
       
                    <table class="table table-hover table-striped">
                    @include('flash::message')
                      <tr>
                      <th>Title</th>
                      <th>Parent</th>
                      
                        <th>Edit</th>
                      <th>Delete</th>
                     
                      </tr>

                    @foreach($kategori as $kategoris)
                    <tr>
                      
                        <td>{{$kategoris->title}}</td>
                        <td>{{$kategoris->parent ? $kategoris->parent->title : ''}}</td>
                    <td>{!! link_to_route('kategori.edit','Edit',array($kategoris->id),array('class'=>'btn btn-warning')) !!}</td>
                         <td>
      {!! Form::model($kategoris, ['route' => ['kategori.destroy', $kategoris->id], 'method' => 'delete', 'class' => 'form-inline'] ) !!}
               
                  {!! Form::submit('delete', ['class'=>'btn  btn-danger js-submit-coba']) !!}
                {!! Form::close()!!}</td>
                    </tr>
                        @endforeach
                    </table>
{{ $kategori->appends(compact('keyword'))->links() }}
                
                  
            </div>      

@stop 