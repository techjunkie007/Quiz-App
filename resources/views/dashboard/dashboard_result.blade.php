
@extends('master.master')

@section('title','Quiz App | Result' )

<script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <script type="text/javascript">
      google.load("visualization", "1", {packages:["corechart"]});
      google.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Analysis', 'Marks'],
          ['Correct',   {{ $result['correct']}} ],
          ['Incorrect',  {{ $result['total_questions']-$result['correct']}}]
        ]);

        var options = {
          title: 'Your Quiz Result',
          is3D: true,
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
        chart.draw(data, options);
      }
    </script>

@section('content') 
    <div class="jumbotron">
      <center><h1>Quiz Result</h1></center>
  </div> 
    <div id="piechart_3d" style="width: 900px; height: 500px;"></div>
@endsection