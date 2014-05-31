<?php

/**
 * This is the model class for table "member".
 *
 * The followings are the available columns in table 'member':
 * @property integer $id
 * @property string $namaDepan
 * @property string $namaBelakang
 * @property string $email
 * @property string $nomerTelpon
 * @property string $namaPerusahaan
 * @property string $password
 */
class Member extends CActiveRecord
{
	public $passwordRegister1;
	public $passwordRegister2;
	public $newPassword;

	public $updateOldPassword;
	public $updateNewPassword1;
	public $updateNewPassword2;
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'member';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('namaDepan, namaBelakang, namaPerusahaan', 'length', 'max'=>100),
			array('namaPerusahaan', 'length', 'max'=>255),
			array('email', 'length', 'max'=>50),
			array('email','unique'),
			array('nomerTelpon', 'length', 'max'=>40),
			array('password', 'length', 'max'=>32),
			array('newPassword,negara,kota,kodePos,tanggalLahir,updateNewPassword2,updateNewPassword1','safe'),

			array('namaDepan, namaBelakang, email','required'),
			array('passwordRegister1, passwordRegister2','required','on'=>'register'),
			array('passwordRegister2', 'compare', 'compareAttribute'=>'passwordRegister1','on'=>'register'),

			array('updateNewPassword2', 'compare', 'compareAttribute'=>'updateNewPassword1','on'=>'profile'),
			array('updateOldPassword','chekUpdatePassword','on'=>'profile'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, namaDepan, namaBelakang, email, nomerTelpon, namaPerusahaan', 'safe', 'on'=>'search'),
		);
	}

	public function chekUpdatePassword($attribute,$params){
		if($this->updateOldPassword){
			if(md5($this->updateOldPassword) != $this->password){
				$this->addError($attribute, 'Password lama tidak cocok!');
			}
		}
	}
	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'bookmarks'=>array(self::HAS_MANY,'MemberBookmark','idMember'),
			'bannerBookmarks'=>array(self::MANY_MANY,'Banner','member_bookmark(idMember,idBanner)'),
			'quotes3'=>array(self::HAS_MANY,'Quote3','idMember'),
			'profilePerusahaan'=>array(self::HAS_ONE,'MemberProfilePerusahaan','idMember'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'namaDepan' => 'First Name',
			'namaBelakang' => 'Last Name',
			'email' => 'Email Address',
			'nomerTelpon' => 'Phone Number',
			'namaPerusahaan' => 'Company Name',
			'password' => 'Password',
			'passwordRegister1' => 'Password',
			'passwordRegister2' => 'Password'
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('namaDepan',$this->namaDepan,true);
		$criteria->compare('namaBelakang',$this->namaBelakang,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('nomerTelpon',$this->nomerTelpon,true);
		$criteria->compare('namaPerusahaan',$this->namaPerusahaan,true);
		$criteria->compare('password',$this->password,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Member the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function beforeSave(){
	   if($this->passwordRegister1 and $this->passwordRegister2 and $this->passwordRegister1==$this->passwordRegister2){
	   		$this->password = md5($this->passwordRegister1);
	   }

	   if($this->updateOldPassword){

	   		if($this->updateNewPassword1 and $this->updateNewPassword2 and $this->updateNewPassword1==$this->updateNewPassword2){
		   		$this->password = md5($this->updateNewPassword1);
		   }
	   }
	   if(!empty($this->newPassword)){
	   		$this->password = md5($this->newPassword);
	   }

	   if($this->isNewRecord){
    		KiviMail::sendNewJoinEmail($this);
    	}

	   return parent::beforeSave();
	}

	public function isBookmarked($idBanner){
		foreach($this->bookmarks as $bookmark){
			if($bookmark->idBanner == $idBanner){
				return true;
			}
		}
		return false;
	}

	public function isQuoted($idBanner){
		foreach($this->quotes3 as $quote3){
			foreach ($quote3->banners as $key => $quote3banner) {
				if($quote3banner->id == $idBanner){
					return true;
				}
			}
		}
		return false;
	}

	public function addBookmark($idBanner){
		$model = new MemberBookmark();
		$model->idMember = $this->id;
		$model->idBanner = $idBanner;
		$model->time = date("Y-m-d H:i:s");
		return $model->save(false);
	}

	public function removeBookmark($idBanner){
		$model = MemberBookmark::model()->find('idBanner = :idBanner and idMember= :idMember',array(
			':idBanner'=>$idBanner,
			':idMember'=>$this->id,
		));
		if($model === null){
			return false;
		}
		return $model->delete();
	}
	public function findByEmail($email)
	{
	    return self::model()->findByAttributes(array('email' => $email));
	}

	public function verifyPassword($pass){
		return md5($pass) ==  $this->password;
	}

	public function addLog($type,$data){
		$log = new MemberLog();
		$log->idMember = $this->id;
		$log->type = $type;
		$log->time = date('Y-m-d H:i:s');
		$log->data = $data;
		$log->save();
	}
    
    public function getOpenQuote(){
        return Quote3::model()->findAll('idMember = :p1 and (status is null or status = 0)',array(':p1'=>$this->id));
    }

    public function afterFind(){
    	if(!$this->profilePerusahaan){
    		$newProfie = new MemberProfilePerusahaan();
    		$newProfie->attributes = array(
    			'idMember'=>$this->id,
    		);
    		$newProfie->save(false);
    		$this->profilePerusahaan = $newProfie;
    	}
    }

    public function getRecentNotifikasi(){
    	return MemberNotifikasi::model()->findAll(array(
    		'condition'=>'status = :p1',
    		'limit'=>5,
    		'params'=>array(':p1'=>MemberNotifikasi::STATUS_UNREAD),
    	));
    }

    public function createTokenReset(){
    	return md5($this->id.'-'.$this->email).md5('kivi',$this->password);
    }

    public static function createPassword($password){
    	return md5($password);
    }
}
