@extends('admin.layout.layout')
@section('content')
<!-- page content -->
<div class="flash-message">
    @foreach (['danger', 'warning', 'success', 'info'] as $msg)
      @if(Session::has('alert-' . $msg))

      <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
      @endif
    @endforeach
  </div> <!-- end .flash-message -->

      <div class="right_col" role="main">

        <br />
  
         <div class="panel panel-dafault">
           <div class="panel-heading"> Tambah Kategori </div>
             @if ($errors->any())
             <div class="flash alert-danger">
               @foreach($errors->all() as $error)
               <p>{{ $error}}</p>
               @endforeach
             </div>
              @endif  
 @include('flash::message')
        {!!Form::model(new App\Kategori, ['class'=>'form-horizontal','files'=>'true','route'=>['kategori.store']]) !!}
         <div class="form-group {!! $errors->has('title') ? 'has-error' : '' !!}">
{!! Form::label('title', 'Title') !!}
{!! Form::text('title', null, ['class'=>'form-control']) !!}
{!! $errors->first('title', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {!! $errors->has('parent_id') ? 'has-error' : '' !!}">
{!! Form::label('parent_id', 'Parent') !!}
{!! Form::select('parent_id', [''=>'']+App\Kategori::lists('title','id')->all(), null, ['class'=>'form-control']) !!}
{!! $errors->first('parent_id', '<p class="help-block">:message</p>') !!}
</div>

           
            
             <div class="form-group">
              <div class="col-md-6" col-md-offset-4>
              {!! Form::submit('Simpan Kategori', ['class'=>'btn primary']) !!}
            </div>
                {!! Form::close() !!}


         </div>
           

       
                  

@stop


