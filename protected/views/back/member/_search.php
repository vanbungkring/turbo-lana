<?php
/* @var $this MemberController */
/* @var $model Member */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id'); ?>
		<?php echo $form->textField($model,'id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'namaDepan'); ?>
		<?php echo $form->textField($model,'namaDepan',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'namaBelakang'); ?>
		<?php echo $form->textField($model,'namaBelakang',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'email'); ?>
		<?php echo $form->textField($model,'email',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'nomerTelpon'); ?>
		<?php echo $form->textField($model,'nomerTelpon',array('size'=>40,'maxlength'=>40)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'namaPerusahaan'); ?>
		<?php echo $form->textField($model,'namaPerusahaan',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->