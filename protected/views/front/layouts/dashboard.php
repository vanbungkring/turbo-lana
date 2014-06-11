<!DOCTYPE html>
<html>

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title>Kiviads Dashboard</title>

  <!-- Core CSS - Include with every page -->
  <link href="<?php echo Yii::app()->request->baseUrl; ?>/assets-dashboard/css/bootstrap.min.css" rel="stylesheet">
  <link href="<?php echo Yii::app()->request->baseUrl; ?>/assets-dashboard/font-awesome/css/font-awesome.css" rel="stylesheet">
  <link href="<?php echo Yii::app()->request->baseUrl; ?>/css/css/jquery.ui.css" rel="stylesheet">
  <link rel="stylesheet" href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css">

  <!-- Page-Level Plugin CSS - Blank -->

  <!-- SB Admin CSS - Include with every page -->
  <link href="<?php echo Yii::app()->request->baseUrl; ?>/assets-dashboard/css/sb-admin.css" rel="stylesheet">

</head>

<body>

  <div id="wrapper">

    <nav class="navbar navbar-default navbar-fixed-top" role="navigation" style="margin-bottom: 0">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="<?= Yii::app()->getBaseUrl() ?>/"><img src="<?= Yii::app()->getBaseUrl(true) ?>/images/logo.png" alt="Kiviads"></a>
      </div>
      <!-- /.navbar-header -->
      <ul class="nav navbar-top-links navbar-right" style="margin-top:10px;">
        <li>
          <p> Hi, <?php echo $this->memberModel->namaDepan; ?>!</p>
        </li>
<!--         <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">
            <i class="fa fa-envelope fa-fw"></i>
            <i class="fa fa-caret-down"></i>
          </a>
        <ul class="dropdown-menu dropdown-messages">
            <?php 
              //$notifikasis = $this->memberModel->getRecentNotifikasi();
              //foreach ($notifikasis as $key => $value): 
                //$this->renderPartial('/shared/partial/dashboard-notifikasi');
              //endforeach ?>
            <li>
              <a class="text-center" href="#">
                <strong>Read All Messages</strong>
                <i class="fa fa-angle-right"></i>
              </a>
            </li>
          </ul>
        </li> -->
        <li>
          <div>
            <a href="<?php echo Yii::app()->createUrl('site/Logout'); ?>">
              <div class="btn btn-outline btn-danger btn-sm"><i class="fa fa-sign-out fa-fw"></i> LOG OUT</div>
            </a>
          </div>
        </li>

      </ul>
      <!-- /.navbar-top-links -->

      <div class="navbar-default navbar-static-side" role="navigation">
        <div class="sidebar-collapse">
          <ul class="nav" id="side-menu">
            <li>
              <a href="<?php echo Yii::app()->createUrl('/user/dashboard'); ?>"><i class="fa fa-home fa-fw"></i> Dashboard<span class="fa <?php echo $this->activeType == FrontEndController::TYPE_DASBOARD ? 'fa-circle' : 'fa-circle-o'  ?> flright"></span></a>
            </li>
            <li>
              <a href="<?php echo Yii::app()->createUrl('/user/profile'); ?>"><i class="fa fa-user fa-fw"></i> Profile<span class="fa <?php echo $this->activeType == FrontEndController::TYPE_PROFILE ? 'fa-circle' : 'fa-circle-o'  ?> flright"></span></a>
            </li>
            <li>
              <a href="<?php echo Yii::app()->createUrl('/user/myBookmark'); ?>"><i class="fa fa-flag fa-fw"></i> Bookmarks<span class="fa <?php echo $this->activeType == FrontEndController::TYPE_BOOKMARK ? 'fa-circle' : 'fa-circle-o'  ?> flright"></span></a>
            </li>
            <li>
              <a href="<?php echo Yii::app()->createUrl('/user/history'); ?>"><i class="fa fa-clock-o fa-fw"></i> History<span class="fa <?php echo $this->activeType == FrontEndController::TYPE_HISTORY ? 'fa-circle' : 'fa-circle-o'  ?> flright"></span></a>
            </li>
            <li>
              <a href="<?php echo Yii::app()->createUrl('/quote3'); ?>"><i class="fa fa-book fa-fw"></i> Quotes<span class="fa <?php echo $this->activeType == FrontEndController::TYPE_QUOTES ? 'fa-circle' : 'fa-circle-o'  ?> flright"></span></a>
            </li>
            <li>
              <a href="<?php echo Yii::app()->createUrl('/quote3/campaign'); ?>"><i class="fa fa-calendar fa-fw"></i> Campaign<span class="fa <?php echo $this->activeType == FrontEndController::TYPE_CAMPAIGN ? 'fa-circle' : 'fa-circle-o'  ?> flright"></span></a>
            </li>
          </ul>
          <!-- /#side-menu -->
        </div>
        <!-- /.sidebar-collapse -->
      </div>
      <!-- /.navbar-static-side -->
    </nav>

    <div id="page-wrapper">
      <?php echo $content; ?>
      <!-- /. row -->
    </div>
    <!-- /#page-wrapper -->

  </div>
  <!-- /#wrapper -->

  <!-- Core Scripts - Include with every page -->
  <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDs1qmbiT6eTk-57wbzQ3Ivk8TRx02lXm4&sensor=true&libraries=places"></script>
    
  <script src="<?php echo Yii::app()->request->baseUrl; ?>/assets-dashboard/js/jquery-1.10.2.js"></script>
   <script src="http://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
  <script src="<?php echo Yii::app()->request->baseUrl; ?>/assets-dashboard/js/bootstrap.min.js"></script>
  <script src="<?php echo Yii::app()->request->baseUrl; ?>/assets-dashboard/js/plugins/metisMenu/jquery.metisMenu.js"></script>

  <!-- Page-Level Plugin Scripts - Blank -->

  <!-- SB Admin Scripts - Include with every page -->
  <script src="<?php echo Yii::app()->request->baseUrl; ?>/assets-dashboard/js/sb-admin.js"></script>

  <!-- Page-Level Demo Scripts - Blank - Use for reference -->

</body>

</html>