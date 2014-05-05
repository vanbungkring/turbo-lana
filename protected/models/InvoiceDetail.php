<?php

/**
 * This is the model class for table "invoice_detail".
 *
 * The followings are the available columns in table 'invoice_detail':
 * @property integer $id
 * @property integer $idInvoice
 * @property integer $idBanner
 * @property integer $qty
 * @property string $durasi
 * @property string $harga
 */
class InvoiceDetail extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'invoice_detail';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('idInvoice, idBanner, qty', 'numerical', 'integerOnly'=>true),
			array('durasi', 'length', 'max'=>200),
			array('harga', 'length', 'max'=>15),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, idInvoice, idBanner, qty, durasi, harga', 'safe', 'on'=>'search'),
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
			'idInvoice' => 'Id Invoice',
			'idBanner' => 'Id Banner',
			'qty' => 'Qty',
			'durasi' => 'Durasi',
			'harga' => 'Harga',
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
		$criteria->compare('idBanner',$this->idBanner);
		$criteria->compare('qty',$this->qty);
		$criteria->compare('durasi',$this->durasi,true);
		$criteria->compare('harga',$this->harga,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return InvoiceDetail the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
