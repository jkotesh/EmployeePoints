@extends('layouts.employeemaster')
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
                          <h2 class="text-center">{{$role_name}}</h2>
                            <table class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                <tr>
                                    <th>ID.No</th>
                                    <th>Photo</th>
                                    <th>Name</th>
                                    <th>Designation</th>
                                    <th>Date / Point</th>
                                    <th>Total Points</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($employeepoints as $point)
                                <tr>
                                   <td width="7%"><h3>{{$point['employeeno']}}</h3></td>
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
                                    <td width="5%">
                                      <div class="widget-user">
                                        <img src="<?php echo  $profile_image; ?>" class="img-responsive rounded-circle" alt="user">
                                       </div>
                                    </td>
                                    <td width="15%"><h3>{{$point['name']}}</h3></td>
                                    <td width="15%"><h3>{{$point['designation']}}</h3></td>
                                    <td width="30%">
                                        <marquee style="font-size: x-large;" scrolldelay="90">
                                        @foreach($point['datewisepoints'] as $date)
                                             @if($date->points < 0)
                                             <span style="color: red;">{{$date->date}}({{$date->points}})</span>
                                             @else
                                             <span style="color:  #137ad4;">{{$date->date}}</span><span style="color: black;">({{$date->points}})</span>
                                             @endif
                                        @endforeach
                                        </marquee>
                                    </td>
                                    <td width="8%"> <h3>{{$point['totalpoints']}}</h3></td>
                                </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
<script type="text/javascript">
    function autoRefreshPage()
    {
        window.location = window.location.href;
    }
    setInterval('autoRefreshPage()', 20000);
</script>
@endsection