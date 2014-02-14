<?php
/* @var $this BannerController */
/* @var $model Banner */

$this->breadcrumbs=array(
	'Banners'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Banner', 'url'=>array('index')),
	array('label'=>'Create Banner', 'url'=>array('create')),
	array('label'=>'Update Banner', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Banner', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Banner', 'url'=>array('admin')),
);
?>

<h1>View Banner #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'nama',
		'lat',
		'long',
		array(
            'value'=>'<img src="'.$model->getImageUrl().'" />',
            'visible'=>$model->isImageExist(),
            'type'=>'raw',
        ),
	),
)); 


$this->widget('zii.widgets.CListView', array(
    'dataProvider'=>new CActiveDataProvider('BannerImage',array(
    	'criteria'=>array(
    		'condition'=>'idBanner = :idBanner',
    		'params'=>array(
		    	':idBanner'=>$model->id
		    )
    	),
    	'pagination'=>false,
    )),
    'itemView'=>'_image',  
));

$form=$this->beginWidget('CActiveForm', array(
	'id'=>'banner-image-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
  'htmlOptions'=>array('enctype'=>'multipart/form-data'),
)); ?>

<div class="form-group">
    <?php echo $form->fileField($modelBannerImage, 'image'); ?>
    <?php echo $form->error($modelBannerImage,'image'); ?>
</div>
<div class="form-group">
	<?php echo CHtml::submitButton( 'upload',array('class' => 'btn btn-danger')); ?>
</div>
<?php $this->endWidget(); ?>