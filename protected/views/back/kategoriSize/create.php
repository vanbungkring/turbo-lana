<?php
/* @var $this KategoriSizeController */
/* @var $model KategoriSize */

$this->breadcrumbs=array(
	'Kategori Sizes'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List KategoriSize', 'url'=>array('index')),
	array('label'=>'Manage KategoriSize', 'url'=>array('admin')),
);
?>

<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Kategori Size</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>