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
			array('email', 'length', 'max'=>50),
			array('email','unique'),
			array('nomerTelpon', 'length', 'max'=>40),
			array('password', 'length', 'max'=>32),

			array('namaDepan, namaBelakang, namaPerusahaan, email','required'),
			array('passwordRegister1, passwordRegister2','required','on'=>'register'),
			array('passwordRegister2', 'compare', 'compareAttribute'=>'passwordRegister1','on'=>'register'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, namaDepan, namaBelakang, email, nomerTelpon, namaPerusahaan', 'safe', 'on'=>'search'),
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
	   return parent::beforeSave();
	}
}
