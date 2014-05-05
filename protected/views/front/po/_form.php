<?php
/* @var $this PoController */
/* @var $model PO */
/* @var $form CActiveForm */
?>


<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'po-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
	'htmlOptions' => array('enctype' => 'multipart/form-data'),
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<tr>
		<td class="front">Id Quote </td>
		<td> <?php echo $form->dropDownList($model,'idQuote',$idQuotes,array('class'=>'form-control')); ?> </td>
	</tr>

	<tr>
		<td class="front">File PO </td>
		<?php echo $form->fileField($model,'file',array('size'=>60,'maxlength'=>255,'class'=>'fosrm-control')); ?>
	</tr>

	<tr>
		<button id="btnLogin" type="submit" class="btn btn-default">save</button>
	</tr>

<?php $this->endWidget(); ?>
			