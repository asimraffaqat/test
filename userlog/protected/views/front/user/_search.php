<?php
/* @var $this UserController */
/* @var $model User */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id'); ?>
		<?php echo $form->textField($model,'id',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'username'); ?>
		<?php echo $form->textField($model,'username',array('size'=>60,'maxlength'=>128)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'type'); ?>
		<?php echo $form->textField($model,'type'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'userStatus'); ?>
		<?php echo $form->textField($model,'userStatus'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'registrationDate'); ?>
		<?php echo $form->textField($model,'registrationDate'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'lastLogin'); ?>
		<?php echo $form->textField($model,'lastLogin'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'expireDate'); ?>
		<?php echo $form->textField($model,'expireDate'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'loginFlag'); ?>
		<?php echo $form->textField($model,'loginFlag'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'sessionId'); ?>
		<?php echo $form->textField($model,'sessionId',array('size'=>60,'maxlength'=>256)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ipAddress'); ?>
		<?php echo $form->textField($model,'ipAddress',array('size'=>60,'maxlength'=>128)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'token'); ?>
		<?php echo $form->textField($model,'token',array('size'=>60,'maxlength'=>256)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->