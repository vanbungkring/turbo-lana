<?php

class PoController extends BackEndController
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
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new PO('create');

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['PO']))
		{
			$model->attributes=$_POST['PO'];
			$model->file=CUploadedFile::getInstance($model,'file');
			$quote = Quote::model()->findByPk($model->idQuote);
			if($quote){
				$model->idMember = $quote->id;
			}
			$model->time = date('Y-m-d H:i:s');
			if($model->file){
				$model->namaFile = $model->file->getName();
			}
			if($model->save()){
				// $model->namaFile = $model->file->getName();
				$model->file->saveAs($model->getImagePath());
				$this->redirect(array('view','id'=>$model->id));		
			}
		}

		$quotes = Quote::model()->findAll();
		$idQuotes = array();
		foreach ($quotes as $key => $value) {
			$idQuotes[$value->id] = $value->name;
		}

		$this->render('create',array(
			'model'=>$model,
			'idQuotes'=>$idQuotes
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

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['PO']))
		{
			$model->attributes=$_POST['PO'];
			$model->file=CUploadedFile::getInstance($model,'file');
			if($model->file){
				$model->namaFile = $model->file->getName();
			}
			if($model->save()){
				if($model->file){
					$file = $model->getImagePath();
					if(file_exists($file)){
						unlink($file);
					}
					$model->file->saveAs($model->getImagePath());
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
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Manages all models.
	 */
	public function actionIndex()
	{
		$model=new PO('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['PO']))
			$model->attributes=$_GET['PO'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return PO the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=PO::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param PO $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='po-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

	public function actionAddBilboard(){
		$this->render('addBilboard');
	}
}
