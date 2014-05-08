<?php

/**
 * This is the model class for table "member_profile_perusahaan".
 *
 * The followings are the available columns in table 'member_profile_perusahaan':
 * @property integer $id
 * @property string $idMember
 * @property string $logoPerusahaan
 * @property string $namaBadanUsaha
 * @property string $bidangUsaha
 * @property string $alamat
 * @property string $kota
 * @property string $negara
 * @property string $kodePos
 * @property string $website
 * @property string $email
 * @property string $nomorTelepon
 * @property string $fax
 */
class MemberProfilePerusahaan extends CActiveRecord
{
	public $file;
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'member_profile_perusahaan';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('idMember, namaBadanUsaha, alamat, kota, negara, kodePos, website, email, nomorTelepon, fax', 'length', 'max'=>255),
			array('logoPerusahaan', 'length', 'max'=>200),
			array('bidangUsaha', 'length', 'max'=>100),
			array('file', 'file', 'types'=>'jpg,png,gif','on'=>'update','allowEmpty'=>true),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, idMember, logoPerusahaan, namaBadanUsaha, bidangUsaha, alamat, kota, negara, kodePos, website, email, nomorTelepon, fax', 'safe', 'on'=>'search'),
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
			'logoPerusahaan' => 'Logo Perusahaan',
			'namaBadanUsaha' => 'Nama Badan Usaha',
			'bidangUsaha' => 'Bidang Usaha',
			'alamat' => 'Alamat',
			'kota' => 'Kota',
			'negara' => 'Negara',
			'kodePos' => 'Kode Pos',
			'website' => 'Website',
			'email' => 'Email',
			'nomorTelepon' => 'Nomor Telepon',
			'fax' => 'Fax',
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
		$criteria->compare('idMember',$this->idMember,true);
		$criteria->compare('logoPerusahaan',$this->logoPerusahaan,true);
		$criteria->compare('namaBadanUsaha',$this->namaBadanUsaha,true);
		$criteria->compare('bidangUsaha',$this->bidangUsaha,true);
		$criteria->compare('alamat',$this->alamat,true);
		$criteria->compare('kota',$this->kota,true);
		$criteria->compare('negara',$this->negara,true);
		$criteria->compare('kodePos',$this->kodePos,true);
		$criteria->compare('website',$this->website,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('nomorTelepon',$this->nomorTelepon,true);
		$criteria->compare('fax',$this->fax,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return MemberProfilePerusahaan the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public static function getListBidangUsaha(){
		return array(
			'Advertising'=>'Advertising',
			'Automotive'=>'Automotive',
			'Banking'=>'Banking',
			'Consumer Good'=>'Consumer Good',
			'Fashion'=>'Fashion',
			'Food and Beverage'=>'Food and Beverage',
			'Government'=>'Government',
			'Health'=>'Health',
			'Lifestyle'=>'Lifestyle',
			'Non-profit Organization'=>'Non-profit Organization',
			'Telecomunication'=>'Telecomunication',
			'Tobacco'=>'Tobacco',
			'Travel and Leisure'=>'Travel and Leisure',
			'Other'=>'Other',
		);
		
	}

	public function getFilePath(){
		$path = Yii::app()->params['uploadPath'];
		return $path.'/member/'.$this->id.'-logo-'.$this->logoPerusahaan;
	}

	public function getFileUrl(){
		return Yii::app()->request->baseUrl.'/files/member/'.$this->id.'-logo-'.$this->logoPerusahaan;
	}
}
