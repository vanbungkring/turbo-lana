    <?php $this->renderPartial('/shared/partial/navbar'); ?>
    <div class="search-header">
      <div class="container">
        <div class="col-xs-4 free-transform">
          <input type="text" class="form-control" placeholder="Search Location" id="boxcari">
          <input type="hidden" id="lat" value="-6.17511" />
          <input type="hidden" id="long" value="106.86503949999997" />
        </div>

        <div class="col-xs-2 free-transform">
          <input type="text" class="form-control hasDatepicker_start" placeholder="Calendar" id="startPicker">
        </div>

        <div class="col-xs-2 free-transform">
          <input type="text" class="form-control hasDatepicker_end" placeholder="Calendar" id="endPicker">
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

  <div class="modal fade login-popup" id="billboard-popup" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog billboard-preview">
      <div class="modal-content modal-container">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title" id="login-modal">Login To KiviAds</h4>
        </div>
        <div class="modal-body">
          <div class="signin-with-sc">
            <span>You need to sign in for those awesome feature</span>
            <button type="button" class="btn btn-default btn-lg btn-block linkedin-button"></button>
          </div>
          <p class="bg-danger" id="loginError" style="display:none">User Password Tidak Cocok</p>
          <div class="normal-signin">
            <div class="text-kivi">Or use Kiviads Account</div>
            <div class="form-group">
              <input type="email" class="form-control input-form" id="useremail" placeholder="Your email Address">
            </div>
            <div class="form-group">
              <input type="password" class="form-control input-form" id="userpassword" placeholder="Password">
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button id="btnLogin" type="button" class="btn btn-default">Sign In</button>
        </div>
      </div>
    </div>
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