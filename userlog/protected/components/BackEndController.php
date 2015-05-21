<?php

class BackEndController extends Controller
{

    public $menu=array();
    public $layout = "//layouts/column1";

    public function filters()
    {
        return array(
            'accessControl',
        );
    }
 
    public function accessRules()
    {
		Yii::app()->session['end'] = 0;
        return array(
            array('allow',
                'users'=>array('*'),
                'actions'=>array('index', 'login', 'page', 'contact', 'logout'),
            ),
            array('allow',
				'expression'=>'Yii::app()->controller->isAdmin()',
            ),
            array('deny',
                'users'=>array('*'),
            ),
        );
    }   
}