
 (function ($) {
    "use strict";
    var amCharts = {
        initialize: function () {
            this.combinedBullet();
            this.columnChart();
            this.radiusPieChart();
            this.tagCloud();
            this.zoomableValueAxis();
            this.solidGauge();
            this.liveData();
            this.animationsChart();
        },
        combinedBullet: function () {
            am4core.ready(function () {
                // Themes begin
                am4core.useTheme(am4themes_animated);
                // Themes end
                var currency = $("#currency").val();
                // Create chart instance
                var chart = am4core.create("multipleValue", am4charts.XYChart);

                // Add data
                chart.data = [<?php echo $monthly_reportdata;?>];

                // Create axes
                var dateAxis = chart.xAxes.push(new am4charts.DateAxis());
                //dateAxis.renderer.grid.template.location = 0;
                //dateAxis.renderer.minGridDistance = 30;

                var valueAxis1 = chart.yAxes.push(new am4charts.ValueAxis());
                valueAxis1.title.text = "Sales";

                var valueAxis2 = chart.yAxes.push(new am4charts.ValueAxis());
                valueAxis2.title.text = "Purchase";
                valueAxis2.renderer.opposite = true;
                valueAxis2.renderer.grid.template.disabled = true;

                // Create series
                var series1 = chart.series.push(new am4charts.ColumnSeries());
                series1.dataFields.valueY = "sale";
                series1.dataFields.dateX = "date";
                series1.yAxis = valueAxis1;
                series1.name = "Sales";
                series1.tooltipText = "{name}\n[bold font-size: 20]"+currency+"{valueY}[/]";
                series1.fill = chart.colors.getIndex(0);
                series1.strokeWidth = 0;
                series1.clustered = false;
                series1.columns.template.width = am4core.percent(40);

                var series2 = chart.series.push(new am4charts.ColumnSeries());
                series2.dataFields.valueY = "purchase";
                series2.dataFields.dateX = "date";
                series2.yAxis = valueAxis1;
                series2.name = "Purchase";
                series2.tooltipText = "{name}\n[bold font-size: 20]"+currency+"{valueY}[/]";
                series2.fill = chart.colors.getIndex(0).lighten(0.5);
                series2.strokeWidth = 0;
                series2.clustered = false;
                series2.toBack();

              
              
                // Add cursor
                chart.cursor = new am4charts.XYCursor();

                // Add legend
                chart.legend = new am4charts.Legend();
                chart.legend.position = "top";

              

            }); // end am4core.ready()

        },
        columnChart: function () {
            am4core.ready(function () {

                // Themes begin
                am4core.useTheme(am4themes_animated);
                // Themes end

                // Create chart instance
                var chart = am4core.create("columnChart", am4charts.XYChart);
                var bestsale = $("#bestsaledata").val();
                var splitsamount  = bestsale.substring(0, bestsale.length - 1);
                var bestsale_data = splitsamount.split(",");
               
               var saledata = bestsale_data.toString();
                // Add data
                chart.data = [<?php echo rtrim($best_sale,',');?>];
              
                // Create axes
                var categoryAxis = chart.xAxes.push(new am4charts.CategoryAxis());
                categoryAxis.dataFields.category = "name";
                categoryAxis.renderer.grid.template.disabled = true;
                categoryAxis.renderer.minGridDistance = 30;
                categoryAxis.renderer.inside = true;
                categoryAxis.renderer.labels.template.fill = am4core.color("#fff");
                categoryAxis.renderer.labels.template.fontSize = 10;

                var valueAxis = chart.yAxes.push(new am4charts.ValueAxis());
                valueAxis.renderer.grid.template.strokeDasharray = "4,4";
                valueAxis.renderer.labels.template.disabled = true;
                valueAxis.min = 0;

                // Do not crop bullets
                chart.maskBullets = false;

                // Remove padding
                chart.paddingBottom = 0;

                // Create series
                var series = chart.series.push(new am4charts.ColumnSeries());
                series.dataFields.valueY = "points";
                series.dataFields.categoryX = "name";
                series.columns.template.propertyFields.fill = "color";
                series.columns.template.propertyFields.stroke = "color";
                series.columns.template.column.cornerRadiusTopLeft = 15;
                series.columns.template.column.cornerRadiusTopRight = 15;
                series.columns.template.tooltipText = "{categoryX}: [bold]{valueY}[/b]";

                // Add bullets
                var bullet = series.bullets.push(new am4charts.Bullet());
                var image = bullet.createChild(am4core.Image);
                image.horizontalCenter = "middle";
                image.verticalCenter = "bottom";
                image.dy = 20;
                image.y = am4core.percent(100);
                image.propertyFields.href = "bullet";
                image.tooltipText = series.columns.template.tooltipText;
                image.propertyFields.fill = "color";
                image.filters.push(new am4core.DropShadowFilter());

            }); // end am4core.ready()
        },
        radiusPieChart: function () {
            am4core.ready(function () {

                // Themes begin
                am4core.useTheme(am4themes_animated);
                // Themes end

                // Create chart
                var chart = am4core.create("radiusPieChart", am4charts.PieChart);
                 var total_sales    = $('#total_sales').val();
                var total_purchase  = $('#total_purchase').val();
                var total_service   = $('#total_service').val();
                var total_salary    = $('#total_salary').val();
                var total_expense   = $('#total_expense').val();
                chart.hiddenState.properties.opacity = 0; // this creates initial fade-in

                chart.data = [
                    {
                        cost: "Total Sale",
                        value: total_sales
                    },
                    {
                        cost: "Total Purchase",
                        value: total_purchase
                    },
                    {
                        cost: "Total Employee Salary",
                        value: total_salary
                    },
                    {
                        cost: "Total Expense",
                        value: total_expense
                    },
                    {
                        cost: "Service",
                        value: total_service
                    },
                    
                ];

                var series = chart.series.push(new am4charts.PieSeries());
                series.dataFields.value = "value";
                series.dataFields.radiusValue = "value";
                series.dataFields.category = "cost";
                series.slices.template.cornerRadius = 6;
                series.colors.step = 3;

                series.hiddenState.properties.endAngle = -90;

                chart.legend = new am4charts.Legend();

            }); // end am4core.ready()
        },


     
        

    };
    // Initialize
    $(document).ready(function () {
        "use strict"; // Start of use strict
        amCharts.initialize();
    });

}(jQuery));