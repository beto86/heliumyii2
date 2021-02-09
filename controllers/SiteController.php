<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\FormularioDeRegistro;//crie para teste
use app\models\TbUsuario;
use yii\db\ActiveRecord;
use yii\db;
use app\models\Coletores;

class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            // @ authenticated users
            // ? guest users
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['login','index'],
                        'allow' => true,
                        'roles' => ['?'], 
                    ],
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'], //somente os que estiver acessados podem ver
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }
    
    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {

        return $this->render('home');
    }

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    { 


        //$TbUsuario = TbUsuario::find() ->where ('status' => true);
        //$usuario = TbUsuario::find()->orderBy('nome')->all();   
            //die($usuario);
        
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();//ele volta para ultima pagina visitada

        }
        
        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            //return $this->teste;
            return $this->goBack();
        }
        

        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }

    // DESTE PASSO EM DIANTE FOI CRIADO PARA TESTES E ESTUDOS

    public function actionCumprimentar($mensagem = 'Ola! Entrei no herbarium.') //criei para teste
    {
        return $this->render('cumprimentar', ['mensagem' => $mensagem]);
    }

    public function actionRegistro()//criei para teste
    {
        $model = new FormularioDeRegistro();
        if ($model->load(Yii::$app->request->post()) && $model->validate())
        {
        // dados ´avlidos recebidos no $model
        // ¸cfaa alguma coisa significativa com o $model aqui ...
            return $this->render('confirmar-registro', ['model' => $model]);
        } else {
        // Ou a ´apgina esta sendo exibida inicial ou houve algum erro de ¸c˜avalidao
            return $this->render('registro', ['model' => $model]);
        }
    }

    public static function teste(){
        /*$db = \Yii::$app->db;
        echo('<prev>');
        $users = $db->createCommand(sql "SELECT * FROM coletores")->queryOne();

        $var_dump();

        echo('<\prev>');*/


        // ´eobtm todas as linhas da tabela  e as ordena pela coluna "nome" 
        $coleta = Coletores::find()->orderBy('nome')->all(); 
        // ´eobtm a linha cuja chave ´aprimria ´e "BR" 
        $col = Coletores::findOne('BR'); 
        // exibe "Brasil" 
        echo $coletores->nome; 
        // altera o nome  para "Brazil" e o salva no banco de dados 
        $coletores->nome = 'Brazil'; 

        $coletores->save(); 
        echo ($coleta);
        return "lista de colaboradores";
    }

}
