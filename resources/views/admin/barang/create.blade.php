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
           <div class="panel-heading"> Tambah Barang  </div>
             @if ($errors->any())
             <div class="flash alert-danger">
               @foreach($errors->all() as $error)
               <p>{{ $error}}</p>
               @endforeach
             </div>
              @endif  
 @include('flash::message')
        {!!Form::model(new App\Barang, ['class'=>'form-horizontal','files'=>'true','route'=>['admin.barang.store']]) !!}
         <div class="form-group">
            
            <div class="col-md-6">
              {!! Form::hidden('id_user',Auth::user()->id,array('class' => 'form-control'), '') !!}
            </div>
                 </div>

          <div class="form-group">
            {!!Form::label('nama_barang','Nama Barang',array('class' => 'col-md-4 control-label' ))  !!}
            <div class="col-md-6">
              {!! Form::text('nama_barang',null,array('class' => 'form-control'), '') !!}
            </div>
                 </div>

             <div class="form-group">
            {!!Form::label('model',' Model Barang',array('class' => 'col-md-4 control-label' ))  !!}
            <div class="col-md-6">
              {!! Form::text('model',null,array('class' => 'form-control'), '') !!}
            </div>
                 </div>


                  <div class="form-group {!! $errors->has('price') ? 'has-error' : '' !!}">
              {!! Form::label('price', 'Harga',array('class' => 'col-md-4 control-label' ))  !!}
              <div class="col-md-6">
              {!! Form::number('price', null, ['class'=>'form-control']) !!}
              </div>
              {!! $errors->first('price', '<p class="help-block">:message</p>') !!}
            </div>


               <div class="form-group">
            {!!Form::label('deskripsi','Deskripsi Barang',array('class' => 'col-md-4 control-label' ))  !!}
            <div class="col-md-6">
              {!! Form::textarea('deskripsi',null,array('class' => 'form-control'), '') !!}
            </div>
                 </div>

                 <div class="form-group {!! $errors->has('category_lists') ? 'has-error' : '' !!}">
            
            {!! Form::label('category_lists', 'Categories',array('class' => 'col-md-4 control-label' )) !!}
            {{-- Simplify things, no need to implement ajax for now --}}
            <div class="col-md-6">
              {!! Form::select('category_lists[]', [''=>'']+App\Kategori::lists('title','id')->all(), null, 
            ['class'=>'form-control js-selectize','multiple']) !!}
            {!! $errors->first('category_lists', '<p class="help-block">:message</p>') !!}
            </div>
            </div>
             
              <div class="form-group">
            {!!Form::label('photo','Gambar Barang',array('class' => 'col-md-4 control-label' ))  !!}
            <div class="col-md-6">
              {!! Form::file('photo',['class'=>'btn']) !!}
              <p class="errors">{!!$errors->first('photo') !!}</p>
              @if(Session::has('error'))
              <p class="errors">{!! Session::get('error') !!}</p>
              @endif
            </div>
                 </div> 
            
             <div class="form-group">
              <div class="col-md-6" col-md-offset-4>
              {!! Form::submit('Simpan Produk', ['class'=>'btn primary']) !!}
            </div>
                {!! Form::close() !!}


         </div>
           

       
                  

@stop

