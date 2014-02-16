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
                    <div class="floating-bar">
                    <a class="btn btn-primary" href="<?php echo Yii::app()->createUrl('kategoriBanner/create'); ?>">Tambah</a>
                </div>
            </div>
            <div class="panel-body">
                
                <?php $this->widget('zii.widgets.grid.CGridView', array(
                    'id'=>'perusahaan-grid',
                    "itemsCssClass" => 'table',
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