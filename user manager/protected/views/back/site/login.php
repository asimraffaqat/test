<?php
$this->pageTitle=Yii::app()->name . ' - Login';
?>

<div class="form">
<?php $form=$this->beginWidget('CActiveForm', array(
    'id'=>'login-form',
    'enableClientValidation'=>true,
    'clientOptions'=>array(
        'validateOnSubmit'=>true,
    ),
)); ?>
<br><br>
<div class="row-fluid" style="margin-left:-2%;margin-bottom:150px;">
    <div class="span3 offset5">

        <div class="row" style="text-align:center;">
            <h2>
                <strong>Login</strong>
            </h2>
        </div>
        <div class="row">
            <?php echo $form->labelEx($model,'username'); ?>
            <?php echo $form->textField($model,'username',array('span'=>12,'style'=>'width:90%;','autocomplete'=>'off')); ?>
            <?php echo $form->error($model,'username'); ?>
        </div>


        <div class="row">
            <?php echo $form->labelEx($model,'password'); ?>
            <?php echo $form->passwordField($model,'password',array('span'=>12,'style'=>'width:90%;','autocomplete'=>'off')); ?>
            <?php echo $form->error($model,'password'); ?>

        </div>

        <div class="row form-inline">
            <?php echo $form->checkBox($model,'rememberMe'); ?>
            <?php echo $form->label($model,'rememberMe'); ?> &nbsp;|&nbsp; <?php echo CHtml::link('Forgot Password?',array('preset/forgot')); ?>  
            <?php echo $form->error($model,'rememberMe'); ?>
        </div>

        <div class="row button form-actions">
            <?php echo TbHtml::submitButton('login',array(
                'color'=>TbHtml::BUTTON_COLOR_PRIMARY,
            )); ?>
        </div>
    </div>
</div><!-- form -->

<?php $this->endWidget(); ?>