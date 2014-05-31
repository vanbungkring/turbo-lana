
<div class="row">
  <div class="padded-top">
    <div class="panel panel-main">
      <div class="panel-heading">
        <h5>CAMPAIGN QUOTES ANDA</h5>
      </div>
      <div class="panel-body">
        <div class="row">
          <div class="col-md-6">
            <div class="well well-green well-sm">
             <div class="text-center">
              <a href="<?php echo $this->createUrl('create');  ?>">
                <i class="fa fa-caret-square-o-down fa-fw" style="font-size: 44px;"></i>
                <h4 class="bordered">Buat Quote baru</h4>
              </a>
            </div>
            <div>
              <p>Setelah Anda memilih semua titik billboard yang diinginkan, silahkan klik tombol Request Proposal. Kami akan segera mengirimkan proposal berisi semua detil yang Anda butuhkan.</p>
            </div>
          </div>
        </div>
        <!-- end of get quotes div -->
        <div class="col-md-6">
          <div class="well well-orange well-sm">
            <div class="text-center">
              <a href="<?php echo $this->createUrl('create');  ?>">
                <i class="fa fa-caret-square-o-down fa-fw" style="font-size: 44px;"></i>
                <h4 class="bordered">Request Proposal</h4>
              </a>
            </div>
            <div >
              <p>Setelah Anda memilih semua titik billboard yang diinginkan, silahkan klik tombol Request Proposal. Kami akan segera mengirimkan proposal berisi semua detil yang Anda butuhkan.</p>
            </div>
          </div>
        </div>
        <!-- end rfp div -->
      </div>
      <div class="row">
        <div class="table-responsive">
          <table class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>#</th>
                <th>Judul Quotes</th>
                <th>Inventory</th>
                <th>Update Terakhir</th>
                <th>Dibuat</th>
                <th>Atur</th>
              </tr>
            </thead>
            <tbody>
              <?php $i=1;
                foreach ($quotes as $key => $value): ?>
                <tr>
                  <td><?php echo $i++; ?></td>
                  <td><?php echo $value->name ?></td>
                  <td><?php echo $value->totalInventori ?></td>
                  <td>-</td>
                  <td>-</td>
                  <td>
                    <a href="<?php echo $this->createUrl('view',array('id'=>$value->id)); ?>" class="btn btn-outline btn-primary btn-xs">Lihat Detil</a>
                    <a href="<?php echo $this->createUrl('delete',array('id'=>$value->id)); ?>" class="btn btn-outline btn-primary btn-xs">Hapus</a>
                  </td>
                </tr>
              <?php endforeach ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
  <!-- end panel -->
</div>
</div>
