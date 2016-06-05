@extends('template')
@section('content')
<!-- page content -->
</br>
  </br>
  </br>
  </br>
  </br>    
  <div class="container-fluid">
  <div class="row">
  <div class="col-md-8 col-md-offset-2">
         <div class="panel panel-dafault">
           <div class="panel-heading" align="center"> Tambah Barang Pinjaman Milik {{Auth::user()->name}} </div>
             @include('flash::message')
             @if ($errors->any())
             <div class="flash alert-danger">
               @foreach($errors->all() as $error)
               <p>{{ $error}}</p>
               @endforeach
             </div>
              @endif  
            <div class="flash alert-info">
              @if(session('message'))
              {{session('message')}}
            @endif
             </div>

        {!!Form::model(new App\Barang, ['class'=>'form-horizontal','files'=>'true','route'=>['user.barang.store']]) !!}
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
              {!! Form::submit('Simpan Produk', ['class'=>'btn btn-xs btn-danger js-submit-confirm']) !!}
            </div>
                {!! Form::close() !!}


         </div>
          
           
</div>
</div>
</div>
</div>

       
                  

@stop


