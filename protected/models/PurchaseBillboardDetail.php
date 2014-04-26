<?php

/**
 * This is the model class for table "purchase_billboard_detail".
 *
 * The followings are the available columns in table 'purchase_billboard_detail':
 * @property integer $id
 * @property integer $idPurchaseBillboard
 * @property integer $idBanner
 * @property integer $qty
 * @property string $durasi
 * @property string $harga
 */
class PurchaseBillboardDetail extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'purchase_billboard_detail';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('idPurchaseBillboard, idBanner, qty', 'numerical', 'integerOnly'=>true),
			array('durasi', 'length', 'max'=>200),
			array('harga', 'length', 'max'=>15),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, idPurchaseBillboard, idBanner, qty, durasi, harga', 'safe', 'on'=>'search'),
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
			'banner'=>array(self::BELONGS_TO,'Banner','idBanner'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'idPurchaseBillboard' => 'Id Purchase Billboard',
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
		$criteria->compare('idPurchaseBillboard',$this->idPurchaseBillboard);
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
	 * @return PurchaseBillboardDetail the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function getIterator()
	{
	    $attributes=$this->getAttributes();
	    $attributes['banner'] = array();
	    $attributes['banner']['nama'] = $this->banner->nama;
	    $attributes['banner']['keterangan'] = $this->banner->keterangan;
	    $attributes['banner']['hargaPerBulan'] = $this->banner->hargaPerBulan;
	    $attributes['banner']['hargaPer3Bulan'] = $this->banner->hargaPer3Bulan;
	    $attributes['banner']['hargaPer6Bulan'] = $this->banner->hargaPer6Bulan;
	    $attributes['banner']['hargaPerTahun'] = $this->banner->hargaPerTahun;

	    return new CMapIterator($attributes);
	}
}
