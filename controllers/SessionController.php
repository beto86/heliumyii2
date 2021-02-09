<?php

namespace app\controllers;

use Yii;
use app\models\TbTipoUsuario;
use app\models\TbTipoUsuarioSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * 
 */
class SessionController extends Controller
{
	public function actionIndex($var){
		$session = Yii::$app->session;
		$session['login'] = $var;
	}

	public function actionTest(){
		$session = Yii::$app->session;
		$session->get('login');
	}
}

