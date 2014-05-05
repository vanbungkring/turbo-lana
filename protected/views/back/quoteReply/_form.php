<?php
/* @var $this QuoteReplyController */
/* @var $model QuoteReply */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'quote-reply-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'idQuote'); ?>
		<?php echo $form->textField($model,'idQuote'); ?>
		<?php echo $form->error($model,'idQuote'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'type'); ?>
		<?php echo $form->textField($model,'type'); ?>
		<?php echo $form->error($model,'type'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'reply'); ?>
		<?php echo $form->textArea($model,'reply',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'reply'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'time'); ?>
		<?php echo $form->textField($model,'time'); ?>
		<?php echo $form->error($model,'time'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'idMember'); ?>
		<?php echo $form->textField($model,'idMember'); ?>
		<?php echo $form->error($model,'idMember'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'idAdmin'); ?>
		<?php echo $form->textField($model,'idAdmin'); ?>
		<?php echo $form->error($model,'idAdmin'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->