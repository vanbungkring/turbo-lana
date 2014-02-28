<?php

/**
 * This is the model class for table "po".
 *
 * The followings are the available columns in table 'po':
 * @property integer $id
 * @property integer $idMember
 * @property string $time
 * @property string $namaFile
 */
class PO extends CActiveRecord
{
	public $file;
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'po';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs. 
		return array(
			array('idQuote','required'),
			array('idMember, idQuote', 'numerical', 'integerOnly'=>true),
			array('namaFile', 'length', 'max'=>255),
			array('time', 'safe'),
			array('file', 'file','on'=>'create','allowEmpty'=>false),
			array('file', 'file','on'=>'update','allowEmpty'=>true),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, idMember, time, namaFile', 'safe', 'on'=>'search'),
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
			'idMember' => 'Id Member',
			'time' => 'Time',
			'namaFile' => 'Nama File',
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
		$criteria->compare('time',$this->time,true);
		$criteria->compare('namaFile',$this->namaFile,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Po the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function getImagePath(){
		$path = Yii::app()->params['uploadPath'];
		return $path.'/po/'.$this->id.'_'.$this->namaFile;
	}
}
