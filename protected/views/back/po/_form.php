<?php
/* @var $this PoController */
/* @var $model PO */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'po-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
	'htmlOptions'=>array('enctype'=>'multipart/form-data'),
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>


	<div class="form-group">
		<label>Quote</label>
		<?php echo $form->dropDownList($model,'idQuote',$idQuotes,array('id'=>'lat','class'=>'form-control')); ?>
		<?php echo $form->error($model,'idQuote'); ?>
	</div>

	<div class="form-group">
		<label>File</label>
		<?php echo $form->fileField($model,'file',$idQuotes,array('size'=>12,'maxlength'=>12,'id'=>'lat','class'=>'form-control')); ?>
		<?php echo $form->error($model,'file'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->