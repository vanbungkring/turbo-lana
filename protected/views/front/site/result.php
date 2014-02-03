<!-- Fixed navbar -->
<div class="navbar navbar-default navbar-fixed-top" role="navigation">

  <div class="container">

    <div class="row search-header">
      <div class="btn-group left">
        <button type="button" class="btn btn-default">List View</button>
        <button type="button" class="btn btn-default active">Map View</button>
      </div>
    </div>
    
    <div class="navbar-header">
      <a class="navbar-brand" href="#"><img src="http://www.kiviads.net/img/icn_logo.png"></a>
    </div>

    <div class="navbar-collapse collapse">
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#">Home</a></li>
        <li><a href="#">About Us</a></li>
        <li class="active"><a href="./">Job</a></li>
      </ul>
    </div><!--/.nav-collapse -->
  </div>
</div>

<div class="container container-full fill">
  <div class="content-wrapper">
    <div class="filter-list">

      <div class="nav-header"> Price range </div>
      <div class="row">

        <div class="price-tag">
          <input type="text" class="rate-min" id="rate-min" readonly>  
          <input type="text" class="rate-max" id="rate-max" readonly>  
        </div>

        <div class="price-slider"></div>
      </div>

      <div class="nav-header"> Banner Categories </div>
      <ul>
        <li><label><input type="checkbox" value="1"> Alternative</label></li> 
        <li><label><input type="checkbox" value="2"> Billboard</label></li> 
        <li><label><input type="checkbox" value="3"> Digital Network (DOOH)</label></li> 
        <li><label><input type="checkbox" value="4"> Indoor/Place Based</label></li> 
        <li><label><input type="checkbox" value="5"> Station &amp; Port</label></li> 
        <li><label><input type="checkbox" value="6"> Street Furniture</label></li> 
        <li><label><input type="checkbox" value="7"> Transit &amp; Mobile</label></li> 
        <li><label><input type="checkbox" value="1"> Alternative</label></li> 
        <li><label><input type="checkbox" value="2"> Billboard</label></li> 
        <li><label><input type="checkbox" value="3"> Digital Network (DOOH)</label></li> 
        <li><label><input type="checkbox" value="4"> Indoor/Place Based</label></li> 
        <li><label><input type="checkbox" value="5"> Station &amp; Port</label></li> 
        <li><label><input type="checkbox" value="6"> Street Furniture</label></li> 
        <li><label><input type="checkbox" value="7"> Transit &amp; Mobile</label></li> 

      </ul>
      <div class="nav-header"> Banner Categories </div>
      <ul>
        <li><label><input type="radio" name="type" value="both" checked="checked"> Digital &amp; Traditional</label></li>
        <li><label><input type="radio" name="type" value="digital"> Digital</label></li>
        <li><label><input type="radio" name="type" value="traditional"> Traditional</label></li>
      </ul>
    </div>

  </div>
  <div id="map-wrapper"></div>
</div> 

<div class="modal fade bs-modal-lg" id="billboard-popup" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog billboard-preview">
    <div class="modal-content modal-container">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Jl.Rasuna Said Jakarta Selatan</h4>
      </div>
      <div class="modal-body">
        <img src="http://www.kiviads.net/img/billboard-img.jpg">
        <hr>
        <h4>Overflowing text to show scroll behavior</h4>
        <p>Overflowing text to show scroll behavior s lacus vel augue laoreet rutrum faucibus dolor auctor. Aenean lacinia bibendum nulla sed consectetur. Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Donec sed odio dui. Donec ullamcorper nulla non metus auctor fringilla. Cras mattis consectetur purus sit amet fermentum. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor.</p>
        <div class="billboard-spec">
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>

<?php
//google maps render
$js =    '
var markers = {};
var map = null;
var markerCluster = null;
$("#map-wrapper").gmap3({
  map:{
    options:{
      center:[48.8620722, 2.352047],
      zoom: 13,
      mapTypeId:google.maps.MapTypeId.ROADMAP,
      mapTypeControl: false,
      navigationControl: false,
      scrollwheel: true,
      streetViewControl: false
    },
    events : {
      "idle" : function(){
        if(map == null){
          map = $(this).gmap3("get");
          markerCluster = new MarkerClusterer(map, []);
        }
                        // first get the map bounds
        var bounds = map.getBounds();
        console.log(bounds);
        var url = "'.Yii::app()->createUrl('site/getMarker').'";
        $.get(url,{ "bounds" : {
          ia_b : bounds.ia.b,
          ia_d : bounds.ia.d,
          ta_d : bounds.ta.d,
          ta_b : bounds.ta.b,
        }  },function(retJson){
          var newMarker = [];
          retJson.forEach(function(row) {                           
            if(!(row.id in markers)){
              markers[row.id] = row;
              var latLng = new google.maps.LatLng(row.lat,row.long);
              var marker = new google.maps.Marker({
                position: latLng
              });
google.maps.event.addListener(marker, "click", function() {
  $("#billboard-popup").modal("show");
});
google.maps.event.addListener(marker, "mouseover", function() {
  var infowindow = $("#map-wrapper").gmap3({get:{name:"infowindow"}});
  if (infowindow){
    infowindow.open(map, marker);
    infowindow.setContent(row.nama);
  } else {
    $("#map-wrapper").gmap3({
      infowindow:{
        anchor:marker, 
        options:{content: row.nama}
      }
    });
}
});

newMarker.push(marker);
}
console.log(markers)
});
markerCluster.addMarkers(newMarker);
},"json");
}
}
},
trafficlayer:{
},
});
if(map == null){
  map = $("#map-wrapper").gmap3("get");
  markerCluster = new MarkerClusterer(map, []);
}
';
Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl.'/js/markerclusterer.js',  CClientScript::POS_END);
Yii::app()->clientScript->registerScript('script-map',$js,  CClientScript::POS_END);
Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl.'/js/jquery.geocomplete.js',  CClientScript::POS_END);
Yii::app()->clientScript->registerScript('script-box','$("#boxcari").geocomplete();',  CClientScript::POS_END);

?>