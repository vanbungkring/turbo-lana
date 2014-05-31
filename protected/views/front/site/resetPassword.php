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
					<h2>Reset Password</h2>
					<p>Kiviads membantu Anda untuk megatur ulang passwrod anda, masukan password baru anda !</p>
					
					<?php if(Yii::app()->user->hasFlash('success')):?>
					    <div class="alert alert-success">
					        <?php echo Yii::app()->user->getFlash('success'); ?>
					    </div>
					<?php endif; ?>

					<?php echo $form->errorSummary($model); ?>

					<div class="form-group">
						<?php echo CHtml::textField('email',$member->email,array('class'=>'form-control','placeholder'=>'Email','required'=>'required','disabled'=>'disabled')); ?>
						<?php echo $form->error($register,'email'); ?>
					</div>

					<div class="form-group">
						<?php echo $form->passwordField($model,'pass1',array('class'=>'form-control','placeholder'=>'Password','required'=>'required')); ?>
						<?php echo $form->error($register,'pass1'); ?>
					</div>


					<div class="form-group">
						<?php echo $form->passwordField($model,'pass2',array('class'=>'form-control','placeholder'=>'Konfirmasi Password','required'=>'required')); ?>
						<?php echo $form->error($register,'pass2'); ?>
					</div>

					<button class="btn btn-lg btn-primary" type="submit">Simpan</button>
					<?php $this->endWidget(); ?>
				</div>
			</div>
			<div class="col-md-6"></div>
		</div>
	</div>
	<?php $this->renderPartial('/shared/partial/footer');?>
