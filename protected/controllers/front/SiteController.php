<?php

class SiteController extends FrontEndController
{
	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex()
	{
		// renders the view file 'protected/views/site/index.php'
		// using the default layout 'protected/views/layouts/main.php'
		$this->render('index');
	}

	public function actionResult()
	{
		// renders the view file 'protected/views/site/index.php'
		// using the default layout 'protected/views/layouts/main.php'
		$this->render('result');
	}
        
    public function actionGetMarker(){
        $long_min = (double)@$_GET['bounds']['ia_b'];
        $long_max = (double)@$_GET['bounds']['ia_d'];
        $lat_min = (double)@$_GET['bounds']['ta_d'];
        $lat_max = (double)@$_GET['bounds']['ta_b'];
        if($long_min > $long_max){
            $res = Yii::app()->db->createCommand("select * from banner where 
                `lat` >= :lat_min and `lat` <= :lat_max 
                and
                (
                    `long` >= :long_min or `long` <= :long_max
                )
            ")->queryAll(true,array(
                ':lat_min'=>$lat_min,
                ':lat_max'=>$lat_max,
                ':long_min'=>$long_min,
                ':long_max'=>$long_max,
            ));
        }
        else{
            $res = Yii::app()->db->createCommand("select * from banner  where
                `lat` >= :lat_min and `lat` <= :lat_max 
                and
                `long` >= :long_min and `long` <= :long_max
            ")->queryAll(true,array(
                ':lat_min'=>$lat_min,
                ':lat_max'=>$lat_max,
                ':long_min'=>$long_min,
                ':long_max'=>$long_max,
            ));
        }
        header('Content-type: application/json');
        echo json_encode($res);
    }
        
    public function actionRegistrasi()
	{
		// renders the view file 'protected/views/site/index.php'
		// using the default layout 'protected/views/layouts/main.php'
		$this->render('registrasi');
	}
	public function actionUser()
	{
		// renders the view file 'protected/views/site/index.php'
		// using the default layout 'protected/views/layouts/main.php'
		$this->render('user');
	}
	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
		if($error=Yii::app()->errorHandler->error)
		{
			if(Yii::app()->request->isAjaxRequest)
				echo $error['message'];
			else
				$this->render('error', $error);
		}
	}

	/**
	 * Displays the login page
	 */
	public function actionLogin()
	{
		$model=new LoginForm;

		// if it is ajax validation request
		if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}

		// collect user input data
		if(isset($_POST['LoginForm']))
		{
			$model->attributes=$_POST['LoginForm'];
			// validate user input and redirect to the previous page if valid
			if($model->validate() && $model->login())
				$this->redirect(Yii::app()->user->returnUrl);
		}
		// display the login form
		$this->render('login',array('model'=>$model));
	}

	/**
	 * Logs out the current user and redirect to homepage.
	 */
	public function actionLogout()
	{
		Yii::app()->user->logout();
		$this->redirect(Yii::app()->homeUrl);
	}
}