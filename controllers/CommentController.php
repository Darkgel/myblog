<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\Comment;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

class CommentController extends Controller{

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

    public function loadDataFromPost($comment,$post_id){
        $comment->comment_content = $_POST['comment_content'];
        $comment->comment_author_name = $_POST['comment_author_name'];
        $comment->comment_author_email = $_POST['comment_author_email'];
        $comment->comment_date = date('Y-m-d H:i:s');
        $comment->comment_post_id = $post_id;
    }

    public function actionCreate(){
        $post_id = $_GET['post_id'];
        $comment = new Comment();

        $this->loadDataFromPost($comment,$post_id);
        if($comment->save()){
            $comment->comment_after = $comment->comment_id;
            if($comment->save()){
                return $this->redirect(['post/view', 'id' => $post_id]);
            }
        }


    }

    protected function findModel($id)
    {
        if (($model = Comment::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}