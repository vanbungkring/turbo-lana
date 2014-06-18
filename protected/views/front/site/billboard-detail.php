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
          <header class="banner-info-header">Media Photo</header>
          <div class="image-billboard">
            <?php foreach($banner->images as $image):?>
            <img src="<?php echo $image->getImageUrl(); ?>" />
          <?php endforeach; ?>
        </div>
      </section>
    <?php endif; ?>

    <section id="banner-detail-info-list" class="banner-info-body">
      <header class="banner-info-header">Deskripsi & Spesifikasi Banner</header>
       <div class="col-md-6">
        <?php echo $banner->keterangan; ?>
       </div>
      <div class="col-md-6">
      <div class="table-responsive">
        <table class="table table-bordered">
          <tbody>

            <tr>
              <td class="front">SKU</td>
              <td> <?php echo CHtml::encode($banner->sku); ?></td>
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
    </div>
    </section>

    <section id="banner-detail-info-list" class="banner-info-body">
      <header class="banner-info-header">Ketersediaan Banner</header>
      <div class='availibility-calendar'></div>
      <div class="alert alert-info">
        Kalender diperbarui setiap lima menit dan hanya merupakan perkiraan ketersediaan. Beberapa host menetapkan harga kustom untuk hari-hari tertentu di kalender mereka, seperti akhir pekan atau liburan. Harga yang terdaftar per hari dan tidak mencakup biaya pembersihan atau tarif untuk orang tambahan tuan rumah mungkin memiliki untuk listing ini. Silakan lihat daftar Uraian tab untuk lebih jelasnya.
        Kami menyarankan Anda untuk menghubungi host untuk mengkonfirmasi ketersediaan dan harga sebelum mengirimkan permintaan pemesanan.</div>
      </section>
      <section id="banner-image-list" class="banner-info-body">
        <header class="banner-info-header">Alamat Billboard & Peta Lokasi</header>
        <h3> <?php echo $banner->alamat; ?></h3>
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
              <div class="from">Mulai Dari</div>          
              <div id="spanharga" class="price-currency"> <sup>Rp</sup> <?php echo number_format($banner->hargaPerBulan,0, '.', '.');?></div>
            </div>
          </div>
          <?php if (!$member->isQuoted($banner->id)): ?>
             <button type="button" class="btn btn-default btn-block whislist" data-target="#addtoQuote" id="modal_show">Request Quote</button>  
          <?php endif ?>
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

         <!--  <section id="banner-detail-info-list" class="banner-info-body">
            <header class="banner-info-header"> Request Quote</header>
            <button type="button" class="btn btn-default btn-block whislist" id="addBookmark">Save To Whislist</button>
           <!--  <?php $form=$this->beginWidget('CActiveForm', array(
              'id'=>'quote2-form',
              'action'=>array('rfp2/save'),
              )); ?>
              <p class="content-description">
                <?php echo $form->hiddenField($quote2,'idBanner',array('class'=>'form-control')); ?>
               <input type="submit" class="btn btn-default btn-block whislist"  value="Get Quotes">
             </p>
             <?php $this->endWidget(); ?>

           </section> -->

           <section class="banner-info-body svw">
            <button type="button" class="btn btn-default btn-block whislist" id="addBookmark">Save To Whislist</button>
            <button type="button" class="btn btn-default btn-block whislist" id="removeBookmark">Remove From Whislist</button>
          </section>
        </div>
      </div>
    </div>


<!-- popup -->
    <div class="modal fade" id="addtoQuote" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title" id="myModalLabel">Add to your Quote</h4>
          </div>
          <div class="modal-body">
            <?php echo CHtml::dropDownList('quote_list', 'M', 
            CHtml::listData($member->getOpenQuote(),'id','name'),array('class'=>'form-control')); ?>
            <p><a href="<?php echo $this->createUrl('quote3/create',array('idBanner'=>$banner->id))?>">Create new quote now</a></p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary" id="save-quote">Save changes</button>
          </div>
        </div>
      </div>
    </div>
<!-- popup end -->

<?php $this->renderPartial('/shared/partial/footer');?>
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

   $("#modal_show").click(function(){
       $("#addtoQuote").modal({
       })
   })
    $("#save-quote").click(function(){
      var url = "'.Yii::app()->createUrl('/site/addToQuote',array('id'=>$banner->id)).'";
      $.post(url,{ idQuote : $("#quote_list").val() },function(ret){
        if(ret.status==1){
          location.reload();
        }
        else{
          alert(ret.message);
        }
      },"json");
    });
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

    $(".availibility-calendar").fullCalendar({
      header: {
        left: "prev,next today",
        center: "title",
        right: ""
      },
      editable: false,
      events: '.CJavaScript::encode($banner->generateJadwal()).'
    });
    ';
    Yii::app()->clientScript->registerScript('bookmark',$jsbookmark,  CClientScript::POS_END);