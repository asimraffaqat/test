<div class="view">
<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />
*/ ?>
	<b><?php echo CHtml::encode($data->getAttributeLabel('username')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->username), array('view', 'id'=>$data->id)); ?>
	<br />

<?php /* 	<b><?php echo CHtml::encode($data->getAttributeLabel('password')); ?>:</b>
	<?php echo CHtml::encode($data->password); ?>
	<br />
*/ ?>

	<b><?php echo CHtml::encode($data->getAttributeLabel('type')); ?>:</b>
	<?php echo CHtml::encode(User::model()->get_item('type',$data->type)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('email')); ?>:</b>
	<?php echo CHtml::mailto($data->email, $data->email, array('target'=>'_new')); ?>
	<br />
	
	<b><?php echo CHtml::encode($data->getAttributeLabel('userStatus')); ?>:</b>
	<?php echo CHtml::encode(User::model()->get_item('status',$data->userStatus)); ?>
	<br />

	

	<?php /*
	
	<b><?php echo CHtml::encode($data->getAttributeLabel('frstName')); ?>:</b>
	<?php echo CHtml::encode($data->frstName); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('lastName')); ?>:</b>
	<?php echo CHtml::encode($data->lastName); ?>
	<br />
	
	<b><?php echo CHtml::encode($data->getAttributeLabel('phone')); ?>:</b>
	<?php echo CHtml::encode($data->phone); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('address')); ?>:</b>
	<?php echo CHtml::encode($data->address); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('notes')); ?>:</b>
	<?php echo CHtml::encode($data->notes); ?>
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

	*/ ?>

</div>