<?php
/* @var $this KategoriBannerController */
/* @var $model KategoriBanner */

$this->breadcrumbs=array(
	'Kategori Banners'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List KategoriBanner', 'url'=>array('index')),
	array('label'=>'Create KategoriBanner', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#kategori-banner-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Daftar Kategori Banner</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Basic Form Elements
            </div>
            <div class="panel-body">
            	<a href="<?php echo Yii::app()->createUrl('kategoriBanner/create'); ?>">Tombol</a>
				<?php $this->widget('zii.widgets.grid.CGridView', array(
					'id'=>'kategori-banner-grid',
					"itemsCssClass" => 'table table-bordered',
                    'dataProvider'=>$model->search(),
//                        'filter'=>$model,
                    'cssFile'=>false,
					'columns'=>array(
						'id',
						'nama',
						'keterangan',
						array(
						'class'=>'CButtonColumn',
						),
					),
				)); ?>
            </div>
        </div>
    </div>
</div>