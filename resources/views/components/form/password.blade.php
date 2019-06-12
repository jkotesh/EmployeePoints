<div class="form-group clearfix">
        {{ Form::label($name, $labeltext, ['class' => '']) }}
    <div>
        {{ Form::password($name, array_merge(['class' => 'form-control'], $attributes)) }}
    </div>
</div>