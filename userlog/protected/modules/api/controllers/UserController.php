<?php
/**
 * User API controller
 */
class UserController extends ApiController
{
	public function filters()
    {
        return array(
            'accessControl',
        );
    }
	
	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(	
			array('allow',  // deny all users
				'users'=>array('*'),
				 'actions'=>array(
                     'test',
                 ),
			),
		);
	}
	
	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new User;

		//get json request
        $request = $this->getJsonRequest();
		
		$model->name = $request['name'];
		$model->email = $request['email'];
		$model->age = $request['age'];
		
		$response = 'user created';
		$this->sendResponse(200, $response);
		
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['User']))
		{
			$model->attributes=$_POST['User'];
			
			if($model->save())
				$this->redirect(array('admin'));
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}
	   
	public function actionTest() {
		//get json request
        $request = $this->getJsonRequest();

		$arr = print_r($request['name']);
		
        $this->sendResponse(200, $arr);
        Yii::app()->end();
    }
}