<?php
/* @var $this BannerController */
/* @var $model Banner */

$this->breadcrumbs=array(
	'Banners'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Banner', 'url'=>array('index')),
	array('label'=>'Create Banner', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#banner-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Daftar Banner</h1>
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
                <a href="<?php echo Yii::app()->createUrl('banner/create'); ?>">Tombol</a>
                <?php $this->widget('zii.widgets.grid.CGridView', array(
                        'id'=>'banner-grid',
                        "itemsCssClass" => 'table table-bordered',
                        'dataProvider'=>$model->search(),
    //                        'filter'=>$model,
                        'cssFile'=>false,
                        'columns'=>array(
                                'id',
                                'nama',
                                'lat',
                                'long',
                                array(
                                        'class'=>'CButtonColumn',
                                ),
                        ),
                )); ?>
            </div>
        </div>
    </div>
</div>