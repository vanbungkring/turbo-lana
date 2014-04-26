<?php

class InvoiceController extends Controller
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
		$model=new Invoice;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Invoice']))
		{
			$model->attributes=$_POST['Invoice'];
			$model->time = date("Y-m-d H:i:s");
			$model->statusLunas = Invoice::STATUS_BELUM_LUNAS;
			if($model->save()){
				foreach($model->formDetail as $value){
					$detail = new InvoiceDetail();
					$detail->attributes = $value;
					$detail->idInvoice = $model->id;
					$detail->save();
				}
				$this->redirect(array('view','id'=>$model->id));
			}
		}

		$pbs = PurchaseBillboard::model()->findAll();
		$idPurchaseBillboards = array();
		foreach ($pbs as $key => $value) {
			$idPurchaseBillboards[$value->id] = $value->id;
		}

		$this->render('create',array(
			'model'=>$model,
			'idPurchaseBillboards'=>$idPurchaseBillboards,
		));
	}

	public function actionDetailPB(){
		try{
			if(!isset($_POST['id'])){
				throw new Excetion('ID Tidak Ditemukan');
			}
			$model = PurchaseBillboard::model()->with(array('detailPB'=>array(
				'with'=>array(
					'banner'
				),
			)))->findByPk($_POST['id']);

			if($model===null){
				throw new Excetion('Purchase Billboard Tidak Ditemukan');
			}
			echo CJSON::encode(array('status'=>1,'data'=>$model,'detail'=>$model->detailPB,'member'=>$model->PO->member));
		}
		catch(Excetion $e){
			echo CJSON::encode(array('status'=>0,'message'=>$e->getMessage()));
		}
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

		if(isset($_POST['Invoice']))
		{
			$model->attributes=$_POST['Invoice'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$pbs = PurchaseBillboard::model()->findAll();
		$idPurchaseBillboards = array();
		foreach ($pbs as $key => $value) {
			$idPurchaseBillboards[$value->id] = $value->id;
		}

		$this->render('update',array(
			'model'=>$model,
			'idPurchaseBillboards'=>$idPurchaseBillboards,
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
		$model=new Invoice('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Invoice']))
			$model->attributes=$_GET['Invoice'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Invoice the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Invoice::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Invoice $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='invoice-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
