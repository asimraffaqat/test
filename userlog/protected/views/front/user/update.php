<?php
/* @var $this UserController */
/* @var $model User */

$this->breadcrumbs=array(
	'Users'=>array('admin'),
	'Update',
);
$new_password = "********";
?>
<div class="portlet">
    <div class="portlet-title">
        <div class="caption">
            Update User
        </div>
    </div>
    <?php $this->renderPartial('_form', array('model'=>$model, 'new_password'=>$new_password)); ?>
</div>