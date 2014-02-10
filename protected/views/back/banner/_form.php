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
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="form-group">
                <label>Nama</label>
		<?php echo $form->textField($model,'nama',array('size'=>60,'maxlength'=>100,'class'=>'form-control')); ?>
		<?php echo $form->error($model,'nama'); ?>
	</div>
        
        <div class="form-group">
            <input id="pac-input" class="controls" type="text" placeholder="Search Box">
            <div id="map-canvas" style="height:400px">
                
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

  <div class="form-group">
    <label>Keterangan</label>
    <?php echo $form->textArea($model,'keterangan',array('class'=>'form-control')); ?>
    <?php echo $form->error($model,'keterangan'); ?>
  </div>

  <div class="form-group">
    <label>Kategori Banner</label>
    <?php echo $form->dropDownList($model,'inputKategori',CHtml::listData(KategoriBanner::model()->findAll(),'id','nama'),array('multiple'=>'multiple','class'=>'form-control')); ?>
    <?php echo $form->error($model,'inputKategori'); ?>
  </div>

  <div class="form-group">
    <label>Kategori Size</label>
    <?php echo $form->dropDownList($model,'idSize',CHtml::listData(KategoriSize::model()->findAll(),'id','nama'),array('class'=>'form-control')); ?>
    <?php echo $form->error($model,'idSize'); ?>
  </div>

  <div class="form-group">
    <label>Pemilik</label>
    <?php echo $form->dropDownList($model,'idPerusahaan',CHtml::listData(Perusahaan::model()->findAll(),'id','nama'),array('class'=>'form-control')); ?>
    <?php echo $form->error($model,'idPerusahaan'); ?>
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
var myLatlng = new google.maps.LatLng(-25.363882,131.044922);
  var map = new google.maps.Map(document.getElementById("map-canvas"), {
    mapTypeId: google.maps.MapTypeId.ROADMAP,
    zoom: 4,
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
  // [END region_getplaces]

  // Bias the SearchBox results towards places that are within the bounds of the
 
  google.maps.event.addListener(map, "bounds_changed", function() {
    var bounds = map.getBounds();
    searchBox.setBounds(bounds);
  });
}

google.maps.event.addDomListener(window, "load", initialize);
';
Yii::app()->clientScript->registerScriptFile("https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false&libraries=places");
Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl."/js/gmap.js");
Yii::app()->clientScript->registerScript('script-map',$js,  CClientScript::POS_END);