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
                  <?php if(count($employees) > 0) {?>
                  @foreach($employees as $employee)
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
                                       }
                                ?>
                                <img src="<?php echo  $profile_image; ?>" class="img-responsive rounded-circle" alt="user">

                                <div class="wid-u-info">
                                    <h5 class="m-t-20 m-b-5">{{$employee->name}}</h5>
                                    <h5 class="m-t-20 m-b-5">{{$employee->designation}}</h5>
                                    <!-- <h5 class="m-t-20 m-b-5">{{$employee->employeeno}}</h5> -->
                                    <p class="text-muted mb-0 font-13">{{$employee->email}}</p>
                                    <h2 data-plugin="counterup">{{$employee->total_points}}</h2>
                                    <div class="user-position">
                                       @if($privileges['Edit']=='true')
                                        <a href="{{env('ADMIN_URL')}}/dashboard/{{$employee->id}}/edit" style="cursor: pointer;float: right;font-size: x-large;    top: -69px;position: relative;">
                                        <i class="ion-compose" style="left: 24px;position: relative;"></i></a>
                                        @endif
                                        <span class="text-success font-weight-bold" style="   right: 10px;position: relative;">{{$employee->role_name}}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>   
                 @endforeach
                <?php } else {?>
                   <h5 class="m-t-20 m-b-5">No Employee Found</h5>
                 <?php } ?>               
            </div>

@endsection