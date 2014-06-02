    <?php $this->renderPartial('/shared/partial/navbar-fluid'); ?>
    <div class="container container-full fill">
      <div class="list">
        <div class="container-fluid">
          <div class="searchbar">
            <form class="form-horizontal" role="form">
             <input name="lokasi" type="text" class="form-control"  placeholder="Refine Search" id="boxcari">
             <button type="button" class="btn btn-default" id="btnSearch">Search</button>
             <input type="hidden" id="lat" value="-6.17511" />
             <input type="hidden" id="long" value="106.86503949999997" />
           </form>
         </div>
         <ul class="assets-card-holder" id="card-place">
         </ul>
       </div>
     </div>
     <div id="map-wrapper"></div>

   </div> 
   <template id="template-card">
    <li class="card">
      <input type="hidden" value="{lat}" class="clat"/>
      <input type="hidden" value="{long}" class="clong"/>
      <input type="hidden" value="{id}" class="cid"/>
      <input type="hidden" value="{zoom}" class="czoom"/>
      <div class="card-body">
        <div class="card-image">
          <img alt="{alt}" src="{img}">
        </div>
        <div class="card-meta">
          <div class="card-main-title">{nama}</div>
          <div class="card-main">
            <div class="card-status">Status : Available</div>
          </div>
          <div class="card-rate">
            <span class="currency">Rp</span>
            <strong class="price"> {harga}
            </strong>
          </div>
        </div>
      </div>
    </li>
  </template>
  <?php
//google maps render
  $js = '
  $("body").css("height","100%");
  var afterloginurl = "";
  var defLokasi = "'.$defLokasi.'";
  var isGuest = '.(int)Yii::app()->user->isGuest.'
  var mapOptions = {
    zoom: 14,
    center: new google.maps.LatLng('.$defLat.', '.$defLong.'),
  };
  var blueIcon = "'.Yii::app()->request->baseUrl.'/images/blue-marker.png";
  var redIcon = "'.Yii::app()->request->baseUrl.'/images/red-marker.png";
  var map = new google.maps.Map(document.getElementById("map-wrapper"),
    mapOptions);
    var markerCluster = new MarkerClusterer(map, []);
    var markers = [];
    var markerObject = [];
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
    markers[row.id].obj = marker;
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
      contentInfo += "<img class=\"tooltip-image\" src=\"'.Yii::app()->request->baseUrl.'/files/bannerimage/"+row.cover_file+"\" />";
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
    showList($("#boxcari").val());
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
    function showList(plokasi){
      var url = "'.Yii::app()->createUrl('site/getListBanner').'";
      $.post(url,{ lokasi : plokasi },function(retJson){
        $("#card-place").empty();
        retJson.forEach(function(row) {
          var _card = $("#template-card").html();
          _card = _card.replace(/{nama}/g, row.nama);
          _card = _card.replace(/{lat}/g, row.lat);
          _card = _card.replace(/{long}/g, row.long);
          _card = _card.replace(/{zoom}/g, row.zoom);
          _card = _card.replace(/{id}/g, row.id);
          _card = _card.replace(/{harga}/g, row.hargaPerBulan.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ","));
          _card = _card.replace(/{alt}/g,"Billboard "+row.formatedAddress);
          if(row.cover_file!=null){
            _card = _card.replace(/{img}/g, "'.Yii::app()->request->baseUrl.'/files/bannerimage/"+row.cover_file);
          }
          else{
            _card = _card.replace(/{img}/g, "'.Yii::app()->request->baseUrl.'/images/null.jpg");
          }
          $("#card-place").append(_card);
        });
    $(".card").hover(function(){
      var cid = $(this).children(".cid").val();
      var clat = $(this).children(".clat").val();
      var clong = $(this).children(".clong").val();
      var czoom = $(this).children(".czoom").val();
      // console.log(cid);
      // console.log(clat);
      // console.log(clong);
      // console.log($(this));
      if(cid=="" || cid == null){
        return;
      }
      if(clat!="" || clat != null || clong!="" || clong != null){
        map.setCenter(new google.maps.LatLng(clat, clong));
      }
      var listener = google.maps.event.addListener(map, "idle", function() { 
        if(czoom != "" || czoom != "null"){
          map.setZoom(parseInt(czoom));
        }
        else{
          map.setZoom(20);
        }
        google.maps.event.removeListener(listener); 
      });
  });
    $( ".card" ).hover( function(){
      var cid = $(this).children(".cid").val();
      //console.log($(this));
      if(cid=="" || cid == null){
        return;
      }
      markers[cid].obj.setIcon(blueIcon);
    }, function(){
      var cid = $(this).children(".cid").val();
      if(cid=="" || cid == null){
        return;
      }
      markers[cid].obj.setIcon(redIcon);
    } ); 
  });

  }
  showList(defLokasi);
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