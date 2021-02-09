<?php

namespace app\controllers;

use Yii;
use app\models\Coletas;
use app\models\ColetasSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ColetasController implements the CRUD actions for Coletas model.
 */
class ColetasController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [ //acessa somente quem esta logado em Listar Coletores e Cadastrar Coletores
               'class' => \yii\filters\AccessControl::className(),
               'only' => ['index','create', 'update'],
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
     * Lists all Coletas models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ColetasSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Coletas model.
     * @param integer $id
     * @param string $catalago
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id, $catalago)
    {
        return $this->render('view', [
            'model' => $this->findModel($id, $catalago),
        ]);
    }

    /**
     * Creates a new Coletas model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Coletas();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id, 'catalago' => $model->catalago]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Coletas model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @param string $catalago
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id, $catalago)
    {
        $model = $this->findModel($id, $catalago);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id, 'catalago' => $model->catalago]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Coletas model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @param string $catalago
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id, $catalago)
    {
        $this->findModel($id, $catalago)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Coletas model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @param string $catalago
     * @return Coletas the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id, $catalago)
    {
        if (($model = Coletas::findOne(['id' => $id, 'catalago' => $catalago])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
