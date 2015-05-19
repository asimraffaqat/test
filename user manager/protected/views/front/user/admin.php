<?php
/* @var $this UserController */
/* @var $model User */

$this->breadcrumbs=array(
	'Users'=>array('admin'),
	'Manage',
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.select-on-check-all').live('click', function(){
    if($(this).is(':checked')){
        $('input[name=\"user-grid_c0[]\"]').each(function(){
           $(this).parent().addClass('checked');
           $(this).parent().parent().addClass('focus');
        });
    }
    else{
        $('input[name=\"user-grid_c0[]\"]').each(function(){
           $(this).parent().removeClass('checked');
           $(this).parent().parent().removeClass('focus');
        });
    }
});
$('.deleteall').click(function(){
        
        var atLeastOneIsChecked = $('input[name=\"user-grid_c0[]\"]:checked').length > 0;

        if (!atLeastOneIsChecked)
        {
                alert('Please select atleast one User to delete');
        }
        else if (window.confirm('Are you sure you want to delete the selected Users?'))
        {
                document.getElementById('user-search-form').action='".Yii::app()->baseUrl."/school/user/deleteall';
                document.getElementById('user-search-form').submit();
        }
});
");
?>
<div class="portlet">
    <div class="portlet-title">
        <div class="caption">
            Users
        </div>
        <div class="actions">
            <div class="btn-group">
                <a class="btn default yellow" href="<?php echo Yii::app()->createUrl("user/create");?>">
                    Create
                </a>
            </div>
            <div class="btn-group">
                <a class="btn default yellow deleteall" href="javascript:void(0);">
                    Delete All
                </a>
            </div>
        </div>
    </div>
<div class="portlet-body">
    <div class="table-container">
<?php 

    $form=$this->beginWidget('CActiveForm', array(
            'id'=>'user-search-form',
            'enableAjaxValidation'=>false,
            'htmlOptions'=>array('enctype' => 'multipart/form-data')
    ));
    
    $this->widget('application.components.GranjurGrid', array(
	'htmlOptions' => array('class' => 'table-scrollable'),
    'itemsCssClass'=>'table table-striped table-bordered table-hover dataTable',
    'id'=>'user-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
    'selectableRows'=>2,
	'columns'=>array(
		array(
            'value'=>'$data->id',
            'class'=>'CCheckBoxColumn',
            'htmlOptions'=>array('style'=>'width: 10px'),
        ),
		'username'=>array(
            'name'=>'username',
            'value'=>'$data->username',
            'htmlOptions'=>array('style'=>'width: 110px'),
        ),
        'registrationDate'=>array(
            'name'=>'registrationDate',
            'value'=>'Time::niceShort($data->registrationDate)',
            'htmlOptions'=>array('style'=>'width: 100px'),
        ),
        'type'=>array(
            'name'=>'type',
            'value'=>'User::model()->get_item("userType", $data->type)',
            'filter'=>User::model()->get_items("userType"),
            'htmlOptions'=>array('style'=>'width: 100px'),
        ),
		'userStatus'=>array(
            'name'=>'userStatus',
            'value'=>'User::model()->get_item("userStatus", $data->userStatus)',
            'filter'=>User::model()->get_items("userStatus"),
            'htmlOptions'=>array('style'=>'width: 100px'),
        ),
		/*
		'lastLogin',
		'expireDate',
		'loginFlag',
		'sessionId',
		'ipAddress',
		'token',
		*/
		array(
			'class'=>'CButtonColumn',
            'template' => '{view} {update} {delete}',
            'htmlOptions'=>array('style'=>'width: 150px'),
            'buttons'=>array
            (
                'view'=>array(
                    'label'=>'<i class="fa fa-search"> View</i>',
                    'imageUrl'=>false,
                    'options'=>array(
                        "class"=>"btn default btn-xs default",
                        
                    ),
                ),
                'update'=>array(
                    'label'=>'<i class="fa fa-edit"></i> Edit',
                    'imageUrl'=>false,
                    'options'=>array(
                        "class"=>"btn default btn-xs purple",
                        
                    ),
                ),
                'delete'=>array(
                    'label'=>'<i class="fa fa-trash-o"></i> Delete',
                    'imageUrl'=>false,
                    'options'=>array(
                        "class"=>"btn default btn-xs red",
                        
                    ),
                ),
            ),
		),
	),
)); 
$this->endWidget();
?>
        </div>
    </div>
</div>