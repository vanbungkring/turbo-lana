<?php
class FrontEndController extends CController
{
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
        if(isset($_POST['Member'])){
            $member = new Member('register');
            $member->attributes = $_POST['Member'];
            $member->save();
            $this->redirect(Yii::app()->request->urlReferrer); 
        }
        if(!Yii::app()->user->isGuest){
            $this->memberModel = Member::model()->findByPk(Yii::app()->user->id);
        }
        return true;
    }
}