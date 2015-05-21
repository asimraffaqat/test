<?php
$this->breadcrumbs=array(
	'Coupons',
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
        $('.search-form').toggle();
        return false;
});
$('.search-form form').submit(function(){
        $.fn.yiiGridView.update('coupon-grid', {
                data: $(this).serialize()
        });
        return false;
});
$('.deleteall-button').click(function(){
        
        var atLeastOneIsChecked = $('input[name=\"coupon-grid_c0[]\"]:checked').length > 0;

        if (!atLeastOneIsChecked)
        {
                alert('Please select atleast one coupon to delete');
        }
        else if (window.confirm('Are you sure you want to delete the selected users?'))
        {
                document.getElementById('coupon-search-form').action='".Yii::app()->baseUrl."/back/coupon/deleteall';
                document.getElementById('coupon-search-form').submit();
        }
});
");
?>

<h1>Manage Coupons</h1>
<?php $this->widget('bootstrap.widgets.TbAlert'); ?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
        'id'=>'coupon-search-form',
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
	'id'=>'coupon-grid',
	'selectableRows'=>2,
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		array(
            'value'=>'$data->id',
			'class'=>'CCheckBoxColumn',
        ),
		'couponid',
		'name',
		'price',
		'description',
		'image',
		
		array(
            'class'=>'bootstrap.widgets.TbButtonColumn',
            'htmlOptions'=>array('style'=>'min-width: 50px;'),
			'template' => '{update} {delete}',
        ),
	),
)); ?>
<?php $this->endWidget(); ?>
</div>