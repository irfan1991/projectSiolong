@extends('admin.layout.layout')
@section('content')
<!-- page content -->
      <div class="right_col" role="main">

        <br />
     <div class="panel panel-dafault">
           <div class="panel-heading"> Table Barang  </div>
                       @include('flash::message')              
                    <table class="table table-hover table-striped">
                      <tr>
                      <th>Nama Produk</th>
                      <th>Gambar</th>
                      <th>Model</th>
                       <th>Harga Barang</th>
                        <th>Deskripsi</th>
                        <th>Edit</th>
                      <th>Delete</th>
                      </tr>

                    @foreach($barang as $barangs)
                    <tr>
                      {!! Form::open(array('class'=>'form-inline', 'method'=>'DELETE','route'=>array('admin.barang.destroy',$barangs->id ))) !!}
                        <td>{{$barangs->nama_barang}}</td>
                        <td>{{Html::image($barangs->photo,'', array('class'=>'thumbnail','widht'=>'70%' ))}}</td>
                        <td>{{$barangs->model}}</td>
                        <td>{{$barangs->price}}</td>
                       
                        <td>{{$barangs->deskripsi}}</td>
                      <td>{!! link_to_route('admin.barang.edit','Edit',array($barangs->id),array('class'=>'btn btn-warning')) !!}</td>
                        <td>{!! Form::submit('Delete',array('class' => 'btn btn-danger' ))!!}</td>
                        {!! Form::close() !!}

                    </tr>
                        @endforeach
                    </table>

                  <p>{!! $barang->render() !!}</p>
                  <p>{!! link_to_route('admin.barang.create','Tambah Barang') !!}</p>
                     
            </div>
            </div>      

@stop