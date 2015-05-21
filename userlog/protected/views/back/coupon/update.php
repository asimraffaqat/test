<?php
$this->breadcrumbs=array(
	'Users'=>array('admin'),
	'Update',
);

$this->menu=array(
	array('label'=>'List Coupon', 'url'=>array('index')),
	array('label'=>'Create Coupon', 'url'=>array('create')),
	array('label'=>'View Coupon', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Coupon', 'url'=>array('admin')),
);
?>

<h1>Update Coupon '<?php echo $model->name; ?>'</h1>

<?php 
$pass_value = "********";
 echo $this->renderPartial('_form', array('model'=>$model)); 
 ?>