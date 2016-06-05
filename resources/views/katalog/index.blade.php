 @extends('template')
      @section('content')
 @include('flash::message')
<div class="container ">
    <div class="row">
      <div class="col-lg-4 col-sm-12 text-center"> <img class="img-circle"  style="width: 70px; height: 70px;" src="img/murah.png" data-holder-rendered="true">
        <h5>MURAH</h5>
        
      </div>
      <div class="col-lg-4 col-sm-12 text-center"><img class="img-circle"  style="width: 70px; height: 70px;" src="img/aman.png" data-holder-rendered="true">
        <h5>AMAN</h5>
       
      </div>
      <div class="col-lg-4 col-sm-12 text-center"><img class="img-circle" alt="140x140" style="width: 70px; height: 70px;" src="img/terpercaya.png" data-holder-rendered="true">
         <h5>TERPERCAYA</h5>
        
      </div>
      </div>
      </div>
      
      <hr>

    

<div class="container">
<div class="row">
<div class="col-md-3">

@include('katalog._search-panel', ['q' => isset($q) ? $q : null,'cat' => isset($cat) ? $cat : ''])

@include('katalog._category-panel')

@if (isset($kategori) && $kategori->hasChild())
@include('katalog._sub-category-panel', ['current_category' => $kategori])
@endif
@if (isset($katagori) && $kategori->hasParent())
@include('katalog._sub-category-panel', ['current_category' => $kategori->parent])
@endif


</div>
<div class="col-md-9">
<div class="row">
<div class="col-md-12">
@include('katalog._breadcrumb', ['current_category' => isset($kategori) ? $kategori : null])
</div>

	@forelse ($barangs as $barang)
	<div class="col-md-6">
@include('katalog._product-thumbnail', ['barang' => $barang])
	</div>

@empty
	<div class="col-md-12 text-center">
@if (isset($q))
	<h1>:(</h1>
	<p>Produk yang kamu cari tidak ditemukan.</p>
@if (isset($kategori))
	<p><a href="{{ url('/catalogs?q=' . $q) }}">Cari di semua kategori <i class="fa fa-arrow-right"></i></a></p>
@endif
@else
	<h1>:|</h1>
	<p>Belum ada produk untuk kategori ini.</p>
@endif
	<p><a href="{{ url('/catalogs') }}">Lihat semua produk <i class="fa fa-arrow-right"></i></a></p>
</div>
@endforelse

<div class="pull-right">
{!! $barangs->appends(compact('cat', 'q','sort','order'))->links() !!}
</div>
</div>
</div>

</div>
</div>

</div>
</div>
@endsection