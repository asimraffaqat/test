<?php
/**
 * User API controller
 */
class CouponController extends ApiController
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
                     'test', 'admin', 'getallcoupons',
                 ),
			),
		);
	}
	
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
	
	public function actionGetAllCoupons(){
		$model = Coupon::model()->findAll();
		
		$aaray = array();
		for($i = 0; $i < count($model); $i++){
			$aaray[$i] = $model[$i];
		}
		
		$this->sendResponse(200, $aaray);
		
		Yii::app()->end();
	}
	   
	public function actionTest() {
		//get json request
        $request = $this->getJsonRequest();

		$arr = print_r($request['name']);
		
        $this->sendResponse(200, $arr);
        Yii::app()->end();
    }
}