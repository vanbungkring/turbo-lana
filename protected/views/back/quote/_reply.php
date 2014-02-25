<?php if($data->type): ?>
<div>
	From : Admin <br>
	<?php echo CHtml::encode($data->reply); ?>
</div>
<?php else: ?>
<div>
	From : <?php echo CHtml::encode($data->member->namaDepan); ?> <br>
	<?php echo CHtml::encode($data->reply); ?>
</div>		
<?php endif; ?>