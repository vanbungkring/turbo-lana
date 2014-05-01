<?php
/* @var $this BannerController */
/* @var $model Banner */
/* @var $form CActiveForm */
?>

<div class="form">

  <?php $form=$this->beginWidget('CActiveForm', array(
   'id'=>'banner-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
   'enableAjaxValidation'=>false,
   'htmlOptions'=>array('enctype'=>'multipart/form-data'),
   )); ?>

   <p class="note">Fields with <span class="required">*</span> are required.</p>

   <?php echo $form->errorSummary($model); ?>

   <div class="form-group">
    <label>Nama</label>
    <?php echo $form->textField($model,'nama',array('size'=>60,'maxlength'=>100,'class'=>'form-control')); ?>
    <?php echo $form->error($model,'nama'); ?>
  </div>

  <div class="form-group">
    <label>Banner Uniq</label>
    <?php echo $form->textField($model,'uniqId',array('size'=>60,'maxlength'=>100,'class'=>'form-control')); ?>
    <?php echo $form->error($model,'uniqId'); ?>
  </div>

  <div class="form-group">
    <label>Title</label>
    <?php echo $form->textField($model,'uniqId',array('size'=>60,'maxlength'=>100,'class'=>'form-control')); ?>
    <?php echo $form->error($model,'uniqId'); ?>
  </div>

  <div class="form-group">
    <label>Keyword (Separate By Comma)</label>
    <?php echo $form->textField($model,'uniqId',array('size'=>60,'maxlength'=>100,'class'=>'form-control')); ?>
    <?php echo $form->error($model,'uniqId'); ?>
  </div>

  <div class="form-group">
    <label>Description</label>
    <?php echo $form->textField($model,'uniqId',array('size'=>60,'maxlength'=>100,'class'=>'form-control')); ?>
    <?php echo $form->error($model,'uniqId'); ?>
  </div>

  <div class="form-group">
    <input id="pac-input" class="controls" type="text" placeholder="Search Box">
    <div id="map-canvas" style="height:600px">
      
    </div>
  </div>

  <div class="form-group">
    <label>Lat</label>
    <?php echo $form->textField($model,'lat',array('size'=>12,'maxlength'=>12,'id'=>'lat','class'=>'form-control')); ?>
    <?php echo $form->error($model,'lat'); ?>
  </div>

  <div class="form-group">
    <label>Long</label>
    <?php echo $form->textField($model,'long',array('size'=>12,'maxlength'=>12,'id'=>'lng','class'=>'form-control')); ?>
    <?php echo $form->error($model,'long'); ?>
  </div>

  <div class="form-group" style="display:none">
    <label>Zoom</label>
    <?php echo $form->textField($model,'zoom',array('id'=>'zoom','class'=>'form-control')); ?>
    <?php echo $form->error($model,'zoom'); ?>
  </div>

  <div class="form-group">
    <label>Keterangan</label>
    <?php echo $form->textArea($model,'keterangan',array('class'=>'form-control ckeditor')); ?>
    <?php echo $form->error($model,'keterangan'); ?>
  </div>

  <div class="form-group">
    <label>Kategori Banner</label>
    <?php echo $form->dropDownList($model,'inputKategori',CHtml::listData(KategoriBanner::model()->findAll(),'id','nama'),array('multiple'=>'multiple','class'=>'form-control')); ?>
    <?php echo $form->error($model,'inputKategori'); ?>
  </div>

  <div class="form-group">
    <label>Pemilik</label>
    <?php echo $form->dropDownList($model,'idPerusahaan',CHtml::listData(Perusahaan::model()->findAll(),'id','nama'),array('class'=>'form-control')); ?>
    <?php echo $form->error($model,'idPerusahaan'); ?>
  </div>

  <div class="form-group">
    <label>Harga Per Bulan</label>
    <?php echo $form->textField($model,'hargaPerBulan',array('class'=>'form-control')); ?>
    <?php echo $form->error($model,'hargaPerBulan'); ?>
  </div>

  <div class="form-group">
    <label>Harga Per 3 Bulan</label>
    <?php echo $form->textField($model,'hargaPer3Bulan',array('class'=>'form-control')); ?>
    <?php echo $form->error($model,'hargaPer3Bulan'); ?>
  </div>

  <div class="form-group">
    <label>Harga Per 6 Bulan</label>
    <?php echo $form->textField($model,'hargaPer6Bulan',array('class'=>'form-control')); ?>
    <?php echo $form->error($model,'hargaPer6Bulan'); ?>
  </div>

  <div class="form-group">
    <label>Harga Per Tahun</label>
    <?php echo $form->textField($model,'hargaPerTahun',array('class'=>'form-control')); ?>
    <?php echo $form->error($model,'hargaPerTahun'); ?>
  </div>
  
  <div class="form-group">
    <label>Panjang</label>
    <?php echo $form->textField($model,'panjang',array('class'=>'form-control')); ?>
    <?php echo $form->error($model,'panjang'); ?>
  </div>

  <div class="form-group">
    <label>Tinggi</label>
    <?php echo $form->textField($model,'tinggi',array('class'=>'form-control')); ?>
    <?php echo $form->error($model,'tinggi'); ?>
  </div>

  <div class="form-group">
    <label>Tinggi Dari Tanah</label>
    <?php echo $form->textField($model,'tinggiDariTanah',array('class'=>'form-control')); ?>
    <?php echo $form->error($model,'tinggiDariTanah'); ?>
  </div>

  <div class="form-group">
    <label>Banner SIDE (Jumlah sisi banner)</label>
    <?php echo $form->dropDownList($model,'jumlahSisi',array(1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20),array('class'=>'form-control')); ?>
    <?php echo $form->error($model,'jumlahSisi'); ?>
  </div>

  <div class="form-group">
    <label>SKU (Kode Unik banner)</label>
    <?php echo $form->textField($model,'sku',array('class'=>'form-control')); ?>
    <?php echo $form->error($model,'sku'); ?>
  </div>

  <div class="form-group">
    <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save',array('class' => 'btn btn-danger')); ?>
  </div>

  <?php $this->endWidget(); ?>

</div><!-- form -->

<style>
.controls {
  margin-top: 16px;
  border: 1px solid transparent;
  border-radius: 2px 0 0 2px;
  box-sizing: border-box;
  -moz-box-sizing: border-box;
  height: 32px;
  outline: none;
  box-shadow: 0 2px 6px rgba(0, 0, 0, 0.3);
}

#pac-input {
  background-color: #fff;
  padding: 0 11px 0 13px;
  width: 400px;
  font-family: Roboto;
  font-size: 15px;
  font-weight: 300;
  text-overflow: ellipsis;
}

#pac-input:focus {
  border-color: #4d90fe;
  margin-left: -1px;
  padding-left: 14px;  /* Regular padding-left + 1. */
  width: 401px;
}

.pac-container {
  font-family: Roboto;
}

#type-selector {
  color: #fff;
  background-color: #4d90fe;
  padding: 5px 11px 0px 11px;
}

#type-selector label {
  font-family: Roboto;
  font-size: 13px;
  font-weight: 300;
}

</style>


<?php
//google maps render
$js =    '

function initialize() {
  var defLat = '.(double)$model->lat.';
  var defLng = '.(double)$model->long.';
  var myLatlng = new google.maps.LatLng(defLat,defLng);
  var map = new google.maps.Map(document.getElementById("map-canvas"), {
    mapTypeId: google.maps.MapTypeId.ROADMAP,
    zoom: '.(int)$model->zoom.',
    center: myLatlng
  });


var marker = new google.maps.Marker({
  position: myLatlng, 
  map: map, // handle of the map 
  draggable:true
});
function setLocationaa(){
  document.getElementById("lat").value = marker.position.lat();
  document.getElementById("lng").value = marker.position.lng();
  document.getElementById("zoom").value = map.getZoom();
}
setLocationaa();
google.maps.event.addListener(
  marker,
  "drag",
  setLocationaa
  );
  // Create the search box and link it to the UI element.
var input = /** @type {HTMLInputElement} */(
  document.getElementById("pac-input"));
map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);

var searchBox = new google.maps.places.SearchBox(
  /** @type {HTMLInputElement} */(input));

  // [START region_getplaces]
  // Listen for the event fired when the user selects an item from the
  // pick list. Retrieve the matching places for that item.
google.maps.event.addListener(searchBox, "places_changed", function() {
  var places = searchBox.getPlaces();
  var bounds = new google.maps.LatLngBounds();
  for (var i = 0, place; place = places[i]; i++) {
    marker.setPosition(place.geometry.location);
    bounds.extend(place.geometry.location);
  }
  map.fitBounds(bounds);
  setLocationaa();
});

google.maps.event.addDomListener(input, \'keydown\', function(e) {
  if (e.keyCode == 13)
  {
    if (e.preventDefault)
    {
      e.preventDefault();
    }
    else
    {
      e.cancelBubble = true;
      e.returnValue = false;
    }
  }
}); 
  // [END region_getplaces]

  // Bias the SearchBox results towards places that are within the bounds of the

google.maps.event.addListener(map, "bounds_changed", function() {
  document.getElementById("zoom").value = map.getZoom();
  var bounds = map.getBounds();
  searchBox.setBounds(bounds);
});
}

google.maps.event.addDomListener(window, "load", initialize);
';
Yii::app()->clientScript->registerScriptFile("https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false&libraries=places");
Yii::app()->clientScript->registerScript('script-map',$js,  CClientScript::POS_END);