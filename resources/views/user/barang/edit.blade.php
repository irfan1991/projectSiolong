@extends('template')
      @section('content')

<hr>
<hr>
      <div class="right_col" role="main">

        <br />
  
         <div class="panel panel-dafault" >
          <div class="col-md-6" align="center">
           <h3>Edit  Barang </h3> 
           </div>
            @include('flash::message')
             @if ($errors->any())
             <div class="flash alert-danger">
               @foreach($errors->all() as $error)
               <p>{{ $error}}</p>
               @endforeach
             </div>
              @endif  
              <hr>
            <hr>
        {!!Form::model($barang, ['method'=>'PATCH','route'=>['user.barang.update',$barang->id], 'class'=>'form-horizontal', 'files'=>'true'] ) !!}
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
              {{Html::image('/img/barang/'.$barang->photo,'', array('width' => '20%' ,'height'=>'30%' ))}}
              <p class="errors">{!!$errors->first('photo') !!}</p>
              @if(Session::has('error'))
              <p class="errors">{!! Session::get('error') !!}</p>
              @endif
            </div>
                 </div> 
            
             <div class="form-group">
             <div class="col-md-6" align="center">
              {!! Form::submit('Update Produk', ['class'=>'btn primary']) !!}
              
            </div>
            </div>
            </div>
                {!! Form::close() !!}


         
           

       
       </div>

                  

@stop


