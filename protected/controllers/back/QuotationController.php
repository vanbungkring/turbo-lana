
<?php

class QuotationController extends BackEndController
{
    public function actionIndex()
    {
        $this->render('quotation');
    }

    public function actionCreate()
    {
        $model = new Quote('create');
        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);
        $member = Member::model()->findByPk(Yii::app()->user->id);
        if($member === null){
            throw new CHttpException(404,'Member Tidak Ditemukan.');
        }
        if(isset($_GET["idBanner"])){
            $model->bannerIds = (array)$_GET["idBanner"];
        }
        if(isset($_POST['Quote']))
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
        $this->render('index',array(
            'model'=>$model,
            'member'=>$member,
            'defLat'=>-6.17511, 
            'defLong'=>106.86503949999997,
            'defZoom'=>8,
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