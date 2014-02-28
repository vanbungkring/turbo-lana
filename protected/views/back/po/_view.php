<?php
/* @var $this PoController */
/* @var $data PO */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idQuote')); ?>:</b>
	<?php echo CHtml::encode($data->idQuote); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idMember')); ?>:</b>
	<?php echo CHtml::encode($data->idMember); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('time')); ?>:</b>
	<?php echo CHtml::encode($data->time); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('namaFile')); ?>:</b>
	<?php echo CHtml::encode($data->namaFile); ?>
	<br />


</div>