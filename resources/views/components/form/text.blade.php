<div class="form-group clearfix">
        {{ Form::label($name, $labeltext, ['class' => '']) }}
    <div>
        {{ Form::text($name, $value, array_merge(['class' => 'form-control','autocomplete'=>'off'], $attributes)) }}
    </div>
</div>