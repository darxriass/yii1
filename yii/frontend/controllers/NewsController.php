<?php

namespace frontend\controllers;

use common\models\UserSearch;
use Yii;
use common\models\News;
use common\models\User;
use common\models\NewsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * NewsController implements the CRUD actions for News model.
 */
class NewsController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all News models.
     * @return mixed
     */
    public function actionIndex()
    {

        $searchModel = new NewsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->query->andWhere(['parent'=>null]);
        $dataProvider->query->orderBy(['id'=>SORT_DESC]);
        $dataProvider->pagination->pageSize = Yii::$app->params['paginations'];


        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }


    /**
     * Displays a single News model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        //return $this->render('view', [
        //    'model' => $this->findModel($id),
        //]);

        $searchModel = new NewsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        //$dataProvider->query->andWhere(['id'=>$id]);
        $dataProvider->query->orWhere(['parent'=>$id]);
        $dataProvider->query->orderBy(['id'=>SORT_ASC]);
        $dataProvider->pagination->pageSize = Yii::$app->params['paginations'];


        return $this->render('view', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'model' => $this->findModel($id),
        ]);
    }







    /**
     * Creates a new News model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */


    public function actions()
    {
        return [
            // ...
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }


    public function actionCreate()
    {
        $model = new News();
        //если пришли данные от кнопки то выполняем действия по заполнению базы, иначе обновлем форму
        if ($model->load(Yii::$app->request->post())) {
            //автоматом подставляем дату
            $model->setAttribute("datetime", date("Y-m-d H:i:s"));
            //если авторизован то подставляем ид, если нет то null
            if (Yii::$app->user->id) {
                $model->setAttribute("author", Yii::$app->user->id);
            } else {
                $model->setAttribute("author", null);
            }
            //если удалось сохранить редиректим на  view иначе обновлем форму
            if ($model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            }

            if (Yii::$app->user->id) {
                return $this->render('create', ['model' => $model,]);
            } else {
                return $this->render('createCapcha', ['model' => $model,]);
                // редиректим на форму с капчей
            }

        }
        if (Yii::$app->user->id) {
            return $this->render('create', ['model' => $model,]);
        } else {
            return $this->render('createCapcha', ['model' => $model,]);
            // редиректим на форму с капчей
        }
    }


    public function actionCreatecomment($idc)
    {
        $model = new News();
        //если пришли данные от кнопки то выполняем действия по заполнению базы, иначе обновлем форму
        if ($model->load(Yii::$app->request->post())) {
            //автоматом подставляем дату
            $model->setAttribute("title", 'Комментарий');
            $model->setAttribute("datetime", date("Y-m-d H:i:s"));
            $model->setAttribute("parent", $idc);
            //если авторизован то подставляем ид, если нет то null
            if (Yii::$app->user->id) {
                $model->setAttribute("author", Yii::$app->user->id);
            } else {
                $model->setAttribute("author", null);
            }
            //если удалось сохранить редиректим на  view иначе обновлем форму
            if ($model->save()) {
                return $this->redirect(['view', 'id' => $idc]);
            }

            if (Yii::$app->user->id) {
                return $this->render('createComment', ['model' => $model,]);
            } else {
                return $this->render('createCapchaComment', ['model' => $model,]);
                // редиректим на форму с капчей
            }

        }
        if (Yii::$app->user->id) {
            return $this->render('createComment', ['model' => $model,]);
        } else {
            return $this->render('createCapchaComment', ['model' => $model,]);
            // редиректим на форму с капчей
        }
    }


    /**
     * Updates an existing News model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public
    function actionUpdate($id)
    {
        $model = $this->findModel($id);
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            if (Yii::$app->user->id !== null) {
                $model->setAttribute("author", Yii::$app->user->identity->id);
            } else {
                $model->setAttribute("author", null);
            }
            $model->setAttribute("datetime", date("Y-m-d H:i:s"));
            $model->save();
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);


    }

    /**
     * Deletes an existing News model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public
    function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the News model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return News the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected
    function findModel($id)
    {
        if (($model = News::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    protected
    function findName($id)
    {
        if ($id === null) {
            if (($model1 = UserSearch::findOne($id)) !== null) {
                return $model1;
            }
        } else {
            $model1 = new UserSearch();
            $model1->setAttribute("id", 5);
            $model1->setAttribute("username", "Guest");
            return $model1;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
