@extends('admin.layout.layout')
@section('content')
<!-- page content -->
      <div class="right_col" role="main">

        <br />
  
         <div class="panel panel-dafault">
           <div class="panel-heading"> Edit Data Customer  </div>
             @if ($errors->any())
             <div class="flash alert-danger">
               @foreach($errors->all() as $error)
               <p>{{ $error}}</p>
               @endforeach
             </div>
              @endif  
 @include('flash::message')
        {!!Form::model($user, ['method'=>'PATCH','route'=>['listuser.update',$user->id], 'class'=>'form-horizontal', 'files'=>'true'] ) !!}
        <input type="hidden" name="id" value="{{ $user->id }}">
          <div class="form-group">
            {!!Form::label('name','Nama Customer',array('class' => 'col-md-4 control-label' ))  !!}
            <div class="col-md-6">
              {!! Form::text('name',null,array('class' => 'form-control'), '') !!}
            </div>
                 </div>

             <div class="form-group">
            {!!Form::label('username','Username',array('class' => 'col-md-4 control-label' ))  !!}
            <div class="col-md-6">
              {!! Form::text('username',null,array('class' => 'form-control'), '') !!}
            </div>
                 </div>
 
 <div class="form-group">
            {!!Form::label('email','Email',array('class' => 'col-md-4 control-label' ))  !!}
            <div class="col-md-6">
              {!! Form::text('email',null,array('class' => 'form-control'), '') !!}
            </div>
                 </div>           
               <div class="form-group">
            {!!Form::label('addres','Alamat',array('class' => 'col-md-4 control-label' ))  !!}
            <div class="col-md-6">
              {!! Form::text('addres',null,array('class' => 'form-control'), '') !!}
            </div>
                 </div>

                 

          <div class="form-group">
            {!!Form::label('city','Kota',array('class' => 'col-md-4 control-label' ))  !!}
            <div class="col-md-6">
              {!! Form::text('city',null,array('class' => 'form-control'), '') !!}
            </div>
                 </div>

            
          <div class="form-group">
            {!!Form::label('country','Negara',array('class' => 'col-md-4 control-label' ))  !!}
            <div class="col-md-6">
              {!! Form::text('country',null,array('class' => 'form-control'), '') !!}
            </div>
                 </div>

                     
              <div class="form-group">
            {!!Form::label('image','Photo User Account',array('class' => 'col-md-4 control-label' ))  !!}
            <div class="col-md-6">
              {!! Form::file('image',['class'=>'btn']) !!}
              {{Html::image('/img/user/'.$user->image,'', array('width' => '20%' ,'height'=>'30%' ))}}
              <p class="errors">{!!$errors->first('image') !!}</p>
              @if(Session::has('error'))
              <p class="errors">{!! Session::get('error') !!}</p>
              @endif
            </div>
                 </div> 
            
             <div class="form-group">
              <div class="col-md-6" col-md-offset-4>
              {!! Form::submit('Update Data Account ', ['class'=>'btn primary']) !!}
               <a href="{{url('/listuser')}}" class="btn btn-primary">Kembali</a>
            </div>
                {!! Form::close() !!}


         </div>
           

       
                  

@stop


