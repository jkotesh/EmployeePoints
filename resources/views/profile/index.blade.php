@extends('layouts.master')
@section('title')
{{env('APP_NAME')}}-Change Password
@endsection
@section('module')
Change Password
@endsection

@section('content')
@include('components.message')
{{Form::component('ahText', 'components.form.text', ['name', 'labeltext'=>null, 'value' => null, 'attributes' => []])}}
{{Form::component('ahPassword', 'components.form.password', ['name', 'labeltext'=>null, 'attributes' => []])}}
{{Form::component('ahSelect', 'components.form.select', ['name', 'labeltext'=>null, 'value' => null,'valuearray' => [], 'attributes' => []])}}
{{Form::component('ahTextarea', 'components.form.textarea', ['name', 'labeltext'=>null, 'value' => null, 'attributes' => []])}}
{{Form::component('ahNumber', 'components.form.number', ['name', 'labeltext'=>null, 'value' => null, 'attributes' => []])}}
{{Form::component('ahFile', 'components.form.file', ['name', 'labeltext'=>null,'value' =>null, 'attributes' => []])}}

{{ Form::open(array('onsubmit' => 'return validations();','route' => 'profile.store','files'=>true)) }}

<div class="row">
    <div class="col-12">
        <div class="card-box">
            <div class="row">
                <div class="col-12">
                        <div>
                            <section>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group clearfix">
                                            <label for="userName">Email<span class="text-danger"></span></label>
                                            <div>
                                                <input class="form-control" id="userName" name="userName" type="text" value="<?php echo Session::get('email')?>" readonly>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        {{ Form::ahPassword('currentpassword','Current Password :',array('maxlength' => '100')) }}
                                    </div>
                                </div><!-- end row -->
                                <div class="row">
                                    <div class="col-sm-6">
                                        {{ Form::ahPassword('password','New Password :',array('maxlength' => '100')) }}
                                    </div>
                                    <div class="col-sm-6">
                                        {{ Form::ahPassword('new_password','Confirm Password :',array('maxlength' => '100')) }}
                                    </div>
                                </div><!-- end row -->
                                <!-- end row -->
                                <div class="form-group">
                                    <div class="panel-footer">
                                        <div class="col-md-6 col-md-offset-3">
                                            {{ Form::submit('Update', array('class' => 'btn btn-primary')) }}
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
 <script type="text/javascript">

  function validations()
{
    if($('#currentpassword').val()=="")
    {
        alert('Please Enter Current Password');
        $('#currentpassword').focus();
        return false;
    }
    if($('#password').val()=="")
    {
        alert('Please Enter New Password');
        $('#password').focus();
        return false;
    }   
    if($('#new_password').val()=="")
    {
        alert('Please Enter Confirm Password');
        $('#new_password').focus();
        return false;
    } 
}
</script>
@endsection