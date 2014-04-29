    <?php $this->renderPartial('/shared/partial/navbar-fluid'); ?>
    <div class="container container-full fill">
      <div class="col-md-3 filter">
        <div class="filter-wrapper">
          <button type="button" class="btn btn-primary btn-lg btn-block"><i class="fa fa-filter"></i>More Filter</button>

        </div>
      </div>
      <div class="col-md-3 list">
        <div class="searchbar">
          <form class="form-horizontal" role="form">
             <button type="button" class="btn btn-default" id="btnSearch">Filter</button>
             <input name="lokasi" type="text" class="form-control"  placeholder="Refine Search" id="boxcari">
             <input type="hidden" id="lat" value="-6.17511" />
             <input type="hidden" id="long" value="106.86503949999997" />
          </form>
        </div>
        <ul class="assets-card-holder" id="card-place">

        </ul>

      </div>

      <div id="map-wrapper"></div>

    </div> 
    <template id="template-card">
      <li class="card">
            <div class="card-body">
              <div class="card-image">
                <img alt="Hotel Majapahit - Surabaya Hotels" src="{img}">
              </div>
              <div class="card-meta">
                <div class="card-main">
                  <div class="card-main-title">{nama}</div>
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
          _card = _card.replace(/{harga}/g, row.hargaPerBulan);
          _card = _card.replace(/{img}/g, "'.Yii::app()->request->baseUrl.'/files/bannerimage/"+row.cover+".jpg");

          $("#card-place").append(_card);
        });
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