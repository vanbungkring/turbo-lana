<?php
/* @var $this PerusahaanController */
/* @var $model Perusahaan */
/* @var $form CActiveForm */
?>

<div class="form">

	<?php $form=$this->beginWidget('CActiveForm', array(
		'id'=>'perusahaan-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
		'enableAjaxValidation'=>false,
		)); ?>

		<p class="note">Fields with <span class="required">*</span> are required.</p>

		<?php echo $form->errorSummary($model); ?>

		<div class="form-group">
			<label>Nama</label>
			<?php echo $form->textField($model,'nama',array('size'=>60,'maxlength'=>100,'class'=>'form-control')); ?>
			<?php echo $form->error($model,'nama'); ?>
		</div>
		<div class="form-group">
			<?php echo $form->labelEx($model,'brand'); ?>
			<?php echo $form->textArea($model,'brand',array('size'=>100,'height'=>10,'maxlength'=>255,'class'=>'form-control')); ?>
		</div>
		<div class="form-group">
			<?php echo $form->labelEx($model,'alamat'); ?>
			<?php echo $form->textArea($model,'alamat',array('size'=>100,'height'=>10,'maxlength'=>255,'class'=>'form-control')); ?>
			<?php echo $form->error($model,'alamat'); ?>
		</div>

		<div class="form-group">
			<?php echo $form->labelEx($model,'noTelpon'); ?>
			<?php echo $form->textField($model,'noTelpon',array('size'=>30,'maxlength'=>30,'class'=>'form-control')); ?>
			<?php echo $form->error($model,'noTelpon'); ?>
		</div>

		<div class="form-group">
			<?php echo $form->labelEx($model,'fax'); ?>
			<?php echo $form->textField($model,'fax',array('size'=>30,'maxlength'=>30,'class'=>'form-control')); ?>
			<?php echo $form->error($model,'fax'); ?>
		</div>

		<div class="form-group">
			<?php echo $form->labelEx($model,'kontakPerson'); ?>
			<?php echo $form->textField($model,'kontakPerson',array('size'=>50,'maxlength'=>50,'class'=>'form-control')); ?>
			<?php echo $form->error($model,'kontakPerson'); ?>
		</div>

		<div class="form-group">
			<?php echo $form->labelEx($model,'website'); ?>
			<?php echo $form->textField($model,'website',array('size'=>60,'maxlength'=>255,'class'=>'form-control')); ?>
			<?php echo $form->error($model,'website'); ?>
		</div>

		<div class="form-group">
			<?php echo $form->labelEx($model,'email'); ?>
			<?php echo $form->textField($model,'email',array('size'=>30,'maxlength'=>30,'class'=>'form-control')); ?>
			<?php echo $form->error($model,'email'); ?>
		</div>

		<div class="form-group">
			<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save',array('class' => 'btn btn-danger')); ?>
		</div>

		<?php $this->endWidget(); ?>

</div><!-- form -->