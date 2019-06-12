<div class="form-group clearfix">
        {{ Form::label($name, $labeltext, ['class' => '']) }}
    <div>
        {{ Form::number($name, $value, array_merge(['class' => 'form-control','autocomplete'=>'off'], $attributes)) }}
    </div>
</div>
