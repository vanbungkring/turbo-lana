    <?php $this->renderPartial('/shared/partial/navbar'); ?>

    <div class="container kivi">

      <div class="row">
       <div class="col-md-8 no-padding">
        <h1><?php echo CHtml::encode($banner->nama); ?>, <?php echo CHtml::encode($banner->lokasi); ?></h1>
      </div>

    </div>

    <div class="row banner-detail">
      <div class="col-md-8 no-padding">
        <?php if(!empty($banner->images)): ?>
        <section id="banner-image-list" class="banner-info-body">
          <header class="banner-info-header">Banner Photo</header>
          <div class="image-billboard">
            <?php foreach($banner->images as $image):?>
            <img src="<?php echo $image->getImageUrl(); ?>" />
          <?php endforeach; ?>
        </div>
      </section>
    <?php endif; ?>

    <section id="banner-detail-info-list" class="banner-info-body">
      <header class="banner-info-header">Deskripsi & Spesifikasi Banner</header>

      <div class="table-responsive">
        <table class="table table-bordered ">
          <tbody>

            <tr>
              <td class="front">SKU</td>
              <td> {{SKU BILLBOARD}}</td>
            </tr>

            <tr>
              <td class="front">Type</td>
              <td><?php 
              $kNamas = CHtml::listData($banner->kategoris,'id','nama');
              $valNamas = array_values($kNamas);
              $str = implode(", ", $valNamas);
              echo CHtml::encode($str);
              ?></td>
            </tr>
            <tr>
              <td class="front">Location</td>
              <td><?php echo CHtml::encode($banner->lokasi); ?></td>
            </tr>
            <tr>
              <td class="front">Panjang</td>
              <td><?php echo CHtml::encode($banner->panjang); ?> Meter</td>
            </tr>
            <tr>
              <td class="front">Tinggi</td>
              <td><?php echo CHtml::encode($banner->tinggi); ?> Meter</td>
            </tr>
            <tr>
              <td class="front">Status</td>
              <td>{{Status Here}}</td>
            </tr>
          </tbody>
        </table>
      </div>
    </section>
    
    <section id="banner-detail-info-list" class="banner-info-body">
      <header class="banner-info-header">Deskripsi Inventory</header>
      <div class="table-responsive">
      <?php echo $banner->keterangan; ?>
      </div>
    </section>

    <section id="banner-detail-info-list" class="banner-info-body">
      <header class="banner-info-header">Ketersediaan Banner</header>
      <div class='availibility-calendar'></div>
      <div class="alert alert-info">
        The calendar is updated every five minutes and is only an approximation of availability.
        Some hosts set custom pricing for certain days on their calendar, like weekends or holidays. The rates listed are per day and do not include any cleaning fee or rates for extra people the host may have for this listing. Please refer to the listing's Description tab for more details. 
        We suggest that you contact the host to confirm availability and rates before submitting a reservation request.</div>
      </section>
      <section id="banner-image-list" class="banner-info-body">
        <header class="banner-info-header">Alamat Billboard & Peta Lokasi</header>
        <p class="content-description">
          <?php echo CHtml::encode($banner->keterangan); ?>
        </p>
        <div id="map-canvas" style="height:400px; margin-top:30px;">
        </div>
      </section>

    </div>
    <div class="col-md-4">
<!-- 
        <section class="banner-info-body svw">
          <a href="<?php echo Yii::app()->createUrl("site/customBanner",array('id'=>$banner->id)); ?>"
           type="button" class="btn btn-default btn-block whislist btn-lg" id="custombanner">Custom This Banner</a>
         </section> -->

         <section class="banner-info-body">
          <div class="price">
            <div class="price-detail">
              <div class="from">Dari</div>          
              <div id="spanharga" class="price-currency"> Rp <?php echo $banner->hargaPerBulan;?></div>
            </div>
            <ul>
              <li>Included Tax</li>
              <li> 100.000 Day Traffic</li>
              <li> 100.000 Day Traffic</li>

            </ul>
          </div>
          <!-- <a href="<?php echo Yii::app()->createUrl('/rfp/index',array('idBanner'=>array($banner->id))); ?>" type="button" class="btn btn-primary btn-block book-it-button btn-lg">Create Quote</a> -->
          <div class="fast-contact">
            <i class="fa fa-phone-square fa-3x"></i>
            <div class="detail-contact">
              <ul>
                <li><h4>Booking Hotline</h4><li>
                  <li>021-71292973</li>
                  <li>Mon – Fri, 9am – 5pm GMT+1</li>
                </ul>
              </div>
            </div>
          </section>

          <section id="banner-detail-info-list" class="banner-info-body">
            <header class="banner-info-header"> Request Quote</header>
            <?php $form=$this->beginWidget('CActiveForm', array(
              'id'=>'quote2-form',
              'action'=>array('rfp2/save'),
              )); ?>
              <p class="content-description">
               <?php echo $form->hiddenField($quote2,'idBanner',array('class'=>'fosrm-control')); ?>
               <input type="submit" class="btn btn-default btn-block whislist"  value="Get Quotes">
             </p>
             <?php $this->endWidget(); ?>

           </section>

           <section class="banner-info-body svw">
            <button type="button" class="btn btn-default btn-block whislist" id="addBookmark">Save To Whislist</button>
            <button type="button" class="btn btn-default btn-block whislist" id="removeBookmark">Remove From Whislist</button>
          </section>
        </div>
      </div>
    </div>

    <?php
//google maps render
    $js =    '
    function initialize() {
      var defLat = '.(double)$banner->lat.';
      var defLng = '.(double)$banner->long.';
      var myLatlng = new google.maps.LatLng(defLat,defLng);
      var map = new google.maps.Map(document.getElementById("map-canvas"), {
        mapTypeId: google.maps.MapTypeId.ROADMAP,
        zoom: '.(int)$banner->zoom.',
        center: myLatlng
      });
    var marker = new google.maps.Marker({
      position: myLatlng, 
      map: map, // handle of the map 
    });
  }

  google.maps.event.addDomListener(window, "load", initialize);

  function checkharga(){
    $("#spanharga").text($("#harga").val());
  }
  $("#harga").change(function(){
    checkharga();
  });
    checkharga();
    ';
    Yii::app()->clientScript->registerScript('script-map',$js,  CClientScript::POS_END);

    $jsbookmark = '
    var bookmark =  '.(int)$member->isBookmarked($banner->id).';
    function addbookmark(){
      var url = "'.Yii::app()->createUrl('/site/addBookmark/',array('id'=>$banner->id)).'";
      var data = {};
      $.post(url,data,function(ret){
        if(ret.status == 1){
          bookmark = 1;
          checkButtonBookmark();
        }
        else{
          alert(ret.message);
        }
      },"json");
  }
  function removeBookmark(){
    var url = "'.Yii::app()->createUrl('/site/removeBookmark/',array('id'=>$banner->id)).'";
    var data = {};
    $.post(url,data,function(ret){
      if(ret.status == 1){
        bookmark = 0;
        checkButtonBookmark();
      }
      else{
        alert(ret.message);
      }
    },"json");
  }

  function checkButtonBookmark(){
    if(bookmark == 1){
      $("#addBookmark").hide();
      $("#removeBookmark").show();
    }
    else{
      $("#addBookmark").show();
      $("#removeBookmark").hide();
    }
  }
  checkButtonBookmark();
  $("#addBookmark").click(function(){
    addbookmark();
  });
    $("#removeBookmark").click(function(){
      removeBookmark();
    });
    ';
    Yii::app()->clientScript->registerScript('bookmark',$jsbookmark,  CClientScript::POS_END);