$(document).ready(function () {

    "use strict"; // Start of use strict

    //Card table
    $('.card-table').DataTable({
        "bPaginate": false,
        "bFilter": false,
        "bInfo": false
    });

    //Tooltip
    $('[data-toggle="tooltip"]').tooltip();

    //Sparklines Charts
    $(".sparkline1").sparkline([34, 43, 43, 35, 44, 32, 44, 52, 25], {
        type: 'line',
        lineColor: '#37a000',
        fillColor: '#37a000',
        width: '150',
        height: '20'
    });
    $(".sparkline2").sparkline([5, 6, 7, 2, 0, -4, -2, 4, 5, 6, 3, 2, 4, -6, -5, -4, 6, 5, 4, 3], {
        type: 'bar',
        barColor: '#37a000',
        negBarColor: '#c6c6c6',
        width: '150',
        height: '20'
    });
    $(".sparkline3").sparkline([10, 2], {
        type: 'pie',
        sliceColors: ['#37a000', '#ffffff'],
        width: '150',
        height: '20'
    });
    $(".sparkline4").sparkline([34, 43, 43, 35, 44, 32, 15, 22, 46, 33, 86, 54, 73, 53, 12, 53, 23, 65, 23, 63, 53, 42, 34, 56, 76, 15, 54, 23, 44], {
        type: 'line',
        lineColor: '#37a000',
        fillColor: '#37a000',
        width: '150',
        height: '20'
    });
    $(".sparkline5").sparkline([1, 1, 0, 1, -1, -1, 1, -1, 0, 0, 1, 1], {
        type: 'tristate',
        posBarColor: '#37a000',
        negBarColor: '#ffffff',
        width: '150',
        height: '20'
    });
    $(".sparkline6").sparkline([4, 6, 7, 7, 4, 3, 2, 1, 4, 4, 5, 6, 3, 4, 5, 8, 7, 6, 9, 3, 2, 4, 1, 5, 6, 4, 3, 7], {
        type: 'discrete',
        lineColor: '#37a000',
        width: '150',
        height: '20'
    });

    });

$( document ).ready(function() {
        "use strict";
var  dismodl       = $('#is_modal_shown').val();
var  stockqt       = $('#stpcount').val();
var base_url       = $('#base_url').val();
var today          = new Date();
var dd             = today.getDate();
var mm             = today.getMonth()+1;
var yyyy           = today.getFullYear();


if(dd<10) {
    dd = '0'+dd
} 

if(mm<10) {
    mm = '0'+mm
} 
today = yyyy + '-' + mm + '-' + dd;

 var  expdate=$('#expdate').val();
 var is_modal_shown = 1;
 var CSRF_TOKEN = $('[name="csrf_test_name"]').val();
 if (dismodl == '' && stockqt > 0 || dismodl == '' && new Date(expdate) < new Date(today)){

     
        $('#stockmodal').modal('show');   
   
      $.ajax
       ({ 
            type: "POST",
            url: base_url + '/dashboard/modaldisplay',
            data: {is_modal_shown:is_modal_shown,app_csrf:CSRF_TOKEN},
            cache: false,
            success: function(data)
            {
            } 
        });
     }
     });


$(document).ready(function () {
    "use strict"; // Start of use strict
    var bestslabel    = $("#bestsalelabel").val();
    var splitbslabel  = bestslabel.substring(0, bestslabel.length - 1);
    var bestsalelabel = splitbslabel.split(",");

    var bestsdata    = $("#bestsaledata").val();
    var splitbsdata  = bestsdata.substring(0, bestsdata.length - 1);
    var bestsaledata = splitbsdata.split(",");


    
    var ctx = document.getElementById("bestSalechart").getContext('2d');
    var config = {
        type: 'bar',
        data: {
            labels: bestsalelabel,
            datasets: [{
                    type: 'bar',
                    label: "Sold Qty",
                    backgroundColor: "rgba(55, 160, 0, .1)",
                    borderColor: "rgba(55, 160, 0, .4)",
                    data: bestsaledata
                }]
        },
        options: {
            legend: false,
            scales: {
                yAxes: [{
                        gridLines: {
                            color: "#e6e6e6",
                            zeroLineColor: "#e6e6e6",
                            borderDash: [2],
                            borderDashOffset: [2],
                            drawBorder: false,
                            drawTicks: false
                        },
                        ticks: {
                            padding: 10
                        }
                    }],

                xAxes: [{
                        maxBarThickness: 50,
                        gridLines: {
                            lineWidth: [0]
                        },
                        ticks: {
                            padding: 10,
                            fontSize: 14,
                            fontFamily: "'Nunito Sans', sans-serif"
                        }
                    }]
            }
        }
    };
    var forecast_chart = new Chart(ctx, config);
    $("#0").on("click", function () {
        var data = forecast_chart.config.data;
        data.datasets[0].data = temp_dataset;
        data.datasets[1].data = rain_dataset;
        data.labels = chart_labels;
        forecast_chart.update();
    });
    $("#1").on("click", function () {
        var chart_labels = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];
        var temp_dataset = [0, 15, 5, 30, 10, 20, 10, 15, 10, 30, 25, 10];
        var rain_dataset = [20, 25, 30, 35, 27, 23, 18, 26, 28, 26, 20, 32];
        var data = forecast_chart.config.data;
        data.datasets[0].data = temp_dataset;
        data.datasets[1].data = rain_dataset;
        data.labels = chart_labels;
        forecast_chart.update();
    });
    $("#2").on("click", function () {
        var chart_labels = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];
        var temp_dataset = [0, 10, 5, 15, 10, 20, 15, 25, 20, 30, 25, 40];
        var rain_dataset = [25, 20, 30, 22, 17, 10, 18, 26, 28, 26, 20, 32];
        var data = forecast_chart.config.data;
        data.datasets[0].data = temp_dataset;
        data.datasets[1].data = rain_dataset;
        data.labels = chart_labels;
        forecast_chart.update();
    });
    var chartColors = {
        gray: '#e4e4e4',
        orange: 'rgb(255, 159, 64)',
        yellow: 'rgb(255, 205, 86)',
        green: '#37a000',
        blue: 'rgb(54, 162, 235)',
        purple: 'rgb(153, 102, 255)',
        grey: 'rgb(231,233,237)'
    };



        //pie chart
    var ctx = document.getElementById("Income_ExpenseChart");
        var total_sales     = $('#total_sales').val();
        var total_purchase  = $('#total_purchase').val();
        var total_service   = $('#total_service').val();
        var total_salary    = $('#total_salary').val();
        var total_expense   = $('#total_expense').val();
    var myChart = new Chart(ctx, {
        type: 'pie',
        data: {
            datasets: [{
                    data: [total_sales, total_purchase, total_service, total_salary],
                    backgroundColor: [
                        "#F8790A",
                        "#A9DFBF",
                        "#3BE0E0",
                        "#EBDEF0"
                    ],
                    hoverBackgroundColor: [
                        "#F8790A",
                        "#A9DFBF",
                        "#3BE0E0",
                        "#EBDEF0"
                    ]

                }],
            labels: [
                "Total Sale",
                "Total Purchase",
                "Total Service",
                "Total Salary"
            ]
        },
        options: {
            legend: false,
            responsive: true
        }
    });


    var ctx = document.getElementById("monthlyProgress").getContext("2d");
    var progresslabel    = $("#progresslabel").val();
    var monthlyprogresslabel = progresslabel.substring(0, progresslabel.length - 1);
    var monthlyprogresslabel = monthlyprogresslabel.split(",");

    var progresssaled     = $("#progress_saledata").val();
    var progress_sdata    = progresssaled.substring(0, progresssaled.length - 1);
    var progress_saledata = progress_sdata.split(",");

    var progresspurchased     = $("#progress_purchaedata").val();
    var progress_pdata        = progresspurchased.substring(0, progresspurchased.length - 1);
    var progress_purchasedata = progress_pdata.split(",");
    var myBar = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: monthlyprogresslabel,
            datasets: [{
                    label: 'Sales',
                    backgroundColor: chartColors.green,
                    data: progress_saledata
                }, {
                    label: 'Purchase',
                    backgroundColor: chartColors.gray,
                    data: progress_purchasedata
                }]
        },
        options: {
            legend: false,
            responsive: true,
            barRoundness: 1,
            scales: {
                yAxes: [{
                        ticks: {
                            beginAtZero: true,
                            padding: 5
                        },
                        gridLines: {
                            borderDash: [2],
                            borderDashOffset: [2],
                            drawBorder: false,
                            drawTicks: false
                        }
                    }],
                xAxes: [{
                        maxBarThickness: 10,
                        gridLines: {
                            lineWidth: [0],
                            drawBorder: false,
                            drawOnChartArea: false,
                            drawTicks: false
                        },
                        ticks: {
                            padding: 10
                        }
                    }]
            }
        }
    });


       


 });
