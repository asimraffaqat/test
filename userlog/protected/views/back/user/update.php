<?php
$this->breadcrumbs=array(
	'Users'=>array('admin'),
	'Update',
);

$this->menu=array(
	array('label'=>'List User', 'url'=>array('index')),
	array('label'=>'Create User', 'url'=>array('create')),
	array('label'=>'View User', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage User', 'url'=>array('admin')),
);
?>

<h1>Update User '<?php echo $model->username; ?>'</h1>

<?php 
$pass_value = "********";
 echo $this->renderPartial('_formupdate', array('model'=>$model , 'pass_value'=>$pass_value)); 
 ?>