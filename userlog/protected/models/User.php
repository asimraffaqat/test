    <?php

/**
 * This is the model class for table "srs_users".
 *
 * The followings are the available columns in table 'srs_users':
 * @property string $id
 * @property string $username
 * @property string $password
 * @property integer $type
 * @property string $email
 * @property string $frstName
 * @property string $lastName
 * @property string $phone
 * @property string $notes
 * @property integer $userStatus
 * @property string $registrationDate
 * @property string $lastLogin
 *
 * The followings are the available model relations:
 * @property Courses[] $srsCourses
 */
class User extends MyActiveRecord
{

	public $new_password;
    public $new_password_repeat;

	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return User the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'users';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
		
			array('new_password', 'length', 'max'=>128, 'min' => 4,'message' => "Incorrect password (minimal length 4 symbols)"),
			array('new_password', 'compare'),
			array('new_password_repeat', 'safe'),
			array('new_password, new_password_repeat', 'required'),

			array('username, type, email, userStatus, name', 'required'),
			array('username, email', 'unique'),
//			array('type, userStatus', 'numerical', 'integerOnly'=>true),
			array('name, phone', 'length', 'max'=>128),
			array('username', 'length', 'max'=>20, 'min' => 3,'message' => "Incorrect username (length between 3 and 20 characters)"),
			array('password', 'length', 'max'=>128, 'min' => 4,'message' => "Incorrect password (minimal length 4 symbols)"),
			//array('dateofgrad', 'date', 'format'=>'yyyy-M-d'),
			array('username', 'match', 'pattern' => '/^[A-Za-z0-9_@.]+$/u','message' =>"Incorrect symbols (A-z0-9)."),
			array('email', 'email'),
			array('email', 'length', 'max'=>256),
			array('notes, registrationDate, lastLogin , token', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, username, password, type, email, name, phone, notes, userStatus, registrationDate, lastLogin, ipAddress, client_id, points', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'orders' => array(self::HAS_MANY, 'Orders', 'customer_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'username' => 'Username',
			'password' => 'Password',
			'new_password' => 'Password',
			'new_password_repeat' => 'Password Repeat',
			'type' => 'Type',
			'email' => 'Email',
			'name' => 'Name',
			'phone' => 'Phone',
			'userStatus' => 'User Status',
			'registrationDate' => 'Registration Date',
			'lastLogin' => 'Last Login',
			'client_id' => 'Client',
			'points' => 'Points'
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id,true);
		$criteria->compare('username',$this->username,true);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('type',$this->type);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('phone',$this->phone,true);
		$criteria->compare('userStatus',$this->userStatus);
        $criteria->compare('ipAddress',$this->ipAddress,true);
		$criteria->compare('registrationDate',$this->registrationDate,true);
		$criteria->compare('lastLogin',$this->lastLogin,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	public function pointsSearch()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.
		$user = User::model()->findByPk(Yii::app()->user->id);
		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id,true);
		$criteria->compare('username',$this->username,true);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('type',$this->type);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('phone',$this->phone,true);
		$criteria->compare('userStatus',$this->userStatus);
        $criteria->compare('ipAddress',$this->ipAddress,true);
		$criteria->compare('registrationDate',$this->registrationDate,true);
		$criteria->compare('lastLogin',$this->lastLogin,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	
	protected function beforeSave()
	{
		if(parent::beforeSave())
		{
			
			if($this->isNewRecord)
			{
					$this->registrationDate =  new CDbExpression('NOW()');
					$this->password = $this->new_password;
					$this->password = $this->hashPassword($this->password);
			}
			else
			{
				if($this->new_password!="********")
				{
					$this->password = $this->new_password;
					$this->password = $this->hashPassword($this->password);
				}
			}
				return true;
		}
		else
			return false;
	}
    protected function afterSave()
    {
		parent::afterSave();
		
		return true;

    }

    protected function beforeDelete()
    {
		parent::beforeDelete();
        
		return true;
    }
    
	public function validatePassword($password)
    {
        return $this->hashPassword($password)===$this->password;
    }
 
    public function hashPassword($password)
    {
        return md5($password);
    }
	
	public function getUserName ($id)
	{
		$model = User::model()->findByPk($id);
		if($model)
		{
			$str = $model->frstName." ".$model->lastName;
			return $str;
		}	
		else
			return "Not Available";
	}

	public function getUserRole ($id)
	{
		$model = User::model()->findByPk($id);
		if($model)
		{
			return $model->type;
			
		}
		else
			return null;	
	}

	public function getFullName() {
	    return $this->username;
	}

	public function getSuggest($q) {
	    $c = new CDbCriteria();
	    $c->addSearchCondition('username', $q, true, 'OR');
	    $c->addSearchCondition('email', $q, true, 'OR');
	    return $this->findAll($c);
	}

	public function getUserName2 ($id)
	{
		$model = User::model()->findByPk($id);
		if($model)
		{
			return $model->username;
		}	
		else
			return "Not Available";
	}
	private function deleteDirectory($dir) {
	    if (!file_exists($dir)) 
	    	return true;
	    if (!is_dir($dir)) 
	    	return unlink($dir);
	    foreach (scandir($dir) as $item) 
	    {
	        if ($item == '.' || $item == '..') continue;
	        if (!deleteDirectory($dir.DIRECTORY_SEPARATOR.$item)) 
	        	return false;
    	}
    return rmdir($dir);
	}
    
    public function getUserFullName($id){
        
        $userName = "";
        $user = User::model()->findByPk($id);
        
        if(!empty($user->name))
            $userName = ucfirst($user->name);
        
        return $userName;
    }
}