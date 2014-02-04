<?php
/* @var $this PerusahaanController */
/* @var $model Perusahaan */

$this->breadcrumbs=array(
	'Perusahaans'=>array('index'),
	'Manage',
    );

Yii::app()->clientScript->registerScript('search', "
    $('.search-button').click(function(){
       $('.search-form').toggle();
       return false;
   });
$('.search-form form').submit(function(){
	$('#perusahaan-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
return false;
});
");
?>
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Daftar Pemilik Banner</h1>
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
                <a href="<?php echo Yii::app()->createUrl('perusahaan/create'); ?>">Tombol</a>
                <?php $this->widget('zii.widgets.grid.CGridView', array(
                    'id'=>'perusahaan-grid',
                    "itemsCssClass" => 'table table-bordered',
                    'dataProvider'=>$model->search(),
//                        'filter'=>$model,
                    'cssFile'=>false,
                    'columns'=>array(
                        'id',
                        'nama',
                        'alamat',
                        'noTelpon',
                        'fax',
                        'kontakPerson',
                                /*
                                'website',
                                'email',
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