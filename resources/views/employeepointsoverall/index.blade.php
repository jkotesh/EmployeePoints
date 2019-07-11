@extends('layouts.master')
@section('title')
{{env('APP_NAME')}} | Overall Points
@endsection
@section('module')
<style type="text/css">
    .custom-select{
        width: 18%!important;
    }
</style>
<form class="form-inline m-t-30">
    <select class="custom-select mb-4 mr-sm-4 mb-sm-0" id="employee_id" name="employee_id">
        <option selected="0">Choose Employee</option>
        @foreach($employees as $employee)
        <option value="{{$employee->id}}" <?php if($employee->id == $employee_id) { echo "selected = 'slected'";} ?> >{{$employee->name}}</option>
        @endforeach
    </select>
    <select class="custom-select mb-4 mr-sm-4 mb-sm-0" id="month" name="month">
        <option selected="0">Choose Month</option>
        <?php for($i=0;$i<count($months);$i++){ ?>
        <option value="<?php echo $months[$i]; ?>" <?php if($months[$i] == $month) { echo "selected = 'slected'";} ?>><?php echo $months[$i]; ?></option>
        <?php } ?>
    </select>
    <select class="custom-select mb-4 mr-sm-4 mb-sm-0" id="year" name="year">
        <?php for($i=0;$i<count($years);$i++){ ?>
        <option value="<?php echo $years[$i]; ?>" <?php if($years[$i] == $year) { echo "selected = 'slected'";} ?>><?php echo $years[$i]; ?></option>
        <?php } ?>
    </select>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
<div class="btn-group float-right m-t-15">
  @if($privileges['Add']=='true') 
  {{ link_to_route('employeepointsoverall.create','Add Overall Point',null, array('class' => 'btn btn-info')) }}
  @endif
</div>
Overall Points
@endsection
@section('content')
@include('components.message')
    <div class="row">
                    <div class="col-12">
                        <div class="card-box">
                            <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                <tr>
                                    <th>Month/Year</th>
                                    <?php 
                                    if(in_array(Session::get("role_id"),array(1)))
                                    {
                                    ?>
                                    <th>Name</th>
                                    <?php } ?>
                                    <th>Performance <br>Total Points</th>
                                    <th>CL Leave Point</th>
                                    <th>SL Leave Point</th>
                                    <th>Early Login <br>And Logout Point</th>
                                    <th>Points from TL</th>
                                    <th>Points from <br>Management</th>
                                    <th>Total Points</th>
                                    <th>Comments</th>
                                    @if($privileges['Edit']=='true')
                                    <th>Actions</th>
                                    @endif
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($points as $point)
                                <tr>
                                    <td>{{$point->month}}/{{$point->year}}</td>
                                    <?php 
                                    if(in_array(Session::get("role_id"),array(1)))
                                    {
                                    ?>
                                    <td>{{$point->name}}</td>
                                    <?php } ?>
                                    <td>{{$point->performance_total_points}}</td>
                                    <td>{{$point->cl_leave_point}}</td>
                                    <td>{{$point->sl_leave_point}}</td>
                                    <td>{{$point->early_login_and_logout_point}}</td>
                                    <td>{{$point->points_from_tl}}</td>
                                    <td>{{$point->points_from_management}}</td>
                                    <td>{{$point->total_points}}</td>
                                    <td>{{$point->comments}}</td>
                                     <td width="20%">
                                        <div >
                                            <div style="float:left;padding-right:10px;">
                                             @if($privileges['Edit']=='true')
                                            {{ link_to_route('employeepointsoverall.edit','Edit',array($point->id), array('class' => 'btn btn-info')) }}
                                            @endif 
                                            </div>
                                            <div style="float:left;padding-right:10px;">
                                               @if($privileges['Delete']=='true')
                                                {{ Form::open(array('onsubmit' => 'return confirm("Are you sure you want to delete?")','method' => 'DELETE', 'route' => array('employeepointsoverall.destroy', $point->id))) }}
                                                <button type="submit" class="btn btn-danger btn-xs pull-right" style="padding: 10px 6px;">Delete</button>
                                                {{ Form::close() }}
                                               @endif
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                                </tbody>                                
                            </table>
                        </div>
                    </div>
                </div>

@endsection