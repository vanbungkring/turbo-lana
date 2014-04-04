
<?php $this->renderPartial('/shared/partial/navbar-home'); ?>
<?php $this->renderPartial('/shared/partial/homepage/header-wrap'); ?>
<!-- INTRO WRAP -->
<div class="intro">
	<div class="container">
		<div class="col-md-5">
			<h3>Mencari, membeli dan mengatur Campaign iklan Anda hanya dalam Beberapa klik saja.</h3>
		</div>
	</div>
</div><!--/ #introwrap -->

<!-- FEATURES WRAP -->
<div id="features">
	<div class="container">
		<div class="row">
			<h1 class="centered">What's New?</h1>
			<div class="col-lg-6 centered">
				<img class="centered" src="http://www.blacktie.co/demo/pratt/assets/img/mobile.png" alt="">
			</div>

			<div class="col-lg-6">
				<h3>Some Features</h3>
				<br>
				<!-- ACCORDION -->
				<div class="accordion ac" id="accordion2">
					<div class="accordion-group">
						<div class="accordion-heading">
							<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseOne">
								First Class Design
							</a>
						</div><!-- /accordion-heading -->
						<div id="collapseOne" class="accordion-body collapse in">
							<div class="accordion-inner">
								<p>It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
							</div><!-- /accordion-inner -->
						</div><!-- /collapse -->
					</div><!-- /accordion-group -->
					<br>

					<div class="accordion-group">
						<div class="accordion-heading">
							<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseTwo">
								Retina Ready Theme
							</a>
						</div>
						<div id="collapseTwo" class="accordion-body collapse">
							<div class="accordion-inner">
								<p>It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
							</div><!-- /accordion-inner -->
						</div><!-- /collapse -->
					</div><!-- /accordion-group -->
					<br>

					<div class="accordion-group">
						<div class="accordion-heading">
							<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseThree">
								Awesome Support
							</a>
						</div>
						<div id="collapseThree" class="accordion-body collapse">
							<div class="accordion-inner">
								<p>It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
							</div><!-- /accordion-inner -->
						</div><!-- /collapse -->
					</div><!-- /accordion-group -->
					<br>

					<div class="accordion-group">
						<div class="accordion-heading">
							<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseFour">
								Responsive Design
							</a>
						</div>
						<div id="collapseFour" class="accordion-body collapse">
							<div class="accordion-inner">
								<p>It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
							</div><!-- /accordion-inner -->
						</div><!-- /collapse -->
					</div><!-- /accordion-group -->
					<br>			
				</div><!-- Accordion -->
			</div>
		</div>
	</div><!--/ .container -->
</div><!--/ #features -->


<section id="showcase" name="showcase"></section>
<div id="showcase">
	<div class="container">
		<div class="row">
			<h1 class="centered">Some Screenshots</h1>
			<br>
			<div class="col-lg-8 col-lg-offset-2">
				<div id="carousel-example-generic" class="carousel slide">
					<!-- Indicators -->
					<ol class="carousel-indicators">
						<li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
						<li data-target="#carousel-example-generic" data-slide-to="1"></li>
					</ol>

					<!-- Wrapper for slides -->
					<div class="carousel-inner">
						<div class="item active">
							<img src="http://www.blacktie.co/demo/pratt/assets/img/item-01.png" alt="">
						</div>
						<div class="item">
							<img src="http://www.blacktie.co/demo/pratt/assets/img/item-02.png" alt="">
						</div>
					</div>
				</div>
			</div>
		</div>
		<br>
		<br>
		<br>	
	</div><!-- /container -->
</div>	


<section id="contact" name="contact"></section>
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

<div class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-body">
				<form class="form-signin" role="form">
					<h2 class="form-signin-heading">Please sign in</h2>
					<div class="form-group">
						<input type="email" class="form-control" placeholder="Email address" required="" autofocus="">
					</div>
					<div class="form-group">
						<input type="password" class="form-control" placeholder="Password" required="">
					</div>
					<label class="checkbox">
						<input type="checkbox" value="remember-me"> Remember me
					</label>
					<button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
				</form>
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="register" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-body">
				<?php $form=$this->beginWidget('CActiveForm', array(
					'id'=>'form-signin',
					'enableAjaxValidation'=>true,
					'enableClientValidation'=>true,
					)); ?>
					<h2 class="form-signin-heading">Who are you?</h2>

					<div class="form-group">
						<?php echo $form->textField($register,'namaDepan',array('class'=>'form-control','placeholder'=>'First Name','required'=>'required')); ?>
						<?php echo $form->error($register,'namaDepan'); ?>
					</div>

					<div class="form-group">
						<?php echo $form->textField($register,'namaBelakang',array('class'=>'form-control','placeholder'=>'Last Name','required'=>'required')); ?>
						<?php echo $form->error($register,'namaBelakang'); ?>
					</div>

					<div class="form-group">
						<?php echo $form->emailField($register,'email',array('class'=>'form-control','placeholder'=>'Your email Address','required'=>'required')); ?>
						<?php echo $form->error($register,'email'); ?>
					</div>

					<div class="form-group">
						<?php echo $form->textField($register,'nomerTelpon',array('class'=>'form-control','placeholder'=>'Phone Number','required'=>'required')); ?>
						<?php echo $form->error($register,'nomerTelpon'); ?>
					</div>

					<div class="form-group">
						<?php echo $form->textField($register,'namaPerusahaan',array('class'=>'form-control','placeholder'=>'Company Name','required'=>'required')); ?>
						<?php echo $form->error($register,'namaPerusahaan'); ?>
					</div>

					<div class="form-group">
						<?php echo $form->passwordField($register,'passwordRegister1',array('class'=>'form-control','placeholder'=>'Password','required'=>'required')); ?>
						<?php echo $form->error($register,'passwordRegister1'); ?>
					</div>

					<div class="form-group">
						<?php echo $form->passwordField($register,'passwordRegister2',array('class'=>'form-control','placeholder'=>'Password Again','required'=>'required')); ?>
						<?php echo $form->error($register,'passwordRegister2'); ?>
					</div>
					<label class="checkbox">
						<input type="checkbox" value="remember-me" required=""> By Checking this bla bla bla, you agree with our Terms of service
					</label>
					<button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
					<?php $this->endWidget(); ?>
				</div>
			</div>
		</div>
	</div>
	<?php


	Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl.'/js/jquery.geocomplete.js',  CClientScript::POS_END);
	Yii::app()->clientScript->registerScript('script-box','$("#boxcari").geocomplete().bind("geocode:result", function(event, result){
		$("#lat").val(result.geometry.location.lat());
		$("#long").val(result.geometry.location.lng());
 // map.setCenter(new google.maps.LatLng(result.geometry.location.lat(), result.geometry.location.lng()))
	});;',  CClientScript::POS_END);