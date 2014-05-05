<?php
/* @var $this MemberController */
/* @var $data Member */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('namaDepan')); ?>:</b>
	<?php echo CHtml::encode($data->namaDepan); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('namaBelakang')); ?>:</b>
	<?php echo CHtml::encode($data->namaBelakang); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('email')); ?>:</b>
	<?php echo CHtml::encode($data->email); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nomerTelpon')); ?>:</b>
	<?php echo CHtml::encode($data->nomerTelpon); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('namaPerusahaan')); ?>:</b>
	<?php echo CHtml::encode($data->namaPerusahaan); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('password')); ?>:</b>
	<?php echo CHtml::encode($data->password); ?>
	<br />


</div>