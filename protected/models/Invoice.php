<?php

/**
 * This is the model class for table "invoice".
 *
 * The followings are the available columns in table 'invoice':
 * @property integer $id
 * @property integer $idPurchaseBillboard
 * @property integer $idMember
 * @property string $tanggal
 * @property string $time
 */
class Invoice extends CActiveRecord
{
	public $formDetail;
	const STATUS_BELUM_LUNAS = 0;
	const STATUS_LUNAS = 1;
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'invoice';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('idPurchaseBillboard, idMember', 'required'),
			array('idPurchaseBillboard, idMember', 'numerical', 'integerOnly'=>true),
			array('tanggal, time, formDetail, total, statusLunas', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, idPurchaseBillboard, idMember, tanggal, time', 'safe', 'on'=>'search'),
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
			'member'=>array(self::BELONGS_TO,'Member','idMember'),
			'detail'=>array(self::HAS_MANY,'InvoiceDetail','idInvoice'),
			'totalBayar'=>array(self::STAT,'payment','idInvoice','select'=>'SUM(jumlah)'),
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
			'idMember' => 'Id Member',
			'tanggal' => 'Tanggal',
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
		$criteria->compare('idPurchaseBillboard',$this->idPurchaseBillboard);
		$criteria->compare('idMember',$this->idMember);
		$criteria->compare('tanggal',$this->tanggal,true);
		$criteria->compare('time',$this->time,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Invoice the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function getNamaSingkat()
    {
		return $this->id.' - '.$this->member->namaDepan.' '.$this->member->namaBelakang.' - '.$this->getKurangBayar();
    }

    public function getKurangBayar(){
    	$totalBayar = $this->totalBayar;
    	if($totalBayar == null){
    		$totalBayar = 0;
    	}
    	return $this->total - $this->totalBayar;
    }
    public function getConcatened()
    {
            return 'a';
    }

    public function findAllLunas(){
		return $this->findAll('statusLunas = :p1',array(
			':p1'=>self::STATUS_BELUM_LUNAS,
		));
	}

	public function checkLunas(){
		if($this->getKurangBayar() <= 0){
			$this->statusLunas = self::STATUS_LUNAS;
			$this->save();
		}
	}
}
