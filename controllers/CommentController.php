<?php

namespace abdallah\comments\controllers;

use Yii;
use abdallah\comments\models\Comments;
use abdallah\comments\models\commentsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

/**
 * CommentController implements the CRUD actions for Comments model.
 */
class CommentController extends Controller
{

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['login', 'error', 'createajax'],
                        'allow' => true,
                    ],
                    [
                        'actions' => ['logout', 'index', 'create', 'update', 'delete', 'view'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                    'createajax' => ['POST', 'GET']
                ],
            ],
        ];
    }

    /**
     * Lists all Comments models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new commentsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Comments model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
                'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Comments model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Comments();


        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                    'model' => $model,
            ]);
        }
    }

    /**
     * Creates a new Comments model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreateajax()
    {

//        if (Yii::$app->request->isAjax) {
        $model = new Comments();
        Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $comment = Yii::$app->request->get('comments');

//        return $obj->auther;
//
        for ($i = 0; $i < count($comment); $i++) {
            $model->auther_taxonomy = $comment[$i]['auther'];
            $model->auther_id = Yii::$app->user->identity->id;
            $model->object_taxonomy = $comment[$i]['object'];
            $model->object_id = $comment[$i]['object_id'];
            $model->body = $comment[$i]['body'];
            $model->save();
        }
    }

    /**
     * Deletes an existing Comments model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Comments model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Comments the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Comments::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
