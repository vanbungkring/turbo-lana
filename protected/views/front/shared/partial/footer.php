<div class="footerwrap">
  <div class="container">
    <div class="col-md-5">
      <h3>Kiviads</h3>
      <p>
       Saat ini beriklan di billboard dapat dengan cepat meningkatkan kesadaran masyarakan akan brand tersebut. Tidak hanya kesadaran, namun peningkatan angka penjualan pun dapat diraih oleh pemilik brand.</p><p> Untuk itulah Kiviads ada! Sebuah marketplace dimana pengiklan dapat memilih secara langsung titik-titik papan reklame yang berada di lokasi strategis, serta melakukan kampanye iklan melalui sistem online secara cepat dan mudah.
      </p>
    </div>
    <div class="col-md-2">
      <h3>Help</h3>
      <ul>
       <li><a href="<?php echo Yii::app()->createUrl('/advertiser');?>">Pengikla</a></li>
       <li><a href="<?php echo Yii::app()->createUrl('/media-owner');?>">Media Owner</a></li>
       <!-- <li><a href="<?php echo Yii::app()->createUrl('/faq');?>">FAQ</a></li> -->

       <li><a href="<?php echo Yii::app()->createUrl('/contact');?>">Contact US</a></li>
     </ul>
   </div>
   <div class="col-md-2">
    <h3>News</h3>
    <ul>
     <li>Marketing</li>
     <li>Advertising</li>
     <li>Media</li>
   </ul>
 </div>

 <div class="col-md-3">
  <h3Tinggalkan Pesan</h3>
  <br>
  <form role="form" action="#" method="post" enctype="plain"> 
    <div class="form-group">
      <label for="name1">Nama</label>
      <input type="name" name="Name" class="form-control" id="name1" placeholder="Nama Anda">
    </div>
    <div class="form-group">
      <label for="email1">Email</label>
      <input type="email" name="Mail" class="form-control" id="email1" placeholder="Email Anda">
    </div>
    <div class="form-group">
      <label>Pesan Anda</label>
      <textarea class="form-control" name="Message" rows="3"></textarea>
    </div>
    <br>
    <button type="submit" class="btn btn-large btn-success">Kirim</button>
  </form>
</div>
</div>
</div>
<div class="bottom-line">
  <div class="container">
    <?php function auto_copyright($year = 'auto'){ ?>
    <?php if(intval($year) == 'auto'){ $year = date('Y'); } ?>
    <?php if(intval($year) == date('Y')){ echo intval($year); } ?>
    <?php if(intval($year) < date('Y')){ echo intval($year) . ' - ' . date('Y'); } ?>
    <?php if(intval($year) > date('Y')){ echo date('Y'); } ?>
    <?php } ?>
    <?php auto_copyright(); // 2011?>
    
  </div>
</div>