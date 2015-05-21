<?php
  $this->breadcrumbs=array(
    'Users'=>array('admin'),
    'Student/Parent',
);
?>

<div class="portlet">
    <div class="portlet-title">
        <div class="caption">
            Create Student/Parent
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
                    <?php echo 'Student Data'?>
                </h4>
                <div class="form-group <?php echo ($modelStudent->hasErrors() && !empty($modelStudent->getErrors()["firstName"][0])) ? "has-error" : "";?>">
                    <label class="control-label col-md-3">
                        <?php echo $form->labelEx($modelStudent,'firstName',array('class'=>'help-block')); ?>
                    </label>
                    <div class="col-md-4">
                        <?php echo $form->textField($modelStudent,'firstName',array('class'=>'form-control')); ?>
                        <?php echo $form->error($modelStudent,'firstName', array('class'=>'help-block')); ?>
                    </div>
                </div>
                <div class="form-group <?php echo ($modelStudent->hasErrors() && !empty($modelStudent->getErrors()["lastName"][0])) ? "has-error" : "";?>">
                    <label class="control-label col-md-3">
                        <?php echo $form->labelEx($modelStudent,'lastName',array('class'=>'help-block')); ?>
                    </label>
                    <div class="col-md-4">
                        <?php echo $form->textField($modelStudent,'lastName',array('class'=>'form-control')); ?>
                        <?php echo $form->error($modelStudent,'lastName', array('class'=>'help-block')); ?>
                    </div>
                </div>
                <div class="form-group <?php echo ($modelStudent->hasErrors() && !empty($modelStudent->getErrors()["email"][0])) ? "has-error" : "";?>">
                    <label class="control-label col-md-3">
                        <?php echo $form->labelEx($modelStudent,'email',array('class'=>'help-block')); ?>
                    </label>
                    <div class="col-md-4">
                        <?php echo $form->textField($modelStudent,'email',array('class'=>'form-control')); ?>
                        <?php echo $form->error($modelStudent,'email', array('class'=>'help-block')); ?>
                    </div>
                </div>
                <div class="form-group <?php echo ($modelStudent->hasErrors() && !empty($modelStudent->getErrors()["address"][0])) ? "has-error" : "";?>">
                    <label class="control-label col-md-3">
                        <?php echo $form->labelEx($modelStudent,'address',array('class'=>'help-block')); ?>
                    </label>
                    <div class="col-md-4">
                        <?php echo $form->textField($modelStudent,'address',array('class'=>'form-control')); ?>
                        <?php echo $form->error($modelStudent,'address', array('class'=>'help-block')); ?>
                    </div>
                </div>
                <div class="form-group <?php echo ($modelStudent->hasErrors() && !empty($modelStudent->getErrors()["phone"][0])) ? "has-error" : "";?>">
                    <label class="control-label col-md-3">
                        <?php echo $form->labelEx($modelStudent,'phone',array('class'=>'help-block')); ?>
                    </label>
                    <div class="col-md-4">
                        <?php echo $form->textField($modelStudent,'phone',array('class'=>'form-control')); ?>
                        <?php echo $form->error($modelStudent,'phone', array('class'=>'help-block')); ?>
                    </div>
                </div>
                <div class="form-group <?php echo ($modelStudent->hasErrors() && !empty($modelStudent->getErrors()["classId"][0])) ? "has-error" : "";?>">
                    <label class="control-label col-md-3">
                        <?php echo $form->labelEx($modelStudent,'classId',array('class'=>'help-block')); ?>
                    </label>
                    <div class="col-md-4">
                        <?php echo $form->dropDownList($modelStudent,'classId',$classes,array('class'=>'form-control')); ?>
                        <?php echo $form->error($modelStudent,'classId', array('class'=>'help-block')); ?>
                    </div>
                </div>
            </div>
            <div class="form-body">
                <h4>
                    <?php echo 'Parent Data'?>
                </h4>
                <div class="form-group <?php echo ($modelParent->hasErrors() && !empty($modelParent->getErrors()["firstName"][0])) ? "has-error" : "";?>">
                    <label class="control-label col-md-3">
                        <?php echo $form->labelEx($modelParent,'firstName',array('class'=>'help-block')); ?>
                    </label>
                    <div class="col-md-4">
                        <?php echo $form->textField($modelParent,'firstName',array('class'=>'form-control')); ?>
                        <?php echo $form->error($modelParent,'firstName', array('class'=>'help-block')); ?>
                    </div>
                </div>
                <div class="form-group <?php echo ($modelParent->hasErrors() && !empty($modelParent->getErrors()["lastName"][0])) ? "has-error" : "";?>">
                    <label class="control-label col-md-3">
                        <?php echo $form->labelEx($modelParent,'lastName',array('class'=>'help-block')); ?>
                    </label>
                    <div class="col-md-4">
                        <?php echo $form->textField($modelParent,'lastName',array('class'=>'form-control')); ?>
                        <?php echo $form->error($modelParent,'lastName', array('class'=>'help-block')); ?>
                    </div>
                </div>
                <div class="form-group <?php echo ($modelParent->hasErrors() && !empty($modelParent->getErrors()["email"][0])) ? "has-error" : "";?>">
                    <label class="control-label col-md-3">
                        <?php echo $form->labelEx($modelParent,'email',array('class'=>'help-block')); ?>
                    </label>
                    <div class="col-md-4">
                        <?php echo $form->textField($modelParent,'email',array('class'=>'form-control')); ?>
                        <?php echo $form->error($modelParent,'email', array('class'=>'help-block')); ?>
                    </div>
                </div>
                <div class="form-group <?php echo ($modelParent->hasErrors() && !empty($modelParent->getErrors()["address"][0])) ? "has-error" : "";?>">
                    <label class="control-label col-md-3">
                        <?php echo $form->labelEx($modelParent,'address',array('class'=>'help-block')); ?>
                    </label>
                    <div class="col-md-4">
                        <?php echo $form->textField($modelParent,'address',array('class'=>'form-control')); ?>
                        <?php echo $form->error($modelParent,'address', array('class'=>'help-block')); ?>
                    </div>
                </div>
                <div class="form-group <?php echo ($modelParent->hasErrors() && !empty($modelParent->getErrors()["phone"][0])) ? "has-error" : "";?>">
                    <label class="control-label col-md-3">
                        <?php echo $form->labelEx($modelParent,'phone',array('class'=>'help-block')); ?>
                    </label>
                    <div class="col-md-4">
                        <?php echo $form->textField($modelParent,'phone',array('class'=>'form-control')); ?>
                        <?php echo $form->error($modelParent,'phone', array('class'=>'help-block')); ?>
                    </div>
                </div>
            </div>
            <div class="form-actions fluid">
                <div class="col-md-offset-3 col-md-9">
                    <?php echo CHtml::submitButton($modelStudent->isNewRecord ? 'Submit' : 'Save', array('class'=>'btn green')); ?>
                </div>
            </div>
            <?php $this->endWidget(); ?>
    </div>
</div>
