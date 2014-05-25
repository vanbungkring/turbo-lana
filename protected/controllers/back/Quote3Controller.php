<?php

class Quote3Controller extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/none';

	/**
	 * @return array action filters
	 */
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

		if(isset($_POST['quote3_banner']))
		{
			foreach ($_POST['quote3_banner'] as $key => $value) {
				$mqp = Quote3Banner::model()->findByPk($key);
				$mqp->status = $value['status'];
				$mqp->keterangan = $value['keterangan'];
				$mqp->price = $value['price'];
				$mqp->save(false);
			}
			$this->sendUpdateQuoteMail($id);
			$this->redirect(array('view','id'=>$id));
		}

		$this->render('view',array(
			'model'=>$model,
		));
	}

	public function sendUpdateQuoteMail($id){
		$quote = Quote3::model()->findByPk($id);
		$message = Yii::app()->mailgun->newMessage();
		$message->addTo($quote->member->email, $quote->member->namaDepan);
		$message->setSubject('Campaign Quotes Updates');
		$message->renderHtml('quote-update', array('quote' => $quote));

		$message->send();
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
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
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

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$model=new Quote3('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Quote3']))
			$model->attributes=$_GET['Quote3'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	public function actionCampaign()
	{
		$model=new Quote3('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Quote3']))
			$model->attributes=$_GET['Quote3'];

		$this->render('campaign',array(
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
			$file1=CUploadedFile::getInstanceByName('file1');
			if($file1){
				$model->uploadFilePendukung('file1',$file1);
                $this->redirect(array('viewCampaign','id'=>$id));
			}

			$file3=CUploadedFile::getInstanceByName('file3');
			if($file3){
				$model->uploadFilePendukung('file3',$file3);
                $this->redirect(array('viewCampaign','id'=>$id));
			}

			$file5=CUploadedFile::getInstanceByName('file5');
			if($file5){
				$model->uploadFilePendukung('file5',$file5);
                $this->redirect(array('viewCampaign','id'=>$id));
			}

			$file7=CUploadedFile::getInstanceByName('file7');
			if($file7){
				$model->uploadFilePendukung('file7',$file7);
                $this->redirect(array('viewCampaign','id'=>$id));
			}
		}

		$this->render('view_campaign',array(
			'model'=>$model,
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
		$model=Quote3::model()->findByPk($id);
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
    
     public function actionSetStart($id){
		$model = $this->loadModel($id);
		$model->setStart();
		$this->redirect(array('viewCampaign','id'=>$id));
	}
}
