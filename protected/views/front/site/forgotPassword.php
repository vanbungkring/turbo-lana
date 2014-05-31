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
					<h2>Lupas Password ?</h2>
					<p>Kiviads membantu Anda untuk megatur ulang passwrod anda, masukan email anda maka kami akan mengirim link untuk mereset password anda !</p>
					
					<?php if(Yii::app()->user->hasFlash('success')):?>
					    <div class="alert alert-success">
					        <?php echo Yii::app()->user->getFlash('success'); ?>
					    </div>
					<?php endif; ?>

					<?php if(Yii::app()->user->hasFlash('error')):?>
					    <div class="alert alert-error">
					        <?php echo Yii::app()->user->getFlash('error'); ?>
					    </div>
					<?php endif; ?>


					<div class="form-group">
						<?php echo CHtml::textField('email',@$_POST['email'],array('class'=>'form-control','placeholder'=>'Email','required'=>'required')); ?>
						<?php echo $form->error($register,'email'); ?>
					</div>

					<button class="btn btn-lg btn-primary" type="submit">Kirim</button>
					<?php $this->endWidget(); ?>
				</div>
			</div>
			<div class="col-md-6"></div>
		</div>
	</div>
	<?php $this->renderPartial('/shared/partial/footer');?>
