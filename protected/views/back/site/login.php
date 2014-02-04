<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Start Bootstrap - SB Admin Version 2.0 Demo</title>

    <!-- Core CSS - Include with every page -->
    <link href="<?php echo Yii::app()->request->baseUrl; ?>/css/back/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo Yii::app()->request->baseUrl; ?>/css/back/font-awesome/css/font-awesome.css" rel="stylesheet">

    <!-- SB Admin CSS - Include with every page -->
    <link href="<?php echo Yii::app()->request->baseUrl; ?>/css/back/sb-admin.css" rel="stylesheet">

</head>

<body>

    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Please Sign In</h3>
                    </div>
                    <div class="panel-body">
                        <?php $form=$this->beginWidget('CActiveForm', array(
                                'id'=>'login-form',
                                'enableClientValidation'=>true,
                                'clientOptions'=>array(
                                        'validateOnSubmit'=>true,
                                ),
                        )); ?>
                            <fieldset>
                                <div class="form-group">
                                    <?php echo $form->textField($model,'username',array('class'=>'form-control','autofocus'=>'autofocus','placeholder'=>'Username')); ?>
                                </div>
                                <div class="form-group">
                                    <?php echo $form->passwordField($model,'password',array('class'=>'form-control','placeholder'=>'Password')); ?>
                                </div>
                                <!--  <div class="checkbox">
                                    <label>
                                        <input name="remember" type="checkbox" value="Remember Me">Remember Me
                                    </label>
                                </div>-->
                                <!-- Change this to a button or input when using this as a form -->
                                <input type="submit" class="btn btn-lg btn-success btn-block" value="Login"/>
                            </fieldset>
                        <?php $this->endWidget(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Core Scripts - Include with every page -->
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/back/jquery-1.10.2.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/back/bootstrap.min.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/back/plugins/metisMenu/jquery.metisMenu.js"></script>

    <!-- SB Admin Scripts - Include with every page -->
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/back/sb-admin.js"></script>

</body>

</html>
