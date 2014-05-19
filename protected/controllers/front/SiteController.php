<?php

class SiteController extends FrontEndController
{
	/**
     * Declares class-based actions.
     */
    public function actions()
    {
        return array(
			'oauth' => array(
		        // the list of additional properties of this action is below
		        'class'=>'application.extensions.hoauth.HOAuthAction',
		        // Yii alias for your user's model, or simply class name, when it already on yii's import path
		        // default value of this property is: User
		        'model' => 'Member', 
		        // map model attributes to attributes of user's social profile
		        // model attribute => profile attribute
		        // the list of avaible attributes is below
				'attributes' => array(
					'email' => 'email',
					'namaDepan' => 'firstName',
					'namaBelakang' => 'lastName',
					'namaPerusahaan' => 'companyName',
					// 'gender'=> 'genderShort',
					// 'birthday' => 'birthDate',
					// // you can also specify additional values, 
					// that will be applied to your model (eg. account activation status)
					//  'acc_status' => 1,
				),
	      	),
			// this is an admin action that will help you to configure HybridAuth 
			// (you must delete this action, when you'll be ready with configuration, or 
			// specify rules for admin role. User shouldn't have access to this action!)
			'oauthadmin' => array(
				'class'=>'application.extensions.hoauth.HOAuthAdminAction',
			),

	      	'page'=>array(
            	'class'=>'CViewAction',
        	),
        );
    }

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
				'actions'=>array('addToQuote','detail','customBanner','saveTempImage','downloadCustomImage','saveCustomImage','Logout','AddBookmark','removeBookmark'),
				'users'=>array('@'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('test','getListBanner','page','index','oauth','result','custom','dashboard','GetMarker','Registrasi','User','AjaxLogin','login','error'),
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
		$defLat = isset($_GET['lat']) ? $_GET['lat'] : -6.17511;
		$defLong = isset($_GET['long']) ? $_GET['long'] : 106.86503949999997;
		$defLokasi = 'jakarta';
		$this->pageTitle = "Cari Papan Reklame di Indonesia | ".$this->setting->judul;
		if(isset($_GET['lokasi'])){
			$url = 'http://maps.googleapis.com/maps/api/geocode/json?address='.urlencode($_GET['lokasi']).'&sensor=false';
			$jdata = @file_get_contents($url);
			$data = @json_decode($jdata);
			$newLat = @$data->results[0]->geometry->location->lat;
			$newLong = @$data->results[0]->geometry->location->lng;
			if($newLat and $newLong){
				$defLat = $newLat;
				$defLong = $newLong;
				$defLokasi = $_GET['lokasi'];
			}
		}
		$this->render('result',array(
			'defLat' => $defLat,
			'defLong' => $defLong,
			'defLokasi' => $defLokasi,
		));
	}
	public function actionGetListBanner(){
		$url = 'http://maps.googleapis.com/maps/api/geocode/json?address='.urlencode(@$_POST['lokasi']).'&sensor=false';
		$jdata = @file_get_contents($url);
		$data = @json_decode($jdata);

		$long_min = @$data->results[0]->geometry->bounds->southwest->lng;
        $long_max = @$data->results[0]->geometry->bounds->northeast->lng;
        $lat_min = @$data->results[0]->geometry->bounds->southwest->lat;
        $lat_max = @$data->results[0]->geometry->bounds->northeast->lat;
        if($long_min > $long_max){
            $res = Yii::app()->db->createCommand("select banner.*,banner_image.id as `cover`,concat(banner_image.id,'-',banner_image.namaFile) as cover_file from banner left join 
            		banner_image on banner_image.idBanner = banner.id and banner_image.status=1 
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
            $res = Yii::app()->db->createCommand("select banner.*,banner_image.id as `cover`,concat(banner_image.id,'-',banner_image.namaFile) as cover_file from banner left join 
            		banner_image on banner_image.idBanner = banner.id and banner_image.status=1 
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
    public function actionCustom()
	{
		$this->render('custom-banner');
	}
	public function actionDetail($id)
	{
		$banner = Banner::model()->with('kategoris')->findByPk($id);
		$uid = Yii::app()->user->id;
		$member = Member::model()->with(array('bookmarks','quotes3'=>array(
			'with'=>array(
				'banners',
			),
		)))->findByPk($uid);
		if($banner===null)
			throw new CHttpException(404,'Banner Tidak Ditemukan.');
		// renders the view file 'protected/views/site/index.php'
		// using the default layout 'protected/views/layouts/main.php'

		$this->pageTitle = "Sewa Papan Reklame di {$banner->formatedAddress}, {$banner->lokasi} | {$this->setting->judul}";

		$member->addLog(MemberLog::TYPE_VIEW_DETAIL_BILLBOARD,array(
			'idBanner'=>$banner->id
		));

		$quote2 = new Quote2();
		$quote2->idBanner = $id;

		Yii::app()->clientScript->registerMetaTag($banner->meta_desc, 'description',null,null,'description');
		Yii::app()->clientScript->registerMetaTag($banner->meta_keyword, 'keywords',null,null,'keywords');

		$this->render('billboard-detail',array(
			'banner'=>$banner,
			'member'=>$member,
			'quote2'=>$quote2,
		));
	}
	public function actionCustomBanner($id)
	{
		$banner = Banner::model()->with('kategoris')->findByPk($id);
		$uid = Yii::app()->user->id;
		$member = Member::model()->with(array('bookmarks'))->findByPk($uid);
		if($banner===null)
			throw new CHttpException(404,'Banner Tidak Ditemukan.');
		// renders the view file 'protected/views/site/index.php'
		// using the default layout 'protected/views/layouts/main.php'
		$this->render('custom-banner',array(
			'banner'=>$banner,
			'member'=>$member,
		));
	}
	public function actionSaveTempImage(){
		// header('Content-Type: application/json');
		$model = new TempImage();
		$model->file = CUploadedFile::getInstanceByName('image');
		if($model->save()){
			echo CJSON::encode(array('status'=>1));
		}
		else{
			echo CJSON::encode(array('status'=>0,'error'=>$model->getErrors()));
		}
		foreach (Yii::app()->log->routes as $route)
        {
            if ($route instanceof CWebLogRoute)
            {
                $route->enabled = false;
            }
        }
		exit;
	}

	public function actionSaveCustomImage(){
		$back = BannerImage::model()->findByPk($_POST['backGroundId']);
		$imageBack = $back->getImagePath();

		
		$background     = $imageBack;
		$photo1         = imagecreatefromjpeg($background);
		$foto1W         = imagesx($photo1);
		$foto1H         = imagesy($photo1);
		$photoFrameW    = $foto1W; // $_POST['bW'];
		$photoFrameH    = $foto1H; // $_POST['bH'];
		$photoFrame     = imagecreatetruecolor($photoFrameW,$photoFrameH);
		imagecopyresampled($photoFrame, $photo1, 0, 0, 0, 0, $photoFrameW, $photoFrameH, $foto1W, $foto1H);

		foreach ($_POST['images'] as $key => $value) {
			$tempImage = TempImage::model()->findByPk($value['id']);
			if($tempImage->mime == 'image/jpeg'){
				$insert         = $tempImage->getImagePath();
			    $photoFrame2Rotation = (180-$value['rotation']) + 180;

			    $photo2         = imagecreatefromjpeg($insert);
			 
			    $foto2W         = imagesx($photo2);
			    $foto2H         = imagesy($photo2);
			    $photoFrame2W   = $value['width'];
			    $photoFrame2H   = $value['height'];
			 
			    $photoFrame2TOP = $value['top'];
			    $photoFrame2LEFT= $value['left'];
			 
			    $photoFrame2    = imagecreatetruecolor($photoFrame2W,$photoFrame2H);
			    
			    imagecopyresampled($photoFrame2, $photo2, 0, 0, 0, 0, $photoFrame2W, $photoFrame2H, $foto2W, $foto2H);

			    $photoFrame2    = imagerotate($photoFrame2,$photoFrame2Rotation, -1,0);

			    $extraTop       =(imagesy($photoFrame2)-$photoFrame2H)/2;
   				 $extraLeft      =(imagesx($photoFrame2)-$photoFrame2W)/2;

			 	 imagecopy($photoFrame, $photoFrame2,$photoFrame2LEFT-$extraLeft, $photoFrame2TOP-$extraTop, 0, 0, imagesx($photoFrame2), imagesy($photoFrame2));
			}
			else if($tempImage->mime == 'image/png'){
				$insert         = $tempImage->getImagePath();
			    $photoFrame2Rotation = (180-$value['rotation']) + 180;

			    $photo2         = imagecreatefrompng($insert);
			 
			    $foto2W         = imagesx($photo2);
			    $foto2H         = imagesy($photo2);
			    $photoFrame2W   = $value['width'];
			    $photoFrame2H   = $value['height'];
			 
			    $photoFrame2TOP = $value['top'];
			    $photoFrame2LEFT= $value['left'];

			    $photoFrame2    = imagecreatetruecolor($photoFrame2W,$photoFrame2H);
			    $trans_colour   = imagecolorallocatealpha($photoFrame2, 0, 0, 0, 127);
			    imagefill($photoFrame2, 0, 0, $trans_colour);
			    
			    imagecopyresampled($photoFrame2, $photo2, 0, 0, 0, 0, $photoFrame2W, $photoFrame2H, $foto2W, $foto2H);
			    
			    $photoFrame2    = imagerotate($photoFrame2,$photoFrame2Rotation, -1,0);

			    $extraTop       = (imagesy($photoFrame2)-$photoFrame2H)/2;
   				$extraLeft      = (imagesx($photoFrame2)-$photoFrame2W)/2;

			 	imagecopy($photoFrame, $photoFrame2,$photoFrame2LEFT-$extraLeft, $photoFrame2TOP-$extraTop, 0, 0, imagesx($photoFrame2), imagesy($photoFrame2));
			}
		}	

		if($photoFrame){
			$model = new CustomBanner();
			$model->idBanner = $_POST['idBanner'];
			$model->idMember = $_POST['idMember'];
			$model->time = date('Y-m-d H:i:s');
			$model->imagejpeg = $photoFrame;
			$model->save(); 
			echo CJSON::encode(array('status'=>1,'id'=>$model->id));
		}
		else{
			echo CJSON::encode(array('status'=>0));
		}
	
	}

	public function actionDownloadCustomImage($id){
		$model = CustomBanner::model()->findByPk($id);
		$file = $model->getImagePath();
		header('Content-Type: application/octet-stream');
		header('Content-Disposition: attachment; filename="'.basename($file).'"');
		header('Content-Length: ' . filesize($file));
		readfile($file);
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
			$member->addLog(MemberLog::TYPE_BOOKMARK_BILLBOARD,array(
				'idBanner'=>$banner->id
			));
			echo json_encode(array('status'=>1));
		}
		catch(Exception $e){
			echo json_encode(array('status'=>0,'message'=>$e->getMessage()));
		}
	}

	public function actionAddToQuote($id){
		try{
			$quote = Quote3::model()->findByPk(@$_POST['idQuote']);
			$banner = Banner::model()->findByPk($id);

			$uid = Yii::app()->user->id;
			$member = Member::model()->findByPk($uid);
			Quote3Banner::model()->find('idQuote');
			if($quote===null)
				throw new CHttpException(404,'Quote Tidak Ditemukan.');
			
			if($banner===null)
				throw new CHttpException(404,'Banner Tidak Ditemukan.');
			
			if($member->isQuoted($id)){
				throw new CHttpException(404,'Banner sudah terbookmark.');
			}
			
			if(!$quote->addBanner($id)){
				throw new CHttpException(404,'Banner Gagal Dibookmark.');
			}
			// $member->addLog(MemberLog::TYPE_BOOKMARK_BILLBOARD,array(
			// 	'idBanner'=>$banner->id
			// ));
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
            $res = Yii::app()->db->createCommand("select banner.*,banner_image.id as `cover`,concat(banner_image.id,'-',banner_image.namaFile) as cover_file from banner left join 
            		banner_image on banner_image.idBanner = banner.id and banner_image.status=1 
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
            $res = Yii::app()->db->createCommand("select banner.*,banner_image.id as `cover`,concat(banner_image.id,'-',banner_image.namaFile) as cover_file from banner left join 
            		banner_image on banner_image.idBanner = banner.id and banner_image.status=1 
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
		if(isset($_POST['Member'])){
            $member = new Member('register');
            $member->attributes = $_POST['Member'];
            $member->save();
            $in = new UserIdentity($member->id,null);
            $duration= 3600*24*30; // 30 days
			if(Yii::app()->user->login($in,$duration)){
				$this->redirect(array('/user/profile')); 
			}
        }

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
		$this->pageTitle = "Masuk Ke dashboard";
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

	public function actionTest(){
		$message = Yii::app()->mailgun->newMessage();
		$message->setFrom('me@example.com', 'Andrei Baibaratsky');
		$message->addTo('lateph@gmail.com', 'My dear user');
		$message->setSubject('Mailgun API library test');
		$message->renderText('test', array('myParam' => 'Awesome!'));

		echo $message->send();
	}
}