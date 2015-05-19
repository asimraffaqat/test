<?php
$this->breadcrumbs=array(
	'Users',
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
        $('.search-form').toggle();
        return false;
});
$('.search-form form').submit(function(){
        $.fn.yiiGridView.update('user-grid', {
                data: $(this).serialize()
        });
        return false;
});
$('.deleteall-button').click(function(){
        
        var atLeastOneIsChecked = $('input[name=\"user-grid_c0[]\"]:checked').length > 0;

        if (!atLeastOneIsChecked)
        {
                alert('Please select atleast one user to delete');
        }
        else if (window.confirm('Are you sure you want to delete the selected users?'))
        {
                document.getElementById('user-search-form').action='".Yii::app()->baseUrl."/backend.php/user/deleteall';
                document.getElementById('user-search-form').submit();
        }
});
");
?>

<h1>Manage Users</h1>
<?php $this->widget('bootstrap.widgets.TbAlert'); ?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
        'id'=>'user-search-form',
        'enableAjaxValidation'=>false,
        'htmlOptions'=>array('enctype' => 'multipart/form-data')
));
?>
<div style="float:right;">
<?php 
	echo TbHtml::linkButton('Create', array(
		'size' => TbHtml::BUTTON_SIZE_SMALL,
		'url'=>'create',
		'color' => TbHtml::BUTTON_COLOR_SUCCESS,
	));
	echo " ";
	echo TbHtml::button('Delete', array(
		'size' => TbHtml::BUTTON_SIZE_SMALL,
		'name'=>'btndeleteall', 
		'class'=>'deleteall-button',
		'color' => TbHtml::BUTTON_COLOR_DANGER,
	));
?>
</div>
<br><br>

<?php $this->widget('bootstrap.widgets.TbGridView', array(
    'type'=>'striped bordered condensed',
	'id'=>'user-grid',
	'selectableRows'=>2,
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		array(
            'value'=>'$data->id',
			'class'=>'CCheckBoxColumn',
        ),
		'username',
		'email',
		'name',
		array(            
            'name'=>'type',
			'value'=>'User::model()->get_item("type",$data->type)',
			'filter'=>User::model()->get_items("type"),
        ),
		array(            // display 'author.username' using an expression
            'name'=>'userStatus',
			'value'=>'User::model()->get_item("userStatus",$data->userStatus)',
			'filter'=>User::model()->get_items("userStatus"),
			//'htmlOptions'=>array('data-title'=>'A Title', 'data-content'=>'And here\'s some amazing content. It\'s very engaging. right?', 'rel'=>'popover'),
        ),
		array(
            'class'=>'bootstrap.widgets.TbButtonColumn',
            'htmlOptions'=>array('style'=>'min-width: 50px;'),
			'template' => '{update} {delete}',
        ),
	),
)); ?>
<?php $this->endWidget(); ?>
</div>