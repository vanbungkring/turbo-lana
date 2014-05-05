<?php

/**
 * This is the model class for table "payment".
 *
 * The followings are the available columns in table 'payment':
 * @property integer $id
 * @property integer $idInvoice
 * @property string $jumlah
 * @property integer $cara
 * @property string $catatan
 */
class Payment extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'payment';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('idInvoice, jumlah, tanggal','required'),
			array('idInvoice, cara', 'numerical', 'integerOnly'=>true),
			array('jumlah', 'length', 'max'=>15),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, idInvoice, jumlah, cara, catatan', 'safe', 'on'=>'search'),
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
			'invoice'=>array(self::BELONGS_TO,'Invoice','idInvoice'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'idInvoice' => 'Id Invoice',
			'jumlah' => 'Jumlah',
			'cara' => 'Cara',
			'catatan' => 'Catatan',
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
		$criteria->compare('idInvoice',$this->idInvoice);
		$criteria->compare('jumlah',$this->jumlah,true);
		$criteria->compare('cara',$this->cara);
		$criteria->compare('catatan',$this->catatan,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Payment the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	const CARA_CASH = 1;
	const CARA_CREDIT = 2;
	const CARA_PAYPAL = 3;
	const CARA_SHEKELS = 4;
	public static function listCara(){
		return array(
			self::CARA_CASH => 'Cash',
			self::CARA_CREDIT => 'Credit',
			self::CARA_PAYPAL => 'Paypal',
			self::CARA_SHEKELS => 'Shekels',
		);
	}
}
