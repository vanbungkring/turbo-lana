  <?php $this->renderPartial('/shared/partial/navbar-fluid-dashboard'); ?>
      <div class="container kivi">

<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Daftar Banner</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-body">
                <a href="<?php echo Yii::app()->createUrl('/rfp/index',array('idBanner'=>$listData)); ?>" >Create Quote</a>
                <?php $this->widget('zii.widgets.grid.CGridView', array(
                        'id'=>'banner-grid',
                        "itemsCssClass" => 'table',
                        'dataProvider'=>$dataProvider,
    //                        'filter'=>$model,
                        'cssFile'=>false,
                        'columns'=>array(
                            array(
                                'name'=>'banner.nama',
                                'value'=>'CHtml::link($data->banner->nama,array("/site/detail","id"=>$data->id))',
                                'type'=>'raw'
                            ),
                            'banner.lokasi',
                            array(
                                'class'=>'CButtonColumn',
                                'template'=>'{delete}'
                            ),
                        ),
                )); ?>
            </div>
        </div>
    </div>
</div>
</div>