<?php

/**
 * This is the model class for table "quote3".
 *
 * The followings are the available columns in table 'quote3':
 * @property integer $id
 * @property integer $idMember
 * @property string $name
 * @property string $tanggalMulai
 * @property string $tanggalBerakhir
 * @property string $budget
 * @property integer $deskripsi
 * @property string $catatan
 * @property string $description
 * @property string $time
 */
class Quote3 extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'quote3';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('idMember', 'numerical', 'integerOnly'=>true),
			array('name', 'length', 'max'=>200),
			array('budget', 'length', 'max'=>15),
			array('tanggalMulai, tanggalBerakhir, catatan, time, deskripsi', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, idMember, name, tanggalMulai, tanggalBerakhir, budget, deskripsi, catatan, description, time', 'safe', 'on'=>'search'),
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
			'banners'=>array(self::MANY_MANY,'Banner','quote3_banner(idQuote,idBanner)'),
			'quoteBanners'=>array(self::HAS_MANY,'Quote3Banner','idQuote'),
			'totalInventori'=>array(self::STAT,'Quote3Banner','idQuote'),
			'member'=>array(self::BELONGS_TO,'Member','idMember'),
		);
	}

	public function addBanner($idBanner){
		$model = new Quote3Banner();
		$model->idQuote = $this->id;
		$model->idBanner = $idBanner;
		return $model->save(false);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'idMember' => 'Id Member',
			'name' => 'Name',
			'tanggalMulai' => 'Tanggal Mulai',
			'tanggalBerakhir' => 'Tanggal Berakhir',
			'budget' => 'Budget',
			'deskripsi' => 'Deskripsi',
			'catatan' => 'Catatan',
			'description' => 'Description',
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
		$criteria->compare('idMember',$this->idMember);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('tanggalMulai',$this->tanggalMulai,true);
		$criteria->compare('tanggalBerakhir',$this->tanggalBerakhir,true);
		$criteria->compare('budget',$this->budget,true);
		$criteria->compare('deskripsi',$this->deskripsi);
		$criteria->compare('catatan',$this->catatan,true);
		$criteria->compare('time',$this->time,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Quote3 the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	const STATUS_APPROVED = 1; // atau campaign pending

	public static function getListTextStatus(){
		return array(
			self::STATUS_APPROVED=>'Pending',
		);
	}
	public function isStatusNotSet(){
		if($this->status == 1 or $this->status ==2){
			return false;
		}
		else
			return true;
	}
}
