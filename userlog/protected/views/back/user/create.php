<?php
$this->breadcrumbs=array(
	'Users'=>array('admin'),
	'Create',
);

?>

<h1>Create User</h1>

<?php 
$pass_value = "";
 echo $this->renderPartial('_form', array('model'=>$model , 'pass_value'=>$pass_value)); 
 ?>