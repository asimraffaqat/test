<?php
$this->breadcrumbs=array(
	'Users'=>array('site/index'),
	'Activity Details',
);


?>


<h1>'<?php echo $model->username; ?>' Activity Details</h1>

<?php $this->widget('bootstrap.widgets.TbGridView', array(
    'type'=>'striped bordered condensed',
	'dataProvider'=>$activities->search($model->id),
	'filter'=>$activities,
	'columns'=>array(
		array( 'name'=>'creationdate', 'header'=>'Date&Time', ),
		'action',
		'description',
		
	),
)); ?>
