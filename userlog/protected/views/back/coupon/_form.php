<div class="form">

<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id'=>'coupon-form',
    // Please note: When you enable ajax validation, make sure the corresponding
    // controller action is handling ajax validation correctly.
    // There is a call to performAjaxValidation() commented in generated controller code.
    // See class documentation of CActiveForm for details on this.
    'enableAjaxValidation'=>false,
	'htmlOptions' => array('enctype'=>'multipart/form-data',
                            
                        ),
)); ?>


	<p class="help-block">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<!--div  >
		<?php //echo $form->textFieldControlGroup($model,'couponid',array('span'=>5,'maxlength'=>128)); ?>
	</div-->

	<div  >
		<?php echo $form->textFieldControlGroup($model,'name'); ?>
	</div>
	
	<div  >
		<?php echo $form->textFieldControlGroup($model,'price'); ?>
	</div>

	<div  >
		<?php echo $form->textAreaControlGroup($model,'description',array('span'=>5,'maxlength'=>256)); ?>
	</div>

	<div>
		<?php echo $form->fileFieldControlGroup($model,'image'); ?>
	</div>

    <div class="form-actions">
        <?php echo TbHtml::submitButton($model->isNewRecord ? 'Create' : 'Save',array(
            'color'=>TbHtml::BUTTON_COLOR_PRIMARY,
        )); ?>
    </div>

<?php $this->endWidget(); ?>

</div><!-- form -->
