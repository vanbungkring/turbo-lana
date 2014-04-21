<?php

  $this->pageTitle=Yii::app()->name . ' - Login';
  $this->breadcrumbs=array('Login',);

?>
<div class="container big-login">
  <div class="row">
       <div class="col-md-6 col-md-offset-3">
        
        <h1 id="signin_logo" class="login-sprite sprout-logo hide-text">
          <a href="http://sproutsocial.com ">Sprout Social</a> 
        </h1>
       
       </div>
  </div>
</div>

      <?php
      /* @var $this SiteController */
      /* @var $model LoginForm */
      /* @var $form CActiveForm  */

      $this->pageTitle=Yii::app()->name . ' - Login';
      $this->breadcrumbs=array(
       'Login',
       );
       ?>
       <div class="container kivi">
        <div class="row">

         <h1>Login</h1>

         <p>Please fill out the following form with your login credentials:</p>

         <div class="form">
          <?php $form=$this->beginWidget('CActiveForm', array(
           'id'=>'login-form',
           'enableClientValidation'=>true,
           'clientOptions'=>array(
            'validateOnSubmit'=>true,
            ),
            )); ?>

            <p class="note">Fields with <span class="required">*</span> are required.</p>

            <div class="row">
             <?php echo $form->labelEx($model,'username'); ?>
             <?php echo $form->textField($model,'username'); ?>
             <?php echo $form->error($model,'username'); ?>
           </div>

           <div class="row">
             <?php echo $form->labelEx($model,'password'); ?>
             <?php echo $form->passwordField($model,'password'); ?>
             <?php echo $form->error($model,'password'); ?>
             <p class="hint">
              Hint: You may login with <kbd>demo</kbd>/<kbd>demo</kbd> or <kbd>admin</kbd>/<kbd>admin</kbd>.
            </p>
          </div>

          <div class="row rememberMe">
           <?php echo $form->checkBox($model,'rememberMe'); ?>
           <?php echo $form->label($model,'rememberMe'); ?>
           <?php echo $form->error($model,'rememberMe'); ?>
         </div>

         <div class="row buttons">
           <?php echo CHtml::submitButton('Login'); ?>

         </div>

         <?php $this->endWidget(); ?>
       </div><!-- form -->
     </div>
   </div>

   <?php $this->widget('ext.hoauth.widgets.HOAuth'); ?>
