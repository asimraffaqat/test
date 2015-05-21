<?php

class CouponController extends BackEndController
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column1';
	
	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Coupon('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Coupon']))
			$model->attributes=$_GET['Coupon'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}
	
	public function actionIndex(){
		$this->redirect('admin');
	}
	
	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Coupon;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Coupon']))
		{
			$rnd = rand(0,9999);  // generate random number between 0-9999
			$model->attributes=$_POST['Coupon'];
			$model->couponid = uniqid();
			
			$uploadedFile=CUploadedFile::getInstance($model,'image');
			//print_r($uploadedFile);exit;
			$fileName = "{$rnd}-{$uploadedFile}";  // random number + file name
            $model->image = $fileName;
			
			if($model->save()){
				$uploadedFile->saveAs(Yii::app()->basePath.'/../coupon-images/'.$fileName);  // image will uplode to rootDirectory/banner/
				$this->redirect(array('admin'));
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
		$model=new Coupon;
		$model = $model->findByPK($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
		
		if(isset($_POST['Coupon']))
		{
			$rnd = rand(0,9999);  // generate random number between 0-9999
			$model->attributes=$_POST['Coupon'];
			
			$model->couponid = uniqid();
			
			$uploadedFile=CUploadedFile::getInstance($model,'image');
			
			$fileName = "{$rnd}-{$uploadedFile}";  // random number + file name
            $model->image = $fileName;
			
			if($model->save()){
				$uploadedFile->saveAs(Yii::app()->basePath.'/../coupon-images/'.$fileName);  // image will uplode to rootDirectory/banner/
				$this->redirect(array('admin'));
			}
		}

		$this->render('update',array(
			'model'=>$model
		));
	}

	
	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		if(true)
		{
			if(Yii::app()->request->isPostRequest)
			{
				// we only allow deletion via POST request
				Coupon::model()->findByPK($id)->delete();

				// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
				if(!isset($_GET['ajax']))
					$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
			}
			else
				throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
		}
	}
	
	public function actionDeleteAll()
	{
		if (isset($_POST['coupon-grid_c0']))
		{
			$del_camps = $_POST['coupon-grid_c0'];
			
			$model_camp=new Coupon;
			
			foreach ($del_camps as $_camp_id)
			{
				$model_camp->deleteByPk($_camp_id);
			}
									
			$this->actionAdmin();
		}
		else
		{
			Yii::app()->user->setFlash('error', 'Please select at least one record to delete.');
			$this->actionAdmin();
		}               
	}

}