<div class="form-group clearfix">
        {{ Form::label($name, $labeltext, ['class' => '']) }}
    <div>
    	 <label class="switch">
        {{ Form::checkbox($name, $value, $checkstatus ,$attributes) }}
         <span></span>
         </label>
    </div>
</div>