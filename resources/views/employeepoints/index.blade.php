@extends('layouts.master')
@section('title')
{{env('APP_NAME')}} | Points
@endsection
@section('module')
Points
@endsection
@section('content')
@include('components.message')
    <div class="row">
                    <div class="col-12">
                        <div class="card-box">
                            <table class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Image</th>
                                    <th>Date / Points</th>
                                    <th>Total Points</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($employeepoints as $point)
                                <tr>
                                    <td><h3>{{$point['name']}}</h3></td>
                                    <?php 
                                    if(!empty($point['profile_image']))
                                      {
                                        $profile_image = $point['profile_image'];
                                      } 
                                      else 
                                       { 
                                         $profile_image = env('APP_URL').'/assets/images/users/default.jpg';
                                       }
                                    ?>
                                    <td>
                                      <div class="widget-user">
                                        <img src="<?php echo  $profile_image; ?>" class="img-responsive rounded-circle" alt="user">
                                       </div>
                                    </td>
                                    <td>
                                        <marquee style="font-size: x-large;" scrolldelay="200">
                                        @foreach($point['datewisepoints'] as $date)
                                             @if($date->points < 0)
                                             <span style="color: red;">{{$date->date}}({{$date->points}})</span>
                                             @else
                                             <span style="color: green;">{{$date->date}}</span><span style="color: black;">({{$date->points}})</span>
                                             @endif
                                        @endforeach
                                        </marquee>
                                    </td>
                                    <td width="10%"> <h3>{{$point['totalpoints']}}</h3></td>
                                </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

@endsection