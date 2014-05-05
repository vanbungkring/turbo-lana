
            <div class="row">
              <ul class="pager">
                <li class="previous"><a href="#">&larr; Kembali</a></li>
                <li class="next"><a href="#">Approve Quotes &rarr;</a></li>
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
                    <a href="<?php echo Yii::app()->createUrl('/search'); ?>" class="btn btn-success btn-outline btn-sm">Tambah</a>
                     <a href="<?php echo Yii::app()->createUrl('/search'); ?>" class="btn btn-success btn-outline btn-sm">Kirim</a>
                    <?php endif ?>
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
                  <a href="<?php echo $this->createUrl('approve',array('id'=>$model->id)); ?>" class="btn btn-success btn-block">APPROVE QUOTES <i class="fa fa-arrow-circle-right"></i></a>
                </div>
              </div>
            <?php endif ?>
            
        