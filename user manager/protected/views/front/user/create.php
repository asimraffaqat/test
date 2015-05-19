<?php
/* @var $this UserController */
/* @var $model User */

$this->breadcrumbs=array(
	'Users'=>array('admin'),
	'Create',
);

?>
<div class="portlet">
    <div class="portlet-title">
        <div class="caption">
            Create User
        </div>
    </div>
    <?php $this->renderPartial('_form', array('model'=>$model)); ?>
</div>
