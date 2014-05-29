<?php

/**
 * This is the model class for table "quote3_banner".
 *
 * The followings are the available columns in table 'quote3_banner':
 * @property integer $id
 * @property integer $idQuote
 * @property integer $idBanner
 * @property Banner $banner Description
 * @property string $fileProgress
 */
class Quote3Banner extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'quote3_banner';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('idQuote, idBanner', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, idQuote, idBanner', 'safe', 'on'=>'search'),
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
			'quote3'=>array(self::BELONGS_TO,'Quote3','idQuote'),
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
			'idBanner' => 'Id Banner',
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
		$criteria->compare('idBanner',$this->idBanner);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Quote3Banner the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	const STATUS_AVALIABLE = 1;
	const STATUS_REJECT = 2;

	public static function getListTextStatus(){
		return array(
			self::STATUS_AVALIABLE=>'Available',
			self::STATUS_REJECT=>'Reject',
		);
	}
	public function getTextStatus(){
		$ar = self::getListTextStatus();
		if(isset($ar[$this->status])){
			return $ar[$this->status];
		}
		else{
			return 'Belum Diterima';
		}
	}
    public function getTextQuoteStatus(){
        $str = $this->getTextStatus();
        if($this->banner->status == Banner::STATUS_BOOKED){
            $str .= ' ( Booked ) ';
        }
        return $str;
    }

    public function getFileProgessPath(){
		$path = Yii::app()->params['uploadPath'];
		return $path.'/quote3banner/'.$this->id.'-'.$this->fileProgress;
	}

	public function getFileProgressUrl($absolute=false){
		if($absolute){
			return Yii::app()->getBaseUrl(true).'/files/quote3banner/'.$this->id.'-'.$this->fileProgress;
		}
		else{
			return Yii::app()->request->baseUrl.'/files/quote3banner/'.$this->id.'-'.$this->fileProgress;		
		}
	}

	public function uploadfileProgress($fileUpload){
		$this->fileProgress = $fileUpload->getName();
		$file = $this->getFileProgessPath();
		if(file_exists($file)){
			unlink($file);
		}
		if($fileUpload->saveAs($file)){
            $this->save();
        }
	}
}
