<?php
/* @var $this MemberController */
/* @var $model Member */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'member-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="form-group">
        <label>Nama Depan</label>
		<?php echo $form->textField($model,'namaDepan',array('size'=>60,'maxlength'=>100,'class'=>'form-control')); ?>
		<?php echo $form->error($model,'namaDepan'); ?>
	</div>

	<div class="form-group">
        <label>Nama Belakang</label>
		<?php echo $form->textField($model,'namaBelakang',array('size'=>60,'maxlength'=>100,'class'=>'form-control')); ?>
		<?php echo $form->error($model,'namaBelakang'); ?>
	</div>

	<div class="form-group">
        <label>Email</label>
		<?php echo $form->textField($model,'email',array('size'=>50,'maxlength'=>50,'class'=>'form-control')); ?>
		<?php echo $form->error($model,'email'); ?>
	</div>

	<div class="form-group">
        <label>Nomor Telepon</label>
		<?php echo $form->textField($model,'nomerTelpon',array('size'=>40,'maxlength'=>40,'class'=>'form-control')); ?>
		<?php echo $form->error($model,'nomerTelpon'); ?>
	</div>

	<div class="form-group">
		<label>Nama Perusahaan</label>
		<?php echo $form->textField($model,'namaPerusahaan',array('size'=>60,'maxlength'=>100,'class'=>'form-control')); ?>
		<?php echo $form->error($model,'namaPerusahaan'); ?>
	</div>

	<div class="form-group">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save',array('class' => 'btn btn-danger')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->