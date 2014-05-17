<?php

/**
 * This is the model class for table "banner".
 *
 * The followings are the available columns in table 'banner':
 * @property integer $id
 * @property string $nama
 * @property string $lat
 * @property string $long
 * @property double $panjang
 * @property double $tinggi
 * @property double $tinggiDariTanah
 * @property integer $zoom
 * @property integer $status Description
 */
class Banner extends CActiveRecord
{
	public $inputKategori;
	public $image;
    const STATUS_BOOKED = 1;
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'banner';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nama, lat, long, zoom, idPerusahaan, uniqId', 'required'),
			array('uniqId','unique'),
			array('nama', 'length', 'max'=>100),
			array('sku', 'length', 'max'=>200),
			array('harga,hargaPerBulan,hargaPer3Bulan,hargaPer6Bulan,hargaPerTahun
				,zoom,panjang,tinggi,tinggiDariTanah,idSize,jumlahSisi','numerical'),
			array('alamat,inputKategori,keterangan,meta_desc, meta_keyword, formatedAddress','safe'),
			array('image', 'file', 'types'=>'jpg','on'=>'create','allowEmpty'=>true),
			array('image', 'file', 'types'=>'jpg','on'=>'update','allowEmpty'=>true),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, nama, lat, long', 'safe', 'on'=>'search'),
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
			'kategoris'=>array(self::MANY_MANY,'KategoriBanner','banner_kategori(idBanner,idKategori)'),
			'images'=>array(self::HAS_MANY,'BannerImage','idBanner'),
			'jadwals'=>array(self::HAS_MANY,'BannerJadwal','idBanner'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'nama' => 'Nama',
			'alamat' =>'Alamat',
			'lat' => 'Latitude',
			'meta_desc' => 'Meta Description',
			'meta_keyword' => 'Meta Keywords',
			'long' => 'Longitude',
			'idSize' =>'Size',
			'idPerusahaan' => 'Pemilik'
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
		$criteria->compare('nama',$this->nama,true);
		$criteria->compare('lat',$this->lat,true);
		$criteria->compare('alamat',$this->alamat,false);
		$criteria->compare('long',$this->long,true);
		$criteria->compare('meta_desc',$this->meta_desc,false);
		$criteria->compare('meta_keyword',$this->meta_keyword,false);
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Banner the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function updateKategori(){
		BannerKategori::model()->deleteAll('idBanner = :p1',array(
			':p1'=>$this->id,
		));
		if(is_array($this->inputKategori)){
			foreach ($this->inputKategori as $key => $value) {
				$banner = new BannerKategori();
				$banner->idBanner = $this->id;
				$banner->idKategori = $value;
				$banner->save();
			}
		}
	    return parent::afterSave();
	}

	public function fetchKategori(){
		$this->inputKategori = array();
		foreach ($this->kategoris as $key => $value) {
			$this->inputKategori[] = $value->id;
		}
	}
	public function isImageExist(){
		return file_exists($this->getImagePath());
	}
	public function getImagePath(){
		$path = Yii::app()->params['uploadPath'];
		return $path.'/banner/'.$this->id.'.jpg';
	}

	public function getImageUrl(){
		return Yii::app()->request->baseUrl.'/files/banner/'.$this->id.'.jpg';
	}

	public function generateJadwal(){
		$ar = array();	
		foreach ($this->jadwals as $key => $value) {
			$start = explode('-',$value->start);
			$end = explode('-',$value->end);
			$ar[] = array(
				'title'=>'Disewa',
				'start'=>'js:new Date('.(int)$start[0].', '.((int)$start[1]-1).', '.(int)$start[2].')',
				'end'=>'js:new Date('.(int)$end[0].', '.((int)$end[1]-1).', '.(int)$end[2].')',
			);
		}
		return $ar;
	}
}
