<div class="form-group clearfix">
    {{ Form::label($name, $labeltext, ['class' => '']) }}
    <div>
        {{ Form::radio($name, $value, '') }}
    </div>
</div>