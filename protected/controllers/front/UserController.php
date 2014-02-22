<?php

class UserController extends FrontEndController
{
	public function actionIndex()
	{
		$this->render('user');
	}

	public function actionUserDashboard(){
		$this->render('user-dashboard');
	}
}