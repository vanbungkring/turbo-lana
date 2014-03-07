<?php
/* @var $this QuoteReplyController */
/* @var $data QuoteReply */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idQuote')); ?>:</b>
	<?php echo CHtml::encode($data->idQuote); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('type')); ?>:</b>
	<?php echo CHtml::encode($data->type); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('reply')); ?>:</b>
	<?php echo CHtml::encode($data->reply); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('time')); ?>:</b>
	<?php echo CHtml::encode($data->time); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idMember')); ?>:</b>
	<?php echo CHtml::encode($data->idMember); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idAdmin')); ?>:</b>
	<?php echo CHtml::encode($data->idAdmin); ?>
	<br />


</div>