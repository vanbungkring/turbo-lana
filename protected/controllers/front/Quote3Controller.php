<?php

class Quote3Controller extends Controller
{
	public $layout = 'dashboard';
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
				'users'=>array('@'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$model=Quote3::model()->with(array('quoteBanners'=>array(
			'with'=>array(
				'banner',
			)
		)))->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');

		$this->render('view',array(
			'model'=>$model,
		));
	}

	public function actionViewCampaign($id)
	{
		$model=Quote3::model()->with(array('quoteBanners'=>array(
			'with'=>array(
				'banner',
			)
		)))->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');

		if(isset($_POST)){
			$file2=CUploadedFile::getInstanceByName('file2');
			if($file2){
				$model->uploadFilePendukung('file2',$file2);
                $this->redirect(array('viewCampaign','id'=>$id));
			}

			$file4=CUploadedFile::getInstanceByName('file4');
			if($file4){
				$model->uploadFilePendukung('file4',$file4);
                $this->redirect(array('viewCampaign','id'=>$id));
			}

			$file6=CUploadedFile::getInstanceByName('file6');
			if($file6){
				$model->uploadFilePendukung('file6',$file6);
                $this->redirect(array('viewCampaign','id'=>$id));
			}

			$file8=CUploadedFile::getInstanceByName('file8');
			if($file8){
				$model->uploadFilePendukung('file8',$file8);
                $this->redirect(array('viewCampaign','id'=>$id));
			}
		}

		$this->render('view_campaign',array(
			'model'=>$model,
		));
	}
	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Quote3;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Quote3']))
		{
			$model->attributes=$_POST['Quote3'];
			$model->time = date('Y-m-d H:i:s');
			$model->idMember = Yii::app()->user->id;
			$model->tanggalMulai = DateHelper::toYmd($model->tanggalMulai);
			$model->tanggalBerakhir = DateHelper::toYmd($model->tanggalBerakhir);
			$model->status = 0;
			if($model->save()){
				$this->redirect(array('view','id'=>$model->id));
			}
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Quote3']))
		{
			$model->attributes=$_POST['Quote3'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	public function actionHapusBanner(){
		$model = Quote3Banner::model()->find('idBanner = :p1 and idQuote = :p2',array(':p1'=>$_GET['idBanner'],':p2'=>$_GET['idQuote']));
		if($model == null){
			throw new CHttpException(404,'The requested page does not exist.');
		}
		$model->delete();
		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('view','id'=>$_GET['idQuote']));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$quotes = Quote3::model()->findAll('idMember = :p1 and status = 0',array(':p1'=>Yii::app()->user->id));
		$this->render('index',array(
		//	'dataProvider'=>$dataProvider,
			'quotes'=>$quotes,
		));
	}

	public function actionCampaign()
	{
		$quotes = Quote3::model()->findAll('idMember = :p1 and status = 1',array(':p1'=>Yii::app()->user->id));
		$this->render('campaign',array(
		//	'dataProvider'=>$dataProvider,
			'quotes'=>$quotes,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Quote3('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Quote3']))
			$model->attributes=$_GET['Quote3'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Quote3 the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Quote3::model()->with(array('quoteBanners'=>array(
            'with'=>array('banner')
        )))->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Quote3 $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='quote3-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

	public function actionApprove($id){
		$model = $this->loadModel($id);
		$model->approveToCampaign();
		$this->redirect(array('view','id'=>$id));
	}
}
