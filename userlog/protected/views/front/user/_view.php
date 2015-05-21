<?php
/* @var $this UserController */
/* @var $data User */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('username')); ?>:</b>
	<?php echo CHtml::encode($data->username); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('password')); ?>:</b>
	<?php echo CHtml::encode($data->password); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('type')); ?>:</b>
	<?php echo CHtml::encode($data->type); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('userStatus')); ?>:</b>
	<?php echo CHtml::encode($data->userStatus); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('registrationDate')); ?>:</b>
	<?php echo CHtml::encode($data->registrationDate); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('lastLogin')); ?>:</b>
	<?php echo CHtml::encode($data->lastLogin); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('expireDate')); ?>:</b>
	<?php echo CHtml::encode($data->expireDate); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('loginFlag')); ?>:</b>
	<?php echo CHtml::encode($data->loginFlag); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('sessionId')); ?>:</b>
	<?php echo CHtml::encode($data->sessionId); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ipAddress')); ?>:</b>
	<?php echo CHtml::encode($data->ipAddress); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('token')); ?>:</b>
	<?php echo CHtml::encode($data->token); ?>
	<br />

	*/ ?>

</div>