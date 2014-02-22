<!-- Fixed navbar -->
<body class="map-body">
  <div class="navbar navbar-default navbar-fixed-top" role="navigation">

    <div class="container">

      <div class="navbar-header">
       <a class="navbar-brand" href="#"><b>Kiviads</b></a>
     </div>

     <div class="navbar-collapse collapse">
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#">Home</a></li>
        <li><a href="#">About Us</a></li>
        <li><a href="./">Maps</a></li>
      </ul>
    </div><!--/.nav-collapse -->
  </div>
</div>

<div class="search-header">
  <div class="container">
    <div class="col-xs-4 free-transform">
      <input type="text" class="form-control" placeholder="Search Location" id="boxcari">
      <input type="hidden" id="lat" value="-6.17511" />
      <input type="hidden" id="long" value="106.86503949999997" />
    </div>

    <div class="col-xs-2 free-transform">
      <input type="text" class="form-control" placeholder="Calendar" id="startPicker">
    </div>

    <div class="col-xs-2 free-transform">
      <input type="text" class="form-control" placeholder="Calendar" id="endPicker">
    </div>

    <div class="col-xs-2 free-transform">
      <button type="button" id="more-filter" class="btn btn-default btn-block" data-container="body" data-toggle="popover" data-placement="bottom">
       More Filter
     </button>
   </div>

   <div class="col-xs-1 free-transform">
     <button type="button" class="btn btn-success" id="btnSearch">Search</button>
   </div>


   <div class="btn-group right">
    <button type="button" class="btn btn-default"><i class="fa fa-th-list"></i></button>
    <button type="button" class="btn btn-default active"><i class="fa fa-map-marker"></i></button>
  </div>
</div>
</div>
<div class="container container-full fill">
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
$js = '
var mapOptions = {
  zoom: 13,
  center: new google.maps.LatLng(-6.17511, 106.86503949999997),
};
var map = new google.maps.Map(document.getElementById("map-wrapper"),
  mapOptions);
var markerCluster = new MarkerClusterer(map, []);
var markers = [];
var infowindow = null;
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
          // $("#billboard-popup").modal("show");
          window.location = "'.Yii::app()->createUrl('/site/detail').'/"+row.id
        });
        var contentInfo = "";
        if(row.cover != null){
          contentInfo += "<img style=\"max-height:150px;max-width:150px\" src=\"'.Yii::app()->request->baseUrl.'/files/bannerimage/"+row.cover+".jpg\" />";
        }
        contentInfo += row.nama;
        google.maps.event.addListener(marker, "mouseover", function() {
          console.log(contentInfo);
          if (infowindow != null){
            infowindow.open(map, marker);
            infowindow.setContent(contentInfo);
          } else {
            infowindow = new google.maps.InfoWindow({
              anchor:marker, 
              options:{content: contentInfo}
            });
          }
        });
        newMarker.push(marker);
      }
    });
    markerCluster.addMarkers(newMarker);
  },"json");
}
google.maps.event.addListener(map, "idle", showMarkers);
$("#btnSearch").click(function(){
  var lat = $("#lat").val();
  var long = $("#long").val();
  console.log(lat); console.log(long);
  map.setCenter(new google.maps.LatLng(lat, long));
});
';
Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl.'/js/markerclusterer.js',  CClientScript::POS_END);
Yii::app()->clientScript->registerScript('script-map',$js,  CClientScript::POS_END);
Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl.'/js/jquery.geocomplete.js',  CClientScript::POS_END);
Yii::app()->clientScript->registerScript('script-box','$("#boxcari").geocomplete().bind("geocode:result", function(event, result){
 $("#lat").val(result.geometry.location.lat());
 $("#long").val(result.geometry.location.lng());
 // map.setCenter(new google.maps.LatLng(result.geometry.location.lat(), result.geometry.location.lng()))
});;',  CClientScript::POS_END);

?>
<div id="popover_content_wrapper" style="display: none">
  <div style="width:100%">More Filter</div>
</div>