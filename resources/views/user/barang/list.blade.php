@extends('template')
      @section('content')
</br>
</br>
</br>

      <hr>
<h2 class="text-center">YOUR PRODUCTS</h2>
<hr>
<div class="container" >
        <div class="row">
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
            <div class="col-md-12">
              <ul class="horizontal-slide">
                             @foreach(Auth::user()->barang as $brg)
                              <li class="col-md-2"> <div class="view">
                            <div class="caption">
                                <p></p>
                                <a href="{{URL::to('user/barang/'.$brg->id.'/edit')}}" rel="tooltip" title="Edit"><span class="fa fa-cogs fa-2x"></span></a>
                                <a href="{{URL::to('user/barang/'.$brg->id)}}" rel="tooltip" title="View"><span class="fa fa-search fa-2x"></span></a>
                                <a href="{{URL::to('user/barang/'.$brg->id.'/destroy')}}" rel="tooltip" title="Delete"><span class="fa fa-close fa-2x"></span></a>
                            </div><img class="thumbnail" src="{{ URL::to('/') }}/img/barang/{{$brg->photo}}" width="200" height="200"> </div>
<div class="info">
                            <p class="small" style="text-overflow: ellipsis"></p>
                <p class="small coral text-right"><i class="fa fa-clock-o"></i> {{$brg->nama_barang}}</p></small>
                        </div>
                            </li>&nbsp; &nbsp; &nbsp; &nbsp; 
 @endforeach
              </ul>
          
          </div>

               </div>

    </div>
</div>

<hr>
<hr>





      @endsection