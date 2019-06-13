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

{{ Form::open(array('onsubmit' => 'return validations();','route' => 'dashboard.store','files'=>true)) }}

<div class="row">
    <div class="col-12">
        <div class="card-box">
            <div class="row">
                <div class="col-12">
                        <div>
                            <section>
                                <div class="row">
                                    <div class="col-sm-6">
                                        {{ Form::ahText('employeeno','Employee No :','',array('maxlength' => '200'))  }}
                                    </div>
                                    <div class="col-sm-6">
                                        {{ Form::ahText('name','Name :','',array('maxlength' => '100'))  }}
                                    </div>
                                </div>
                                <div class="row">                                    
                                    <div class="col-sm-6">
                                        {{ Form::ahText('email','Email :','',array('maxlength' => '100'))  }}
                                    </div>
                                    <div class="col-sm-6">
                                        {{ Form::ahPassword('password','Password :',array('maxlength' => '100')) }}
                                    </div>
                                </div><!-- end row -->
                                <div class="row">
                                    <div class="col-sm-6">
                                       {{ Form::ahNumber('mobileno','Mobile No :','',array('min'=>'0','maxlength' => '11','max'=>'99999999999')) }}
                                    </div>
                                    <div class="col-sm-6">
                                        {{ Form::ahSelect('role_id','Role :',null,$role) }}
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                       {{ Form::ahSelect('status','Status :','1',array('1' => 'Active', '2' => 'Inactive')) }}
                                    </div>
                                    <div class="col-md-6">
                                        <div class="card-box">

                                            <h4 class="header-title m-t-0 m-b-30">Upload Profile Image</h4>

                                            <input type="file" class="dropify" name="logo" data-default-file="{{env('APP_URL')}}/assets/images/users/default.jpg"  />
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                                                        
                                </div>
                                <div class="form-group">
                                    <div class="panel-footer">
                                        <div class="col-md-6 col-md-offset-3">
                                            {{ Form::submit('Save', array('class' => 'btn btn-primary')) }}
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