@extends('admin.layout.layout')
@section('content')

<!-- page content -->
      <div class="right_col" role="main">

        <br />
        <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="panel panel-default">
          <div class="panel-heading">
            <h2 class="panel-title">Dashboard</h2>
          </div>

          <div class="panel-body">
              Selamat datang di Menu Administrasi SiOlong. Silahkan pilih menu administrasi yang diinginkan.
              <hr>
              <h4>Statistik Pengguna</h4>
              <canvas id="chartPengguna" width="400" height="400"></canvas>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection

@section('scripts')
    
   <script src="{{ asset('js/Chart.min.js') }}"></script>
 <script>
    var data = {
        labels: {!! json_encode($users) !!},
        datasets: [
            {
                fillColor: "rgba(151,187,205,0.5)",
                strokeColor: "rgba(151,187,205,0.8)",
                pointColor: "rgba(220,220,220,1)",
                pointStrokeColor: "#fff",
                pointHighlightFill: "#fff",
                pointHighlightStroke: "rgba(220,220,220,1)",
                highlightFill: "rgba(151,187,205,0.75)",
                highlightStroke: "rgba(151,187,205,1)",
                data: {!! json_encode($barangs) !!}
            }
        ]
    };

    var ctx = document.getElementById("chartPengguna")getContext("2d");
    var myLineChart = new Chart(ctx).Bar(data);

    </script>
@endsection
