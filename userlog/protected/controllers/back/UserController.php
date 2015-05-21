<?php

class UserController extends BackEndController
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column1';
	public $sts;

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$user = $this->loadModel($id);
		$this->render('view',array(
			'model'=>$user,
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
			
			if($model->save())
				$this->redirect(array('admin'));
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
			
			if($model->save())
				$this->redirect(array('admin'));
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
		if($id != 1)
		{
			if(Yii::app()->request->isPostRequest)
			{
				// we only allow deletion via POST request
				$this->loadModel($id)->delete();

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
		if (isset($_POST['user-grid_c0']))
		{
			$del_camps = $_POST['user-grid_c0'];
			
			$model_camp=new user;
			
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
	
	public function actionActivityDetails($id)
	{

		$model = $this->loadModel($id);
		$activities	=	new ActiveRecordLog('search');
	//	$activities = $model->activities;
		$activities->unsetAttributes();  // clear any default values
		if(isset($_GET['ActiveRecordLog']))
			$activities->attributes=$_GET['ActiveRecordLog'];
		$this->render('activityDetails',array(
			'model'=>$model,
			'activities'=>$activities,
		));
	}
	
	public function actionStudentSubscribe()
	{
		$this->sts = 1;
		$model=new User('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['User']))
			$model->attributes=$_GET['User'];

		$this->render('studentSubscribe',array(
			'model'=>$model,
		));
	}
	
	public function actionStudentSubscribeCreate()
	{
		$this->sts = 1;
		$model=new User;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['User']['id']))
		{
			$i = 0;
			while(isset($_POST['User']['id'][$i]))
			{
				$model = User::model()->findByPk($_POST['User']['id'][$i]);
				$model->id = $_POST['User']['id'][$i];
 				if(isset($_POST['User']['courses']))
					$model->courses = $_POST['User']['courses'];
				else
					$model->courses = array();
				if(isset($_POST['User']['packages']))
					$model->packages = $_POST['User']['packages'];
				else
					$model->packages = array();
				
				$model->new_password = "********";
				$model->new_password_repeat = "********";
				$model->save(false);
				$i++;
			}
			$this->redirect(array('studentSubscribe'));
		}

		$this->render('studentSubscribeCreate',array(
			'model'=>$model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionStudentSubscribeUpdate($id)
	{
		$this->sts = 1;
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
		
			if(isset($_POST['User']))
			{
				$model = User::model()->findByPk($id);
 				if(isset($_POST['User']['courses']))
					$model->courses = $_POST['User']['courses'];
				else
					$model->courses = array();
				if(isset($_POST['User']['packages']))
					$model->packages = $_POST['User']['packages'];
				else
					$model->packages = array();
					
				$model->new_password = "********";
				$model->new_password_repeat = "********";
				$model->save(false);
				$this->redirect(array('studentSubscribe'));
			}
		$this->render('studentSubscribeUpdate',array(
			'model'=>$model,
		));
	}
	
	public function actionStudentRecord()
	{
		$this->sts = 1;
		$model=new Course('search');
		$model->unsetAttributes();  // clear any default values
		$this->render('studentRecord',array(
			'model'=>$model,
		));

	}
	
	public function actionShowStudentRecord($id)
	{
		$q="SELECT *,GROUP_CONCAT(total_avg) AS student_quizes_avg,
	     GROUP_CONCAT(quizId) AS student_quizes_ids,GROUP_CONCAT(times) AS student_quizes_times,GROUP_CONCAT(quizLimit) AS student_quizes_limit
	     FROM 
		(SELECT u.id,username,u.frstName,u.lastName,COUNT(quizId) AS times,quizLimit,courseName,record.courseId,record.quizId,quizName,
		AVG(score) AS total_avg
		FROM srs_scorecard AS record 
		INNER JOIN srs_courses ON record.courseId=srs_courses.id
		INNER JOIN srs_quizzes ON record.quizId=srs_quizzes.id
		INNER JOIN srs_users AS u ON record.userId=u.id 
		WHERE courseId='$id'
		GROUP  BY courseId,userId,quizId) AS r
	    GROUP BY r.courseId,r.id";

 		$connection = yii::app()->db;
		$command=$connection->createCommand($q);
		$result = $command->queryAll();

		$this->render('studentRecordDetails',array(
			'result'=>$result,
		));
	}
	
	public function actionStudentScore()
	{
		$this->sts = 1;
		$model=new User('search');
		$model->unsetAttributes();  // clear any default values

		$this->render('studentScore',array(
			'model'=>$model,
		));
	}

	public function actionStudentScoreCourses ($id)
	{
		$this->sts = 1;
		// $model=new User('search');
		// $model->unsetAttributes();  // clear any default values
		//$model=User::model()->findByPk($id);
		$array1 = User::model()->getCourses($id);
		//print_r($array1); echo "<br><br>";
		$array2 = User::model()->getPackages($id);
		//print_r($array2); exit;
		$this->render('studentScoreCourses',array('array1'=>$array1,'array2'=>$array2,'user_id'=>$id));
	}

	public function actionStudentCoursesDetails ($uid,$cid)
	{
		$this->sts = 1;
		//$array=array();
		$array = User::model()->getSubscription($uid,$cid);
		//print_r($array);exit;
		$this->render('StudentCoursesDetails',array('array'=>$array,'uid'=>$uid,'cid'=>$cid));
	}

	public function actionStudentQuizDetails ($uid,$cid,$qid)
	{
		$array = User::model()->getQuizzes ($uid,$cid,$qid);
		//print_r($array); exit;
		$this->render('studentQuizDetails',array('array'=>$array,'uid'=>$uid,'cid'=>$cid));
	}
	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
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
	 * @param CModel the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='user-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

	public function actionSendemail ()
	{
		//$body = str_replace("{firstName}", $student->first_name, $body);
		$emails = array();
		//$users = array();
		$toString ="";
		$adminEmail = User::model()->findByPk(Yii::app()->user->id)->email;
		$message ="<strong>Following users were added</strong><br>";

		if (isset($_POST['user-grid_c0']))
		{
			$del_camps = $_POST['user-grid_c0'];
			
			$model_camp=new user;
			
			foreach ($del_camps as $_camp_id)
			{
				$user = $model_camp->findByPk($_camp_id);
				$emails[] = $user->email;
				$toString .= $user->email.",";
				//$users[] = $user->frstName." ".$user->lastName;
				$message .= $user->name."<br>";
			}
			
			$toString = substr($toString, 0, -1);
			//echo $toString;
			$model=new Emailer;

			$model->to = $toString;
			Yii::app()->user->setFlash('info', $message);
			$this->render('emailer',array(
				'model'=>$model,
				'emails' =>$emails,
				//'users' => $users,
			));
		}
		else
		{
			//Yii::app()->user->setFlash('error', 'Please select at least one record to delete.');
			//$this->actionAdmin();
			if(isset($_POST['Emailer']))
			{
				$model=new Emailer('newEmail');
			
				//echo "submit";
				$model->attributes=$_POST['Emailer'];
				// performs the validation
				if($model->validate())   // if the inputs are valid
				{
					//echo "yes";
					$emails = $model->to;
					if(strpos($emails, ","))
					{
						$emailist = explode(",", $emails);
						foreach ($emailist as $sEmail)
						{
							if($sEmail != "" || strlen($sEmail) >= 5)
							{
								$to = trim($sEmail);
								$subject = $model->subject;
								$message = $model->message;
								$emailUser = User::model()->findByAttributes(array('email'=>$to));
								$message = str_replace("{username}", $emailUser->username, $message);
								$message = str_replace("{name}", $emailUser->name, $message);
								$message = str_replace("{phone}", $emailUser->phone, $message);
								$from = $adminEmail;
								// To send HTML mail, the Content-type header must be set
								$headers  = 'MIME-Version: 1.0' . "\r\n";
								$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
								$headers .= "From:" . $from;
								mail($to,$subject,$message,$headers);
							}
							else
							{
								Yii::app()->user->setFlash('error', '<strong>Error:</strong> Email parameters not correct');
							}	

						}
						$model->unsetAttributes();  // clear any default values
						Yii::app()->user->setFlash('success', '<strong>Sent!</strong> Your Message was Successfully Sent to the Group');
						$this->redirect(array('user/admin'));
					}
					else
					{
						$to = $model->to;
						$subject = $model->subject;
						$message = $model->message;
						$emailUser = User::model()->findByAttributes(array('email'=>$to));
						$message = str_replace("{username}", $emailUser->username, $message);
						$message = str_replace("{name}", $emailUser->name, $message);
						$message = str_replace("{phone}", $emailUser->phone, $message);
						$from = $adminEmail;
						$headers  = 'MIME-Version: 1.0' . "\r\n";
						$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
						$headers .= "From:" . $from;
						mail($to,$subject,$message,$headers);

						$model->unsetAttributes();  // clear any default values
						Yii::app()->user->setFlash('success', '<strong>Sent!</strong> Your Message was Successfully Sent.');
						$this->redirect(array('user/admin'));
					}
					
				}   
				else
				{
					//echo "no";
				}
					
				$this->render('emailer',array(
					'model'=>$model,
				));
			}	
			else
			{
				$model=new Emailer;
				//$model->unsetAttributes();  // clear any default values

				//if(isset($_GET['User']))
				//	$model->attributes=$_GET['User'];

				$this->render('emailer',array(
					'model'=>$model,
				));
			}
		} 	

		
	}
	public function actionAuthorize ()
	{
		$adminEmail = User::model()->findByPk(Yii::app()->user->id)->email;
		if(isset($_POST['Emailer']))
		{
			$model=new Emailer('newEmail');
			
			$model->attributes=$_POST['Emailer'];
			
			// performs the validation
			if($model->validate())   // if the inputs are valid
			{
				
				$to = $model->to;
				$subject = $model->subject;
				$message = $model->message;
				$from = $adminEmail;
				$headers = "From:" . $from;
				
				mail($to,$subject,$message,$headers);
				/*$u_model = new User;
				$cUsers = $u_model->findAllByAttributes(array('refEmail'=>$to, 'refFlag'=>0));
				
				foreach ($cUsers as $users) 
				{
					//$users->refFlag = 1;
					User::model()->updateAll(array('refFlag'=>1),array('refEmail'=>$to, 'refFlag'=>0);
				}*/

				$rows_updated = User::model()->updateAll(array('refFlag'=>1),'refEmail="'.$to.'" and refFlag="0"');
				//updateAll(array('refFlag'=>1),array('refEmail'=>$to));
				
				//$model->unsetAttributes();  // clear any default values
				Yii::app()->user->setFlash('success', '<strong>Success!</strong> Your Message was Successfully Sent.');
				//if($u_model->save())
				$this->redirect(array('user/admin'));	
			}
			else
			{
				//Yii::app()->user->setFlash('Error', '<strong>Error!</strong> There were Some Errors in Message Format');
				$auth_users_message = "<strong>Following users will be Authenticated</strong> <br>";
				$user_model = new User;
				$user = $user_model->findByPk($_POST['Emailer']['hidden_id']);

				$ref_users = $user_model->findAllByAttributes(array('refEmail'=>$user->refEmail, 'refFlag'=>0));

				foreach ($ref_users as $users) 
				{
					$auth_users_message .= $users->frstName." ".$users->lastName."<br>";
				}
				
				Yii::app()->user->setFlash('info',$auth_users_message);

				$this->render('authorize',array(
					'model'=>$model,
					'user' => $user,
				));
			}


		}	
		else
		{
			$id = $_POST['user-grid_c0']['0']; //Yii::app()->getRequest()->getQuery('id');	
			
			$auth_users_message = "<strong>Following users will be Authenticated</strong> <br>";
			$url = "";
			$user_model = new User;
			$user = $user_model->findByPk($id);
			
			$message1 = "Dear ".$user->refName.",\nPlease help us authorize the following users that have registered with us using you as their reference, \nplease visit the link below to authorize them.";
			$message3 = "";

			$email_model=new Emailer;
			$email_model->to = $user->refEmail;

			$ref_users = $user_model->findAllByAttributes(array('refEmail'=>$user->refEmail, 'refFlag'=>0));

			foreach ($ref_users as $users) 
			{
				$auth_users_message .= $users->frstName." ".$users->lastName."<br>";
				$message3 .= $users->frstName." ".$users->lastName."\n";
				$url .= $users->id.",";
			}
			$url = substr($url, 0, -1);
			$base_url = Yii::app()->request->getBaseUrl(true)."/backend.php/user/authorizeUser?auth=".$url."&e=".$user->refEmail;
			$message2 = "\nThankyou and kind regards,\nAdmin\n\nFollowing users will be Authenticated:-\n";
			$email_model->message = $message1."\n\n".$base_url."\n".$message2.$message3;
			
			$email_model->subject = "User Verification | The Knowledge Foundation";

			Yii::app()->user->setFlash('info',$auth_users_message);
			
			$this->render('authorize',array(
				'model'=>$email_model,
				'user' => $user,
			));
		}
	}

	public function actionAuthorizeUser ()
	{
		$auth = Yii::app()->getRequest()->getQuery('auth');
		$email = Yii::app()->getRequest()->getQuery('auth');
		//echo $auth;
		$user_name = array();
		$ids = explode(",", $auth);

		$user_model = new User;


		foreach ($ids as $id)
		{
			$id = intval($id);
			$user_model->updateByPk($id, array('refFlag' => 2,'type'=> 4));
			$user = $user_model->findByPk($id);
			$user_names[] = $user->frstName." ".$user->lastName;
		}

		$this->render('authorizeUser',array(
			'users'=>$user_names,
		));

	}	
	
	public function retTooltipData ($id, $field)
	{
		$oldvals = Oldvals::model()->findAllByAttributes(array('userId'=>$id,'fieldName'=>$field),array('order'=>'timestamp DESC'));

		if(!empty($oldvals))
		{
			$str = "";
			foreach($oldvals as $vals)
			{
				$str .= "<b>".$vals->fieldValue."</b>   ".date("j-F, Y", strtotime($vals->timestamp))."<br>";
			}
			return $str;
		}
		else
		{
			return "No old values available";
		}
	}
}
