@extends('layouts.master')
@section('title')
{{env('APP_NAME')}}-Add Employee
@endsection
@section('module')
Add Employee
@endsection

@section('content')
@include('components.message')
{{Form::component('ahText', 'components.form.text', ['name', 'labeltext'=>null, 'value' => null, 'attributes' => []])}}
{{Form::component('ahPassword', 'components.form.password', ['name', 'labeltext'=>null, 'attributes' => []])}}
{{Form::component('ahSelect', 'components.form.select', ['name', 'labeltext'=>null, 'value' => null,'valuearray' => [], 'attributes' => []])}}
{{Form::component('ahNumber', 'components.form.number', ['name', 'labeltext'=>null, 'value' => null, 'attributes' => []])}}

{{ Form::open(array('onsubmit' => 'return validations();','method' => 'PUT', 'route' => array('dashboard.update',$user->id),'files'=>true)) }}

<div class="row">
    <div class="col-12">
        <div class="card-box">
            <div class="row">
                <div class="col-12">
                        <div>
                            <section>
                                <div class="row">
                                    <div class="col-sm-6">
                                        {{ Form::ahText('employeeno','Employee No :',$user->employeeno,array('maxlength' => '200'))  }}
                                    </div>
                                    <div class="col-sm-6">
                                       {{ Form::ahText('name','Name :',$user->name,array('maxlength' => '100'))  }}
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        {{ Form::ahText('email','Email :',$user->email,array('maxlength' => '100'))  }}
                                    </div>
                                    <div class="col-sm-6">
                                       {{ Form::ahNumber('mobileno','Mobile No :',$user->mobileno,array('min'=>'0','maxlength' => '11','max'=>'99999999999')) }}
                                    </div>
                                </div><!-- end row -->
                                <div class="row">
                                    <div class="col-sm-6">
                                        {{ Form::ahSelect('role_id','Role :',$user->role_id,$role) }}
                                    </div>
                                     <div class="col-sm-6">
                                        {{ Form::ahText('designation','Designation :',$user->designation,array('maxlength' => '100'))  }}
                                    </div>
                                    <div class="col-sm-6">
                                       {{ Form::ahSelect('status','Status :',$user->status,array('1' => 'Active', '2' => 'Inactive')) }}
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="card-box">

                                            <h4 class="header-title m-t-0 m-b-30">Upload Profile Image</h4>

                                            <input type="file" class="dropify" name="logo" data-default-file="{{$user->profile_image}}"  />
                                        </div>
                                    </div>                                    
                                </div>
                                <div class="form-group">
                                    <div class="panel-footer">
                                        <div class="col-md-6 col-md-offset-3">
                                            {{ Form::submit('Update', array('class' => 'btn btn-primary')) }}
                                            {{ link_to_route('dashboard.index','Cancel',null, array('class' => 'btn btn-danger')) }}
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
    if($('#name').val()=="")
    {
        alert('Please enter name');
        $('#name').focus();
        return false;
    }
    if($('#email').val()=="")
    {
        alert('Please enter email');
        $('#email').focus();
        return false;
    }   
    if($('#password').val()=="")
    {
        alert('Please enter password');
        $('#password').focus();
        return false;
    }
    if($('#mobileno').val()=="")
    {
        alert('Please enter mobileno');
        $('#mobileno').focus();
        return false;
    } 
}
</script>
@endsection