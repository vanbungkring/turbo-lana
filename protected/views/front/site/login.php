      <?php
      /* @var $this SiteController */
      /* @var $model LoginForm */
      /* @var $form CActiveForm  */
      $this->breadcrumbs=array(
      	'Login',
      	);
      	?>
      	<div class="container big-login">
      		<div class="row">
      			<div class="login-form">

      				<h1 id="signin_logo" class="login-top"><a href="http://sproutsocial.com ">Kiviads</a></h1>
      				<?php $form=$this->beginWidget('CActiveForm', array(
      					'id'=>'login-form',
      					'enableClientValidation'=>true,
      					'clientOptions'=>array(
      						'validateOnSubmit'=>true,
      						),
      						)); ?>

      						<form role="form">
      							<div class="form-group">
      								<?php echo $form->labelEx($model,'username'); ?>
      								<?php echo $form->textField($model,'username',array('class'=>'form-control')); ?>
      								<?php echo $form->error($model,'username'); ?>
      							</div>

      							<div class="form-group">
      								<?php echo $form->labelEx($model,'password'); ?>
      								<?php echo $form->passwordField($model,'password',array('class'=>'form-control')); ?>
      								<?php echo $form->error($model,'password'); ?>
      							</div>
      							<div class="col-md-6">
	      							<div class="form-group">
	      								<?php echo $form->checkBox($model,'rememberMe'); ?>
	      								<?php echo $form->label($model,'rememberMe'); ?>
	      								<?php echo $form->error($model,'rememberMe'); ?>
	      							</div>
      							</div>

      							<div class="col-md-6">
	      								<a href="<?php echo $this->createUrl('forgotPassword'); ?>" class="forgot_pw">Lupa Kata Sandi Anda?</a>
      							</div>
      							<div class="col-md-12">
      								<?php echo CHtml::submitButton('Masuk',array('class'=>'btn btn-default login-button')); ?>
      								
      								<div class="signup_link">Belum daftar?
      									<a href="<?php echo Yii::app()->createUrl('/site/Registrasi') ?>">Register Disini »</a>
      								</div>
      							
      							</div>

      							

      							<?php $this->endWidget(); ?>
      							<?php $this->widget('ext.hoauth.widgets.HOAuth'); ?>

      						</div>
      					</div>
      				</div>
