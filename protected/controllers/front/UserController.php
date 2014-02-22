<?php

class UserController extends FrontEndController
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
		$this->render('user');
	}

	public function actionUserDashboard(){
		$this->render('user-dashboard');
	}

	public function actionMyBookmark()
	{
		$criteria = new CDbCriteria();
		$criteria->compare('idMember',Yii::app()->user->id);
		$criteria->with = array('banner');

		$dataProvider=new CActiveDataProvider('MemberBookmark',array(
			'criteria'=>$criteria
		));

		$this->render('list-bookmark',array(
			'dataProvider'=>$dataProvider,
		));
	}
	public function actionDelete($id){
		$model = MemberBookmark::model()->findByPk($id);
		$model->delete();
	}
}