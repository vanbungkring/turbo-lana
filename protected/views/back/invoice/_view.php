<?php
/* @var $this InvoiceController */
/* @var $data Invoice */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idPurchaseBillboard')); ?>:</b>
	<?php echo CHtml::encode($data->idPurchaseBillboard); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idMember')); ?>:</b>
	<?php echo CHtml::encode($data->idMember); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tanggal')); ?>:</b>
	<?php echo CHtml::encode($data->tanggal); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('time')); ?>:</b>
	<?php echo CHtml::encode($data->time); ?>
	<br />


</div>