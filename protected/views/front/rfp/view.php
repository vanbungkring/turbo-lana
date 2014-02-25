<div class="container kivi">
	<div class="row">
		<h1>Create Quote</h1>
	</div>
		<div class="row banner-detail">
			<div class="col-md-12 no-padding">
				<section id="banner-detail-info-list" class="banner-info-body">
					<header class="banner-info-header">Deskripsi & Spesifikasi Banner</header>
					<p class="content-description">
						<?php echo CHtml::encode(@$banner->keterangan); ?>
					</p>
					<div class="table-responsive">
						<table class="table table-bordered ">
							<tbody>

								<tr>
									<td class="front">Quote Name</td>
									<td> <?php echo CHtml::encode($model->name); ?> </td>
								</tr>
								<tr>
									<td class="front">Initial Date</td>
									<td> <?php echo CHtml::encode($model->initialDate); ?>  </td>
								</tr>
								<tr>
									<td class="front">Reply until</td>
									<td> <?php echo CHtml::encode($model->replyUntil); ?>  </td>
								</tr>
								<tr>
									<td class="front">Duration</td>
									<td> <?php echo CHtml::encode($model->duration); ?> 
										<?php echo CHtml::encode($model->durationType); ?>   </td>
									</tr>
									<tr>
										<td class="front">Available Budget</td>
										<td> <?php echo CHtml::encode($model->budget); ?> </td>
									</tr>
									<tr>
										<td class="front">Description </td>
										<td> <?php echo CHtml::encode($model->description); ?> </td>
									</tr>
									<tr>
										<td class="front">Other Observations </td>
										<td> <?php echo CHtml::encode($model->otherObservations); ?> </td>
									</tr>
								</tbody>
							</table>
						</div>
					</section>
				</div>
			</div>
			<div class="row banner-detail">

				<div class="col-md-6">
					<div class="tab-content">
						<div class="tab-pane active" id="information">
							<section id="banner-detail-info-list" class="banner-info-body">
								<div class="table-responsive">
									<table class="table table-bordered ">
										<thead>
											<tr>
												<th>Action</th>
												<th>Banner Name</th>
												<th>Location</th>
											</tr>
										</thead>
										<tbody id="bodySelectedBanner">
											<?php foreach ($model->banners as $key => $value) : ?>
											<tr id="rowbanner-<?php echo $value->id; ?>">
												<td><a href="#banner-map" class="gotomap" data-lat="<?php echo $value->lat; ?>" data-long="<?php echo $value->long; ?>" data-zoom="<?php echo $value->zoom; ?>">Go to Map</a></td>
												<td class="front"><?php echo $value->nama; ?><input type="hidden" value="<?php echo $value->id; ?>" name="bannerIds[]" /></td>
												<td><?php echo $value->lokasi; ?></td>
											</tr>
										<?php endforeach; ?>
									</tbody>
								</table>
							</div>
						</section>
					</div>
				</div>
				<div>
					<?php $form=$this->beginWidget('CActiveForm', array(
						'id'=>'quote-reply',
						'enableAjaxValidation'=>false,
					)); ?>
					<div class="row">
				        <?php echo $form->labelEx($modelReply,'reply'); ?>
				        <?php echo $form->textArea($modelReply,'reply'); ?>
				        <?php echo $form->error($modelReply,'reply'); ?>
				    </div>
				    <div class="row buttons">
				        <?php echo CHtml::Button('Reply',array('id'=>'btnSendReply')); ?> 
				    </div>
				    <?php $this->endWidget(); ?>
					<?php 
						$this->widget('zii.widgets.CListView', array(
						    'dataProvider'=>$dataProviderReply,
						    'id'=>'listreply',
						    'ajaxType'=>'GET',
						    'itemView'=>'_reply',   // refers to the partial view named '_post'
						));
					?>
				</div>
			</div>
		<div class="col-md-6" id="banner-map">
			<section id="banner-detail-info-list" class="banner-info-body">
				<header class="banner-info-header">Map Banner</header>
				<input id="pac-input" class="controls" type="text" placeholder="Search Box">
				<div id="map-wrapper" style="height:400px">
				</div>
			</section>
		</div>
	</div>
</div>

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
$js = '
var mapOptions = {
	zoom: 8,
	center: new google.maps.LatLng(-6.17511, 106.86503949999997),
};
var redIcon = "'.Yii::app()->request->baseUrl.'/images/red-marker.png";
var map = new google.maps.Map(document.getElementById("map-wrapper"),
	mapOptions);


var input = /** @type {HTMLInputElement} */(
      document.getElementById("pac-input"));
map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);
var searchBox = new google.maps.places.SearchBox(
    /** @type {HTMLInputElement} */(input));
google.maps.event.addListener(searchBox, "places_changed", function() {
    var places = searchBox.getPlaces();
    var bounds = new google.maps.LatLngBounds();
    for (var i = 0, place; place = places[i]; i++) {
      bounds.extend(place.geometry.location);
    }
	map.fitBounds(bounds);
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

var markerCluster = new MarkerClusterer(map, []);
var markers = '.CJSON::encode($model->banners).';
for (i=0; i < markers.length; i++) { 
	console.log(markers[i]);
	markerCluster.addMarker(new google.maps.Marker({
		position: new google.maps.LatLng(markers[i].lat, markers[i].long)
	}));
}

$(document).on("click",".gotomap",function(){
	map.setCenter(new google.maps.LatLng($(this).attr("data-lat"), $(this).attr("data-long")));
	map.setZoom(parseInt($(this).attr("data-zoom")));
});
';
$jsr = '
function send()
{
 
    var data=$("#quote-reply").serialize(); 
    data += "&" + $.param({ ajaxret : "quote-form" });
    $.post("",data,function(ret){
    	if(ret.status == 0){
    		alert(ret.message);
    	}
    	else{
    		$.fn.yiiListView.update("listreply");
    	}
    },"json")
}
$("#btnSendReply").click(send);
';
Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl.'/js/markerclusterer.js',  CClientScript::POS_END);
Yii::app()->clientScript->registerScript('script-map',$js,  CClientScript::POS_END);
Yii::app()->clientScript->registerScript('script-rep',$jsr,  CClientScript::POS_END);