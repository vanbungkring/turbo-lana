<?php
/* @var $this KategoriSizeController */
/* @var $model KategoriSize */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'kategori-size-form',
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
        <label>Nama</label>
		<?php echo $form->textField($model,'nama',array('size'=>60,'maxlength'=>100,'class'=>'form-control')); ?>
		<?php echo $form->error($model,'nama'); ?>
	</div>

	<div class="form-group">
        <label>Lebar</label>
		<?php echo $form->textField($model,'lebar',array('size'=>60,'maxlength'=>100,'class'=>'form-control')); ?>
		<?php echo $form->error($model,'lebar'); ?>
	</div>

	<div class="form-group">
        <label>Tinggi</label>
		<?php echo $form->textField($model,'tinggi',array('size'=>60,'maxlength'=>100,'class'=>'form-control')); ?>
		<?php echo $form->error($model,'tinggi'); ?>
	</div>


	<div class="form-group">
        <label>Image</label>
		<?php echo $form->fileField($model, 'image'); ?>
		<?php echo $form->error($model,'image'); ?>
	</div>

	<div class="form-group">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save',array('class' => 'btn btn-danger')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->