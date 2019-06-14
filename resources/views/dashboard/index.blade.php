@extends('layouts.master')
@section('title')
{{env('APP_NAME')}} | Dashboard
@endsection
@section('module')
<div class="btn-group float-right m-t-15">
  @if($privileges['Add']=='true') 
  {{ link_to_route('dashboard.create','Add Employee',null, array('class' => 'btn btn-info')) }}
  @endif
</div>
Employees
@endsection
@section('content')
@include('components.message')




<div class="row">
                    <div class="col-12">
                        <div class="card-box">
                            <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                <tr>
                                    <th>ID.No</th>
                                    <th>Photo</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Team</th>
                                    <th>Designation</th>
                                    <th>Total Points</th>
                                    @if($privileges['Edit']=='true')
                                    <th>Actions</th>
                                    @endif
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($employees as $employee)
                                <tr>
                                   <td width="7%">{{$employee->employeeno}}</td>
                                    <?php 
                                    if(!empty($employee->profile_image))
                                      {
                                        $profile_image = $employee->profile_image;
                                      } 
                                      else 
                                       { 
                                         $profile_image = env('APP_URL').'/assets/images/users/default.jpg';
                                       }
                                    ?>
                                    <td width="5%">
                                      <div class="widget-user">
                                        <img src="<?php echo  $profile_image; ?>" class="img-responsive rounded-circle" alt="user">
                                       </div>
                                    </td>
                                    <td width="15%">{{$employee->name}}</td>
                                    <td width="15%"><?php
                                    if(strlen($employee->email)>20){

                                        $email_body=substr($employee->email,0,20)."...";

                                    }else{

                                        $email_body=$employee->email;

                                    }
                                  ?>
                                    {{$email_body}}
                                  </td>
                                    <td width="15%">{{$employee->role_name}}</td>
                                    <td width="15%">{{$employee->designation}}</td>
                                    <td width="8%"> {{$employee->total_points}}</td>
                                    @if($privileges['Edit']=='true')
                                    <td>
                                        <a href="{{env('ADMIN_URL')}}/dashboard/{{$employee->id}}/edit" style="cursor: pointer;font-size: x-large;">
                                        <i class="ion-compose"></i></a>
                                        </td>
                                        @endif
                                </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

<?php if(!in_array(Session::get("role_id"),array(1)))
        { ?>
  <style>
#chartdiv {
  width: 100%;
  height: 500px;
}

</style>
<div class="row">
  <div class="col-12">
      <div class="card-box">
                <div class="row m-t-20">
                                <div class="col-sm-12 m-t-20">
                                    <h4 class="header-title m-t-0 text-center" style="font-size: 30px;position: relative;top: -21px;">Date Wise Points</h4>
                                    <div class="p-20">
                                        <div id="chartdiv"></div>
                                    </div>
                                </div>
                            </div>
                          </div>
                        </div>
                      </div>

 
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

   <?php } ?>
@endsection