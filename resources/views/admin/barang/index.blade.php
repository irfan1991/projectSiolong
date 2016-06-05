@extends('admin.layout.layout')
@section('content')
<!-- page content -->
      <div class="right_col" role="main">

        <br />
     <div class="panel panel-dafault">
            <h3>Table Barang<small><a href="{{ route('admin.barang.create') }}" class="btn btn-warning btn-sm">Tambah barang</a></small> </h3>
           <div class="col-md-4"></div>
           <div  class="col-md-4"></div>
           <div  class="col-md-4" > 
           {!! Form::open(array('url'=>'barang/search')) !!}
{!! Form::text('keyword','',['class'=>'form-control','placeholder'=>'masukan nama']) !!}{!! Form::submit(' lakukan pencarian',['class'=>'btn btn-danger btn-sm']) !!}
{!! Form::close() !!}
</div>
<br>
<hr>
<hr>
                  <table class="table table-hover table-striped">
                    @include('flash::message')
                      <tr>
                      <th>Nama Produk</th>
                      <th>Gambar</th>
                      <th>Model</th>
                      <th>Harga Barang</th>
                      <th>Deskripsi</th>
                      <th>Kategori</th>
                        <th>Edit</th>
                      <th>Delete</th>
                      <th>View</th>
                      </tr>

                    @foreach($barang as $barangs)
                    <tr>
         
                        <td>{{$barangs->nama_barang}}</td>
                        <td>{{Html::image('/img/barang/'.$barangs->photo,'', array('class'=>'thumbnail','widht'=>'70%' ))}}</td>
                        <td>{{$barangs->model}}</td>
                                                  <td><strong>Rp{{ number_format($barangs->price, 2) }}</strong></td>
                                               <td>{{$barangs->deskripsi}}</td>
                        <td>@foreach ($barangs->kategori as $category)
      <span class="label label-primary">
      <i class="fa fa-btn fa-tags"></i>
      {{ $category->title }}</span>
      @endforeach</td>
      <td>{!! link_to_route('admin.barang.edit','Edit',array($barangs->id),array('class'=>'btn btn-info ')) !!}</td>
 
      <td>{!! Form::model($barangs, ['route' => ['admin.barang.destroy', $barangs], 'method' => 'delete', 'class' => 'form-inline'] ) !!}
               
                  {!! Form::submit('delete', ['class'=>'btn  btn-danger js-submit-coba']) !!}
                {!! Form::close()!!}</td>

<td>{!! link_to_route('admin.barang.show','View',array($barangs->id),array('class'=>'btn btn-info ')) !!}</td>
                    </tr>
                        @endforeach
                    </table>

                  <p>{!! $barang->render() !!}</p>
                
                     
            </div>
            </div>      

@stop