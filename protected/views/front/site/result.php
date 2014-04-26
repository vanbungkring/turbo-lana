    <?php $this->renderPartial('/shared/partial/navbar-fluid'); ?>
    <div class="search-header">
      <div class="container">
        <div class="col-xs-4 free-transform">
          <input name="lokasi" type="text" class="form-control" placeholder="Search Location" id="boxcari">
        </div>

  </div>
  <div class="container container-full fill">
    <div id="map-wrapper"></div>
  </div> 

  <?php
//google maps render
  $js = '
  $("body").css("height","100%");
  var afterloginurl = "";
  var isGuest = '.(int)Yii::app()->user->isGuest.'
  var mapOptions = {
    zoom: 14,
    center: new google.maps.LatLng('.$defLat.', '.$defLong.'),
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
        ia_b : map.getBounds().getSouthWest().lng(),
        ia_d : map.getBounds().getNorthEast().lng(),
        ta_d : map.getBounds().getSouthWest().lat(),
        ta_b : map.getBounds().getNorthEast().lat(),
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
      window.location = "'.Yii::app()->createUrl('/site/detail').'/"+row.id;
          // if(isGuest==1){
          //   afterloginurl = "'.Yii::app()->createUrl('/site/detail').'/"+row.id;
          //   $("#billboard-popup").modal("show");
          // }
          // else{
          //   window.location = "'.Yii::app()->createUrl('/site/detail').'/"+row.id;
          // }
    });
    var contentInfo = "<div class=tooltip-maps>";
    if(row.cover != null){
      contentInfo += "<img class=\"tooltip-image\" src=\"'.Yii::app()->request->baseUrl.'/files/bannerimage/"+row.cover+".jpg\" />";
    }
    
    contentInfo += "<div class=tooltip-name> <h1>"+row.nama+" </h1></div>";
    contentInfo += "</div>"
    google.maps.event.addListener(marker, "mouseover", function() {
      console.log(row);
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
    $jssigin = '
    function login(){
     $("#loginError").hide();
     var url = "'.Yii::app()->createUrl('/site/ajaxLogin').'";
     var data = {
      "email" : $("#useremail").val(),
      "password" : $("#userpassword").val()
    }
    $.post(url,data,function(ret){
      if(ret.status == 1){
        if(afterloginurl != ""){
          window.location = afterloginurl;
        }
      }
      else{
        $("#loginError").show();
      }
    },"json");
  }
  $("#btnLogin").click(function(){
    login();
  });
    ';
    Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl.'/js/markerclusterer.js',  CClientScript::POS_END);
    Yii::app()->clientScript->registerScript('script-map',$js,  CClientScript::POS_END);
    Yii::app()->clientScript->registerScript('login',$jssigin,  CClientScript::POS_END);
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