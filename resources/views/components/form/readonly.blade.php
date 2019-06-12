<div class="form-group clearfix">
        {{ Form::label($name, $labeltext, ['class' => '']) }}
    <div>
        <?php
        if($value == null || $value == '')
            $value=' ';
        ?>
        {{ Form::label($name,$value ,['class' => 'control-label','style'=> 'text-align:left']) }}
    </div>
</div>