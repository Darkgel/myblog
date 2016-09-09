<?php
namespace app\controllers;

use Yii;
use app\models\Post;
use app\models\Comment;
use yii\filters\VerbFilter;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\data\Pagination;

class PostController extends Controller
{

    public $layout = 'bloglayout.php';

    public function behaviors(){
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    public function actionIndex(){
        $query = Post::find();
        $pagination = new Pagination([
            'defaultPageSize' => 9,
            'totalCount' => $query->count(),
        ]);

        $posts = $query->select(['post_id','post_title','post_summary','post_modify_date','post_read_count','post_comment_count'])
            ->where(['post_status'=>1])
            ->orderBy(['post_modify_date'=>SORT_DESC])
            ->offset($pagination->offset)
            ->limit($pagination->limit)
            ->all();

        return $this->render('index',[
            'posts'=>$posts,
            'pagination'=>$pagination,
        ]);
    }

    public function actionView(){
        $id = $_GET['id'];
        $query = Post::find();
        $post = $query
            ->where(['post_id'=>$id,'post_status'=>1])
            ->one();

        //get the pre and next post
        $connection = Yii::$app->db;
        $sql = "(select post_id,post_title from blog_post where post_id < :id and post_status=1 order by post_id desc limit 1) union all (select post_id,post_title from blog_post where post_id > :id and post_status=1 order by post_id asc limit 1)";
        $command = $connection->createCommand($sql,[':id'=>$id]);
        $preAndnext = $command->queryAll();

        if(($post !== null)){
            $comments = Comment::find()
                ->where(['comment_post_id'=>$id])
                ->orderBy(['comment_id'=>SORT_ASC])
                ->asArray()
                ->all();

//            echo "<pre>";
//            var_dump($comments);
//            echo "</pre>";
//            exit();
            $comment_group = [];
            foreach($comments as $comment){
                $comment_group[$comment['comment_after']][] = $comment;
            }

            //post_read_count+1
            $post->post_read_count+=1;
            if($post->save()){
                return $this->render('view',[
                    'post'=>$post,
                    'preAndnext'=>$preAndnext,
                    'comment_group' => $comment_group,
                ]);
            }

        }else{
            throw new NotFoundHttpException('The request page does not exist.');
        }
    }

    public function actionCreate(){

    }

    public function actionUpdate(){

    }

    public function actionDelete(){

    }

    public function actionVote(){
        $id = $_GET['id'];
        $post = $this->findModel($id);
        //$post = Post::findOne($id);

        $vote = $_GET['vote'];
        if($vote==1){
            $post->post_like_count += 1;
            if($post->save()){
                return 'success';
            }else{
                return 'fail';
            }
        }else{
            $post->post_hate_count += 1;
            if($post->save()){
                return 'success';
            }else{
                return 'fail';
            }
        }
    }

    protected function findModel($id){
        if(($model = Post::findOne($id)) !== null){
            return $model;
        }else{
            throw new NotFoundHttpException('The request page does not exist.');
        }
    }

    public function actionTest(){
        echo "suc";
    }
}







