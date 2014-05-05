<?php

class DeliveriOrderController extends BackEndController
{
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
		$model=new DeliveriOrder;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['DeliveriOrder']))
		{
			$model->attributes=$_POST['DeliveriOrder'];
			if($model->save()){
				foreach($model->formDetail as $value){
					$detail = new DeliveriOrderDetail();
					$detail->attributes = $value;
					$detail->idDo = $model->id;
					$detail->save();
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

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['DeliveriOrder']))
		{
			$model->attributes=$_POST['DeliveriOrder'];
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
	 * Manages all models.
	 */
	public function actionIndex()
	{
		$model=new DeliveriOrder('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['DeliveriOrder']))
			$model->attributes=$_GET['DeliveriOrder'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	public function actionDetailPO(){
		try{
			if(!isset($_POST['id'])){
				throw new Exception('ID Tidak Ditemukan');
			}
			$model = PO::model()->findByPk($_POST['id']);
			$quote = $model->quote;
			$banners  = $quote->banners;
			if($model===null){
				throw new Exception('PO Tidak Ditemukan');
			}
			echo CJSON::encode(array('status'=>1,'data'=>$model,'banners'=>$banners));
		}
		catch(Exception $e){
			echo CJSON::encode(array('status'=>0,'message'=>$e->getMessage()));
		}
	}

	public function actionDetailMember(){
		try{
			if(!isset($_POST['id'])){
				throw new Exception('ID Tidak Ditemukan');
			}
			$model = Member::model()->findByPk($_POST['id']);
			if($model===null){
				throw new Exception('Perusahaan Tidak Ditemukan');
			}
			echo CJSON::encode(array('status'=>1,'data'=>$model));
		}
		catch(Exception $e){
			echo CJSON::encode(array('status'=>0,'message'=>$e->getMessage()));
		}
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return DeliveriOrder the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=DeliveriOrder::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param DeliveriOrder $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='deliveri-order-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
