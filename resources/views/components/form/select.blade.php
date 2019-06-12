<div class="form-group clearfix">
        {{ Form::label($name, $labeltext, ['class' => '']) }}
    <div>
        {{ Form::select($name, $valuearray,$value,array_merge(['class' => 'form-control'], $attributes)) }}
    </div>
</div>
