<?php
$this->breadcrumbs=array(
	'Users'=>array('admin'),
	$model->username,
);

?>

<h1>User '<?php echo $model->username; ?>'</h1>
<br>
<?php $this->widget('bootstrap.widgets.BootDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'username',
		array(
            'name'=>'type', 
            'value'=>User::model()->get_item('type',$model->type),
        ),
		'email',
		'name',
		'phone',
		'city',
		'secid',
		'address1',
		'address2',
		array(
            'name'=>'userStatus', 
            'value'=>User::model()->get_item('status',$model->userStatus),
        ),
		'registrationDate',
		'lastLogin',
		'ownerName', 
		'ownerEmail', 
		'ownerPhone', 
		'ownerMobile', 
		'ownerAddress1', 
		'ownerAddress2', 
		'ownerCity', 
		'ownerPostalcode', 
		'key',
	),
)); ?>
