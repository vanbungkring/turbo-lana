
<?php $this->renderPartial('/shared/partial/navbar'); ?>
<?php $this->renderPartial('/shared/partial/homepage/header-wrap');?>
<?php $this->renderPartial('/shared/partial/homepage/city');?>
<?php $this->renderPartial('/shared/partial/homepage/map');?>
<?php $this->renderPartial('/shared/partial/footer');?>



	<?php


	Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl.'/js/jquery.geocomplete.min.js',  CClientScript::POS_END);
	Yii::app()->clientScript->registerScript('script-box','$("#boxcari").geocomplete().bind("geocode:result", function(event, result){
		$("#lat").val(result.geometry.location.lat());
		$("#long").val(result.geometry.location.lng());
 // map.setCenter(new google.maps.LatLng(result.geometry.location.lat(), result.geometry.location.lng()))
	});;',  CClientScript::POS_END);