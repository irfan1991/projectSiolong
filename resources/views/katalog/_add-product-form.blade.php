<p>
{!! Form::open(['url' => 'cart', 'method'=>'post', 'class'=>'form-inline']) !!}
{!! Form::hidden('barang_id', $barang->id) !!}
<p>
{!! Form::open(['url' => 'cart', 'method'=>'post', 'class'=>'form-inline']) !!}
{!! Form::hidden('product_id', $barang->id) !!}

</p>
{!! Form::submit('Tambah ke Daftar Peminjaman', ['class'=>'btn btn-primary']) !!}
{!! link_to_route('user.barang.show','Detail',array($barang->id),array('class'=>'btn btn-warning')) !!}</td>
{!! Form::close() !!}


</p>