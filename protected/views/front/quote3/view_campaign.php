

            <div class="row">
              <ul class="pager">
                <li class="previous"><a href="#">&larr; Kembali</a></li>
              </ul>
              <h4 class="text-center">CAMPAIGN #<?php echo CHtml::encode($model->id); ?></h4>
            </div>
            <div class="row">
              <div class="col-md-6 col-lg-6">
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
              <div class="col-md-6 col-lg-6">
                <div class="panel panel-default">
                  <div class="panel-heading">
                    Berita Campaign
                  </div>
                  <div class="panel-body">
                    <div class="list-group">
                      <div class="list-group-item">
                        <span>File Campaign Detail tersedia<span>
                        <span class="pull-right text-muted small"><em>2 hari yang lalu</em></span>
                      </div>
                      <div class="list-group-item">
                        <span>File PO berhasil diupload<span>
                        <span class="pull-right text-muted small"><em>2 hari yang lalu</em></span>
                      </div>
                      <div class="list-group-item">
                        <span>File Kontrak tersedia<span>
                        <span class="pull-right text-muted small"><em>2 hari yang lalu</em></span>
                      </div>
                      <div class="list-group-item">
                        <span>Bukti tayang KVLM0123 tersedia<span>
                        <span class="pull-right text-muted small"><em>2 hari yang lalu</em></span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <!-- end div inventory list -->
            </div>
            <!-- end row -->
            <div class="row">
              <div class="col-md-12 col-lg-12">
                <div class="panel panel-default">
                  <div class="panel-heading">
                    List Inventory
                  </div>
                  <div class="panel-body">
                    <table class="table table-responsive table-striped table-bordered">
                      <thead>
                        <tr>
                          <td>Unit</td>
                          <td>Status</td>
                          <td>Nilai Kontrak</td>
                          <td>Tindakan</td>
                        </tr>
                      </thead>
                      <tbody>
                        <?php foreach ($model->quoteBanners as $key => $quoteBanner): ?>
                        <tr>
                          <td><a href="#"><?php echo $quoteBanner->banner->sku; ?></a></td>
                          <td><?php echo $quoteBanner->getTextStatus(); ?></td>
                          <td><?php echo $quoteBanner->price; ?></td>
                          <td>
                            <a href="#" class="btn btn-outline btn-info btn-xs">Tanya</a>
                            <a href="#" class="btn btn-outline btn-success btn-xs"><i class="fa fa-picture-o"></i></a>
                          </td>
                        </tr>
                        <?php endforeach ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
              <!-- end div inventory list -->
            </div>
            <!-- end row -->
            <div class="row">
              <div class="col-md-6 col-lg-6">
                <div class="panel panel-default">
                  <div class="panel-heading">
                    File Pendukung
                  </div>
                  <div class="panel-body">
                    <table class="table table-responsive table-bordered table-striped">
                      <thead>
                        <tr>
                          <td>Tahap</td>
                          <td>Deskripsi</td>
                          <td>File</td>
                          <td>Tindakan</td>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td>1</td>
                          <td>Detail Campaign</td>
                          <td>Campaign #9712</td>
                          <td>
                            <a href="#" class="btn btn-outline btn-info btn-xs">Download</a>
                          </td>
                        </tr>
                        <tr>
                          <td>2</td>
                          <td>Purchasing Order</td>
                          <td>PO08123-Kiviads.excel</td>
                          <td>
                            <a href="#" class="btn btn-outline btn-info btn-xs">Download</a>
                            <span class="btn btn-outline btn-warning btn-file btn-xs">Re-upload<input type="file"></span>
                          </td>
                        </tr>
                        <tr>
                          <td>3</td>
                          <td>Kontrak</td>
                          <td>Kontrak-Sidomuncul...</td>
                          <td>
                            <a href="#" class="btn btn-outline btn-info btn-xs">Download</a>
                          </td>
                        </tr>
                        <tr>
                          <td>4</td>
                          <td>Creative Image</td>
                          <td>Tidak ada file</td>
                          <td>
                            <span class="btn btn-outline btn-success btn-file btn-xs">Upload<input type="file"></span>
                          </td>
                        </tr>
                        <tr>
                          <td>5</td>
                          <td>Invoice 1</td>
                          <td>Belum tersedia</td>
                          <td>
                            <a href="#" class="btn btn-outline btn-info btn-xs">Download</a>
                          </td>
                        </tr>
                        <tr>
                          <td>6</td>
                          <td>Bukti Bayar 1</td>
                          <td>Tidak ada file</td>
                          <td>
                            <span class="btn btn-outline btn-success btn-file btn-xs">Upload<input type="file"></span>
                          </td>
                        </tr>
                        <tr>
                          <td>7</td>
                          <td>Invoice 2</td>
                          <td>Belum tersedia</td>
                          <td>
                            <a href="#" class="btn btn-default btn-xs disabled">Download</a>
                          </td>
                        </tr>
                        <tr>
                          <td>8</td>
                          <td>Bukti Bayar 2</td>
                          <td>Tidak ada file</td>
                          <td>
                            <span class="btn btn-outline btn-success btn-file btn-xs">Upload<input type="file"></span>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
              <!-- end file pendukung -->
              <div class="col-md-6 col-lg-6">
                <div class="panel panel-default">
                  <div class="panel-heading">
                    Lokasi Campaign
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
                    <p>MAPS</p>
                  </div>
                </div>
              </div>
            </div>

        <!-- /#page-wrapper -->
