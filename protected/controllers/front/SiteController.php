<?php

class SiteController extends FrontEndController
{
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('detail','Logout','AddBookmark','removeBookmark'),
				'users'=>array('@'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('index','result','custom','userDashboard','GetMarker','Registrasi','User','AjaxLogin','login','error'),
				'users'=>array('*'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}
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
    public function actionCustom()
	{
		$this->render('custom-banner');
	}
	public function actionDetail($id)
	{
		$banner = Banner::model()->with('kategoris')->findByPk($id);
		$uid = Yii::app()->user->id;
		$member = Member::model()->with(array('bookmarks'))->findByPk($uid);
		if($banner===null)
			throw new CHttpException(404,'Banner Tidak Ditemukan.');
		// renders the view file 'protected/views/site/index.php'
		// using the default layout 'protected/views/layouts/main.php'
		$this->render('billboard-detail',array(
			'banner'=>$banner,
			'member'=>$member,
		));
	}
	public function actionAddBookmark($id){
		try{
			$banner = Banner::model()->findByPk($id);
			$uid = Yii::app()->user->id;
			$member = Member::model()->with(array('bookmarks'))->findByPk($uid);
			if($banner===null)
				throw new CHttpException(404,'Banner Tidak Ditemukan.');
			if($member->isBookmarked($id)){
				throw new CHttpException(404,'Banner sudah terbookmark.');
			}
			if(!$member->addBookmark($id)){
				throw new CHttpException(404,'Banner Gagal Dibookmark.');
			}
			echo json_encode(array('status'=>1));
		}
		catch(Exception $e){
			echo json_encode(array('status'=>0,'message'=>$e->getMessage()));
		}
	}

	public function actionRemoveBookmark($id){
		try{
			$banner = Banner::model()->findByPk($id);
			$uid = Yii::app()->user->id;
			$member = Member::model()->with(array('bookmarks'))->findByPk($uid);
			if($banner===null)
				throw new CHttpException(404,'Banner Tidak Ditemukan.');
			if(!$member->isBookmarked($id)){
				throw new CHttpException(404,'Banner belum dibookmark.');
			}
			if(!$member->removeBookmark($id)){
				throw new CHttpException(404,'Gagal Hapus bookmark.');
			}
			echo json_encode(array('status'=>1));
		}
		catch(Exception $e){
			echo json_encode(array('status'=>0,'message'=>$e->getMessage()));
		}
	}

	

    public function actionGetMarker(){
        $long_min = (double)@$_GET['bounds']['ia_b'];
        $long_max = (double)@$_GET['bounds']['ia_d'];
        $lat_min = (double)@$_GET['bounds']['ta_d'];
        $lat_max = (double)@$_GET['bounds']['ta_b'];
        if($long_min > $long_max){
            $res = Yii::app()->db->createCommand("select banner.*,banner_image.id as `cover` from banner left join 
            		banner_image on banner_image.idBanner = banner.id and status=1 
            	 where 
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
            $res = Yii::app()->db->createCommand("select banner.*,banner_image.id as `cover` from banner left join 
            		banner_image on banner_image.idBanner = banner.id and status=1 
            	where
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
		$model=new LoginForm('Front');

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
			if($model->validate() && $model->loginFront())
				$this->redirect(Yii::app()->user->returnUrl);
		}
		// display the login form
		$this->render('login',array('model'=>$model));
	}

	public function actionAjaxLogin(){
		$model=new LoginForm('Front');
		header('Content-type: application/json');
		if(isset($_POST))
		{
			$model->username = @$_POST['email'];
			$model->password = @$_POST['password'];
			// validate user input and redirect to the previous page if valid
			if($model->validate()){
				if($model->loginFront()){
					echo json_encode(array('status'=>1));
				}
				else{
					echo json_encode(array('status'=>0));
				}
			}
			else{
				echo json_encode(array('status'=>0));
			}
		}
		else{
			echo json_encode(array('status'=>0));
		}
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