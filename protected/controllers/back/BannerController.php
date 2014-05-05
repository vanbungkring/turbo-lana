<?php

class BannerController extends BackEndController
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
		$modelBannerImage = new BannerImage('create');
		$model = $this->loadModel($id);
		if(isset($_POST['BannerImage']))
		{
			$modelBannerImage->attributes=$_POST['BannerImage'];
			$modelBannerImage->idBanner = $model->id;
			$modelBannerImage->status   = 0;
			$modelBannerImage->image=CUploadedFile::getInstance($modelBannerImage,'image');
			if($modelBannerImage->save()){
				if($modelBannerImage->image){
					$file = $modelBannerImage->getImagePath();
					if(file_exists($file)){
						unlink($file);
					}
					$modelBannerImage->image->saveAs($file);
				}
				$this->redirect(array('view','id'=>$model->id));
			}
		}

		$this->render('view',array(
			'model'=>$model,
			'modelBannerImage'=>$modelBannerImage
		));
	}

	public function actionSetCover($id){
		$model=BannerImage::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		BannerImage::model()->updateAll(array('status'=>0),'idBanner = :idBanner',array('idBanner'=>$model->idBanner));
		$model->status = 1;
		$model->save();
		$this->redirect(array('view','id'=>$model->idBanner));
	}
	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Banner('create');
		$model->lat = -6.2087634;
		$model->long = 106.8455989;
		$model->zoom = 10;
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Banner']))
		{
			$model->attributes=$_POST['Banner'];
			$model->image=CUploadedFile::getInstance($model,'image');
			$model->lokasi = Geo::getKota($model->lat,$model->long);
			if($model->save()){
				$model->updateKategori();
				if($model->image){
					$file = $model->getImagePath();
					if(file_exists($file)){
						unlink($file);
					}
					$model->image->saveAs($file);
				}
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
		$model->scenario = 'update';
		$model->fetchKategori();
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
		$model->image=CUploadedFile::getInstance($model,'image');
		if(isset($_POST['Banner']))
		{
			$model->attributes=$_POST['Banner'];
			$model->lokasi = Geo::getKota($model->lat,$model->long);
			if($model->save()){
				$model->updateKategori();
				$file = $model->getImagePath();
				if($model->image){
					if(file_exists($file)){
						unlink($file);
					}
					$model->image->saveAs($file);
				}
				$this->redirect(array('view','id'=>$model->id));
			}
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
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('index'));
	}
	/**
	 * Manages all models.
	 */
	public function actionIndex()
	{
		$model=new Banner('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Banner']))
			$model->attributes=$_GET['Banner'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Banner the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Banner::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Banner $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='banner-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
