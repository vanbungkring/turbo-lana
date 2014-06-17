<!DOCTYPE html>
<html>

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title>Kiviads Backend</title>

  <!-- Core CSS - Include with every page -->
  <link href="http://netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css" rel="stylesheet">
  <link href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css" rel="stylesheet">
  <!-- Page-Level Plugin CSS - Dashboard -->
  <link href="<?php echo Yii::app()->request->baseUrl; ?>/css/back/plugins/morris/morris-0.4.3.min.css" rel="stylesheet">
  <link href="<?php echo Yii::app()->request->baseUrl; ?>/css/back/plugins/timeline/timeline.css" rel="stylesheet">

  <!-- SB Admin CSS - Include with every page -->
  <link href="<?php echo Yii::app()->request->baseUrl; ?>/css/back/sb-admin.css" rel="stylesheet">
</head>

<body>
  <nav class="navbar navbar-default navbar-fixed-top" role="navigation" style="margin-bottom: 0">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="index.html">SB Admin v2.0</a>
    </div>
    <!-- /.navbar-header -->

    <ul class="nav navbar-top-links navbar-right">
      <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
          <i class="fa fa-envelope fa-fw"></i>  <i class="fa fa-caret-down"></i>
        </a>
        <ul class="dropdown-menu dropdown-messages">
          <li>
            <a href="#">
              <div>
                <strong>John Smith</strong>
                <span class="pull-right text-muted">
                  <em>Yesterday</em>
                </span>
              </div>
              <div>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eleifend...</div>
            </a>
          </li>
          <li class="divider"></li>
          <li>
            <a href="#">
              <div>
                <strong>John Smith</strong>
                <span class="pull-right text-muted">
                  <em>Yesterday</em>
                </span>
              </div>
              <div>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eleifend...</div>
            </a>
          </li>
          <li class="divider"></li>
          <li>
            <a href="#">
              <div>
                <strong>John Smith</strong>
                <span class="pull-right text-muted">
                  <em>Yesterday</em>
                </span>
              </div>
              <div>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eleifend...</div>
            </a>
          </li>
          <li class="divider"></li>
          <li>
            <a class="text-center" href="#">
              <strong>Read All Messages</strong>
              <i class="fa fa-angle-right"></i>
            </a>
          </li>
        </ul>
        <!-- /.dropdown-messages -->
      </li>
      <!-- /.dropdown -->
      <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
          <i class="fa fa-tasks fa-fw"></i>  <i class="fa fa-caret-down"></i>
        </a>
        <ul class="dropdown-menu dropdown-tasks">
          <li>
            <a href="#">
              <div>
                <p>
                  <strong>Task 1</strong>
                  <span class="pull-right text-muted">40% Complete</span>
                </p>
                <div class="progress progress-striped active">
                  <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
                    <span class="sr-only">40% Complete (success)</span>
                  </div>
                </div>
              </div>
            </a>
          </li>
          <li class="divider"></li>
          <li>
            <a href="#">
              <div>
                <p>
                  <strong>Task 2</strong>
                  <span class="pull-right text-muted">20% Complete</span>
                </p>
                <div class="progress progress-striped active">
                  <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 20%">
                    <span class="sr-only">20% Complete</span>
                  </div>
                </div>
              </div>
            </a>
          </li>
          <li class="divider"></li>
          <li>
            <a href="#">
              <div>
                <p>
                  <strong>Task 3</strong>
                  <span class="pull-right text-muted">60% Complete</span>
                </p>
                <div class="progress progress-striped active">
                  <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%">
                    <span class="sr-only">60% Complete (warning)</span>
                  </div>
                </div>
              </div>
            </a>
          </li>
          <li class="divider"></li>
          <li>
            <a href="#">
              <div>
                <p>
                  <strong>Task 4</strong>
                  <span class="pull-right text-muted">80% Complete</span>
                </p>
                <div class="progress progress-striped active">
                  <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%">
                    <span class="sr-only">80% Complete (danger)</span>
                  </div>
                </div>
              </div>
            </a>
          </li>
          <li class="divider"></li>
          <li>
            <a class="text-center" href="#">
              <strong>See All Tasks</strong>
              <i class="fa fa-angle-right"></i>
            </a>
          </li>
        </ul>
        <!-- /.dropdown-tasks -->
      </li>
      <!-- /.dropdown -->
      <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
          <i class="fa fa-bell fa-fw"></i>  <i class="fa fa-caret-down"></i>
        </a>
        <ul class="dropdown-menu dropdown-alerts">
          <li>
            <a href="#">
              <div>
                <i class="fa fa-comment fa-fw"></i> New Comment
                <span class="pull-right text-muted small">4 minutes ago</span>
              </div>
            </a>
          </li>
          <li class="divider"></li>
          <li>
            <a href="#">
              <div>
                <i class="fa fa-twitter fa-fw"></i> 3 New Followers
                <span class="pull-right text-muted small">12 minutes ago</span>
              </div>
            </a>
          </li>
          <li class="divider"></li>
          <li>
            <a href="#">
              <div>
                <i class="fa fa-envelope fa-fw"></i> Message Sent
                <span class="pull-right text-muted small">4 minutes ago</span>
              </div>
            </a>
          </li>
          <li class="divider"></li>
          <li>
            <a href="#">
              <div>
                <i class="fa fa-tasks fa-fw"></i> New Task
                <span class="pull-right text-muted small">4 minutes ago</span>
              </div>
            </a>
          </li>
          <li class="divider"></li>
          <li>
            <a href="#">
              <div>
                <i class="fa fa-upload fa-fw"></i> Server Rebooted
                <span class="pull-right text-muted small">4 minutes ago</span>
              </div>
            </a>
          </li>
          <li class="divider"></li>
          <li>
            <a class="text-center" href="#">
              <strong>See All Alerts</strong>
              <i class="fa fa-angle-right"></i>
            </a>
          </li>
        </ul>
        <!-- /.dropdown-alerts -->
      </li>
      <!-- /.dropdown -->
      <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
          <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
        </a>
        <ul class="dropdown-menu dropdown-user">
          <li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
          </li>
          <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
          </li>
          <li class="divider"></li>
          <li><a href="login.html"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
          </li>
        </ul>
        <!-- /.dropdown-user -->
      </li>
      <!-- /.dropdown -->
    </ul>
    <!-- /.navbar-top-links -->

  </nav>
  <!-- /.navbar-static-top -->
  <div id="wrapper">
    <nav class="navbar-default navbar-static-side" role="navigation">
      <div class="sidebar-collapse">
        <ul class="nav" id="side-menu">

          <li>
            <a href="<?php echo Yii::app()->createUrl('/')?>"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
          </li>
          <li>
            <a href="#"><i class="fa fa-flash fa-fw"></i> Billboard Management<span class="fa arrow"></span></a>
            <ul class="nav nav-second-level">
              <li>
                <a href="<?php echo Yii::app()->createUrl('/perusahaan')?>"><i class="fa fa-user fa-fw"></i> Billboard Owner</a>
              </li>
              <li>
                <a href="<?php echo Yii::app()->createUrl('/banner')?>"><i class="fa fa-align-justify fa-fw"></i> Billboard Inventory</a>
              </li>
              <li>
                <a href="<?php echo Yii::app()->createUrl('/kategoriBanner')?>"><i class="fa fa-bookmark fa-fw"></i> Billboard Category</a>
              </li>
              <li>
                <a href="<?php echo Yii::app()->createUrl('/kategoriSize')?>"><i class="fa fa-arrows-v fa-fw"></i>Billboard Size Category</a>
              </li>
            </ul>
            <!-- /.nav-second-level -->
          </li>

          <li>
            <a href="#"><i class="fa fa-thumb-tack fa-fw"></i> Campaign Management<span class="fa arrow"></span></a>
            <ul class="nav nav-second-level">
              <li>
                <a href="<?php echo Yii::app()->createUrl('/quote3')?>"><i class="fa fa-table fa-fw"></i> Quotation 3</a>
              </li>
               <li>
                <a href="<?php echo Yii::app()->createUrl('/quote3/Campaign')?>"><i class="fa fa-table fa-fw"></i> Campaign</a>
              </li>
              <li>
                <a href="<?php echo Yii::app()->createUrl('/po')?>"><i class="fa fa-table fa-fw"></i>PO</a>
              </li>
              <li>
                <a href="<?php echo Yii::app()->createUrl('/PurchaseBillboard')?>"><i class="fa fa-table fa-fw"></i> Purchase Billboard</a>
              </li>
              <li>
                <a href="<?php echo Yii::app()->createUrl('/DeliveriOrder')?>"><i class="fa fa-table fa-fw"></i> Delivery Order</a>
              </li>
            </ul>
            <!-- /.nav-second-level -->
          </li>

          <li>
            <a href="#"><i class="fa fa-money fa-fw"></i> General Ledger<span class="fa arrow"></span></a>
            <ul class="nav nav-second-level">
             <li>
              <a href="<?php echo Yii::app()->createUrl('/invoice')?>"><i class="fa fa-table fa-fw"></i> Invoice</a>
            </li>
            <li>
              <a href="<?php echo Yii::app()->createUrl('/payment')?>"><i class="fa fa-table fa-fw"></i> Payment</a>
            </li>
          </ul>
          <!-- /.nav-second-level -->
        </li>

        <li>
          <a href="<?php echo Yii::app()->createUrl('/member')?>"><i class="fa fa-users fa-fw"></i> Member</a>
        </li>

        <li>
          <a href="<?php echo Yii::app()->createUrl('/setting')?>"><i class="fa fa-cogs fa-fw"></i> Setting</a>
        </li>
      </ul>
      <!-- /#side-menu -->
    </div>
    <!-- /.sidebar-collapse -->
  </nav>
  <!-- /.navbar-static-side -->

  <div id="page-wrapper">
   <?php echo $content; ?>
 </div>
 <!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->
<?php Yii::app()->getClientScript()->registerCoreScript('jquery'); ?>
<!-- Core Scripts - Include with every page -->
<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/back/bootstrap.min.js"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/back/plugins/metisMenu/jquery.metisMenu.js"></script>

<!-- Page-Level Plugin Scripts - Dashboard -->
<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/back/plugins/morris/raphael-2.1.0.min.js"></script>

<!-- SB Admin Scripts - Include with every page -->
<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/back/sb-admin.js"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/back/plugins/ckeditor/ckeditor.js"></script>

<!-- Page-Level Demo Scripts - Dashboard - Use for reference -->

</body>

</html>