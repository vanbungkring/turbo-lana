<?php

/**
 * This is the model class for table "member_log".
 *
 * The followings are the available columns in table 'member_log':
 * @property integer $id
 * @property integer $idMember
 * @property string $time
 * @property string $data
 * @property integer $type
 */
class MemberLog extends CActiveRecord
{
	public $date;
	const TYPE_LOGIN = 1;

	const TYPE_BOOKMARK_BILLBOARD = 2;
	const TYPE_VIEW_DETAIL_BILLBOARD = 3;
	const TYPE_QUOTE_2 = 4;

	private $_text_type = array(
		self::TYPE_LOGIN => 'Login',
		self::TYPE_BOOKMARK_BILLBOARD => 'Melakukan Bookmark Billboard <a href=#{idBanner}',
	);
	public function getText(){
		$_str = '';
		switch ($this->type) {
			case self::TYPE_LOGIN:
				$_str = 'Login';
				break;
			case self::TYPE_BOOKMARK_BILLBOARD:
				$_str = 'Melakukan Bookmark Billboard <a href="'.Yii::app()->createUrl('site/detail',array('id'=>$this->data['idBanner'])).'">#'.$this->data['idBanner'].'</a>';
				break;
			case self::TYPE_VIEW_DETAIL_BILLBOARD:
				$_str = 'Melihat detail inventory Billboard <a href="'.Yii::app()->createUrl('site/detail',array('id'=>$this->data['idBanner'])).'">#'.$this->data['idBanner'].'</a>';
				break;
			case self::TYPE_QUOTE_2:
				$_str = 'Meminta Quotation Billboard <a href="'.Yii::app()->createUrl('site/detail',array('id'=>$this->data['idBanner'])).'">#'.$this->data['idBanner'].'</a>';
				break;
			default:
				break;
		}
		return $_str;
	}
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'member_log';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('idMember, type', 'numerical', 'integerOnly'=>true),
			array('time, data', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, idMember, time, data, type', 'safe', 'on'=>'search'),
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
			'log_data' => 'Log Data',
			'type' => 'Type',
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
		$criteria->compare('log_data',$this->log_data,true);
		$criteria->compare('type',$this->type);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return MemberLog the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function beforeSave(){
		$this->data = CJSON::encode($this->data);
		return parent::beforeSave();
	}

	public function afterSave(){
		$this->data = CJSON::decode($this->data);
		return parent::beforeSave();
	}

	public function afterFind(){
		$this->data = CJSON::decode($this->data);
		$this->date = substr($this->time, 0, 10);
		return parent::beforeSave();
	}
}
