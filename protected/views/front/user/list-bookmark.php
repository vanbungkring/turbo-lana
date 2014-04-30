 <div class="row">
  <div class="padded-top">
    <div class="panel panel-main">
      <div class="panel-heading">
        <h5>BOOKMARKS ANDA</h5>
    </div>
    <div class="panel-body">
        <?php foreach ($bookmarks as $key => $bookmark): ?>
        <div class="list-group">
          <div class="list-group-item">
            <span class="pull-right text-muted small"><em><?php echo TimeCustom::time_passed(strtotime($bookmark->time)); ?></em></span>
            <h5><?php echo $bookmark->banner->nama; ?></h5>
            <p><?php echo $bookmark->banner->nama; ?></p>
            <a href="#" class="btn btn-success">Lihat Detail</a>
             <a href="#" class="btn btn-danger">Delete</a>
        </div>   
        <?php endforeach ?>
    </div>
</div>
</div>
<!-- end panel -->
</div>
</div>