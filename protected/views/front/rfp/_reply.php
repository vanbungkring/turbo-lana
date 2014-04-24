<?php if($data->type == 1): ?>
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