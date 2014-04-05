
<?php $this->renderPartial('/shared/partial/navbar-home'); ?>
<?php $this->renderPartial('/shared/partial/homepage/header-wrap'); ?>
<?php $this->renderPartial('/shared/partial/homepage/intro'); ?>
<?php $this->renderPartial('/shared/partial/homepage/city'); ?>
<?php $this->renderPartial('/shared/partial/homepage/who'); ?>
<?php $this->renderPartial('/shared/partial/homepage/adsnow'); ?>


<div id="c">
	<div class="container">
		<p>Created by <a href="http://www.blacktie.co">BLACKTIE.CO</a></p>

	</div>
</div>

<div class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-body">
				<form class="form-signin" role="form">
					<h2 class="form-signin-heading">Please sign in</h2>
					<div class="form-group">
						<input type="email" class="form-control" placeholder="Email address" required="" autofocus="">
					</div>
					<div class="form-group">
						<input type="password" class="form-control" placeholder="Password" required="">
					</div>
					<label class="checkbox">
						<input type="checkbox" value="remember-me"> Remember me
					</label>
					<button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
				</form>
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="register" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-body">
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
						<input type="checkbox" value="remember-me" required=""> By Checking this bla bla bla, you agree with our Terms of service
					</label>
					<button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
					<?php $this->endWidget(); ?>
				</div>
			</div>
		</div>
	</div>
	<?php


	Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl.'/js/jquery.geocomplete.js',  CClientScript::POS_END);
	Yii::app()->clientScript->registerScript('script-box','$("#boxcari").geocomplete().bind("geocode:result", function(event, result){
		$("#lat").val(result.geometry.location.lat());
		$("#long").val(result.geometry.location.lng());
 // map.setCenter(new google.maps.LatLng(result.geometry.location.lat(), result.geometry.location.lng()))
	});;',  CClientScript::POS_END);