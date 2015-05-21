<?php
$this->breadcrumbs=array(
	'Coupons'=>array('admin'),
	'Create',
);

?>

<h1>Create Coupon</h1>

<?php 
$pass_value = "";
 echo $this->renderPartial('_form', array('model'=>$model)); 
 ?>