<?php

/**
 * This is the model class for table "quote".
 *
 * The followings are the available columns in table 'quote':
 * @property integer $id
 * @property integer $name
 * @property string $initialDate
 * @property string $replyUntil
 * @property integer $duration
 * @property integer $durationType
 * @property integer $budget
 * @property string $description
 * @property string $otherObservations
 */
class Quote extends CActiveRecord
{
	public $bannerIds;
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'quote';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, initialDate, duration, durationType, idMember','required'),
			array('duration, durationType, budget', 'numerical', 'integerOnly'=>true),
			array('initialDate, replyUntil, description, otherObservations', 'safe'),
			array('bannerIds','type','type'=>'array','allowEmpty'=>false),
			array('name', 'length', 'max'=>200),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, name, initialDate, replyUntil, duration, durationType, budget, description, otherObservations', 'safe', 'on'=>'search'),
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
			'banners'=>array(self::MANY_MANY,'Banner','quote_banner(idQuote,idBanner)')
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'name' => 'Name',
			'initialDate' => 'Initial Date',
			'replyUntil' => 'Reply Until',
			'duration' => 'Duration',
			'durationType' => 'Duration Type',
			'budget' => 'Budget',
			'description' => 'Description',
			'otherObservations' => 'Other Observations',
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
		$criteria->compare('name',$this->name);
		$criteria->compare('initialDate',$this->initialDate,true);
		$criteria->compare('replyUntil',$this->replyUntil,true);
		$criteria->compare('duration',$this->duration);
		$criteria->compare('durationType',$this->durationType);
		$criteria->compare('budget',$this->budget);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('otherObservations',$this->otherObservations,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Quote the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public static function getDurationType(){
		return array(
			'day(s)',
			'week(s)',
			'month(s)',
			'year(s)',
		);
	}

	public function getBannerObj(){
		if(is_array($this->bannerIds)){
			$criteria = new CDbCriteria();
			$criteria->addInCondition("id", $this->bannerIds);
			return Banner::model()->findAll($criteria);
		}
		else{
			return array();
		}
	}

	public function afterSave(){
		if($this->scenario == 'create'){
			if(is_array($this->bannerIds)){
				foreach ($this->bannerIds as $key => $value) {
					$model = new QuoteBanner();
					$model->idQuote = $this->id;
					$model->idBanner = $value;
					$model->save();
				}
			}
		}
		return parent::afterSave();
	}
}
