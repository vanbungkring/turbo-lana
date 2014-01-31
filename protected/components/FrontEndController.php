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
}