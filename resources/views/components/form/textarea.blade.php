<div class="form-group clearfix">
        {{ Form::label($name, $labeltext, ['class' => '']) }}
    <div class="col-sm-8">
        {{ Form::textarea($name, $value, array_merge(['class' => 'form-control','autocomplete'=>'off'], $attributes)) }}
    </div>
</div>