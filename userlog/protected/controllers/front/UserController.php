<?php
Yii::import("application.modules.classsubject.models.ClassSchool");
class UserController extends BackEndController{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
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
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update', 'usertype'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete', 'deleteall'),
				'users'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new User;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['User']))
		{
			$model->attributes=$_POST['User'];
			if($model->save()){
                $redirectUrl = "/school/user/usertype/".$model->id."?type=".$model->type;
                if($model->type == 0 || $model->type == "0"){
                    $this->redirect(array('admin'));
                }
                else if($model->type == 1 ||$model->type == "1"){
                    $this->redirect(array($redirectUrl));
                }
                else if($model->type == 2 ||$model->type == "2"){
                    $this->redirect(array($redirectUrl));
                }
            }
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);
        
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['User']))
		{
			$model->attributes=$_POST['User'];
			if($model->save()){
                $redirectUrl = "/school/user/usertype/".$model->id."?type=".$model->type;
                if($model->type == 0 || $model->type == "0"){
                    $this->redirect(array('admin'));
                }
                else if($model->type == 1 ||$model->type == "1"){
                    $this->redirect(array($redirectUrl));
                }
                else if($model->type == 2 ||$model->type == "2"){
                    $this->redirect(array($redirectUrl));
                }
            }
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('User');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new User('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['User']))
			$model->attributes=$_GET['User'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return User the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=User::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param User $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='user-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
    
    public function actionUserType($id){
        
        $user = $this->loadModel($id);
        
        
        $type = (isset($_GET['type'])) ? $_GET['type'] : "0";
            if($type == 0){
                $this->render("usertype", array(
                ));
            }
            else if($type == 1){
                
                $classes = ClassSchool::model()->getAllActiveClasses();
                if(empty($user->userParents) && empty($user->userStudents)){
                    
                    $modelStudent = new UserStudent;
                    $modelParent = new UserParent;
                }
                else{
                   $modelStudent = $user->userStudents;
                   $modelParent = $user->userParents;
                }
                
                if(isset($_POST['UserStudent'], $_POST['UserParent'])){
        
                    $modelStudent->attributes=$_POST['UserStudent'];
                    $modelParent->attributes=$_POST['UserParent'];
                    
                    $modelStudent->userId = $id;
                    $modelStudent->rollon = $id;
                    $modelStudent->registrationNo = rand();
                    $modelParent->userId = $id;
                    // validate BOTH $model and $UserProfile
                    $validate = $modelStudent->validate();
                    $validate = $modelParent->validate() && $validate;
                    if($validate){
                        if($modelParent->save() && $modelStudent->save()){
                            $this->redirect(array("/user/admin"));
                        }
                    }
                }
                $this->render("sptype", array(
                    'modelStudent'=>$modelStudent,
                    'modelParent' => $modelParent,
                    'classes'=>$classes,
                    'userId'=>$id,
                ));  
            }
            else if($type == 2){
                
                if(empty($user->userTeachers)){
                    $modelTeacher = new UserTeacher;
                }
                else{
                    $modelTeacher = $user->userTeachers;   
                }
                if(isset($_POST['UserTeacher'])){
                    
                    $modelTeacher->attributes = $_POST['UserTeacher'];
                    $modelTeacher->userId = $id;
                    if($modelTeacher->save())
                        $this->redirect(array("/user/admin"));
                }
                $this->render("ttype", array(
                    'modelTeacher'=>$modelTeacher,
                    'userId'=>$id,
                ));
            }
    }
    
    public function actionDeleteAll(){
       
        if (isset($_POST['user-grid_c0']))
        {
            $idsArray = $_POST['user-grid_c0'];
            foreach($idsArray as $uid){
                if($uid != 1 || $uid != "1"){
                    $this->loadModel($uid)->delete();
                }   
            }
            $this->redirect(array('admin'));
        }
        else{
            //Yii::app()->user->setFlash('error', 'Please select at least one record to delete.');
            $this->redirect(array('admin'));
        }    
    }
}
