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
                           <h4>Statistik Meminjamkan Barang</h4>
              
              <canvas id="chart1" width="10" height="10"></canvas>
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
              label: 'Frekuensi Meminjamkan',
              backgroundColor: "rgba(255,99,132,0.2)",
            borderColor: "rgba(255,99,132,1)",
            borderWidth: 1,
            hoverBackgroundColor: "rgba(255,99,132,0.4)",
            hoverBorderColor: "rgba(255,99,132,1)",
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

   var ctx = document.getElementById("chart1").getContext("2d");
    //var myLineChart= new Chart(ctx).Bar(data); 
var myBarChart = new Chart(ctx, {
    type: 'bar',
    data: data,
    //options: options
});

    

    </script>
@endsection