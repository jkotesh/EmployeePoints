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
                    <div class="col-4">
                        <div class="card-box">
                          <div class="wid-u-info">
              <h5 class="m-t-20 m-b-5">{{$employee->name}}</h5>
              <h5 class="m-t-20 m-b-5">{{$employee->designation}}</h5>
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
@endsection