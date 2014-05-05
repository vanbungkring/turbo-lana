
<div class="row">
  <div class="padded-top">
    <div class="panel panel-main">
      <div class="panel-heading">
        <h5>DETAIL QUOTES CAMPAIGN</h5>
      </div>
      <div class="panel-body">
        <div class="col-md-12 col-lg-12">
          <?php $form=$this->beginWidget('CActiveForm', array(
			'id'=>'quote-form',
			// Please note: When you enable ajax validation, make sure the corresponding
			// controller action is handling ajax validation correctly.
			// There is a call to performAjaxValidation() commented in generated controller code.
			// See class documentation of CActiveForm for details on this.
			'enableAjaxValidation'=>false,
			'htmlOptions'=>array('enctype'=>'multipart/form-data'),
			)); ?>
            <div class="row">
              <div class="col-lg-12">
                <h4 class="form-heading">Detil Campaign</h4>
              </div>
            </div>
            <div class="row">
              <div class="col-md-4 col-lg-4">
                <label for="namacamp">Nama Campaign</label>
                <?php echo $form->textField($model,'name',array('class'=>'form-control')); ?>
              </div>
              <div class="col-md-4 col-lg-4">
                <label for="startdate">Tanggal Mulai</label>
                <?php echo $form->textField($model,'tanggalMulai',array('class'=>'form-control hasDatepicker_start')); ?>
              </div>
              <div class="col-md-4 col-lg-4">
                <label for="enddate">Tanggal Berakhir</label>
                 <?php echo $form->textField($model,'tanggalBerakhir',array('class'=>'form-control hasDatepicker_end')); ?>
              </div>
            </div>
            <!-- end row form -->
            <div class="row">
              <div class="col-md-4 col-lg-4">
                <label for="campbudget">Budget</label>
                <div class="form-group input-group">
                  <span class="input-group-addon">Rp</span>
                  <?php echo $form->textField($model,'budget',array('class'=>'form-control')); ?>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-lg-6 col-md-6">
                <label for="campdesc">Deskripsi</label>
                <p><small>Masukkan informasi dari tujuan campaign dan juga ringkasan kreatif atau perencanaan anda</small></p>
                <?php echo $form->textArea($model,'deskripsi',array('class'=>'form-control','row'=>'3')); ?>
              </div>
              <div class="col-lg-6 col-md-6">
                <label for="notescamp">Catatan</label>
                <p><small>Masukkan catatan dari anda yang harus diperhatikan untuk campaign ini</small></p>
                <?php echo $form->textArea($model,'catatan',array('class'=>'form-control','row'=>'3')); ?>
              </div>
            </div>
            <div class="row">
              <div class="col-lg-12">
                <button type="submit" class="btn btn-success btn-form">Create Campaign Quotes</button>
              </div>
            </div>
            <!-- end of row -->
          <?php $this->endWidget(); ?>
          <!-- end form -->
        </div>
      </div>
    </div>
    <!-- end panel -->
  </div>
</div>
        