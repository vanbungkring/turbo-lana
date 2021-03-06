
            <div class="row">
              <div class="padded-top">
                <div class="panel panel-main">
                  <div class="panel-heading">
                    <h5>CAMPAIGN IKLAN ANDA</h5>
                  </div>
                  <div class="panel-body" id="searchcampaign">
                    <div class="row">
                      <div class="col-xs-6 col-md-3 padded-top">
                        <div id="actcamp">
                          <ul class="campsum">
                            <li class="campnumber"><?php echo $countQuoteActive; ?></li>
                            <li class="campdesc">
                              <a href="<?php echo Yii::app()->createUrl('/quote3/campaign') ?>">
                                <i class="fa fa-caret-square-o-down"></i> Active Campaign
                              </a>
                            </li>
                          </ul>
                        </div>
                      </div>
                      <!-- end -->
                      <div class="col-xs-6 col-md-3 padded-top">
                        <div id="archcamp">
                          <ul class="campsum">
                            <li class="campnumber"><?php echo $countQuoteArchieve; ?></li>
                            <li class="campdesc">
                              <a href="<?php echo Yii::app()->createUrl('/quote3/campaign',array('archieve'=>true)) ?>">
                                <i class="fa fa-caret-square-o-down"></i> Archieve Campaign
                              </a>
                            </li>
                          </ul>
                        </div>
                      </div>
                      <!-- end -->
                    </div>
                    <div class="row">
                      <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                          <thead>
                            <tr>
                              <th>No</th>
                              <th>Judul Campaign</th>
                              <th>Inventory</th>
                              <th>Update Terakhir</th>
                              <th>Dibuat</th>
                              <th>Atur</th>
                              <th>status</th>
                            </tr>
                          </thead>
                          <tbody>
                             <?php $i=1;
                              foreach ($quotes as $key => $value): ?>
                            <tr>
                               <td><?php echo $i++; ?></td>
                                <td><?php echo $value->name ?></td>
                                <td><?php echo $value->totalInventori ?></td>
                                <td>-</td>
                                <td>-</td>
                              <td>
                                <?php if ($value->status == Quote3::STATUS_STOP): ?>
                                    <a href="<?php echo $this->createUrl('viewCampaign',array('id'=>$value->id)); ?>" class="btn btn-outline btn-danger btn-xs">Archieved</a>  
                                <?php else: ?>  
                                  <a href="<?php echo $this->createUrl('viewCampaign',array('id'=>$value->id)); ?>" class="btn btn-outline btn-primary btn-xs">Lihat Detil</a>
                                <?php endif ?>
                              </td>
                              <td> <?php echo $value->getTextStatus(); ?>
                              </td>
                            </tr>
                            <?php endforeach ?>
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- end panel -->
              </div>
            </div>
      