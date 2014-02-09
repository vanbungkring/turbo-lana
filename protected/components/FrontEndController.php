<?php
class FrontEndController extends CController
{
    public $layout='none';
    public $menu=array();
    public $breadcrumbs=array();
 
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
        return true;
    }
}