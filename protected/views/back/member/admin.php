<?php
/* @var $this MemberController */
/* @var $model Member */

$this->breadcrumbs=array(
	'Members'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Member', 'url'=>array('index')),
	array('label'=>'Create Member', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#member-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Daftar Member</h1>
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
                <a href="<?php echo Yii::app()->createUrl('member/create'); ?>">Tombol</a>

				<?php $this->widget('zii.widgets.grid.CGridView', array(
					'id'=>'member-grid',
					"itemsCssClass" => 'table table-bordered',
                    'dataProvider'=>$model->search(),
//                        'filter'=>$model,
                    'cssFile'=>false,
					'columns'=>array(
						'id',
						'namaDepan',
						'namaBelakang',
						'email',
						'nomerTelpon',
						'namaPerusahaan',
						/*
						'password',
						*/
						array(
							'class'=>'CButtonColumn',
						),
					),
				)); ?>
 			</div>
        </div>
    </div>
</div>