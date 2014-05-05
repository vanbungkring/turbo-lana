<?php
/* @var $this SettingController */
/* @var $model Setting */
/* @var $form CActiveForm */
?>

<div class="form">

	<?php $form=$this->beginWidget('CActiveForm', array(
		'id'=>'setting-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
		'enableAjaxValidation'=>false,
		'htmlOptions' => array('enctype' => 'multipart/form-data'),
		)); ?>

		<p class="note">Fields with <span class="required">*</span> are required.</p>

		<?php echo $form->errorSummary($model); ?>

		<div class="form-group">
			<label>Judul</label>
			<?php echo $form->textField($model,'judul',array('rows'=>6, 'cols'=>50,'class'=>'form-control')); ?>
			<?php echo $form->error($model,'judul'); ?>
		</div>
		<div class="form-group">
			<label>Meta Description</label>
			<?php echo $form->textField($model,'meta_desc',array('rows'=>6, 'cols'=>50,'class'=>'form-control')); ?>
			<?php echo $form->error($model,'meta_desc'); ?>
		</div>
		<div class="form-group">
			<label>Meta Keyword</label>
			<?php echo $form->textField($model,'meta_keyword',array('rows'=>6, 'cols'=>50,'class'=>'form-control')); ?>
			<?php echo $form->error($model,'meta_keyword'); ?>
		</div>

		<div class="form-group">
			<label>Logo</label>
			<?php echo $form->fileField($model,'logo',array('rows'=>6, 'cols'=>50)); ?>
			<img style="max-height:200px" src="<?php echo Yii::app()->controller->createUrl('getImage'); ?>"  />
			<?php echo $form->error($model,'logo'); ?>
		</div>

		<div class="form-group">
			<label>Alamat</label>
			<?php echo $form->textField($model,'alamat',array('rows'=>6, 'cols'=>50,'class'=>'form-control')); ?>
			<?php echo $form->error($model,'alamat'); ?>
		</div>

		<div class="form-group">
			<label>Nomor Telpon</label>
			<?php echo $form->textField($model,'noTelp',array('size'=>60,'maxlength'=>200,'class'=>'form-control')); ?>
			<?php echo $form->error($model,'noTelp'); ?>
		</div>

		<div class="form-group">
			<label>Email</label>
			<?php echo $form->textField($model,'email',array('size'=>60,'maxlength'=>100,'class'=>'form-control')); ?>
			<?php echo $form->error($model,'email'); ?>
		</div>

		<div class="form-group">
			<label>Website</label>
			<?php echo $form->textField($model,'website',array('size'=>60,'maxlength'=>200,'class'=>'form-control')); ?>
			<?php echo $form->error($model,'website'); ?>
		</div>

		<div class="form-group">
			<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save',array('class' => 'btn btn-danger')); ?>
		</div>

		<?php $this->endWidget(); ?>

</div><!-- form -->