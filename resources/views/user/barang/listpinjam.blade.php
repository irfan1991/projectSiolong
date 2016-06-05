@extends('template')
      @section('content')
</br>
</br>

<div class="container" >
        <div class="row">
       <h3 align="center">BARANG YANG SEDANG DIPINJAM</h3>
    <hr>
     @include('flash::message')
    @if ($borrowLogs->count() == 0)
Tidak ada buku dipinjam
@endif
            <div class="col-md-12">
              <ul class="horizontal-slide">
                            @foreach ($borrowLogs as $borrowLog)
      <div class="col-lg-4 col-sm-12 text-center"> <img class="img-circle"  style="width: 100px; height: 100px;" src="{{ URL::to('/') }}/img/barang/{{$borrowLog->barang->photo}}" data-holder-rendered="true">
        <h5>{{ $borrowLog->barang->nama_barang }}</h5>
              </div>
      @endforeach
                            </li>&nbsp; &nbsp; &nbsp; &nbsp; 

              </ul>
          
          </div>

               </div>

    </div>
</div>

<hr>
<hr>





      @endsection