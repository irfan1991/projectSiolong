<h3>{{ $barang->nama_barang }}</h3>
<div class="thumbnail">
<img class="img-rounded"  style="width: 500px; height: 500px;" src="{{ $barang->photo_path }}" >


<p>Model: {{ $barang->model }}</p>

<p>Harga Uang Jaminan: <strong>Rp{{ number_format($barang->price/2, 2) }}</strong></p>


<p>Category:
@foreach ($barang->kategori as $category)
<span class="label label-primary">
<i class="fa fa-btn fa-tags"></i>
{{ $category->title }}</span>
@endforeach
</p>
 @include('katalog._customer-feature', ['partial_view'=>'katalog._add-product-form', 'data' => compact('barang')])

</div>
