<?php
/* @var $this UserController */
/* @var $model Member */
/* @var $form CActiveForm */
?>

            <div class="row">
                
                
              <div class="padded-top">
         
                <div class="panel panel-main">
                  <div class="panel-heading">
                    <h5>PROFIL PERSONAL</h5>
                  </div>
                  <?php $form=$this->beginWidget('CActiveForm', array(
                   //    'id'=>'po-form',
                    'method'=>'GET',
                             // Please note: When you enable ajax validation, make sure the corresponding
                             // controller action is handling ajax validation correctly.
                             // There is a call to performAjaxValidation() commented in generated controller code.
                             // See class documentation of CActiveForm for details on this.
                          //   'enableAjaxValidation'=>false,
                         )); ?>
                  <div class="panel-body">
                    <div class="col-md-12 col-lg-12">
                        <div class="row">
                          <div class="col-md-12 col-lg-12">
                            <h4 class="form-heading">Informasi Dasar</h4>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-md-4 col-lg-4">
                            <label for="namadepan">Nama Depan</label>
                            <?php echo $form->textField($model,'namaDepan',array('class'=>'form-control')); ?>
                          </div>
                          <div class="col-md-4 col-lg-4">
                            <label for="namabelakang">Name Belakang</label>
                            <?php echo $form->textField($model,'namaBelakang',array('class'=>'form-control')); ?>
                          </div>
                          <div class="col-md-4 col-lg-4">
                            <label for="tanggallahir">Tanggal Lahir</label>
                            <?php echo $form->textField($model,'tanggalLahir',array('class'=>'form-control hasDatepicker_start')); ?>
                          </div>
                          <div class="col-md-4 col-lg-4">
                            <label for="negara">Negara</label>
                            <?php echo $form->textField($model,'negara',array('class'=>'form-control')); ?>
                          </div>
                          <div class="col-md-4 col-lg-4">
                            <label for="kota">Kota</label>
                            <?php echo $form->textField($model,'kota',array('class'=>'form-control')); ?>
                          </div>
                          <div class="col-md-4 col-lg-4">
                            <label for="kodepos">Kode Pos</label>
                             <?php echo $form->textField($model,'kodePos',array('class'=>'form-control')); ?>
                          </div>
                          <div class="col-md-4 col-lg-4">
                            <label for="nomortel">Nomor Telephone / Handphone</label>
                            <?php echo $form->textField($model,'nomerTelpon',array('class'=>'form-control')); ?>
                          </div>
                        </div>
                        <!-- end row form -->
                        <div class="row">
                          <div class="col-md-12 col-lg-12">
                            <h4 class="form-heading">Informasi Akses</h4>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-md-4 col-lg-4">
                            <label for="emailuser">Email</label>
                            <?php echo $form->textField($model,'email',array('class'=>'form-control')); ?>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-md-4 col-lg-4">
                            <label for="oldpassuser">Password Lama</label>
                             <?php echo $form->passwordField($model,'updateOldPassword',array('class'=>'form-control')); ?>
                          </div>
                          <div class="col-md-4 col-lg-4">
                            <label for="newpassuser">Password Baru</label>
                            <?php echo $form->passwordField($model,'updateNewPassword1',array('class'=>'form-control')); ?>
                          </div>
                          <div class="col-md-4 col-lg-4">
                            <label for="newpassuser-confirm">Konfirmasi Password Baru</label>
                            <?php echo $form->passwordField($model,'updateNewPassword2',array('class'=>'form-control')); ?>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-lg-12">
                            <input type="submit" input="Perbaharui Profil Personal" name="aa" class="btn btn-success btn-form" />
                          </div>
                        </div>
                      <!-- end form -->
                    </div>
                  </div>
                  <?php $this->endWidget(); ?>
                </div>
                  
                <div class="panel panel-main">
                  <div class="panel-heading">
                    <h5>PROFIL PERUSAHAAN</h5>
                  </div>
                  <?php $form=$this->beginWidget('CActiveForm', array(
                   //    'id'=>'po-form',
                    'method'=>'post',
                             // Please note: When you enable ajax validation, make sure the corresponding
                             // controller action is handling ajax validation correctly.
                             // There is a call to performAjaxValidation() commented in generated controller code.
                             // See class documentation of CActiveForm for details on this.
                          //   'enableAjaxValidation'=>false,
                    'htmlOptions'=>array('enctype'=>'multipart/form-data'),
                         )); ?>
                  <div class="panel-body">
                    <div class="col-md-12 col-lg-12">
                        <div class="row">
                          <div class="col-lg-6">
                            <label for="companylogo">Logo perusahaan</label>
                            <?php echo $form->fileField($model->profilePerusahaan,'file',array('class'=>'form-control')); ?>
                            <?php if ($model->profilePerusahaan->logoPerusahaan): ?>
                              <img src="<?php echo $model->profilePerusahaan->getFileUrl(); ?>" style="max-height:200px" />
                            <?php endif ?>
                            <p class="help-block">Pilih file untuk diunggah. Pastikan ukuran lebar file anda tidak lebih dari 200 px</p>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-lg-12">
                            <h4 class="form-heading">Informasi Dasar Perusahaan</h4>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-md-4 col-lg-4">
                            <label for="namadepan">Nama Badan Usaha</label>
                            <?php echo $form->textField($model->profilePerusahaan,'namaBadanUsaha',array('class'=>'form-control')); ?>
                          </div>
                          <div class="col-md-4 col-lg-4">
                            <label for="bidangusaha">Bidang Usaha</label>
                           <?php echo $form->dropDownList($model->profilePerusahaan,'bidangUsaha',MemberProfilePerusahaan::getListBidangUsaha(),array('class'=>'form-control')); ?>
                          </div>
                        </div>
                        <!-- end row form -->
                        <div class="row">
                          <div class="col-lg-12">
                            <h4 class="form-heading">Alamat Perusahaan</h4>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-md-4 col-lg-4">
                            <label for="alamatper">Alamat</label>
                            <?php echo $form->textField($model->profilePerusahaan,'alamat',array('class'=>'form-control')); ?>
                          </div>
                          <div class="col-md-4 col-lg-4">
                            <label for="koteper">Kota</label>
                            <?php echo $form->textField($model->profilePerusahaan,'kota',array('class'=>'form-control')); ?>
                          </div>
                          <div class="col-md-4 col-lg-4">
                            <label for="negaraper">Negara</label>
                            <?php echo $form->textField($model->profilePerusahaan,'negara',array('class'=>'form-control')); ?>
                          </div>
                          <div class="col-md-4 col-lg-4">
                            <label for="kodeposper">Kode Pos</label>
                            <?php echo $form->textField($model->profilePerusahaan,'kodePos',array('class'=>'form-control')); ?>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-lg-12">
                            <h4 class="form-heading">Kontak Perusahaan</h4>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-md-4 col-lg-4">
                            <label for="website">Website</label>
                            <?php echo $form->textField($model->profilePerusahaan,'website',array('class'=>'form-control')); ?>
                          </div>
                          <div class="col-md-4 col-lg-4">
                            <label for="emailper">Email</label>
                            <?php echo $form->textField($model->profilePerusahaan,'email',array('class'=>'form-control')); ?>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-md-4 col-lg-4">
                            <label for="notelper">Nomor Telepon</label>
                            <?php echo $form->textField($model->profilePerusahaan,'nomorTelepon',array('class'=>'form-control')); ?>
                          </div>
                          <div class="col-md-4 col-lg-4">
                            <label for="fax">Fax</label>
                            <?php echo $form->textField($model->profilePerusahaan,'fax',array('class'=>'form-control')); ?>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-lg-12">
                            <button type="submit" class="btn btn-success btn-form">Perbaharui Profil Perusahaan</button>
                          </div>
                        </div>
                        <!-- end of row -->
                      <!-- end form -->
                    </div>
                  </div>
                   <?php $this->endWidget(); ?>
                </div>
                <!-- end panel -->
              </div>
             

            </div>
