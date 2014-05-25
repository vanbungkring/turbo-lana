<?php
class LHtml
{
	public static function createClientUrl($route,$params=array()){
		$url = Yii::app()->createUrl($route,$params);
		$url = str_replace(Yii::app()->getBaseUrl(), '', $url);
		$url = str_replace(Yii::app()->params['clientFileBase'].'/', '', $url);
		$url = str_replace(Yii::app()->params['adminFileBase'].'/'	, '', $url);
		return Yii::app()->params['clientUrlPath'].$url;
	}
	public static function createAdminUrl($route,$params=array()){
		$url = Yii::app()->createUrl($route,$params);
		$url = str_replace(Yii::app()->getBaseUrl(), '', $url);
		$url = str_replace(Yii::app()->params['adminFileBase'].'/', '', $url);
		$url = str_replace(Yii::app()->params['adminFileBase'].'/'	, '', $url);
		return Yii::app()->params['adminUrlPath'].$url;
	}
}