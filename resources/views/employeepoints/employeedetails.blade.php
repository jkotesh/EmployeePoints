@extends('layouts.employeemaster')
@section('title')
{{env('APP_NAME')}} | Points
@endsection
@section('module')
Points
@endsection
@section('content')
@include('components.message')
<style>
#chartdiv {
  width: 90%;
  height: 500px;
}

</style>
<div class="row">
                    <div class="col-md-6  col-xl-3">
                        <div class="card-box widget-user">
                            <div>
                                <?php 
                                    if(!empty($employee->profile_image))
                                      {
                                        $profile_image = $employee->profile_image;
                                      } 
                                      else 
                                       { 
                                            $profile_image = env('APP_URL').'/assets/images/users/default.jpg';
                                         $profile_image = env('APP_URL').'/assets/images/users/default.jpg';
                                       }
                                ?>
                                <img src="<?php echo  $profile_image; ?>" class="img-responsive rounded-circle" alt="user">
                                <div class="wid-u-info">
                                    <h5 class="m-t-20 m-b-5">{{$employee->name}}</h5>
                                    <h5 class="m-t-20 m-b-5">{{$role->name}}</h5>
                                    <h5 class="m-t-20 m-b-5">{{$employee->designation}}</h5>
                                    <p class="text-muted mb-0 font-13">{{$employee->email}}</p>
                                </div>
                            </div>
                        </div>
                    </div> 
                   <div class="col-md-6  col-xl-9">
                        <div class="card-box widget-user">
                          <div class="row m-t-20">
                                <div class="col-sm-12 m-t-20">
                                    <h4 class="header-title m-t-0 text-center">Date Wise Points</h4>
                                    <div class="p-20">
                                        <div id="chartdiv"></div>
                                    </div>
                                </div>
                            </div>
                          </div>
                        </div>
                </div>
<script type="text/javascript">
    function autoRefreshPage()
    {
        window.location = window.location.href;
    }
    setInterval('autoRefreshPage()', 10000);
</script>
 
<!-- Resources -->
<script src="https://www.amcharts.com/lib/4/core.js"></script>
<script src="https://www.amcharts.com/lib/4/charts.js"></script>
<script src="https://www.amcharts.com/lib/4/themes/animated.js"></script>

<script>
am4core.ready(function() {

// Themes begin
am4core.useTheme(am4themes_animated);
// Themes end

var chart = am4core.create("chartdiv", am4charts.XYChart);
chart.hiddenState.properties.opacity = 0; // this makes initial fade in effect

chart.data = <?php print_r(json_encode($date_wise_points)); ?>;


var categoryAxis = chart.xAxes.push(new am4charts.CategoryAxis());
categoryAxis.renderer.grid.template.location = 0;
categoryAxis.dataFields.category = "country";
categoryAxis.renderer.minGridDistance = 40;

var valueAxis = chart.yAxes.push(new am4charts.ValueAxis());

var series = chart.series.push(new am4charts.CurvedColumnSeries());
series.dataFields.categoryX = "country";
series.dataFields.valueY = "value";
series.tooltipText = "{valueY.value}"
series.columns.template.strokeOpacity = 0;

series.columns.template.fillOpacity = 0.75;

var hoverState = series.columns.template.states.create("hover");
hoverState.properties.fillOpacity = 1;
hoverState.properties.tension = 0.4;

chart.cursor = new am4charts.XYCursor();

// Add distinctive colors for each column using adapter
series.columns.template.adapter.add("fill", (fill, target) => {
  return chart.colors.getIndex(target.dataItem.index);
});

chart.scrollbarX = new am4core.Scrollbar();

}); // end am4core.ready()
</script>
@endsection