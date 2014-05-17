<?php
class FrontEndController extends CController
{
    const TYPE_DASBOARD = 81;
    const TYPE_PROFILE = 82;
    const TYPE_BOOKMARK = 83;
    const TYPE_HISTORY = 84;
    const TYPE_QUOTES = 85;
    const TYPE_CAMPAIGN = 86;

    public $activeType = null;

    public $layout='none';
    public $menu=array();
    public $breadcrumbs=array();
    public $setting = null;
    public $memberModel;
 
    public function filters()
    {
        return array(
            'accessControl',
        );
    }
 
    public function accessRules()
    {
        return array(
            array('allow',
                'users'=>array('*'),
            ),
        );
    }

    public function render($view,$data=null,$return=false){
        if($data===null){
            $data = array();
        }
        
        $data['register'] = new Member('register');

        parent::render($view,$data,$return);
    }

    protected function beforeAction($action)
    {
        $this->setting = Setting::model()->find('active=1');
        if($this->setting == null){
            throw new Exception("Setting Not Found", 1);
        }
        $this->pageTitle = $this->setting->judul;
        Yii::app()->clientScript->registerMetaTag($this->setting->meta_desc, 'description',null,null,'description');
        Yii::app()->clientScript->registerMetaTag($this->setting->meta_keyword, 'keywords',null,null,'keywords');
        if(isset($_POST['ajax'])) {
          if ($_POST['ajax']=='form-signin') {
            $register = new Member('register');
            echo CActiveForm::validate($register);
          }
          Yii::app()->end();
        }
        
        if(!Yii::app()->user->isGuest){
            $this->memberModel = Member::model()->findByPk(Yii::app()->user->id);
            if($this->memberModel == null){
                $this->redirect(array('/site/logout'));
            }
        }
        return true;
    }
}