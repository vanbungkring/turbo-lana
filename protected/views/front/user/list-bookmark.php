 <div class="row">
  <div class="padded-top">
    <div class="panel panel-main">
      <div class="panel-heading">
        <h5>BOOKMARKS ANDA</h5>
    </div>
    <div class="panel-body">
        <div class="list-group">
          <div class="list-group-item">
            <span class="pull-right text-muted small"><em>2 hari yang lalu</em></span>
            <h5>Billboard 1</h5>
            <p>Jakarta, Jl. Jendral Gatot Subroto</p>
            <a href="#" class="btn btn-success">Lihat Detail</a>
             <a href="#" class="btn btn-danger">Delete</a>
        </div>
        <div class="list-group-item">
            <span class="pull-right text-muted small"><em>3 hari yang lalu</em></span>
            <h5>Billboard 4</h5>
            <p>Jakarta, Jl. Jendral Gatot Subroto</p>
            <a href="#" class="btn btn-success">Lihat Detail</a>
            <a href="#" class="btn btn-danger">Delete</a>
        </div>
        <div class="list-group-item">
            <span class="pull-right text-muted small"><em>12 hari yang lalu</em></span>
            <h5>Billboard 20</h5>
            <p>Jakarta, Jl. Jendral Gatot Subroto Coba Panjangin Lagi</p>
            <a href="#" class="btn btn-success">Lihat Detail</a>
            <a href="#" class="btn btn-danger">Delete</a>
        </div>
    </div>
</div>
</div>
<!-- end panel -->
</div>
</div>

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
            <!-- end row -->