@extends('admin.layout.layout')
@section('content')
<!-- page content -->
      <div class="right_col" role="main">

        <br />
  @if (session()->has('flash_notification.message'))
<div class="container">
<div class="alert alert-{{ session()->get('flash_notification.level') }}">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
{{ session()->get('flash_notification.message') }}
@endif
<hr>
         <div class="panel panel-dafault">
           <div class="panel-heading"> Edit Kategori  </div>
             @if ($errors->any())
             <div class="flash alert-danger">
               @foreach($errors->all() as $error)
               <p>{{ $error}}</p>
               @endforeach
             </div>
              @endif  
 @include('flash::message')
        {!!Form::model($kategori, ['method'=>'PATCH','route'=>['kategori.update',$kategori->id], 'class'=>'form-horizontal', 'files'=>'true'] ) !!}
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
              {!! Form::submit('Update Kategori', ['class'=>'btn primary']) !!}
            </div>

        {!! Form::close() !!}
 
                  
         </div>
           

        

@stop


