<div class="form">

<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id'=>'user-form',
    // Please note: When you enable ajax validation, make sure the corresponding
    // controller action is handling ajax validation correctly.
    // There is a call to performAjaxValidation() commented in generated controller code.
    // See class documentation of CActiveForm for details on this.
    'enableAjaxValidation'=>false,
)); ?>


	<p class="help-block">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div  >
		<?php echo $form->textFieldControlGroup($model,'username',array('span'=>5,'maxlength'=>128)); ?>
	</div>

	<div  >
		<?php echo $form->textFieldControlGroup($model,'name',array('span'=>5,'maxlength'=>256)); ?>
	</div>

	<div  >
		<?php echo $form->emailFieldControlGroup($model,'email',array('span'=>5,'maxlength'=>256)); ?>
	</div>

	<div  >
		<?php echo $form->passwordFieldControlGroup($model,'new_password',array('span'=>5,'maxlength'=>128)); ?>
	</div>
	
	<div  >
		<?php echo $form->passwordFieldControlGroup($model,'new_password_repeat',array('span'=>5,'maxlength'=>128)); ?>
	</div>

	<div  >
		<?php echo $form->dropDownListControlGroup($model,'type',User::model()->get_items('type'),array('span'=>5)); ?>
	</div>

	<div  >
		<?php echo $form->dropDownListControlGroup($model,'userStatus',User::model()->get_items('userStatus'),array('span'=>5)); ?>

	</div>

    <div class="form-actions">
        <?php echo TbHtml::submitButton($model->isNewRecord ? 'Create' : 'Save',array(
            'color'=>TbHtml::BUTTON_COLOR_PRIMARY,
        )); ?>
    </div>

<?php $this->endWidget(); ?>

</div><!-- form -->
