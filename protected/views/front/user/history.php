
<div class="row">
  <div class="padded-top">
    <div class="panel panel-main">
      <div class="panel-heading">
        <h5>SEJARAH AKTIVITAS</h5>
      </div>
      <div class-"panel-body">
        <div class="list-group">
         <?php foreach($logByDate as $date=>$logs): ?>
         <div class="list-group-item">
          <h5><?php echo $date; ?></h5>
        </div>
        <?php foreach ($logs as $log): ?>
        <div class="list-group-item">
          <span><?php echo $log->getText(); ?> </span>
        </div>
      <?php endforeach; ?>
    <?php endforeach; ?>
  </div>
</div>
</div>
<!-- end panel -->
</div>
</div>
