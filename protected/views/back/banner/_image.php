<div>
	<div>
		<img src="<?php echo $data->getImageUrl(); ?>" style="max-height:200px;max-widht:200px" />
	</div>
	<div>
		<?php echo CHtml::link('Set Cover',array('/banner/setCover','id'=>$data->id,)); ?><br>
		<?php echo CHtml::link('Hapus Image',array('/banner/deleteImage','id'=>$data->id,)); ?>
	</div>
</div>