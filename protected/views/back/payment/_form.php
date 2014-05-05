<?php
/* @var $this PaymentController */
/* @var $model Payment */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'payment-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="form-group">
        <label>Invoice</label>
		<?php echo $form->dropDownList($model,'idInvoice',CHtml::listData(Invoice::model()->findAllLunas(),'id','NamaSingkat'),array('class'=>'form-control')); ?>
		<?php echo $form->error($model,'idInvoice'); ?>
	</div>

	<div class="form-group">
        <label>Tanggal</label>
		<?php echo $form->textField($model,'tanggal',array('size'=>15,'maxlength'=>15,'class'=>'form-control')); ?>
		<?php echo $form->error($model,'tanggal'); ?>
	</div>

	<div class="form-group">
        <label>Jumlah</label>
		<?php echo $form->textField($model,'jumlah',array('size'=>15,'maxlength'=>15,'class'=>'form-control')); ?>
		<?php echo $form->error($model,'jumlah'); ?>
	</div>

	<div class="form-group">
        <label>Cara</label>
		<?php echo $form->dropDownList($model,'cara',Payment::listCara(),array('class'=>'form-control')); ?>
		<?php echo $form->error($model,'cara'); ?>
	</div>

	<div class="form-group">
        <label>Catatan</label>
		<?php echo $form->textArea($model,'catatan',array('size'=>60,'maxlength'=>200,'class'=>'form-control')); ?>
		<?php echo $form->error($model,'catatan'); ?>
	</div>

	<div class="form-group">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save',array('class' => 'btn btn-danger')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->