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
		<?php echo $form->dropDownList($model,'type',User::model()->get_items('type')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'email'); ?>
		<?php echo $form->textField($model,'email',array('size'=>60,'maxlength'=>256)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>128)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'phone'); ?>
		<?php echo $form->textField($model,'phone',array('size'=>60,'maxlength'=>128)); ?>
	</div>


	<div class="row">
		<?php echo $form->label($model,'userStatus'); ?>
		<?php echo $form->dropDownList($model,'userStatus',User::model()->get_items('status')); ?>
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

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->