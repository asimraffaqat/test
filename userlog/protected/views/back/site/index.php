<?php 
$this->breadcrumbs=array(
'',
);
$this->pageTitle=Yii::app()->name; ?>

<br>
<h1>User Activity Log</h1>
<br>
<?php $this->widget('bootstrap.widgets.TbGridView', array(
    'type'=>'striped bordered condensed',
    'id'=>'user-grid',
    'dataProvider'=>$users->search(),
    'filter'=>$users,
    'columns'=>array(
//        'id',
        array(
            'name'=>'username',
            'header'=>'Username',
            'value'=>'CHtml::link(CHtml::encode($data->username), array("user/update/".$data->id))',
            'type'=>'raw',
        ),
        array(            
            'name'=>'type',
            'value'=>'User::model()->get_item("type",$data->type)',
            'filter'=>User::model()->get_items("type"),
        ),
        array(            // display 'author.username' using an expression
            'name'=>'userStatus',
            'value'=>'User::model()->get_item("userStatus",$data->userStatus)',
            'filter'=>User::model()->get_items("userStatus"),
        ),
        'lastLogin',
        'ipAddress',
        array(
            'class'=>'CLinkColumn',
            'header'=>'',
            'labelExpression'=>'"Activity Details"',
            'urlExpression'=>'Yii::app()->createUrl("user/activityDetails",array("id"=>$data->id))',
        ),
    ),
)); ?>
