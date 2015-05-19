<?php
/* @var $this UserController */
/* @var $model User */

$this->breadcrumbs=array(
	'Users'=>array('admin'),
	$model->username,
);
?>
<div class="portlet box yellow">
    <div class="portlet-title">
        <div class="caption">
            User <?php echo '"'.$model->username.'"'; ?>
        </div>
        <div class="tools">
            <a class="collapse" href="javascript:;"></a>
            <a class="reload" href="javascript:;"></a>
        </div>
    </div>
    <div class="portlet-body" style="display: block;">
            <?php $this->widget('zii.widgets.CDetailView', array(
                        'htmlOptions' => array('class' => 'table table-hover table-striped table-bordered'),
                        'itemTemplate'=>'<tr class=\"{class}\"><th style="width:20%">{label}</th><td>{value}</td></tr>',
	                    'data'=>$model,
	                    'attributes'=>array(
		                    'username',
		                    'type'=>array(
                                'name'=>'type',
                                'value'=>User::model()->get_item("userType", $model->type)
                            ),
		                    'registrationDate'=>array(
                                'name'=>'registrationDate',
                                'value'=>Time::niceShort($model->registrationDate)
                            ),
		                    'lastLogin'=>array(
                                'name'=>'lastLogin',
                                'value'=>Time::niceShort($model->lastLogin)
                            ),
		                    'expireDate'=>array(
                                'name'=>'expireDate',
                                'value'=>Time::niceShort($model->expireDate)
                            ),
                            'userStatus'=>array(
                                'name'=>'userStatus',
                                'value'=>User::model()->get_item("userStatus", $model->userStatus)
                            ),
	                    ),
                    )); 
            ?>
        </div>
</div>
    <?php
        if(!empty($model->userParents)){
    ?>
        <div class="portlet box yellow">
            <div class="portlet-title">
                <div class="caption">
                    Parent Recored of <?php echo '"'.$model->username.'"'; ?>
                </div>
                <div class="tools">
                    <a class="collapse" href="javascript:;"></a>
                    <a class="reload" href="javascript:;"></a>
                </div>
            </div>
            <div class="portlet-body" style="display: block;">
                    <?php $this->widget('zii.widgets.CDetailView', array(
                                'htmlOptions' => array('class' => 'table table-hover table-striped table-bordered'),
                                'itemTemplate'=>'<tr class=\"{class}\"><th style="width:20%">{label}</th><td>{value}</td></tr>',
                                'data'=>$model->userParents,
                                'attributes'=>array(
                                    'firstName',
                                    'lastName',
                                    'email',
                                    'address',
                                    'phone',
                                ),
                            )); 
                    ?>
            </div>
        </div>
    <?php
        }
    ?>
    <?php
        if(!empty($model->userStudents)){
    ?>
        <div class="portlet box yellow">
            <div class="portlet-title">
                <div class="caption">
                    Student Recored of <?php echo '"'.$model->username.'"'; ?>
                </div>
                <div class="tools">
                    <a class="collapse" href="javascript:;"></a>
                    <a class="reload" href="javascript:;"></a>
                </div>
            </div>
            <div class="portlet-body" style="display: block;">
                    <?php $this->widget('zii.widgets.CDetailView', array(
                                'htmlOptions' => array('class' => 'table table-hover table-striped table-bordered'),
                                'itemTemplate'=>'<tr class=\"{class}\"><th style="width:20%">{label}</th><td>{value}</td></tr>',
                                'data'=>$model->userStudents,
                                'attributes'=>array(
                                    'firstName',
                                    'lastName',
                                    'email',
                                    'rollon',
                                    'address',
                                    'phone',
                                    'registrationNo',
                                ),
                            )); 
                    ?>
            </div>
        </div>
    <?php
        }
    ?>
    <?php
        if(!empty($model->userTeachers)){
    ?>
        <div class="portlet box yellow">
            <div class="portlet-title">
                <div class="caption">
                    Teacher Recored of <?php echo '"'.$model->username.'"'; ?>
                </div>
                <div class="tools">
                    <a class="collapse" href="javascript:;"></a>
                    <a class="reload" href="javascript:;"></a>
                </div>
            </div>
            <div class="portlet-body" style="display: block;">
                    <?php $this->widget('zii.widgets.CDetailView', array(
                                'htmlOptions' => array('class' => 'table table-hover table-striped table-bordered'),
                                'itemTemplate'=>'<tr class=\"{class}\"><th style="width:20%">{label}</th><td>{value}</td></tr>',
                                'data'=>$model->userTeachers,
                                'attributes'=>array(
                                    'firstName',
                                    'lastName',
                                    'email',
                                    'address',
                                    'phone',
                                ),
                            )); 
                    ?>
            </div>
        </div>
    <?php
        }
    ?>