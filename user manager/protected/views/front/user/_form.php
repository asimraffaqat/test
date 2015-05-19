<?php
/* @var $this UserController */
/* @var $model User */
/* @var $form CActiveForm */
?>
    <div class="portlet-body form">
        <?php $form=$this->beginWidget('CActiveForm', array(
	        'id'=>'user-form',
	        // Please note: When you enable ajax validation, make sure the corresponding
	        // controller action is handling ajax validation correctly.
	        // There is a call to performAjaxValidation() commented in generated controller code.
	        // See class documentation of CActiveForm for details on this.
	        'enableAjaxValidation'=>false,
            'htmlOptions' => array('enctype'=>'multipart/form-data',
                            'class'=>'form-horizontal'
                        ),
        )); ?>
            <div class="form-body">
                <div class="form-group <?php echo ($model->hasErrors() && !empty($model->getErrors()["username"][0])) ? "has-error" : "";?>">
                    <label class="control-label col-md-3">
		                <?php echo $form->labelEx($model,'username',array('class'=>'help-block')); ?>
                    </label>
                    <div class="col-md-4">
		                <?php echo $form->textField($model,'username',array('size'=>60,'maxlength'=>128, 'class'=>'form-control')); ?>
		                <?php echo $form->error($model,'username', array('class'=>'help-block')); ?>
                    </div>
	            </div>
                <div class="form-group <?php echo ($model->hasErrors() && !empty($model->getErrors()['email'][0])) ? 'has-error' : "";?>">
                    <label class="control-label col-md-3">
                        <?php echo $form->labelEx($model,'email', array("class"=>"help-block")); ?>
                    </label>
                    <div class="col-md-4">
                        <?php echo $form->textField($model,'email',array('class'=>'form-control')); ?>
                        <?php echo $form->error($model,'email', array("class"=>"help-block")); ?>
                    </div>
                        
                </div>
                <?php
                    if($model->isNewRecord){
                ?>
                        <div class="form-group <?php echo ($model->hasErrors() && !empty($model->getErrors()['new_password'][0])) ? 'has-error' : "";?>">
                            <label class="control-label col-md-3">
                                <?php echo $form->labelEx($model,'new_password', array("class"=>"help-block")); ?>
                            </label>
                            <div class="col-md-4">
                                <?php echo $form->passwordField($model,'new_password',array('class'=>'form-control')); ?>
                                <?php echo $form->error($model,'new_password', array("class"=>"help-block")); ?>
                            </div>
                        </div>
                        <div class="form-group <?php echo ($model->hasErrors() && !empty($model->getErrors()['new_password_repeat'][0])) ? 'has-error' : "";?>">
                            <label class="control-label col-md-3">
                                <?php echo $form->labelEx($model,'new_password_repeat', array("class"=>"help-block")); ?>
                            </label>
                            <div class="col-md-4">
                                <?php echo $form->passwordField($model,'new_password_repeat',array('class'=>'form-control')); ?>
                                <?php echo $form->error($model,'new_password_repeat', array("class"=>"help-block")); ?>
                            </div>
                        </div>
                <?php
                    }
                    else{
                ?>
                        <div class="form-group <?php echo ($model->hasErrors() && !empty($model->getErrors()['new_password'][0])) ? 'has-error' : "";?>">
                            <label class="control-label col-md-3">
                                <?php echo $form->labelEx($model,'new_password', array("class"=>"help-block")); ?>
                            </label>
                            <div class="col-md-4">
                                <?php echo $form->passwordField($model,'new_password',array('class'=>'form-control', 'value'=>$new_password)); ?>
                                <?php echo $form->error($model,'new_password', array("class"=>"help-block")); ?>
                            </div>
                        </div>
                        <div class="form-group <?php echo ($model->hasErrors() && !empty($model->getErrors()['new_password_repeat'][0])) ? 'has-error' : "";?>">
                            <label class="control-label col-md-3">
                                <?php echo $form->labelEx($model,'new_password_repeat', array("class"=>"help-block")); ?>
                            </label>
                            <div class="col-md-4">
                                <?php echo $form->passwordField($model,'new_password_repeat',array('class'=>'form-control', 'value'=>$new_password)); ?>
                                <?php echo $form->error($model,'new_password_repeat', array("class"=>"help-block")); ?>
                            </div>
                        </div>
                <?php
                    }
                ?>
                <div class="form-group <?php echo ($model->hasErrors() && !empty($model->getErrors()["type"][0])) ? "has-error" : "";?>">
                    <label class="control-label col-md-3">
		                <?php echo $form->labelEx($model,'type', array('class'=>'help-block')); ?>
                    </label>
                    <div class="col-md-4">
		                <?php echo $form->dropDownList($model,'type', User::model()->get_items('userType'), array('class'=>'form-control', 'prompt'=>'Select User Type')); ?>
		                <?php echo $form->error($model,'type', array('class'=>'help-block')); ?>
                    </div>
	            </div>
                <div class="form-group <?php echo ($model->hasErrors() && !empty($model->getErrors()["userStatus"][0])) ? "has-error" : "";?>">
                    <label class="control-label col-md-3">
		                <?php echo $form->labelEx($model,'userStatus', array('class'=>'help-block')); ?>
                    </label>
                    <div class="col-md-4">
                        <?php echo $form->dropDownList($model,'userStatus', User::model()->get_items('userStatus'), array('class'=>'form-control', 'prompt'=>'Select User Status')); ?>
		                <?php echo $form->error($model,'userStatus', array('class'=>'help-block')); ?>
                    </div>
	            </div>
            </div>
	        <div class="form-actions fluid">
                <div class="col-md-offset-3 col-md-9">
		            <?php echo CHtml::submitButton($model->isNewRecord ? 'Submit' : 'Save', array('class'=>'btn green')); ?>
                </div>
	        </div>
        <?php $this->endWidget(); ?>
    </div><!-- form -->