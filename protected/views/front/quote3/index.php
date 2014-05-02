
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
            <h4><i class="fa fa-book fa-fw" style="font-size: 32px;"></i> Buat Quotes</h4>
          </div>
          <div class="input-group custom-search-form">
            <input type="text" class="form-control" placeholder="Masukkan lokasi...">
            <span class="input-group-btn">
              <button class="btn btn-default"><i class="fa fa-search"></i></button>
            </span>
          </div>
          <div>
            <p>Dengan memasukkan nama lokasi yang Anda inginkan pada kotak pencarian diatas, sistem kami akan mencatat titik billboard tersebut guna membantu proses campaign iklan Anda selanjutnya.</p>
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
            <tr>
              <td>1</td>
              <td>Jamu Sidomuncul 2014</td>
              <td>5</td>
              <td>24/05/14</td>
              <td>20/05/14</td>
              <td><a href="quotes-detail.html" class="btn btn-outline btn-primary btn-xs">Lihat Detil</a>
                  <a href="#" class="btn btn-outline btn-danger btn-xs">Archieved</a>
              </td>
            </tr>
            <tr>
              <td>2</td>
              <td>Jamu Sidomuncul 2013</td>
              <td>2</td>
              <td>24/05/13</td>
              <td>20/05/13</td>
              <td><a href="#" class="btn btn-outline btn-primary btn-xs">Lihat Detil</a>
                  <a href="#" class="btn btn-outline btn-danger btn-xs">Archieved</a>
              </td>
            </tr>
            <tr>
              <td>3</td>
              <td>Opera Van Java Roadshow 2014</td>
              <td>120</td>
              <td>24/05/14</td>
              <td>20/05/14</td>
              <td><a href="#" class="btn btn-outline btn-primary btn-xs">Lihat Detil</a>
                  <a href="#" class="btn btn-outline btn-danger btn-xs">Archieved</a>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
<!-- end panel -->
</div>
</div>
      