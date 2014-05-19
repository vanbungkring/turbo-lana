<?php

/**
 * This is the model class for table "banner_image".
 *
 * The followings are the available columns in table 'banner_image':
 * @property integer $id
 * @property integer $idBanner
 * @property integer $status
 */
class BannerImage extends CActiveRecord
{
	public $image;
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'banner_image';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('idBanner, status', 'numerical', 'integerOnly'=>true),
			array('image', 'file', 'types'=>'jpg,png,gif','on'=>'create'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, idBanner, status', 'safe', 'on'=>'search'),
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
			'idBanner' => 'Id Banner',
			'status' => 'Status',
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
		$criteria->compare('idBanner',$this->idBanner);
		$criteria->compare('status',$this->status);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return BannerImage the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	public function isImageExist(){
		return file_exists($this->getImagePath());
	}
	public function getImagePath(){
		$path = Yii::app()->params['uploadPath'];
		return $path.'/bannerimage/'.$this->id.'-'.$this->namaFile;
	}

	public function getImageUrl(){
		return Yii::app()->request->baseUrl.'/files/bannerimage/'.$this->id.'-'.$this->namaFile;
	}
}
