@extends('admin.layout.layout')
@section('content')
<!-- page content -->
      <div class="right_col" role="main">

        <br />
     <div class="panel panel-dafault">
            <h3>Table Customer</h3>
             <p class="errors">{!!$errors->first('keyword') !!}</p>
              @if(Session::has('error'))
              <p class="errors">{!! Session::get('error') !!}</p>
              @endif
           <div class="col-md-4"></div>
           <div  class="col-md-4"></div>
           <div  class="col-md-4" > 
           {!! Form::open(array('url'=>'user/search')) !!}
{!! Form::text('keyword','',['class'=>'form-control','placeholder'=>'masukan nama']) !!}
{!! Form::submit('lakukan pencarian',['class'=>'btn btn-danger btn-sm']) !!}
{!! Form::close() !!}
</div>
<br>
<hr>
<hr>

        @include('flash::message')
         
                    <table class="table table-hover table-striped" width="100">
                      <tr>
                      <th>Nama Customer </th>
                      <th>Photo</th>
                      <th>Username</th>
                      <th>Email</th>
                      <th>Adress</th>
                       <th>City</th>
                        <th>Country</th>
                         <th>Detail Peminjaman</th>
                        <th>Kirim Pesan</th>
                        <th>Edit</th>
                      <th>Delete</th>
                      <th>View</th>
                      </tr>

                   @foreach($user as $users)
        
                    <tr>
                                              <td>{{$users->name}}</td>
                      <td>{{Html::image('/img/user/'.$users->image,'', array('class'=>'image','widht'=>'30','height'=>'30' ))}}</td>
                        <td>{{$users->username}}</td>
                        <td>{{$users->email}}</td>
                        <td>{{$users->addres}}</td>
                        <td>{{$users->city}}</td>
                          <td>{{$users->country}}</td>
                           <td><a href="{{ route('admin.peminjaman.show', $users->id) }}">Lihat detail Peminjaman</a></td>
                <td>{!! link_to_route('contact','Kirim Email',array($users->id),array('class'=>'btn btn-xs btn-info')) !!}</td>
                        <td>{!! link_to_route('listuser.edit','Edit',array($users->id),array('class'=>'btn btn-warning')) !!}</td>

                        <td>{!! Form::model($users, ['route' => ['listuser.destroy', $users->id], 'method' => 'delete', 'class' => 'form-inline'] ) !!}
               
                  {!! Form::submit('delete', ['class'=>'btn  btn-danger js-submit-coba']) !!}
                {!! Form::close()!!}</td>
                        <td>{!! link_to_route('listuser.show','View',array($users->id),array('class'=>'btn btn-xs btn-info')) !!}</td>
                        
                    </tr>
                        @endforeach

                    </table>

                 <p>{!! $user->render() !!}</p>
                     
            </div>
            </div>      

@stop