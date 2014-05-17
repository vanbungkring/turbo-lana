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
		$this->activeType = FrontEndController::TYPE_DASBOARD;
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
		$this->activeType = FrontEndController::TYPE_PROFILE;

        $member = Member::model()->findByPk(Yii::app()->user->id);
        $member->scenario = 'profile';
       
        if(isset($_GET['Member'])){    
            $member->attributes = $_GET['Member'];
            if($member->save()){
                $this->redirect(array('/user/profile'));
            }
        }
        if(isset($_POST['MemberProfilePerusahaan'])){
        	$member->profilePerusahaan->attributes = $_POST['MemberProfilePerusahaan'];
        	$member->profilePerusahaan->file=CUploadedFile::getInstance($member->profilePerusahaan,'file');
        	if($member->profilePerusahaan->save()){
        		if($member->profilePerusahaan->file){
        			if($member->profilePerusahaan->logoPerusahaan){
	        			$oldFile = $member->profilePerusahaan->getFilePath();
	        			if(file_exists($oldFile)){
							unlink($oldFile);
	        			}	
        			}
        			
	                $member->profilePerusahaan->logoPerusahaan = $member->profilePerusahaan->file->getName();
	                $file = $member->profilePerusahaan->getFilePath();
					if(file_exists($file)){
						unlink($file);
					}
					if($member->profilePerusahaan->file->saveAs($file)){
						$member->profilePerusahaan->save();
					}
				}
                $this->redirect(array('/user/profile'));
            }
        }
        $member->updateOldPassword  = '';
		$member->updateNewPassword1 = '';
		$member->updateNewPassword2 = '';
		$this->render('profile',array(
            'model'=>$member,
        ));
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
		$this->activeType = FrontEndController::TYPE_HISTORY;
		
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
		$this->activeType = FrontEndController::TYPE_BOOKMARK;

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

	public function actionDeleteBookmark($id){
		$model = MemberBookmark::model()->findByPk($id);
		$model->delete();
		$this->redirect(array('MyBookmark'));
	}

	public function actionDelete($id){
		$model = MemberBookmark::model()->findByPk($id);
		$model->delete();
	}
}