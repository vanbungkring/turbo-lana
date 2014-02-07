<?php
/* @var $this KategoriBannerController */
/* @var $model KategoriBanner */

$this->breadcrumbs=array(
	'Kategori Banners'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List KategoriBanner', 'url'=>array('index')),
	array('label'=>'Manage KategoriBanner', 'url'=>array('admin')),
);
?>

<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Kategori Banner</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>