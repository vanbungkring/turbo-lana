<?php
/* @var $this QuoteController */
/* @var $model Quote */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'quote-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>200)); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'initialDate'); ?>
		<?php echo $form->textField($model,'initialDate'); ?>
		<?php echo $form->error($model,'initialDate'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'replyUntil'); ?>
		<?php echo $form->textField($model,'replyUntil'); ?>
		<?php echo $form->error($model,'replyUntil'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'duration'); ?>
		<?php echo $form->textField($model,'duration'); ?>
		<?php echo $form->error($model,'duration'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'durationType'); ?>
		<?php echo $form->textField($model,'durationType'); ?>
		<?php echo $form->error($model,'durationType'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'budget'); ?>
		<?php echo $form->textField($model,'budget'); ?>
		<?php echo $form->error($model,'budget'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'description'); ?>
		<?php echo $form->textArea($model,'description',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'description'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'otherObservations'); ?>
		<?php echo $form->textArea($model,'otherObservations',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'otherObservations'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'idMember'); ?>
		<?php echo $form->textField($model,'idMember'); ?>
		<?php echo $form->error($model,'idMember'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->