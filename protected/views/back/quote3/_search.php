<?php
/* @var $this Quote3Controller */
/* @var $model Quote3 */
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
		<?php echo $form->label($model,'idMember'); ?>
		<?php echo $form->textField($model,'idMember'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>200)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'tanggalMulai'); ?>
		<?php echo $form->textField($model,'tanggalMulai'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'tanggalBerakhir'); ?>
		<?php echo $form->textField($model,'tanggalBerakhir'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'budget'); ?>
		<?php echo $form->textField($model,'budget',array('size'=>15,'maxlength'=>15)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'deskripsi'); ?>
		<?php echo $form->textArea($model,'deskripsi',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'catatan'); ?>
		<?php echo $form->textArea($model,'catatan',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'time'); ?>
		<?php echo $form->textField($model,'time'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->