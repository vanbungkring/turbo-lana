<div class="row">
              <div class="padded-top">
                <div class="col-md-3 col-lg-3">
                  <div class="well well-blue">
                    <div class="text-center">
                      <a href="profile.html">
                        <h1><i class="fa fa-user fa-fw"></i></h1>
                        <h4>My Profile</h4>
                      </a>
                    </div>
                  </div>
                </div>
                <!-- End col well -->
                <div class="col-md-3 col-lg-3">
                  <div class="well well-blue-dark">
                    <div class="text-center">
                      <a href="bookmarks.html">
                        <h1><i class="fa fa-flag fa-fw"></i></h1>
                        <h4>My Bookmarks</h4>
                      </a>
                    </div>
                  </div>
                </div>
                <!-- End of well -->
                <div class="col-md-6 col-lg-6">
                  <div class="well well-orange well-sm">
                    <div class="row">
                      <div class="col-md-5 col-lg-5">
                        <div class="text-center">
                          <a href="request-proposal.html">
                            <h1><i class="fa fa-caret-square-o-down fa-fw"></i></h1>
                            <h4>RFP - Request For Proposal</h4>
                          </a>
                        </div>
                      </div>
                      <div class="col-md-7 col-lg-7">
                        <p>Bingung memilih media? Klik RFP ini dan biarkan kami membantu. Beri tahu apa yang anda butuhkan, dan kami akan kembali dengan proposal untuk campaign anda! Ini adalah cara paling cepat untuk mendapatkan informasi dari kami. </p>
                      </div>
                    </div>
                  </div>
                  <!-- end nesting row -->
                </div>
                <!-- End of well -->
              </div>
              <!-- padded end -->
            </div>
            <!-- /.row -->
            <div class="row">
              <div class="col-lg-7">
                <div class="well well-red">
                  <div class="row">
                    <div class="col-lg-6" id="calendar-red">
                        <h4>Buat Quotes</h4>
                        <p>Dapatkan quotes dari titik yang anda inginkan. Cari titik untuk iklan anda sekarang!</p>
                      <div class="input-group custom-search-form">
                        <input type="text" class="form-control" placeholder="Masukkan lokasi...">
                        <span class="input-group-btn">
                          <button class="btn btn-default"><i class="fa fa-search"></i></button>
                        </span>
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="text-center">
                        <a href="campaign.html">
                          <h1><i class="fa fa-calendar fa-fw"></i></h1>
                          <h4>My Campaign</h4>
                        </a>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- end of well -->
              </div>
						
              <div class="col-lg-5">
                <div class="panel panel-main">
                  <div class="panel-heading">
                    <h4><i class="fa fa-clock-o fa-fw"></i> History : Latest Activities</h4>
                  </div>
                  <div class-"panel-body">
                    <div class="list-group">
                       <?php foreach($logByDate as $date=>$logs): ?>
	                      <div class="list-group-item">
	                        <h5>09/09/14</h5>
	                      </div>
                      	<?php foreach ($logs as $log): ?>
	                      <div class="list-group-item">
	                        <span><?php echo $log->getText(); ?> </span>
	                      </div>
                  	  	<?php endforeach; ?>
                      <?php endforeach; ?>
                    </div>
                  </div>
                </div>
                <!-- end of panel -->
              </div>
            </div>