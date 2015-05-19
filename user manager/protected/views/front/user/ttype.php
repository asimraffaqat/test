<?php
  $this->breadcrumbs=array(
    'Users'=>array('admin'),
    'Teacher',
);
?>

<div class="portlet">
    <div class="portlet-title">
        <div class="caption">
            Create Teacher
        </div>
    </div>
    <div class="portlet-body form">
        <?php $form=$this->beginWidget('CActiveForm', array(
                    'id'=>'user-student-parent-form',
                    // Please note: When you enable ajax validation, make sure the corresponding
                    // controller action is handling ajax validation correctly.
                    // There is a call to performAjaxValidation() commented in generated controller code.
                    // See class documentation of CActiveForm for details on this.
                    'enableAjaxValidation'=>false,
                    'htmlOptions' => array('enctype'=>'multipart/form-data',
                                    'class'=>'form-horizontal'
                                ),
                )); 
        ?>
            <div class="form-body">
                <h4>
                    <?php echo 'Teacher Data'?>
                </h4>
                <div class="form-group <?php echo ($modelTeacher->hasErrors() && !empty($modelTeacher->getErrors()["firstName"][0])) ? "has-error" : "";?>">
                    <label class="control-label col-md-3">
                        <?php echo $form->labelEx($modelTeacher,'firstName',array('class'=>'help-block')); ?>
                    </label>
                    <div class="col-md-4">
                        <?php echo $form->textField($modelTeacher,'firstName',array('class'=>'form-control')); ?>
                        <?php echo $form->error($modelTeacher,'firstName', array('class'=>'help-block')); ?>
                    </div>
                </div>
                <div class="form-group <?php echo ($modelTeacher->hasErrors() && !empty($modelTeacher->getErrors()["lastName"][0])) ? "has-error" : "";?>">
                    <label class="control-label col-md-3">
                        <?php echo $form->labelEx($modelTeacher,'lastName',array('class'=>'help-block')); ?>
                    </label>
                    <div class="col-md-4">
                        <?php echo $form->textField($modelTeacher,'lastName',array('class'=>'form-control')); ?>
                        <?php echo $form->error($modelTeacher,'lastName', array('class'=>'help-block')); ?>
                    </div>
                </div>
                <div class="form-group <?php echo ($modelTeacher->hasErrors() && !empty($modelTeacher->getErrors()["email"][0])) ? "has-error" : "";?>">
                    <label class="control-label col-md-3">
                        <?php echo $form->labelEx($modelTeacher,'email',array('class'=>'help-block')); ?>
                    </label>
                    <div class="col-md-4">
                        <?php echo $form->textField($modelTeacher,'email',array('class'=>'form-control')); ?>
                        <?php echo $form->error($modelTeacher,'email', array('class'=>'help-block')); ?>
                    </div>
                </div>
                <div class="form-group <?php echo ($modelTeacher->hasErrors() && !empty($modelTeacher->getErrors()["address"][0])) ? "has-error" : "";?>">
                    <label class="control-label col-md-3">
                        <?php echo $form->labelEx($modelTeacher,'address',array('class'=>'help-block')); ?>
                    </label>
                    <div class="col-md-4">
                        <?php echo $form->textField($modelTeacher,'address',array('class'=>'form-control')); ?>
                        <?php echo $form->error($modelTeacher,'address', array('class'=>'help-block')); ?>
                    </div>
                </div>
                <div class="form-group <?php echo ($modelTeacher->hasErrors() && !empty($modelTeacher->getErrors()["phone"][0])) ? "has-error" : "";?>">
                    <label class="control-label col-md-3">
                        <?php echo $form->labelEx($modelTeacher,'phone',array('class'=>'help-block')); ?>
                    </label>
                    <div class="col-md-4">
                        <?php echo $form->textField($modelTeacher,'phone',array('class'=>'form-control')); ?>
                        <?php echo $form->error($modelTeacher,'phone', array('class'=>'help-block')); ?>
                    </div>
                </div>
            </div>
            <div class="form-actions fluid">
                <div class="col-md-offset-3 col-md-9">
                    <?php echo CHtml::submitButton($modelTeacher->isNewRecord ? 'Submit' : 'Save', array('class'=>'btn green')); ?>
                </div>
            </div>
            <?php $this->endWidget(); ?>
    </div>
</div>
