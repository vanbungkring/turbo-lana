<?php

/**
 * This is the model class for table "quote_reply".
 *
 * The followings are the available columns in table 'quote_reply':
 * @property integer $id
 * @property integer $idQuote
 * @property integer $type
 * @property string $reply
 * @property string $time
 * @property integer $idMember
 * @property integer $idAdmin
 */
class QuoteReply extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'quote_reply';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('reply, idQuote, type', 'required'),
			array('idQuote, type, idMember, idAdmin', 'numerical', 'integerOnly'=>true),
			array('reply, time', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, idQuote, type, reply, time, idMember, idAdmin', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'idQuote' => 'Id Quote',
			'type' => 'Type',
			'reply' => 'Reply',
			'time' => 'Time',
			'idMember' => 'Id Member',
			'idAdmin' => 'Id Admin',
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
		$criteria->compare('idQuote',$this->idQuote);
		$criteria->compare('type',$this->type);
		$criteria->compare('reply',$this->reply,true);
		$criteria->compare('time',$this->time,true);
		$criteria->compare('idMember',$this->idMember);
		$criteria->compare('idAdmin',$this->idAdmin);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return QuoteReply the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
