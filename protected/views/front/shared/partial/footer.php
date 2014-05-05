<div class="footerwrap">
  <div class="container">
    <div class="col-md-5">
      <h3>Kiviads</h3>
      <p>
        Hundreds of thousands of people come through ZURB University, where they get the training they need to be awesome Product Designers. ZURB's courses, workshops, library of reference materials, and design community get you the Product Design skills you need to design better products faster.
      </p>
    </div>
    <div class="col-md-2">
      <h3>Help</h3>
      <ul>
       <li><a href="<?php echo Yii::app()->createUrl('/advertiser');?>">Advertiser</a></li>
       <li><a href="<?php echo Yii::app()->createUrl('/media-owner');?>">Media Owner</a></li>
       <li><a href="<?php echo Yii::app()->createUrl('/faq');?>">FAQ</a></li>
       <li><a href="<?php echo Yii::app()->createUrl('/help-center');?>">Help Center</a></li>
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
  <h3>Drop Us A Line</h3>
  <br>
  <form role="form" action="#" method="post" enctype="plain"> 
    <div class="form-group">
      <label for="name1">Your Name</label>
      <input type="name" name="Name" class="form-control" id="name1" placeholder="Your Name">
    </div>
    <div class="form-group">
      <label for="email1">Email address</label>
      <input type="email" name="Mail" class="form-control" id="email1" placeholder="Enter email">
    </div>
    <div class="form-group">
      <label>Your Text</label>
      <textarea class="form-control" name="Message" rows="3"></textarea>
    </div>
    <br>
    <button type="submit" class="btn btn-large btn-success">SUBMIT</button>
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