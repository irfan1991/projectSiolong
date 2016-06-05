@extends('template')
@section('content')

<div class="container">
  @if ($cart->isEmpty())
    <div class="text-center">
      <h1>:|</h1>
      <p>Cart kamu masih kosong.</p>
      <p><a href="{{ url('/catalogs') }}">Lihat semua produk <i class="fa fa-arrow-right"></i></a></p>
    </div>
  @else
    <table class="cart table table-hover table-condensed">
      <thead>
        <tr>
          <th style="width:50%">Produk</th>
          <th style="width:10%">Harga Barang</th>
          
          <th style="width:22%" class="text-center">Harga Jaminan</th>
          <th style="width:10%"></th>
        </tr>
      </thead>
      <tbody>
        @foreach($cart->details() as $order)
        <tr>
          <td data-th="Barang">
            <div class="row">

              <div class="col-sm-2 hidden-xs"><img src="{{ URL::to('/') }}/img/barang/{{ $order['detail']['photo'] }}" alt="..." class="img-responsive" width="200" height="200"/></div>
              <div class="col-sm-10">
                <h4 class="nomargin">{{ $order['detail']['nama_barang'] }}</h4>
              </div>
            </div>
          </td>
          <td data-th="Harga">Rp{{ number_format($order['detail']['price']) }}</td>
         
          <td data-th="Subtotal" class="text-center">Rp{{ number_format($order['subtotal'] ) }}</td>
          <td class="actions" data-th="">
            

            {!! Form::open(['url' => ['cart', $order['id']], 'method'=>'delete', 'class' => 'form-inline']) !!}
            {!! Form::button('Melakukan Pembayaran', array('type' => 'submit', 'class' => 'btn btn-info btn-sm js-submit-confirm', 'data-confirm-message' => 'Kamu akan pembayaran uang Jaminan ' . $order['detail']['nama_barang'] . ' dari cart.')) !!}
            {!! Form::close() !!}
          </td>
        </tr>
        @endforeach
      </tbody>
      <tfoot>
        
        <tr>
          <td><a href="{{ url('/catalogs') }}" class="btn btn-warning"><i class="fa fa-angle-left"></i>Pinjam  lagi</a></td>
          <td colspan="2" class="hidden-xs"></td>
          
         
        </tr>
      </tfoot>
    </table>
  @endif

</div>
@endsection
