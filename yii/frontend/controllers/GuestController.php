<?php

namespace frontend\controllers;

use common\models\News;
use common\models\ImageUpload;
use common\models\NewsSearch;
use Yii;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use frontend\models\ContactForm;
use yii\web\NotFoundHttpException;
use yii\web\UploadedFile;

/**
 * Site controller
 */
class GuestController extends Controller
{
    public function actionIndex()
    {
        $searchModel = new NewsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->query->andWhere(['parent' => null]);
        $dataProvider->query->orderBy(['id' => SORT_DESC]);
        $dataProvider->pagination->pageSize = Yii::$app->params['paginations'];


        return $this->render('guestAll', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }


    public function actionOne($id)
    {

        $searchModel = new NewsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        //$dataProvider->query->andWhere(['id'=>$id]);
        $dataProvider->query->orWhere(['parent' => $id]);
        $dataProvider->query->orderBy(['id' => SORT_ASC]);
        $dataProvider->pagination->pageSize = Yii::$app->params['paginations'];


        If ($newsso = News::find()->andWhere(['id' => $id])->one()) {
            if (Yii::$app->user->isGuest) {
                return $this->render('guestOne', [
                    'newsso' => $newsso,
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
                ]);
            } else {
                return $this->render('guestOneAuth', [
                    'newsso' => $newsso,
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,

                ]);
            }
        }
        throw new NotFoundHttpException('dfhgndgndtgnn');
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
                return $this->redirect(['one', 'id' => $model->id]);
            }
            if (Yii::$app->user->id) {
                return $this->render('guestCreate', ['model' => $model,]);
            } else {
                return $this->render('guestCreate', ['model' => $model,]);
                // редиректим на форму с капчей
            }

        }
        if (Yii::$app->user->id) {
            return $this->render('guestCreate', ['model' => $model,]);
        } else {
            return $this->render('guestCreate', ['model' => $model,]);
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
                return $this->redirect(['one', 'id' => $idc]);
            }

            return $this->render('guestCreatecomment', ['model' => $model,]);
        }
        return $this->render('guestCreatecomment', ['model' => $model,]);
    }


    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }



    public function actionUpload()
    {
        $model = new ImageUpload();
        if(Yii::$app->request->isPost){
            $model->image = UploadedFile::getInstance($model, 'image');
            $model->upload();
            return $this->render('upload', ['model' => $model]);
        }
        return $this->render('upload', ['model' => $model]);
    }


    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            // тут добить базу и добавить поле отредактировано
            // if (Yii::$app->user->id !== null) {
            //     $model->setAttribute("author", Yii::$app->user->identity->id);
            // } else {
            //     $model->setAttribute("author", null);
            // }
            // $model->setAttribute("datetime", date("Y-m-d H:i:s"));
            $model->save();
            return $this->redirect(['one', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);


    }

    protected
    function findModel($id)
    {
        if (($model = News::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }


}

