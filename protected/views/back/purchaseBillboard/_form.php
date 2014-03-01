<?php
/* @var $this PurchaseBillboardController */
/* @var $model PurchaseBillboard */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'purchase-billboard-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'idPO'); ?>
		<?php echo $form->dropDownList($model,'idPO',$idPOs); ?>
		<?php echo $form->error($model,'idPO'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'idOwner'); ?>
		<?php echo $form->dropDownList($model,'idOwner',$idOwners); ?>
		<?php echo $form->error($model,'idOwner'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'tanggal'); ?>
		<?php echo $form->textField($model,'tanggal'); ?>
		<?php echo $form->error($model,'tanggal'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->