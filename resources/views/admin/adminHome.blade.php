@extends('layouts.admin-app')

@section('content')
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
<script src="https://cdn.plot.ly/plotly-latest.min.js"></script>
    
    <div class="row">
        <div class="col-md-6">
            <h4>Leads Scale</h4>
            <canvas id="myChart" style="width:100%;max-width:100%"></canvas>
        </div>
        <div class="col-md-6 msy-5">
            <div id="myPlot" style="width:100%;max-width:100%"></div>
           
        </div>
    </div>
    <div class="row">
        <div class="col-md-3">
            <div class="card shadow-hover dashboard-card mb-3">
                <div class="card-header">New Lead</div>
                <div class="card-body text-dark">
                    <i class="fa fa-users float-end fa-2x text-secondary"></i>
                    <h5 class="card-title">125</h5>
                    <a href="" class="card-link">view</a>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card shadow-hover dashboard-card mb-3">
                <div class="card-body text-dark">
                    <div class="card-header">Active Lead</div>
                    <i class="fa fa-users float-end fa-2x text-secondary"></i>
                    <h5 class="card-title">25</h5>
                    <a href="" class="card-link">view</a>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card shadow-hover dashboard-card mb-3">
                <div class="card-header">Total Lead</div>
                <div class="card-body text-dark">
                    <i class="fa fa-users float-end fa-2x text-secondary"></i>
                    <h5 class="card-title">225</h5>
                    <a href="" class="card-link">view</a>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card shadow-hover dashboard-card mb-3">
                <div class="card-header">Total Mail</div>
                <div class="card-body text-dark">
                    <i class="fa fa-users float-end fa-2x text-secondary"></i>
                    <h5 class="card-title">25</h5>
                    <a href="" class="card-link">view</a>
                </div>
            </div>
        </div>
    </div>
    <script>
        var xValues = [50,60,70,80,90,100,110,120,130,140,150];
        var yValues = [7,8,8,9,9,9,10,11,14,14,15];
    
        new Chart("myChart", {
        type: "line",
        data: {
            labels: xValues,
            datasets: [{
            fill: false,
            lineTension: 0,
            backgroundColor: "rgba(0,0,255,1.0)",
            borderColor: "rgba(0,0,255,0.1)",
            data: yValues
            }]
        },
        options: {
            legend: {display: false},
            scales: {
            yAxes: [{ticks: {min: 6, max:16}}],
            }
        }
        });
        </script>
        <style>
            .card-title {
                font-weight: bold;
                font-size: 20px
            }
        </style>
        <script>
            var xArray = ["JAN", "FEB", "MARCH", "APRL", "MAY"];
            var yArray = [55, 49, 44, 24, 15];
            
            var data = [{
              x:xArray,
              y:yArray,
              type:"bar"
            }];
            
            var layout = {title:"Active leads"};
            
            Plotly.newPlot("myPlot", data, layout);
            </script>
@endsection
