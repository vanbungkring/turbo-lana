<?php

class RfpController extends FrontEndController
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
				'users'=>array('@'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	public function actionIndex()
	{
		$model = new Quote('create');
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
		if(isset($_GET["idBanner"])){
			$model->bannerIds = (array)$_GET["idBanner"];
		}
		if(isset($_POST['Quote']))
		{
			$model->attributes = @$_POST['Quote'];
			$model->bannerIds  = @$_POST['bannerIds'];
			$model->idMember   = Yii::app()->user->id;
			if($model->save()){
				$this->redirect(array('view','id'=>$model->id));
			}
			else{
				print_r($model->getErrors());
			}
		}
		$this->render('index',array(
			'model'=>$model,
			'defLat'=>-6.17511, 
			'defLong'=>106.86503949999997,
			'defZoom'=>8,
		));
	}

	public function actionView($id){
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	public function loadModel($id)
	{
		$model=Quote::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	// Uncomment the following methods and override them if needed
	/*
	public function filters()
	{
		// return the filter configuration for this controller, e.g.:
		return array(
			'inlineFilterName',
			array(
				'class'=>'path.to.FilterClass',
				'propertyName'=>'propertyValue',
			),
		);
	}

	public function actions()
	{
		// return external action classes, e.g.:
		return array(
			'action1'=>'path.to.ActionClass',
			'action2'=>array(
				'class'=>'path.to.AnotherActionClass',
				'propertyName'=>'propertyValue',
			),
		);
	}
	*/
}