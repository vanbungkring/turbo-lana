<div class="container kivi">
	<div class="row">
        <h1>Create Quote</h1>
    </div>
    <?php $form=$this->beginWidget('CActiveForm', array(
		'id'=>'quote-form',
		// Please note: When you enable ajax validation, make sure the corresponding
		// controller action is handling ajax validation correctly.
		// There is a call to performAjaxValidation() commented in generated controller code.
		// See class documentation of CActiveForm for details on this.
		'enableAjaxValidation'=>false,
	  'htmlOptions'=>array('enctype'=>'multipart/form-data'),
	)); ?>
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
			            <td> <?php echo $form->textField($model,'name',array('class'=>'form-control')); ?> </td>
			          </tr>
			          <tr>
			            <td class="front">Initial Date</td>
			            <td> <?php echo $form->textField($model,'initialDate',array('class'=>'form-control')); ?>  </td>
			          </tr>
			          <tr>
			            <td class="front">Reply until</td>
			            <td> <?php echo $form->textField($model,'replyUntil',array('class'=>'form-control')); ?>  </td>
			          </tr>
			          <tr>
			            <td class="front">Duration</td>
			            <td> <?php echo $form->textField($model,'duration',array('class'=>'form-control')); ?> 
			            	<?php echo $form->dropDownList($model,'durationType',$model->getDurationType(),array('class'=>'form-control')); ?>   </td>
			          </tr>
			          <tr>
			            <td class="front">Available Budget</td>
			            <td> <?php echo $form->textField($model,'budget',array('class'=>'form-control')); ?> </td>
			          </tr>
			          <tr>
			            <td class="front">Description </td>
			            <td> <?php echo $form->textField($model,'description',array('class'=>'form-control')); ?> </td>
			          </tr>
			          <tr>
			            <td class="front">Other Observations </td>
			            <td> <?php echo $form->textField($model,'otherObservations',array('class'=>'form-control')); ?> </td>
			          </tr>
			        </tbody>
			      </table>
			    </div>
			</section>
    	</div>
    </div>
    <div class="row banner-detail">
    	<div class="col-md-6">
    		<section id="banner-detail-info-list" class="banner-info-body">
			    <header class="banner-info-header">Aditional info - selected banner</header>
			    <div class="table-responsive">
			      <table class="table table-bordered ">
			        <tbody id="bodySelectedBanner">
			        	<?php foreach ($model->getBannerObj() as $key => $value) : ?>
			        		<tr>
					            <td class="front"><?php echo $value->nama; ?><input type="hidden" value="<?php echo $value->id; ?>" name="bannerIds[]" /></td>
					            <td><?php echo $value->lokasi; ?></td>
					        </tr>
			        	<?php endforeach; ?>
			        </tbody>
			      </table>
			    </div>
			</section>
    	</div>
    	<div class="col-md-6">
    		<section id="banner-detail-info-list" class="banner-info-body">
			    <header class="banner-info-header">Map Banner</header>
			    <div id="map-wrapper" style="height:400px">
			    </div>
			</section>
    	</div>
    </div>
     <button id="btnLogin" type="submit" class="btn btn-default">Create</button>
    <?php $this->endWidget(); ?>
</div>
<div class="modal fade login-popup" id="billboard-popup" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog billboard-preview">
    <div class="modal-content modal-container">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="login-modal">Quote Banner Add</h4>
      </div>
      <div class="modal-body">
        <p class="bg-danger" id="loginError" style="display:none">User Password Tidak Cocok</p>
        <div class="normal-signin">
          <div class="form-group" id="abdNama">
            
          </div>
          <div class="form-group" id="abdLokasi">
            
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button id="btnAddBannerId" type="button" class="btn btn-default" data-dismiss="modal">Add Banner To Quote</button>
      </div>
    </div>
  </div>
</div>
<?php
//google maps render
$js = '
var mapOptions = {
  zoom: 8,
  center: new google.maps.LatLng(-6.17511, 106.86503949999997),
};
var blueIcon = "'.Yii::app()->request->baseUrl.'/images/blue-marker.png";
var map = new google.maps.Map(document.getElementById("map-wrapper"),
  mapOptions);
var markerCluster = new MarkerClusterer(map, []);
var markers = [];
var addedId = [];
function showMarkers(){
  var bounds = map.getBounds();
  var url = "'.Yii::app()->createUrl('site/getMarker').'";
  var x = bounds.id || bounds.ga;
  $.get(url,{ "bounds" : {
    ia_b : x.b,
    ia_d : x.d,
    ta_d : bounds.ta.d,
    ta_b : bounds.ta.b,
  }},function(retJson){
    var newMarker = [];
    retJson.forEach(function(row) {                           
      if(!(row.id in markers)){
        markers[row.id] = row;
        var latLng = new google.maps.LatLng(row.lat,row.long);
        var marker = new google.maps.Marker({
          position: latLng
        });
        google.maps.event.addListener(marker, "click", function() {
        	console.log(row);
        	$("#abdNama").html(row.nama);
        	$("#abdLokasi").html(row.lokasi);
        	$("#btnAddBannerId").unbind("click").click(function(){
        		marker.setIcon(blueIcon);
        		if(row.lokasi == null){
        			row.lokasi = "";
        		}
        		$("#bodySelectedBanner").append("<tr><td class=\"front\">"+row.nama+"<input type=\"hidden\" name=\"bannerIds[]\" value=\""+row.id+"\" /></td><td>"+row.lokasi+"</td></tr>");
        	});
        	$("#billboard-popup").modal("show");
        });
		newMarker.push(marker);
      }
    });
    markerCluster.addMarkers(newMarker);
  },"json");
}
google.maps.event.addListener(map, "idle", showMarkers);
';
Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl.'/js/markerclusterer.js',  CClientScript::POS_END);
Yii::app()->clientScript->registerScript('script-map',$js,  CClientScript::POS_END);