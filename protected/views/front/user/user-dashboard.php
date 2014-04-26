    <?php $this->renderPartial('/shared/partial/navbar'); ?>

		<!-- FEATURES WRAP -->
		<div class="wrapper-container">
			<div class="container">
				<div class="row">

					<div class="col-lg-4">
						<?php foreach($logByDate as $date=>$logs): ?>

						<div class="panel panel-default">
							<div class="panel-heading">
								<i class="fa fa-bell fa-fw"></i> <?php echo $date ?>
							</div>
							<!-- /.panel-heading -->
							<div class="panel-body">
								<div class="list-group">
									<?php foreach ($logs as $log): ?>
										<span href="#" class="list-group-item">
											<i class="fa fa-comment fa-fw"></i> <?php echo $log->getText(); ?> 
										</span>
									<?php endforeach ?>
								</div>
								<!-- /.list-group -->
							</div>
							<!-- /.panel-body -->
						</div>

						<?php endforeach; ?>
						<!-- /.panel -->
					</div>

					<div class="col-lg-8">
						<div class="panel panel-default">
							<div class="panel-heading">
								<i class="fa fa-bell fa-fw"></i> Notifications Panel
							</div>
							<!-- /.panel-heading -->
							<div class="panel-body">
								<div class="list-group">
									<a href="#" class="list-group-item">
										<i class="fa fa-comment fa-fw"></i> New Comment
										<span class="pull-right text-muted small"><em>4 minutes ago</em>
										</span>
									</a>
									<a href="#" class="list-group-item">
										<i class="fa fa-twitter fa-fw"></i> 3 New Followers
										<span class="pull-right text-muted small"><em>12 minutes ago</em>
										</span>
									</a>
									<a href="#" class="list-group-item">
										<i class="fa fa-envelope fa-fw"></i> Message Sent
										<span class="pull-right text-muted small"><em>27 minutes ago</em>
										</span>
									</a>
									<a href="#" class="list-group-item">
										<i class="fa fa-tasks fa-fw"></i> New Task
										<span class="pull-right text-muted small"><em>43 minutes ago</em>
										</span>
									</a>
									<a href="#" class="list-group-item">
										<i class="fa fa-upload fa-fw"></i> Server Rebooted
										<span class="pull-right text-muted small"><em>11:32 AM</em>
										</span>
									</a>
									<a href="#" class="list-group-item">
										<i class="fa fa-bolt fa-fw"></i> Server Crashed!
										<span class="pull-right text-muted small"><em>11:13 AM</em>
										</span>
									</a>
									<a href="#" class="list-group-item">
										<i class="fa fa-warning fa-fw"></i> Server Not Responding
										<span class="pull-right text-muted small"><em>10:57 AM</em>
										</span>
									</a>
									<a href="#" class="list-group-item">
										<i class="fa fa-shopping-cart fa-fw"></i> New Order Placed
										<span class="pull-right text-muted small"><em>9:49 AM</em>
										</span>
									</a>
									<a href="#" class="list-group-item">
										<i class="fa fa-money fa-fw"></i> Payment Received
										<span class="pull-right text-muted small"><em>Yesterday</em>
										</span>
									</a>
								</div>
								<!-- /.list-group -->
								<a href="#" class="btn btn-default btn-block">View All Alerts</a>
							</div>
							<!-- /.panel-body -->
						</div>					
					</div>
				</div><!--/ .container -->
			</div><!--/ #features -->

			<div id="footerwrap">
				<div class="container">
					<div class="col-lg-5">
						<h3>Address</h3>
						<p>
							Av. Greenville 987,<br/>
							New York,<br/>
							90873<br/>
							United States
						</p>
					</div>

					<div class="col-lg-7">
						<h3>Drop Us A Line</h3>
						<br>
						<form role="form" action="#" method="post" enctype="plain"> 
							<div class="form-group">
								<label for="name1">Your Name</label>
								<input type="name" name="Name" class="form-control" id="name1" placeholder="Your Name">
							</div>
							<div class="form-group">
								<label for="email1">Email address</label>
								<input type="email" name="Mail" class="form-control" id="email1" placeholder="Enter email">
							</div>
							<div class="form-group">
								<label>Your Text</label>
								<textarea class="form-control" name="Message" rows="3"></textarea>
							</div>
							<br>
							<button type="submit" class="btn btn-large btn-success">SUBMIT</button>
						</form>
					</div>
				</div>
			</div>
			<div id="c">
				<div class="container">
					<p>Created by <a href="http://www.blacktie.co">BLACKTIE.CO</a></p>

				</div>
			</div>
