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
					<h2>New User?</h2>
					<p>The classic adventures of Spider-Man from the early days up until the 90s. An excellent book, fit for readers of all ages. The very first appearance of Spider-Man. </p>
					<div class="form-group">
						<?php echo $form->textField($register,'namaDepan',array('class'=>'form-control','placeholder'=>'First Name','required'=>'required')); ?>
						<?php echo $form->error($register,'namaDepan'); ?>
					</div>

					<div class="form-group">
						<?php echo $form->textField($register,'namaBelakang',array('class'=>'form-control','placeholder'=>'Last Name','required'=>'required')); ?>
						<?php echo $form->error($register,'namaBelakang'); ?>
					</div>

					<div class="form-group">
						<?php echo $form->emailField($register,'email',array('class'=>'form-control','placeholder'=>'Your email Address','required'=>'required')); ?>
						<?php echo $form->error($register,'email'); ?>
					</div>

					<div class="form-group">
						<?php echo $form->textField($register,'nomerTelpon',array('class'=>'form-control','placeholder'=>'Phone Number','required'=>'required')); ?>
						<?php echo $form->error($register,'nomerTelpon'); ?>
					</div>

					<div class="form-group">
						<?php echo $form->textField($register,'namaPerusahaan',array('class'=>'form-control','placeholder'=>'Company Name','required'=>'required')); ?>
						<?php echo $form->error($register,'namaPerusahaan'); ?>
					</div>

					<div class="form-group">
						<?php echo $form->passwordField($register,'passwordRegister1',array('class'=>'form-control','placeholder'=>'Password','required'=>'required')); ?>
						<?php echo $form->error($register,'passwordRegister1'); ?>
					</div>

					<div class="form-group">
						<?php echo $form->passwordField($register,'passwordRegister2',array('class'=>'form-control','placeholder'=>'Password Again','required'=>'required')); ?>
						<?php echo $form->error($register,'passwordRegister2'); ?>
					</div>
					<label class="checkbox">
						<input type="checkbox" value="remember-me" required="required"> By Checking this bla bla bla, you agree with our Terms of service
					</label>
					<button class="btn btn-lg btn-primary" type="submit">Sign in</button>
					<?php $this->endWidget(); ?>
				</div>
			</div>
			<div class="col-md-6"></div>
		</div>
	</div>
	<?php $this->renderPartial('/shared/partial/footer');?>
