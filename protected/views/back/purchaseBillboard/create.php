<?php
/* @var $this PurchaseBillboardController */
/* @var $model PurchaseBillboard */

$this->breadcrumbs=array(
	'Purchase Billboards'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List PurchaseBillboard', 'url'=>array('index')),
	array('label'=>'Manage PurchaseBillboard', 'url'=>array('admin')),
);
?>
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Create Purchase Billboard</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>

<?php $this->renderPartial('_form', array('model'=>$model,'idPOs'=>$idPOs,'idOwners'=>$idOwners)); ?>