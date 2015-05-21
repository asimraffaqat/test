<?php

class FrontEndController extends Controller
{
//    public $layout='layout_name';
    public $menu=array();
    public $breadcrumbs=array();
	

    public function filters()
    {
        return array(
            'accessControl',
        );
    }
 
    public function accessRules()
    {
		Yii::app()->session['end'] = 1;
        return array(

            array('allow',
                'users'=>array('*'),
                'actions'=>array('index', 'login', 'page', 'contact', 'logout'),
            ),
            /*array('allow',
                'users'=>array('@'),
				'expression'=>'Yii::app()->controller->multipleLoginControl()',
            ),*/
            array('deny',
                'users'=>array('*'),
            ),
        );
    }
	
    protected function afterRender($view, &$output) {
      parent::afterRender($view,$output);
      return true;
    }
	
}