<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo CHtml::encode($this->pageTitle); ?></title>

  <!-- Bootstrap core CSS -->
  <link href="http://netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css" rel="stylesheet">
  <link href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css" rel="stylesheet">
  <link href="<?php echo Yii::app()->request->baseUrl; ?>/css/css/jquery.ui.css" rel="stylesheet">
  <link rel="stylesheet" href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css">
  <link rel="stylesheet" href="http://cdn.jsdelivr.net/fullcalendar/1.6.4/fullcalendar.css">
  <link rel="stylesheet" href="http://cdn.jsdelivr.net/fullcalendar/1.6.4/fullcalendar.print.css">
  

  <!-- Custom styles for this template -->
  <link href="<?php echo Yii::app()->request->baseUrl; ?>/css/css/netra.css" rel="stylesheet">

  <!-- Just for debugging purposes. Don't actually copy this line! -->
  <!--[if lt IE 9]><script src="../../docs-assets/js/ie8-responsive-file-warning.js"></script><![endif]-->

  <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
      <![endif]-->
    </head>
    <!-- Fixed navbar -->
    <?php echo $content; ?>
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <?php $this->renderPartial('/shared/analytics/ga'); ?>
    <?php Yii::app()->getClientScript()->registerCoreScript('jquery'); ?>
    <script src="http://code.jquery.com/ui/1.10.4/jquery-ui.min.js"></script>
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDs1qmbiT6eTk-57wbzQ3Ivk8TRx02lXm4&sensor=true&libraries=places"></script>
    <script src="http://netdna.bootstrapcdn.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>
    <script src="http://cdn.jsdelivr.net/fullcalendar/1.6.4/fullcalendar.js"></script>
    <script src="http://cdn.jsdelivr.net/fullcalendar/1.6.4/fullcalendar.min.js"></script>
    <script src="http://cdn.jsdelivr.net/fullcalendar/1.6.4/gcal.js"></script>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery.lazyload/1.9.1/jquery.lazyload.min.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/bxslider-ck.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/sscroll.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/js.free.transform-ck.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/matrix-ck.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/netra-ck.js"></script>
  </body>
  </html>
