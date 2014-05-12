<?php $this->renderPartial('/shared/partial/navbar'); ?>

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'form-signin',
	'enableAjaxValidation'=>true,
    'enableClientValidation'=>true,
)); ?>
	<h2 class="form-signin-heading">Who are you?</h2>
	
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
	<button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
<?php $this->endWidget(); ?>


<?php $this->renderPartial('/shared/partial/footer');?>
