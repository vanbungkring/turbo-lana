
<div class="row">
  <ul class="pager">
    <li class="previous"><a href="#">&larr; Kembali</a></li>
    <li class="next"><a href="#" data-toggle="modal" data-target="#myModal">Approve Quotes &rarr;</a></li>
  </ul>
  <h4 class="text-center">DETIL QUOTES CAMPAIGN #<?php echo CHtml::encode($model->id); ?></h4>
</div>
<div class="row">
  <div class="col-md-6">
    <div class="panel panel-main">
      <div class="panel-heading">
        Informasi Campaign
      </div>
      <div class="panel-body">
        <table class="table table-responsive table-bordered table-ads">
          <tbody>
            <tr>
              <td>Nama</td>
              <td><?php echo CHtml::encode($model->name); ?></td>
            </tr>
            <tr>
              <td>Budget</td>
              <td>IDR <?php echo CHtml::encode($model->budget); ?></td>
            </tr>
            <tr>
              <td>Tanggal</td>
              <td><?php echo CHtml::encode($model->tanggalMulai); ?> s.d <?php echo CHtml::encode($model->tanggalBerakhir); ?></td>
            </tr>
            <tr>
              <td>Deskripsi</td>
              <td><?php echo CHtml::encode($model->deskripsi); ?></td>
            </tr>
          </tbody>
        </table>
        <!-- end table -->
      </div>
    </div>
    <!-- end panel -->
  </div>
  <div class="col-md-6">

    <div class="well well-sm">
      <h4><i class="fa fa-info-circle"></i> Keterangan</h4>
      <p><?php echo CHtml::encode($model->catatan); ?></p>

      <div class="alert alert-info">
        <h4><i class="fa fa-info-circle"></i> Perhatian</h4>
        <ul>

         <li> Kolom LIST INVENTORI berisikan titik billboard yang ingin Anda REQUEST dan perlu diketahui bahwa titik billboard yang berada dalam LIST INVENTORI statusnya dapat berubah sewaktu-waktu dan masih dapat dipesan oleh USER LAIN, selama belum ada finalisasi kontrak dan pembayaran.</li>
       </br>
       <li>Status BELUM TERIMA pada harga titik billboard mengindikasikan bahwa kami belum menjawab REQUEST dari Anda terhadap titik billboard tersebut.</li>
     </br>
     <li>Status WAITING LIST pada titik billboard di LIST INVENTORI mengindikasikan bahwa titik billboard tersebut telah di book oleh USER LAIN untuk tempo 7 hari. Apabila tidak terjadi transaksi, status akan kembali TERSEDIA.</li>
   </br>
   <li>Silahkan APPROVE REQUEST apabila Anda sudah yakin dengan semua titik yang ada pada LIST INVENTORI.</li>
 </ul>
</div>
</div>
</div>
</div>
<!-- end row -->
<div class="row">
  <div class="col-md-6 col-lg-5">
    <div class="panel panel-default">
      <div class="panel-heading">
        List Inventory
      </div>
      <div class="panel-body">
        <table class="table table-responsive table-striped table-bordered">
          <thead>
            <tr>
              <td>Unit</td>
              <td>Unit Status</td>
              <td>Unit Price (IDR)</td>
              <?php if ($model->isStatusNotSet()): ?>
              <td>Tindakan</td>
            <?php endif ?>
          </tr>
        </thead>
        <tbody>
         <?php foreach ($model->quoteBanners as $key => $quoteBanner): ?>
         <tr>
           <td><a href="#"><?php echo $quoteBanner->banner->sku; ?></a></td>
           <td><?php echo $quoteBanner->getTextQuoteStatus(); ?></td>
           <td><?php echo $quoteBanner->price; ?></td>
           <?php if ($model->isStatusNotSet()): ?>
           <td>
            <!--                              <a href="#" class="btn btn-outline btn-info btn-xs">Tanya</a> -->
            <a href="<?php echo $this->createUrl('hapusBanner',array('idBanner'=>$quoteBanner->banner->id,'idQuote'=>$model->id)); ?>" class="btn btn-outline btn-danger btn-xs">Hapus</a>
          </td>
        <?php endif ?>

      </tr>
    <?php endforeach ?>
  </tbody>
</table>
<?php if ($model->isStatusNotSet()): ?>
  <a href="<?php echo Yii::app()->createUrl('/search'); ?>" class="btn btn-success btn-outline btn-sm">Tambah Media</a>
  <a href="<?php echo Yii::app()->createUrl('/search'); ?>" class="btn btn-success btn-outline btn-sm">Update Quote</a>
<?php endif ?>
</br>
</br>
<div class="alert alert-danger">* Untuk sinkronisasi pada sistem kami, pastikan Anda SELALU KLIK tombol UPDATE baik setelah MENAMBAH atau MENGHAPUS titik billboard yang ada pada LIST INVENTORI *</div>
</div>
</div>
</div>
<!-- end div inventory list -->
<div class="col-md-6 col-lg-7">
  <div class="panel panel-default">
    <div class="panel-heading">
      Peta Lokasi
    </div>
    <div class="panel-body">
      <p>MAPS</p>
      <p>MAPS</p>
      <p>MAPS</p>
      <p>MAPS</p>
      <p>MAPS</p>
      <p>MAPS</p>
      <p>MAPS</p>
      <p>MAPS</p>
      <p>MAPS</p>
      <p>MAPS</p>
      <p>MAPS</p>
    </div>
  </div>
</div>
<!-- end of maps -->
</div>
<!-- end row -->
<?php if ($model->isStatusNotSet() and $model->isAbleToApprove()): ?>
  <div class="row">
    <div class="col-md-6 col-lg-4 col-centered">
      <a href="#" id="open-modal-dialog" class="btn btn-success btn-block">APPROVE QUOTES <i class="fa fa-arrow-circle-right"></i></a>
    </div>
  </div>
<?php endif ?>
<!-- Modal -->
<div class="modal fade" id="myModal" style="display:none">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Modal title</h4>
      </div>
      <div class="modal-body">
       <table class="table table-responsive table-striped table-bordered">
        <thead>
          <tr>
            <td>Unit</td>
            <td>Unit Status</td>
            <td>Unit Price (IDR)</td>
            <?php if ($model->isStatusNotSet()): ?>
            <td>Tindakan</td>
          <?php endif ?>
        </tr>
      </thead>
      <tbody>
       <?php $total = 0; foreach ($model->quoteBanners as $key => $quoteBanner): ?>
       <tr>
         <td><a href="#"><?php echo $quoteBanner->banner->sku; ?></a></td>
         <td><?php echo $quoteBanner->getTextQuoteStatus(); ?></td>
         <td><?php echo $quoteBanner->price; $total+=$quoteBanner->price; ?></td>
         <?php if ($model->isStatusNotSet()): ?>
         <td>
          <!--                              <a href="#" class="btn btn-outline btn-info btn-xs">Tanya</a> -->
          <a href="<?php echo $this->createUrl('hapusBanner',array('idBanner'=>$quoteBanner->banner->id,'idQuote'=>$model->id)); ?>" class="btn btn-outline btn-danger btn-xs">Hapus</a>
        </td>
      <?php endif ?>

    </tr>
    <tr>
      <td colspan="3">Total</td>
      <td><?php echo $total; ?></td>
    </tr>
  <?php endforeach ?>
</tbody>
</table>
</div>
<div class="modal-footer">
  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
  <a href="<?php echo $this->createUrl('approve',array('id'=>$model->id)); ?>" type="button" class="btn btn-primary">Save changes</a>
</div>
</div>
</div>
</div>
<script>

</script>
<?php
//google maps render
$js = '
$("#open-modal-dialog").click(function(){
  $("#myModal").modal("show");
});
// $("#myModal").modal({
//   autoOpen: false,

// });
';
Yii::app()->clientScript->registerScript('script-modal',$js,  CClientScript::POS_END);
