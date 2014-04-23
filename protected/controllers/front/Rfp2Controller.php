<?php

class Rfp2Controller extends FrontEndController
{
	public $layout = 'navbarglobal';
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
	
	public function actionSave(){
		$model = new Quote2('create');
		if(isset($_POST['Quote2']))
		{
			$model->attributes = @$_POST['Quote2'];
			$model->idMember = Yii::app()->user->id;
			if($model->save()){
				$this->redirect(array('view','id'=>$model->id));
			}
			else{
				$this->redirect(array('site/detail','id'=>$model->idBanner));
			}
		}
	}

	public function actionIndex()
	{
		$model = new Quote2('create');
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
		$member = Member::model()->findByPk(Yii::app()->user->id);
		if($member === null){
			throw new CHttpException(404,'Member Tidak Ditemukan.');
		}
		if(isset($_GET["idBanner"])){
			$model->bannerIds = (array)$_GET["idBanner"];
		}
		if(isset($_POST['Quote2']))
		{
			$model->attributes = @$_POST['Quote2'];
			$model->bannerIds  = @$_POST['bannerIds'];
			$model->idMember   = $member->id;
			if($model->save()){
				$this->redirect(array('view','id'=>$model->id));
			}
			else{
				print_r($model->getErrors());
			}
		}
		$this->render('index',array(
			'model'=>$model,
			'member'=>$member,
			'defLat'=>-6.17511, 
			'defLong'=>106.86503949999997,
			'defZoom'=>8,
		));
	}

	public function actionView($id){
		$model = $this->loadModel($id);
		$criteria = new CDbCriteria();
		$criteria->compare('t.idQuote',$model->id);
		$criteria->order = '`time` DESC';
		$criteria->with = array('member');

		$dataProviderReply=new CActiveDataProvider('Quote2Reply',array(
			'criteria'=>$criteria,
			// 'pagination'=>false,
		));
		// header('Content-type: application/json');
		// echo json_encode(array('status'=>2)); exit;
		// echo "{ a : 1}";exit;
		$modelReply = new Quote2Reply('create');
		if(isset($_POST['Quote2Reply'])){
			$modelReply->attributes = $_POST['Quote2Reply'];
			$modelReply->idQuote = $id;
			$modelReply->idMember = Yii::app()->user->id;
			$modelReply->type = 2;
			$modelReply->time = date('Y-m-d H:i:s');
			if($modelReply->save()){
				if(isset($_POST['ajaxret']) and $_POST['ajaxret']=="quote-form"){
					echo json_encode(array('status'=>1));
					Yii::app()->end();
				}
				else{
					echo json_encode(array('status'=>2));
					Yii::app()->end();
				}
			}
			else{
				if(isset($_POST['ajaxret'])){
					echo json_encode(array('status'=>0,'message'=>'Gagal Simpan'));
					Yii::app()->end();
				}
				else{
					echo json_encode(array('status'=>2));
					Yii::app()->end();
				}
			}
		}

		$this->render('view',array(
			'model'=>$this->loadModel($id),
			'dataProviderReply'=>$dataProviderReply,
			'modelReply'=>$modelReply,
		));
	}
	public function actionTest(){
		header('Content-type: application/json');
		echo json_encode(array('status'=>2)); exit;
	}
	public function loadModel($id)
	{
		$model=Quote2::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	public function actionList()
	{
		$criteria = new CDbCriteria();
		$criteria->compare('idMember',Yii::app()->user->id);
		$criteria->with = array('banner');

		$dataProvider=new CActiveDataProvider('Quote2',array(
			'criteria'=>$criteria
		));

		$this->render('list',array(
			'dataProvider'=>$dataProvider,
		));
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