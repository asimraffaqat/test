<?php

class ActiveRecordLogableBehavior extends CActiveRecordBehavior
{
    private $_oldattributes = array();
 
    public function afterSave($event)
    {
        if(isset(Yii::app()->user->id)) //Yii::app()->session['end']==1  && 
        {
            if (!$this->Owner->isNewRecord) {
     
                // new attributes
                $newattributes = $this->Owner->getAttributes();
                $oldattributes = $this->getOldAttributes();
     
                // compare old and new
                foreach ($newattributes as $name => $value) {
                    if (!empty($oldattributes)) {
                        $old = $oldattributes[$name];
                    } else {
                        $old = '';
                    }
     
                    if ($value != $old) {
                        //$changes = $name . ' ('.$old.') => ('.$value.'), ';
     
                        $log=new ActiveRecordLog;
                        $log->description=  'User ' . Yii::app()->user->Name 
                                                . ' changed ' . $name . ' for ' 
                                                . get_class($this->Owner) 
                                                . '[' . $this->Owner->getPrimaryKey() .']';

                        Yii::app()->session['notify']="Record Changed!";
                        Yii::app()->session['notify_text']= $log->description;
                        $log->action=       'CHANGE';
                        $log->model=        get_class($this->Owner);
                        $log->idModel=      $this->Owner->getPrimaryKey();
                        $log->field=        $name;
                        $log->creationdate= new CDbExpression('NOW()');
                        $log->userId=       Yii::app()->user->id;
                        $log->save();
                    }
                }
            } else {
                $log=new ActiveRecordLog;
                $log->description=  'User ' . Yii::app()->user->Name 
                                        . ' created ' . get_class($this->Owner) 
                                        . '[' . $this->Owner->getPrimaryKey() .']';
                Yii::app()->session['notify']="Record Created!";
                Yii::app()->session['notify_text']= $log->description;
                $log->action=       'CREATE';
                $log->model=        get_class($this->Owner);
                $log->idModel=      $this->Owner->getPrimaryKey();
                $log->field=        '';
                $log->creationdate= new CDbExpression('NOW()');
                $log->userId=       Yii::app()->user->id;
                $log->save();
            }
        }
    }
 

    /*public function view($model)
    {

        $log=new ActiveRecordLog;
        $log->description=  "Viewed a " . User::model()->get_item('multimedia_type',$model->fileType) . " '".$model->url."'";
        $log->action=       'VIEW';
        $log->model=        'ActiveRecordLog';
        $log->idModel=      $model->id;
        $log->field=        '';
        $log->creationdate= new CDbExpression('NOW()');
        $log->userId=       Yii::app()->user->id;
        $log->save();
    }*/

    public function afterDelete($event)
    {
        if(isset(Yii::app()->user->id)) {//Yii::app()->session['end']==1  && 
            $log=new ActiveRecordLog;
            $log->description=  'User ' . Yii::app()->user->Name . ' deleted ' 
                                    . get_class($this->Owner) 
                                    . '[' . $this->Owner->getPrimaryKey() .'].';
            Yii::app()->session['notify']="Record Deleted!";
            Yii::app()->session['notify_text']= $log->description;
            $log->action=       'DELETE';
            $log->model=        get_class($this->Owner);
            $log->idModel=      $this->Owner->getPrimaryKey();
            $log->field=        '';
            $log->creationdate= new CDbExpression('NOW()');
            $log->userId=       Yii::app()->user->id;
            $log->save();
        }
    }
 
    public function afterFind($event)
    {
        if(isset(Yii::app()->user->id)) {//Yii::app()->session['end']==1  && 
            // Save old values
            $this->setOldAttributes($this->Owner->getAttributes());
        }
    }
 
    public function getOldAttributes()
    {
        return $this->_oldattributes;
    }
 
    public function setOldAttributes($value)
    {
        $this->_oldattributes=$value;
    }
}