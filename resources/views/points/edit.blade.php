@extends('layouts.master')
@section('title')
{{env('APP_NAME')}}-Add Point
@endsection
@section('module')
Add Point
@endsection

@section('content')
@include('components.message')
{{Form::component('ahText', 'components.form.text', ['name', 'labeltext'=>null, 'value' => null, 'attributes' => []])}}
{{Form::component('ahSelect', 'components.form.select', ['name', 'labeltext'=>null, 'value' => null,'valuearray' => [], 'attributes' => []])}}
{{Form::component('ahNumber', 'components.form.number', ['name', 'labeltext'=>null, 'value' => null, 'attributes' => []])}}

{{ Form::open(array('onsubmit' => 'return validations();','method' => 'PUT', 'route' => array('points.update',$point->id),'files'=>true)) }}

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
                                            <label for="userName">Employee<span class="text-danger"></span></label>
                                            <div>
                                                <input class="form-control" id="employee" name="employee" type="text" value="{{$user->name}}" readonly>
                                            </div>
                                        </div>
                                        <input type="hidden" name="employee_id" value="{{$point->employee_id}}">
                                    </div>
                                    <div class="col-sm-6">
                                         {{ Form::ahNumber('points','Points :',$point->points,array('maxlength' => '11','max'=>'99999999999')) }}
                                    </div>
                                </div><!-- end row -->
                                <div class="row">
                                    <div class="col-sm-6">
                                       <div class="form-group clearfix">
                                                <label>Date :</label>
                                                <div>
                                                   <input class="form-control" type="date" value="<?php echo $point->date; ?>" name="date" id="example-date-input">
                                                </div>
                                            </div>
                                    </div>
                                    <div class="col-sm-6">
                                       <div class="form-group clearfix">
                                                <label>Comments :</label>
                                                <div>
                                                    <textarea class="form-control" id="comments" name="comments"><?php echo $point->comments; ?></textarea>
                                                </div>
                                            </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="panel-footer">
                                        <div class="col-md-6 col-md-offset-3">
                                            {{ Form::submit('Update', array('class' => 'btn btn-primary')) }}
                                            {{ link_to_route('points.index','Cancel',null, array('class' => 'btn btn-danger')) }}
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
    if($('#points').val()=="")
    {
        alert('Please enter points');
        $('#points').focus();
        return false;
    }
    if($('#example-date-input').val()=="")
    {
        alert('Please enter date');
        $('#example-date-input').focus();
        return false;
    }   
}
</script>
@endsection