
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>
<!-- Page -->
<div class="page">
    <div class="page-header">
        <h1 class="page-title">Dashboard</h1>
    </div>
    <div class="page-content container-fluid">
        <div class="row">
            <div class="col-lg-4 col-xl-4">
                <h4 class="example-title">Admission Success rate</h4>
                <div class="example text-center max-width">
                    <canvas id="exampleChartjsPie" height="250"></canvas>
                </div>
            </div>
            <div class="col-lg-4 col-xl-4">
                <h4 class="example-title">Enquiries Received</h4>
                <div class="example text-center">
                  <canvas id="exampleChartjsBar" height="300" width="450"></canvas>
                </div>
            </div>
            <div class="col-lg-4 col-xl-4">
                <h4 class="example-title">Customer Conversions</h4>
                <div class="example text-center">
                  <canvas id="exampleChartjsBar" height="300" width="450"></canvas>
                </div>
            </div>
                
        </div>
    </div>
</div>
<!-- End Page -->

<script type="text/javascript">
$(document).ready(function($) {
    data = {
        datasets: [{
            data: [10, 20, 30],
            backgroundColor: [
                      "#ff7f7f", 
                      "#ffff7f", 
                      "#6666ff", 
                 ]  
        }],

        // These labels appear in the legend and in the tooltips when hovering different arcs
        labels: [
            'Conversions',
            'Customer',
            'Enquiries'
        ]
    };
    var myPieChart = new Chart(document.getElementById("exampleChartjsPie").getContext("2d"),{
        type: 'pie',
        data: data,
        options: {
            responsive: true
        }
    });




    var barChartData = {
        labels: ["January", "February", "March", "April", "May", "June", "July"],
        datasets: [{
            label: "Enquiries",
            backgroundColor: "#ffd27f",
            hoverBackgroundColor: "#ffae19",
            borderWidth: 2,
            data: [65, 45, 75, 50, 60, 45, 55]
        }, {
            label: "Customers",
            backgroundColor: "#7facff",
            hoverBackgroundColor: "#196aff",
            borderWidth: 2,
            data: [30, 20, 40, 25, 45, 35, 40]
        }]
    };
    var myBar = new Chart(document.getElementById("exampleChartjsBar").getContext("2d"), {
      type: 'bar',
      data: barChartData,
      options: {
        responsive: true,
        scales: {
          xAxes: [{
            display: true
          }],
          yAxes: [{
            display: true
          }]
        }
      }
    });





});
</script>