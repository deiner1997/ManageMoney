@extends('layouts.main')
@section('content')
    @include('partials.status-panel')
<html>
  <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js">
    </script>

    <script type="text/javascript">

      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
               var data = google.visualization.arrayToDataTable([
          ['Transacciones', 'Categoria'],

  @foreach ($consulta as $pastel)
         ['{{ $pastel->categoria_id }}', {{ $pastel->usuario_id }}],  
  @endforeach
        ]);

         var options = {
          title: 'Sus fuentes de ingreso y sus gastos'
        };
        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        // The select handler. Call the chart's getSelection() method
  function selectHandler() {
    var selectedItem = chart.getSelection()[0];
    if (selectedItem) {
      var value = data.getValue(selectedItem.row, selectedItem.column);
      alert('Seleccionó ' + value);
    }
      }
google.visualization.events.addListener(chart, 'select', selectHandler);
chart.draw(data, options);
    }
      
    </script>
  </head>
  <body>

    <div id="piechart" style="width: 900px; height: 500px;">
      
    </div>
  
  </body>
</html>
@stop