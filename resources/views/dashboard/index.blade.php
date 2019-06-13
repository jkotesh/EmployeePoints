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
@endsection