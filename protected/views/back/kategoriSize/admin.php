<?php
/* @var $this KategoriSizeController */
/* @var $model KategoriSize */

$this->breadcrumbs=array(
	'Kategori Sizes'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List KategoriSize', 'url'=>array('index')),
	array('label'=>'Create KategoriSize', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#kategori-size-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Daftar Kategori Size</h1>
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
            	<a href="<?php echo Yii::app()->createUrl('KategoriSize/create'); ?>">Tambah</a>
				<?php $this->widget('zii.widgets.grid.CGridView', array(
					'id'=>'kategori-size-grid',
					"itemsCssClass" => 'table table-bordered',
                    'dataProvider'=>$model->search(),
//                        'filter'=>$model,
                    'cssFile'=>false,
					'columns'=>array(
						'id',
						'nama',
						'lebar',
						'tinggi',
						array(
							'value'=>'\'<a href="\'.$data->getUrl().\'" target="_blank">link</a>\'',
							'type'=>'raw',
						),
						array(
							'class'=>'CButtonColumn',
						),
					),
				)); ?>
           </div>
        </div>
    </div>
</div>
