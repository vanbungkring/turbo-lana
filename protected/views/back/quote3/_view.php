<?php
/* @var $this Quote3Controller */
/* @var $data Quote3 */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idMember')); ?>:</b>
	<?php echo CHtml::encode($data->idMember); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('name')); ?>:</b>
	<?php echo CHtml::encode($data->name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tanggalMulai')); ?>:</b>
	<?php echo CHtml::encode($data->tanggalMulai); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tanggalBerakhir')); ?>:</b>
	<?php echo CHtml::encode($data->tanggalBerakhir); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('budget')); ?>:</b>
	<?php echo CHtml::encode($data->budget); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('deskripsi')); ?>:</b>
	<?php echo CHtml::encode($data->deskripsi); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('catatan')); ?>:</b>
	<?php echo CHtml::encode($data->catatan); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('time')); ?>:</b>
	<?php echo CHtml::encode($data->time); ?>
	<br />

	*/ ?>

</div>