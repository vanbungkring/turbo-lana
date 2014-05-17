<?php $this->renderPartial('/shared/partial/navbar'); ?>

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'form-signin',
	'enableAjaxValidation'=>true,
	'enableClientValidation'=>true,
	)); ?>
	<div class="container" style="margin-bottom:40px;">
		<div class="row">
			<div class="col-md-6 col-md-offset-3">
				<div class="col-md-12">
					<h2>Pengguna Baru?</h2>
					<p>Kiviads membantu Anda untuk mencari, memilih, membeli dan mengatur spot iklan pada papan reklame yang Anda inginkan. Dengan Kiviads semua lebih mudah dan cepat!</p>
					<div class="form-group">
						<?php echo $form->textField($register,'namaDepan',array('class'=>'form-control','placeholder'=>'Nama Depan','required'=>'required')); ?>
						<?php echo $form->error($register,'namaDepan'); ?>
					</div>

					<div class="form-group">
						<?php echo $form->textField($register,'namaBelakang',array('class'=>'form-control','placeholder'=>'Nama Belakang','required'=>'required')); ?>
						<?php echo $form->error($register,'namaBelakang'); ?>
					</div>

					<div class="form-group">
						<?php echo $form->emailField($register,'email',array('class'=>'form-control','placeholder'=>'Alamat Email Anda','required'=>'required')); ?>
						<?php echo $form->error($register,'email'); ?>
					</div>

					<div class="form-group">
						<?php echo $form->textField($register,'nomerTelpon',array('class'=>'form-control','placeholder'=>'Nomor Telepon','required'=>'required')); ?>
						<?php echo $form->error($register,'nomerTelpon'); ?>
					</div>

					<div class="form-group">
						<?php echo $form->textField($register,'namaPerusahaan',array('class'=>'form-control','placeholder'=>'Nama Perusahaan','required'=>'required')); ?>
						<?php echo $form->error($register,'namaPerusahaan'); ?>
					</div>

					<div class="form-group">
						<?php echo $form->passwordField($register,'passwordRegister1',array('class'=>'form-control','placeholder'=>'Kata Sandi','required'=>'required')); ?>
						<?php echo $form->error($register,'passwordRegister1'); ?>
					</div>

					<div class="form-group">
						<?php echo $form->passwordField($register,'passwordRegister2',array('class'=>'form-control','placeholder'=>'Ulangi Kata Sandi','required'=>'required')); ?>
						<?php echo $form->error($register,'passwordRegister2'); ?>
					</div>
					<label class="checkbox">
						<input type="checkbox" value="remember-me" required="required">
						Lanjutkan
					</label>
					<div class="alert alert-info">
						<p>Dengan mencentang ‘LANJUTKAN dan menekan tombol ‘DAFTAR, Anda sebagai Advertiser telah <a href="<?php echo Yii::app()->createUrl('toc'); ?>">Memberikan Kewenangan</a> terhadap Kiviads terkait peggunaan data Anda untuk kepentingan proses penayangan iklan. Kiviads tidak akan pernah merilis data-data yang telah Anda masukkan kepada pihak manapun, kecuali apabila sebelumnya sudah mendapatkan izin dari Anda dan ada pembicaraan antara kedua belah pihak terkait penggunaan suatu data. Don’t worry! We will keep your privacy private!</p>
					</div>
					<button class="btn btn-lg btn-primary" type="submit">Daftar</button>
					<?php $this->endWidget(); ?>
				</div>
			</div>
			<div class="col-md-6"></div>
		</div>
	</div>
	<?php $this->renderPartial('/shared/partial/footer');?>
