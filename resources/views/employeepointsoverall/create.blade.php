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

{{ Form::open(array('onsubmit' => 'return validations();','route' => 'employeepointsoverall.store','files'=>true)) }}

<div class="row">
    <div class="col-12">
        <div class="card-box">
            <div class="row">
                <div class="col-12">
                        <div>
                            <section>
                                <div class="row">
                                    <div class="col-sm-4">
                                        {{ Form::ahSelect('employee_id','Employee :',null,$employees) }}
                                    </div>
                                    <div class="col-sm-4">
                                        <label>Month :</label>
                                    <select class="custom-select mb-4 mr-sm-4 mb-sm-0" id="month" name="month">
                                        <?php for($i=0;$i<count($months);$i++){ ?>
                                        <option value="<?php echo $months[$i]; ?>" <?php if($months[$i] == date("F", strtotime('m'))) { echo 'selected';} ?>><?php echo $months[$i]; ?></option>
                                        <?php } ?>
                                    </select>
                                    </div>
                                    <div class="col-sm-4">
                                        <label>Year :</label>
                                    <select class="custom-select mb-4 mr-sm-4 mb-sm-0" id="year" name="year">
                                        <?php for($i=0;$i<count($years);$i++){ ?>
                                        <option value="<?php echo $years[$i]; ?>" <?php if($years[$i] == date('Y')) { echo 'selected';} ?>><?php echo $years[$i]; ?></option>
                                        <?php } ?>
                                    </select>
                                    </div>
                                    <div class="col-sm-6">
                                         {{ Form::ahNumber('performance_total_points','Performance Total Points :','',array('maxlength' => '11','max'=>'99999999999','step'=>'any')) }}
                                    </div>
                                    <div class="col-sm-6">
                                         {{ Form::ahNumber('cl_leave_point','CL Leave Point :','',array('maxlength' => '11','max'=>'99999999999','step'=>'any')) }}
                                    </div>
                                    <div class="col-sm-6">
                                         {{ Form::ahNumber('sl_leave_point','SL Leave Point :','',array('maxlength' => '11','max'=>'99999999999','step'=>'any')) }}
                                    </div>
                                     <div class="col-sm-6">
                                         {{ Form::ahNumber('points_from_tl','Points from TL :','',array('maxlength' => '11','max'=>'99999999999','step'=>'any')) }}
                                    </div>
                                     <div class="col-sm-6">
                                         {{ Form::ahNumber('points_from_management','Points from Management :','',array('maxlength' => '11','max'=>'99999999999','step'=>'any')) }}
                                    </div>
                                    <div class="col-sm-6">
                                         {{ Form::ahNumber('early_login_and_logout_point','Early Login And Logout Point :','',array('maxlength' => '11','max'=>'99999999999','step'=>'any')) }}
                                    </div>
                                     <div class="col-sm-6">
                                         {{ Form::ahNumber('total_points','Total Points :','',array('maxlength' => '11','max'=>'99999999999','step'=>'any')) }}
                                    </div>
                                    <div class="col-sm-6">
                                       <div class="form-group clearfix">
                                                <label>Comments :</label>
                                                <div>
                                                    <textarea class="form-control" id="comments" name="comments"></textarea>
                                                </div>
                                            </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="panel-footer">
                                        <div class="col-md-6 col-md-offset-3">
                                            {{ Form::submit('Save', array('class' => 'btn btn-primary')) }}
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
    url: '../../api/v1/employeedatewisepoints',
    dataType: 'json',
    type: 'post',
    contentType: 'application/json',
    data: JSON.stringify( { "employee_id": $('#employee_id').val(), "month": $('#month').val(), "year": $('#year').val() } ),
    processData: false,
    success: function( data, textStatus, jQxhr ){
        console.log( data );
        $('#performance_total_points').val(data.result.totalpoints);
        //$('#response pre').html( JSON.stringify( data ) );
    },
    error: function( jqXhr, textStatus, errorThrown ){
        console.log( errorThrown );
    }
});

$("#employee_id").change(function() 
{
    $.ajax({
        url: '../../api/v1/employeedatewisepoints',
        dataType: 'json',
        type: 'post',
        contentType: 'application/json',
        data: JSON.stringify( { "employee_id": $('#employee_id').val(), "month": $('#month').val(), "year": $('#year').val() } ),
        processData: false,
        success: function( data, textStatus, jQxhr ){
            console.log( data);
            $('#performance_total_points').val(data.result.totalpoints);
            //$('#response pre').html( JSON.stringify( data ) );
        },
        error: function( jqXhr, textStatus, errorThrown ){
            console.log( errorThrown );
        }
    });
});

$("#month").change(function() 
{
    $.ajax({
        url: '../../api/v1/employeedatewisepoints',
        dataType: 'json',
        type: 'post',
        contentType: 'application/json',
        data: JSON.stringify( { "employee_id": $('#employee_id').val(), "month": $('#month').val(), "year": $('#year').val() } ),
        processData: false,
        success: function( data, textStatus, jQxhr ){
            console.log( data.result.totalpoints );
            $('#performance_total_points').val(data.result.totalpoints);
            //$('#response pre').html( JSON.stringify( data ) );
        },
        error: function( jqXhr, textStatus, errorThrown ){
            console.log( errorThrown );
        }
    });
});

$("#year").change(function() 
{
    $.ajax({
        url: '../../api/v1/employeedatewisepoints',
        dataType: 'json',
        type: 'post',
        contentType: 'application/json',
        data: JSON.stringify( { "employee_id": $('#employee_id').val(), "month": $('#month').val(), "year": $('#year').val() } ),
        processData: false,
        success: function( data, textStatus, jQxhr ){
            console.log( data.result.totalpoints );
            $('#performance_total_points').val(data.result.totalpoints);
            //$('#response pre').html( JSON.stringify( data ) );
        },
        error: function( jqXhr, textStatus, errorThrown ){
            console.log( errorThrown );
        }
    });
});

$("#").keydown(function(){
    $("input").css("background-color", "yellow");
  });
  $("input").keyup(function(){
    $("input").css("background-color", "pink");
  });
</script>
@endsection