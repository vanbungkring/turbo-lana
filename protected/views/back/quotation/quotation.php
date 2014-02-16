
<?php
/* @var $this QuotationController */

$this->breadcrumbs=array(
	'Quotation',
	);
	?>
	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header">Daftar Pemilik Banner</h1>
		</div>
		<!-- /.col-lg-12 -->
	</div>
	<div class="row">
			<div class="panel panel-default">
				<div class="panel-heading">
					Banner Quotation
						<div class="floating-bar">
					<a class="btn btn-primary" href="<?php echo Yii::app()->createUrl('kategoriBanner/create'); ?>">Tambah</a>
				</div>
				</div>
				<!-- /.panel-heading -->
<!-- 				<span class="label label-default">Default</span>
<span class="label label-primary">Primary</span>
<span class="label label-success">Success</span>
<span class="label label-info">Info</span>
<span class="label label-warning">Warning</span>
<span class="label label-danger">Danger</span> -->
				<div class="panel-body">
					<div class="table-responsive">
						<table class="table table-striped table-bordered table-hover">
							<thead>
								<tr>
									<th>NO</th>
									<th>Status</th>
									<th>Sender</th>
									<th>Title</th>
									<th>Created At</th>
									<th>Due Date</th>
									<th>Banner Id</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td>1</td>
									<td> <span class="label label-danger">Has not responded</span> </td>
									<td>Mark</td>
									<td>Banner Quotation Price</td>
									<td>02/16/2014</td>
									<td>@02/16/2014</td>
									<td><a href="#">Some banner Id</a></td>
									<td>@mdo</td>
								</tr>
								<tr>
									<td>2</td>
									<td><span class="label label-success">Success Replied</span></td>
									<td>Jacob</td>
									<td>Banner Quotation Price</td>
									<td>02/16/2014</td>
									<td>@02/16/2014</td>
									<td><a href="#">Some banner Id</a></td>
									<td>@mdo</td>
								</tr>
								<tr>
									<td>3</td>
									<td><span class="label label-info">Draft</span></td>
									<td>Larry</td>
									<td>Banner Quotation Price</td>
									<td>02/16/2014</td>
									<td>@02/16/2014</td>
									<td><a href="#">Some banner Id</a></td>
									<td>@mdo</td>
								</tr>
							</tbody>
						</table>
					</div>
					<!-- /.table-responsive -->
				</div>
				<!-- /.panel-body -->
			</div>
			<!-- /.panel -->
	</div>