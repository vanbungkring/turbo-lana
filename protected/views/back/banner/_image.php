<div>
	<img src="<?php echo $data->getImageUrl(); ?>" style="max-height:200px;max-widht:200px" />
	<?php echo CHtml::link('Set Cover',array('/banner/setCover','id'=>$data->id,)); ?>
</div>