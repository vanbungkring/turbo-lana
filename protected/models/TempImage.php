<?php

/**
 * This is the model class for table "temp_image".
 *
 * The followings are the available columns in table 'temp_image':
 * @property integer $id
 * @property string $sessionID
 * @property string $mime
 * @property string $fileName
 * @property string $time
 */
class TempImage extends CActiveRecord
{
	public $file;
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'temp_image';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('sessionID, fileName', 'length', 'max'=>255),
			array('mime', 'length', 'max'=>20),
			array('time', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, sessionID, mime, fileName, time', 'safe', 'on'=>'search'),

			array('file', 'file','types'=>'jpg, jpeg, png','allowEmpty'=>false),
		);
	}

	public function beforeSave(){
		
		if($this->isNewRecord){
			if(!$this->file){
				return false;
			}
			$this->sessionID = Yii::app()->session->getSessionID();
			$this->fileName = $this->file->getName();
			$this->mime = $this->file->getType();
			$this->time = date('Y-m-d H:i:s');
		}
		return parent::beforeSave();
	}

	public function afterSave(){
		if($this->isNewRecord){
			$this->file->saveAs($this->getImagePath());
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'sessionID' => 'Session',
			'mime' => 'Mime',
			'fileName' => 'File Name',
			'time' => 'Time',
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
		$criteria->compare('sessionID',$this->sessionID,true);
		$criteria->compare('mime',$this->mime,true);
		$criteria->compare('fileName',$this->fileName,true);
		$criteria->compare('time',$this->time,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return TempImage the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function getImagePath(){
		$path = Yii::app()->params['uploadPath'];
		return $path.'/temp_image/'.$this->id.'_'.$this->fileName;
	}

	public function getImageUrl(){
		return Yii::app()->request->baseUrl.'/files/temp_image/'.$this->id.'_'.$this->fileName;
	}
}
