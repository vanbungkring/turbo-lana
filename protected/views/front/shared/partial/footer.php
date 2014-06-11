<div class="footerwrap">
  <div class="container">
    <div class="col-md-5">
      <h3>Kiviads</h3>
      <p>
       Saat ini beriklan di billboard dapat dengan cepat meningkatkan kesadaran masyarakan akan brand tersebut. Tidak hanya kesadaran, namun peningkatan angka penjualan pun dapat diraih oleh pemilik brand.</p><p> Untuk itulah Kiviads ada! Sebuah marketplace dimana pengiklan dapat memilih secara langsung titik-titik billboard yang berada di lokasi strategis, serta melakukan kampanye iklan melalui sistem online secara cepat dan mudah.
      </p>
    </div>
    <div class="col-md-2">
      <h3>Pusat Bantuan</h3>
      <ul>
       <li><a href="<?php echo Yii::app()->createUrl('/advertiser');?>">Pengiklan</a></li>
       <li><a href="<?php echo Yii::app()->createUrl('/media-owner');?>">Pemilik Media</a></li>
       <!-- <li><a href="<?php echo Yii::app()->createUrl('/faq');?>">FAQ</a></li> -->

       <li><a href="<?php echo Yii::app()->createUrl('/contact');?>">Hubungi Kami</a></li>
     </ul>
   </div>
   <div class="col-md-2">
    <h3>Tautan</h3>
    <ul>
     <li><a href="www.kivibyte.com">Kivibyte.com</a></li>
     <li><a href="www.kivibyte.com/blog/">Internet Marketing Blog</a></li>
   </ul>
 </div>

<?php $form=$this->beginWidget('CActiveForm', array(
  'id'=>'contact-form',
  'enableClientValidation'=>true,
  'clientOptions'=>array(
    'validateOnSubmit'=>true,
  ),
)); 
$contact = new ContactForm();
?>
 <div class="col-md-3">
  <h3>Tinggalkan Pesan</h3>
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
    <?php if(CCaptcha::checkRequirements()): ?>
     <div class="form-group">
      <?php echo $form->labelEx($contact,'verifyCode'); ?>
      <div>
      <?php $this->widget('CCaptcha'); ?>
      <?php echo $form->textField($contact,'verifyCode'); ?>
      </div>
      <div class="hint">Harap masukkan huruf di atas untuk membuktikan anda bukan robot.
      <br/>Besar kecil huruf tidak sensitif.</div>
      <?php echo $form->error($contact,'verifyCode'); ?>
    </div>
    <?php endif; ?>
    <br>
    <button type="submit" class="btn btn-large btn-success">Kirim</button>
  </form>
</div>
<?php $this->endWidget(); ?>

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