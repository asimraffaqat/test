<?php
/**
 * Controller is the customized base controller class.
 * All controller classes for this application should extend from this base class.
 */
class Controller extends CController
{
	/**
	 * @var string the default layout for the controller view. Defaults to '//layouts/column1',
	 * meaning using a single column layout. See 'protected/views/layouts/column1.php'.
	 */
	public $layout='//layouts/column1';
	/**
	 * @var array context menu items. This property will be assigned to {@link CMenu::items}.
	 */
	public $menu=array();
	/**
	 * @var array the breadcrumbs of the current page. The value of this property will
	 * be assigned to {@link CBreadcrumbs::links}. Please refer to {@link CBreadcrumbs::links}
	 * for more details on how to specify this property.
	 */
	public $breadcrumbs=array();
    
    public function isAdmin() {
        if (Yii::app()->user->isGuest)
            return false;
        $user = User::model()->findByPK(Yii::app()->user->id);
        if ($user->type != 0) {
            Yii::app()->user->logout();
            $url = Yii::app()->getBaseUrl(true) . "/site/login";
            $this->redirect($url);
        }
        else
            return true;
    }
    
    public function updateSessionId()
    {
        $user=User::model()->findByPk(Yii::app()->user->id);
        $user->saveAttributes(array('sessionId'=>Yii::app()->getSession()->getSessionID()));
    }
    
    public function updateLoginDate()
    {
        $user=User::model()->findByPk(Yii::app()->user->id);
        $date = date('Y-m-d H:i:s');
        $user->saveAttributes(array('lastLogin'=>$date));
    }
    
    public function updateIp()
    {
        $user=User::model()->findByPk(Yii::app()->user->id);
        $ip = @CHttpRequest::getUserHostAddress();
        $user->saveAttributes(array('ipAddress'=>$ip));
    }
}