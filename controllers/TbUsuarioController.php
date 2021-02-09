<?php

namespace app\controllers;



use Yii;
use app\models\TbUsuario;
use app\models\TbUsuarioSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\db\Query;
use  yii\web\Session;

/**
 * TbUsuarioController implements the CRUD actions for TbUsuario model.
 */
class TbUsuarioController extends Controller
{
    /**
     * {@inheritdoc}
     */

    public function behaviors()
    {
        return [
            'access' => [ //acessa somente quem esta logado em Listar usuarios e Cadastrar Usuario
               'class' => \yii\filters\AccessControl::className(),
               'only' => ['index','create','update'],
               'rules' => [
                   // deny all POST requests
                   [
                       'allow' => true,
                       'verbs' => ['POST']
                   ],
                   // allow authenticated users
                   [
                       'allow' => true,
                       'roles' => ['@'],
                   ],
                   // everything else is denied
               ],
           ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all TbUsuario models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new TbUsuarioSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
            
            $session = Yii::$app->session;
            $session->open();
            $var = $session->get('permiso');

            if ($var == 'Roberto') {
                return $this->render('index', [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
            ]);
            } else {
                echo "<a href='http://localhost/heliumyii2/web/index.php/'>Home Page</a> <br/><br/>";
                die( $session['permiso'] . ' precisa ser Adiministrador para acessar!!');
                echo "<a href='/site/index'>Home Page</a>"; 
            }
            $session->close();
        
    }

    /**
     * Displays a single TbUsuario model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new TbUsuario model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new TbUsuario();

        
        $session = Yii::$app->session;
        $session->open();
        $var = $session->get('permiso');
        if ($var == 'Roberto') {
            if ($model->load(Yii::$app->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            }

            return $this->render('create', [
                'model' => $model,
            ]);

        } else {
            echo "<a href='http://localhost/heliumyii2/web/index.php/'>Home Page</a> <br/><br/>";
            die($session['permiso'] . ' precisa ser Adiministrador para acessar!!');
        }
        $session->close();

    }

    /**
     * Updates an existing TbUsuario model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing TbUsuario model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the TbUsuario model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return TbUsuario the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = TbUsuario::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

}
