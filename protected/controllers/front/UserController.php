<?php

class UserController extends FrontEndController
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

	public function actionIndex()
	{
		$this->render('user');
	}

	public function actionDashboard(){
		$member = Member::model()->findByPk(Yii::app()->user->id);
		$logs = MemberLog::model()->findAll(array(
			'condition'=>'idMember = :p1',
			'params'=>array(
				':p1'=>$member->id
			),
			'order'=>'time desc',
			'limit'=>5,
		));
		$logByDate = array();
		foreach ($logs as $key => $value) {
			if(!isset($logByDate[$value->date])){
				$logByDate[$value->date] = array();
			}
			$logByDate[$value->date][] = $value;
		}
		$this->render('user-dashboard',array(
			'member'=>$member,
			'logByDate'=>$logByDate,
		));
	}

	public function actionProfile(){
		$this->render('profile');
	}

	public function actionCampaign(){
		$this->render('campaign');
	}

	public function actionQuotes(){
		$this->render('quotes');
	}
	public function actionQuotesDetail(){
		$this->render('quotes-detail');
	}

	public function actionHistory(){
				$member = Member::model()->findByPk(Yii::app()->user->id);
		$logs = MemberLog::model()->findAll(array(
			'condition'=>'idMember = :p1',
			'params'=>array(
				':p1'=>$member->id
			),
			'order'=>'time desc',
			'limit'=>5,
		));
		$logByDate = array();
		foreach ($logs as $key => $value) {
			if(!isset($logByDate[$value->date])){
				$logByDate[$value->date] = array();
			}
			$logByDate[$value->date][] = $value;
		}
		$this->render('history',array(
			'member'=>$member,
			'logByDate'=>$logByDate,
		));
	}


	public function actionMyBookmark()
	{
		$criteria = new CDbCriteria();
		$criteria->compare('idMember',Yii::app()->user->id);
		$criteria->with = array('banner');

		$dataProvider=new CActiveDataProvider('MemberBookmark',array(
			'criteria'=>$criteria
		));

		$bookmarks = MemberBookmark::model()->findAll($criteria);

		$listData = array();
		$_models = MemberBookmark::model()->findAll('idMember = :p1',array(':p1'=>Yii::app()->user->id));
		foreach ($_models as $key => $value) {
			$listData[] = $value->idBanner;
		}
		$this->render('list-bookmark',array(
			'dataProvider'=>$dataProvider,
			'listData'=>$listData,
			'bookmarks'=>$bookmarks,
		));
	}


	public function actionDelete($id){
		$model = MemberBookmark::model()->findByPk($id);
		$model->delete();
	}
}