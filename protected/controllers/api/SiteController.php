<?php

class SiteController extends ApiController
{
	public function actionCheckQuote3()
	{
		header('Content-Type: application/json');
		$models = Quote3::model()->findAll('status = :p1 and tanggalBerakhir < :p2',array(
			':p1'=>Quote3::STATUS_START,
			':p2'=>date('Y-m-d'),
		));
		$total = 0;
		foreach($models as $model){
			$model->status = Quote3::STATUS_STOP;
			$model->save();
			$total++;
		}
		echo CJSON::encode(array(
			'status'=>'ok',
			'endedCampaign'=>$total,
		));
	}

	public function actionError()
	{
	    if($error=Yii::app()->errorHandler->error)
	        $this->render('error', $error);
	}
}
