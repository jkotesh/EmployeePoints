@extends('layouts.master')
@section('title')
{{env('APP_NAME')}}-Add Overall Point
@endsection
@section('module')
Add Overall Point
@endsection

@section('content')
@include('components.message')
{{Form::component('ahText', 'components.form.text', ['name', 'labeltext'=>null, 'value' => null, 'attributes' => []])}}
{{Form::component('ahSelect', 'components.form.select', ['name', 'labeltext'=>null, 'value' => null,'valuearray' => [], 'attributes' => []])}}
{{Form::component('ahNumber', 'components.form.number', ['name', 'labeltext'=>null, 'value' => null, 'attributes' => []])}}

{{ Form::open(array('onsubmit' => 'return validations();','method' => 'PUT', 'route' => array('employeepointsoverall.update',$point->id),'files'=>true)) }}

<div class="row">
    <div class="col-12">
        <div class="card-box">
            <div class="row">
                <div class="col-12">
                        <div>
                            <section>
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-group clearfix">
                                            <label for="userName">Employee<span class="text-danger"></span></label>
                                            <div>
                                                <input class="form-control" id="employee" name="employee" type="text" value="{{$user->name}}" readonly>
                                            </div>
                                        <input type="hidden" name="employee_id" id="employee_id" value="{{$point->employee_id}}">
                                    </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <label>Month :</label>
                                    <select class="custom-select mb-4 mr-sm-4 mb-sm-0" id="month" name="month">
                                        <?php for($i=0;$i<count($months);$i++){ ?>
                                        <option value="<?php echo $months[$i]; ?>" <?php if($months[$i] == $point->month) { echo "selected = 'slected'";} ?>><?php echo $months[$i]; ?></option>
                                        <?php } ?>
                                    </select>
                                    </div>
                                    <div class="col-sm-4">
                                        <label>Year :</label>
                                    <select class="custom-select mb-4 mr-sm-4 mb-sm-0" id="year" name="year">
                                        <?php for($i=0;$i<count($years);$i++){ ?>
                                        <option value="<?php echo $years[$i]; ?>" <?php if($years[$i] == $point->year) { echo 'selected';} ?>><?php echo $years[$i]; ?></option>
                                        <?php } ?>
                                    </select>
                                    </div>
                                    <div class="col-sm-6">
                                         {{ Form::ahNumber('performance_total_points','Performance Total Points :',$point->performance_total_points,array('maxlength' => '11','max'=>'99999999999','step'=>'any')) }}
                                    </div>
                                    <div class="col-sm-6">
                                         {{ Form::ahNumber('cl_leave_point','CL Leave Point :',$point->cl_leave_point,array('maxlength' => '11','max'=>'99999999999','step'=>'any')) }}
                                    </div>
                                    <div class="col-sm-6">
                                         {{ Form::ahNumber('sl_leave_point','SL Leave Point :',$point->sl_leave_point,array('maxlength' => '11','max'=>'99999999999','step'=>'any')) }}
                                    </div>
                                     <div class="col-sm-6">
                                         {{ Form::ahNumber('points_from_tl','Points from TL :',$point->points_from_tl,array('maxlength' => '11','max'=>'99999999999','step'=>'any')) }}
                                    </div>
                                     <div class="col-sm-6">
                                         {{ Form::ahNumber('points_from_management','Points from Management :',$point->points_from_management,array('maxlength' => '11','max'=>'99999999999','step'=>'any')) }}
                                    </div>
                                    <div class="col-sm-6">
                                         {{ Form::ahNumber('early_login_and_logout_point','Early Login And Logout Point :',$point->early_login_and_logout_point,array('maxlength' => '11','max'=>'99999999999','step'=>'any')) }}
                                    </div>
                                     <div class="col-sm-6">
                                         {{ Form::ahNumber('total_points','Total Points :',$point->total_points,array('maxlength' => '11','max'=>'99999999999','step'=>'any')) }}
                                    </div>
                                    <div class="col-sm-6">
                                       <div class="form-group clearfix">
                                                <label>Comments :</label>
                                                <div>
                                                    <textarea class="form-control" id="comments" name="comments">{{$point->comments}}</textarea>
                                                </div>
                                            </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="panel-footer">
                                        <div class="col-md-6 col-md-offset-3">
                                            {{ Form::submit('Update', array('class' => 'btn btn-primary')) }}
                                            {{ link_to_route('employeepointsoverall.index','Cancel',null, array('class' => 'btn btn-danger')) }}
                                        </div>
                                    </div>
                                </div>
                            </section>                                          
                        </div>
                </div>

            </div>
        </div>
    </div><!-- end col-->

</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
 <script>
$.ajax({
    url: '../../../../api/v1/employeedatewisepoints',
    dataType: 'json',
    type: 'post',
    contentType: 'application/json',
    data: JSON.stringify( { "employee_id": $('#employee_id').val(), "month": $('#month').val(), "year": $('#year').val() } ),
    processData: false,
    success: function( data, textStatus, jQxhr ){
        //console.log( data.result.totalpoints );
        if(data.result.length == 0)
        {
            $('#performance_total_points').val("0.00");
            var performance_total_points = "0.00";
        }
        else
        {
            $('#performance_total_points').val(data.result.totalpoints);
            var performance_total_points = data.result.totalpoints;
        }
        overallPoints(performance_total_points);
        
    },
    error: function( jqXhr, textStatus, errorThrown ){
        console.log( errorThrown );
    }
});

$("#employee_id").change(function() 
{
    $.ajax({
        url: '../../../../api/v1/employeedatewisepoints',
        dataType: 'json',
        type: 'post',
        contentType: 'application/json',
        data: JSON.stringify( { "employee_id": $('#employee_id').val(), "month": $('#month').val(), "year": $('#year').val() } ),
        processData: false,
        success: function( data, textStatus, jQxhr ){
            console.log( data.result.totalpoints );
            if(data.result.length == 0)
            {
                $('#performance_total_points').val("0.00");
                var performance_total_points = "0.00";
            }
            else
            {
                $('#performance_total_points').val(data.result.totalpoints);
                var performance_total_points = data.result.totalpoints;
            }
            overallPoints(performance_total_points);
        },
        error: function( jqXhr, textStatus, errorThrown ){
            console.log( errorThrown );
        }
    });
});

$("#month").change(function() 
{
    $.ajax({
        url: '../../../../api/v1/employeedatewisepoints',
        dataType: 'json',
        type: 'post',
        contentType: 'application/json',
        data: JSON.stringify( { "employee_id": $('#employee_id').val(), "month": $('#month').val(), "year": $('#year').val() } ),
        processData: false,
        success: function( data, textStatus, jQxhr ){
            console.log( data.result.length );
            if(data.result.length == 0)
            {
                $('#performance_total_points').val("0.00");
                var performance_total_points = "0.00";
            }
            else
            {
                $('#performance_total_points').val(data.result.totalpoints);
                var performance_total_points = data.result.totalpoints;
            }
            overallPoints(performance_total_points);
        },
        error: function( jqXhr, textStatus, errorThrown ){
            console.log( errorThrown );
        }
    });
});

$("#year").change(function() 
{
    $.ajax({
        url: '../../../../api/v1/employeedatewisepoints',
        dataType: 'json',
        type: 'post',
        contentType: 'application/json',
        data: JSON.stringify( { "employee_id": $('#employee_id').val(), "month": $('#month').val(), "year": $('#year').val() } ),
        processData: false,
        success: function( data, textStatus, jQxhr ){
            console.log( data.result.totalpoints );
            if(data.result.length == 0)
            {
                $('#performance_total_points').val("0.00");
                var performance_total_points = "0.00";
            }
            else
            {
                $('#performance_total_points').val(data.result.totalpoints);
                var performance_total_points = data.result.totalpoints;
            }
            overallPoints(performance_total_points);
        },
        error: function( jqXhr, textStatus, errorThrown ){
            console.log( errorThrown );
        }
    });
});

function financial(x) 
{
  return Number.parseFloat(x).toFixed(2);
}

function overallPoints(performance_total_points)
{
    var cl_leave_point =  $('#cl_leave_point').val();
    var sl_leave_point =  $('#sl_leave_point').val();
    var points_from_tl =  $('#points_from_tl').val();
    var points_from_management =  $('#points_from_management').val();
    var early_login_and_logout_point =  $('#early_login_and_logout_point').val();

    var overaltotalpoints = parseFloat(performance_total_points) + parseFloat(cl_leave_point) + parseFloat(sl_leave_point) + parseFloat(points_from_tl) + parseFloat(points_from_management) + parseFloat(early_login_and_logout_point);
    var financialpoints = financial(overaltotalpoints);
    $('#total_points').val(financialpoints);
    console.log(financialpoints);
}

jQuery(function($) {
  $('#cl_leave_point').on('input', function() 
  {
     var performance_total_points = $('#performance_total_points').val();
     overallPoints(performance_total_points);

  });
  $('#sl_leave_point').on('input', function() 
  {
     var performance_total_points = $('#performance_total_points').val();
     overallPoints(performance_total_points);

  });
  $('#points_from_tl').on('input', function() 
  {
     var performance_total_points = $('#performance_total_points').val();
     overallPoints(performance_total_points);

  });
  $('#points_from_management').on('input', function() 
  {
     var performance_total_points = $('#performance_total_points').val();
     overallPoints(performance_total_points);

  });
  $('#early_login_and_logout_point').on('input', function() 
  {
     var performance_total_points = $('#performance_total_points').val();
     overallPoints(performance_total_points);

  });
});

</script>
@endsection