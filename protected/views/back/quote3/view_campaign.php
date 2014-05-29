<?php
/* @var $this Quote3Controller */
/* @var $model Quote3 */
?>

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
               <?php $form=$this->beginWidget('CActiveForm', array(
                   'id'=>'upload-file-pendukung-form-2',
                  // Please note: When you enable ajax validation, make sure the corresponding
                  // controller action is handling ajax validation correctly.
                  // There is a call to performAjaxValidation() commented in generated controller code.
                  // See class documentation of CActiveForm for details on this.
                   'enableAjaxValidation'=>false,
                   'htmlOptions'=>array('enctype'=>'multipart/form-data'),
                   )); ?>
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
                          <td>Gambar Progres Pemasangan</td>
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
                          <td>
                            <?php if ($quoteBanner->fileProgress): ?>
                              <a href="<?php echo $quoteBanner->getFileProgressUrl() ?>" target="_blank" class="btn btn-outline btn-info btn-xs">Download</a>
                              <span class="btn btn-outline btn-warning btn-file btn-xs">Re-upload<input class="auto-submit-2" type="file" name="fileProgress[<?php echo $quoteBanner->id ?>]"></span>
                            <?php else: ?>
                              <span class="btn btn-outline btn-success btn-file btn-xs">Upload<input class="auto-submit-2"  type="file"  name="fileProgress[<?php echo $quoteBanner->id ?>]"></span>
                            <?php endif ?>
                          </td>
                        </tr>
                        <?php endforeach ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
              <?php $this->endWidget(); ?>
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
                    <?php $form=$this->beginWidget('CActiveForm', array(
                   'id'=>'upload-file-pendukung-form',
                  // Please note: When you enable ajax validation, make sure the corresponding
                  // controller action is handling ajax validation correctly.
                  // There is a call to performAjaxValidation() commented in generated controller code.
                  // See class documentation of CActiveForm for details on this.
                   'enableAjaxValidation'=>false,
                   'htmlOptions'=>array('enctype'=>'multipart/form-data'),
                   )); ?>
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
                          <td><?php echo $model->file1 ? $model->file1 : 'Tidak ada file' ?></td>
                          <td>
                            <?php if ($model->file1): ?>
                              <a href="<?php echo $model->getUrlImage('file1') ?>" class="btn btn-outline btn-info btn-xs">Download</a>
                              <span class="btn btn-outline btn-warning btn-file btn-xs">Re-upload<input class="auto-submit" type="file" name="file1"></span>
                            <?php else: ?>
                              <span class="btn btn-outline btn-success btn-file btn-xs">Upload<input class="auto-submit"  type="file"  name="file1"></span>
                            <?php endif ?>
                          </td>
                        </tr>
                        <tr>
                          <td>2</td>
                          <td>Purchasing Order</td>
                          <td><?php echo $model->file2 ? $model->file2 : 'Belum tersedia'; ?></td>
                          <td>
                            <?php if ($model->file2): ?>
                              <a href="<?php echo $model->getUrlImage('file2') ?>" class="btn btn-outline btn-info btn-xs">Download</a>
                            <?php else: ?>
                              <a href="#" class="btn btn-default btn-xs disabled">Download</a>
                            <?php endif ?>
                          </td>
                        </tr>
                        <tr>
                          <td>3</td>
                          <td>Kontrak</td>
                          <td><?php echo $model->file3 ? $model->file3 : 'Tidak ada file' ?></td>
                          <td>
                            <?php if ($model->file3): ?>
                              <a href="<?php echo $model->getUrlImage('file3') ?>" class="btn btn-outline btn-info btn-xs">Download</a>
                              <span class="btn btn-outline btn-warning btn-file btn-xs">Re-upload<input class="auto-submit" type="file" name="file3"></span>
                            <?php else: ?>
                              <span class="btn btn-outline btn-success btn-file btn-xs">Upload<input class="auto-submit"  type="file"  name="file3"></span>
                            <?php endif ?>
                          </td>
                        </tr>
                        <tr>
                          <td>4</td>
                          <td>Creative Image</td>
                          <td><?php echo $model->file4 ? $model->file4 : 'Belum tersedia' ?></td>
                          <td>
                            <?php if ($model->file4): ?>
                              <a href="<?php echo $model->getUrlImage('file4') ?>" class="btn btn-outline btn-info btn-xs">Download</a>
                            <?php else: ?>
                              <a href="#" class="btn btn-default btn-xs disabled">Download</a>
                            <?php endif ?>
                          </td>
                        </tr>
                        <tr>
                          <td>5</td>
                          <td>Invoice 1</td>
                          <td><?php echo $model->file5 ? $model->file5 : 'Tidak ada file' ?></td>
                          <td>
                            <?php if ($model->file5): ?>
                              <a href="<?php echo $model->getUrlImage('file5') ?>" class="btn btn-outline btn-info btn-xs">Download</a>
                              <span class="btn btn-outline btn-warning btn-file btn-xs">Re-upload<input class="auto-submit" type="file" name="file5"></span>
                            <?php else: ?>
                              <span class="btn btn-outline btn-success btn-file btn-xs">Upload<input class="auto-submit"  type="file"  name="file5"></span>
                            <?php endif ?>
                          </td>
                        </tr>
                        <tr>
                          <td>6</td>
                          <td>Bukti Bayar 1</td>
                          <td><?php echo $model->file6 ? $model->file6 : 'Belum tersedia' ?></td>
                          <td>
                            <?php if ($model->file6): ?>
                              <a href="<?php echo $model->getUrlImage('file6') ?>" class="btn btn-outline btn-info btn-xs">Download</a>
                            <?php else: ?>
                              <a href="#" class="btn btn-default btn-xs disabled">Download</a>
                            <?php endif ?>
                          </td>
                        </tr>
                        <!-- <tr>
                          <td>7</td>
                          <td>Invoice 2</td>
                          <td><?php echo $model->file7 ? $model->file7 : 'Tidak ada file' ?></td>
                          <td>
                            <?php if ($model->file7): ?>
                              <a href="<?php echo $model->getUrlImage('file7') ?>" class="btn btn-outline btn-info btn-xs">Download</a>
                              <span class="btn btn-outline btn-warning btn-file btn-xs">Re-upload<input class="auto-submit" type="file" name="file7"></span>
                            <?php else: ?>
                              <span class="btn btn-outline btn-success btn-file btn-xs">Upload<input class="auto-submit"  type="file"  name="file7"></span>
                            <?php endif ?>
                          </td>
                        </tr> -->
                        <tr>
                          <td>8</td>
                          <td>Bukti Bayar 2</td>
                          <td><?php echo $model->file8 ? $model->file8 : 'Belum tersedia' ?></td>
                          <td>
                            <?php if ($model->file8): ?>
                              <a href="<?php echo $model->getUrlImage('file8') ?>" class="btn btn-outline btn-info btn-xs">Download</a>
                            <?php else: ?>
                              <a href="#" class="btn btn-default btn-xs disabled">Download</a>
                            <?php endif ?>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                    <?php $this->endWidget(); ?>
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
        <?php if ($model->status == Quote3::STATUS_APPROVED): ?>
        <div class="row">
            <div class="col-md-6 col-lg-4 col-centered">
              <a href="<?php echo $this->createUrl('setStart',array('id'=>$model->id)); ?>" id="open-modal-dialog" class="btn btn-success btn-block">Start Campaign <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>
       <?php endif ?>
<?php
//google maps render
$js =    '
$(".auto-submit").change(function() {
      $("#upload-file-pendukung-form").submit();
    }
  );
$(".auto-submit-2").change(function() {
      $("#upload-file-pendukung-form-2").submit();
    }
  );
';
Yii::app()->clientScript->registerScript('script-map',$js,  CClientScript::POS_END);