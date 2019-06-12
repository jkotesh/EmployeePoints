<div class="form-group clearfix">
        {{ Form::label($name, $labeltext, ['class' => '']) }}
    <div>
        {{ Form::email($name, $value, array_merge(['class' => 'form-control','autocomplete'=>'off'], $attributes)) }}
    </div>
</div>