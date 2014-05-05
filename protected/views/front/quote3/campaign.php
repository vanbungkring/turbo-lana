
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
                            <li class="campnumber"><?php echo count($quotes)?></li>
                            <li class="campdesc">
                              <a href="#">
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
                            <li class="campnumber">2</li>
                            <li class="campdesc">
                              <a href="#">
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
                              <td><a href="<?php echo $this->createUrl('viewCampaign',array('id'=>$value->id)); ?>" class="btn btn-outline btn-primary btn-xs">Lihat Detil</a>
                                  <a href="#" class="btn btn-outline btn-danger btn-xs">Archieved</a>
                              </td>
                              <td> Pending
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
      