<?php

class Quote2Controller extends Controller
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
		$model = $this->loadModel($id);
		$criteria = new CDbCriteria();
		$criteria->compare('t.idQuote',$model->id);
		$criteria->order = '`time` DESC';
		$criteria->with = array('member');

		$dataProviderReply=new CActiveDataProvider('Quote2Reply',array(
			'criteria'=>$criteria,
			// 'pagination'=>false,
		));

		$modelReply = new Quote2Reply('create');
		if(isset($_POST['Quote2Reply'])){
			$modelReply->attributes = $_POST['Quote2Reply'];
			$modelReply->idQuote = $id;
			$modelReply->idAdmin = 1;
			$modelReply->type = 1;
			$modelReply->time = date('Y-m-d H:i:s');
			if($modelReply->save()){
				if(isset($_POST['ajaxret']) and $_POST['ajaxret']=="quote-form"){
					echo json_encode(array('status'=>1));
					Yii::app()->end();
				}
			}
			else{
				if(isset($_POST['ajaxret'])){
					echo json_encode(array('status'=>0,'message'=>'Gagal Simpan'));
					Yii::app()->end();
				}
			}
		}
		$this->render('view',array(
			'model'=>$model,
			'dataProviderReply'=>$dataProviderReply,
			'modelReply'=>$modelReply,
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
    {
        $model = new Quote('create');
        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);
        if(isset($_GET["idBanner"])){
            $model->bannerIds = (array)$_GET["idBanner"];
        }
        if(isset($_POST['Quote2']))
        {
            $model->attributes = @$_POST['Quote'];
            $model->bannerIds  = @$_POST['bannerIds'];
            if($model->save()){
                $this->redirect(array('view','id'=>$model->id));
            }
            else{
                print_r($model->getErrors());
            }
        }
        $this->render('_form',array(
            'model'=>$model,
            'defLat'=>-6.17511, 
            'defLong'=>106.86503949999997,
            'defZoom'=>8,
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

		if(isset($_POST['Quote']))
		{
			$model->attributes=$_POST['Quote'];
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
		$model=new Quote2('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Quote2']))
			$model->attributes=$_GET['Quote'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Quote the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Quote2::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Quote $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='quote-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
