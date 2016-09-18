<?php
namespace app\controllers;

use Yii;
use app\models\Post;
use app\models\Comment;
use app\models\Tag;
use app\models\Reltag2post;
use app\models\Classification;
use app\models\Relclass2post;
use yii\filters\VerbFilter;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\ServerErrorHttpException;
use yii\data\Pagination;

class PostController extends Controller
{

    public $layout = 'bloglayout.php';

    public function behaviors(){
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    //'delete' => ['POST'],
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

    public function actionView($id){
        //$id = isset($post_id) ? $post_id : $_GET['id'];
        $query = Post::find();
        $post = $query
            ->where(['post_id'=>$id])
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

    protected function loadDataFromPost($post){
        $post->load(Yii::$app->request->post());
        $post->post_status = $_GET['status'];
        $post->post_create_date = date('Y-m-d H:i:s');
        $post->post_modify_date = date('Y-m-d H:i:s');
        $post->post_comment_count = 0;
        $post->post_read_count = 0;
        $post->post_like_count = 0;
        $post->post_hate_count = 0;
    }

    public function actionCreate(){
        $post = new Post();

        if(isset($_GET['status'])){
//            echo $_GET['status'];
//            exit();
            $this->loadDataFromPost($post);

            if($post->save()){
                if(!empty($_POST['post_tags'])){
                    $post_tags_arr = explode(',',$_POST['post_tags']);
                    $tag_model = new Tag();
                    $rel_tag_post = new Reltag2post();
                    foreach($post_tags_arr as $tag_str){
                        if(($tag=Tag::findOne(['tag_name'=>$tag_str]))!==null){
                            $_rel_tag_post = clone $rel_tag_post;
                            $_rel_tag_post->post_id = $post->post_id;
                            $_rel_tag_post->tag_id = $tag->tag_id;
                            if(!$_rel_tag_post->save()){
                                throw new ServerErrorHttpException('Fail to create tag.');
                            }
                        }else{
                            $tag = clone $tag_model;
                            $tag->tag_name = $tag_str;
                            $tag->save();
                            $_rel_tag_post = clone $rel_tag_post;
                            $_rel_tag_post->post_id = $post->post_id;
                            $_rel_tag_post->tag_id = $tag->tag_id;
                            if(!$_rel_tag_post->save()){
                                throw new ServerErrorHttpException('Fail to create tag-post-relationship.');
                            }
                        }

                    }
                }
                if(!empty($_POST['post_class'])){
                    $post_class_arr = explode(',',$_POST['post_class']);
                    $class_model = new Classification();
                    $rel_class_post = new Relclass2post();
                    foreach($post_class_arr as $class_str){
                        if(($classification=Classification::findOne(['class_name'=>$class_str]))!==null){
                            $_rel_class_post = clone $rel_class_post;
                            $_rel_class_post->post_id = $post->post_id;
                            $_rel_class_post->class_id = $classification->class_id;
                            if($_rel_class_post->save()){
                                //error
                            }
                        }else{
                            $classification = clone $class_model;
                            $classification->class_name = $class_str;
                            if(!$classification->save()){
                                throw new ServerErrorHttpException('Fail to create classification.');
                            };
                            $_rel_class_post = clone $rel_class_post;
                            $_rel_class_post->post_id = $post->post_id;
                            $_rel_class_post->class_id = $classification->class_id;
                            if(!$_rel_class_post->save()){
                                throw new ServerErrorHttpException('Fail to create class-post-relationship.');
                            }
                        }

                    }
                }else{
                    $rel_class_post = new Relclass2post();
                    $rel_class_post->post_id = $post->post_id;
                    $rel_class_post->class_id = 1;
                    if(!$rel_class_post->save()){
                        throw new ServerErrorHttpException('Fail to create class-post-relationship.');
                    }

                }
                return $this->actionIndex();
            }
        }else{
            return $this->render('create',['post'=>$post]);
        }


    }

    protected function UpdateDataFromPost($post){
        $post->load(Yii::$app->request->post());
        $post->post_status = $_GET['status'];
        $post->post_modify_date = date('Y-m-d H:i:s');

    }

    public function actionUpdate(){
        $post = Post::findOne(['post_id'=>$_GET['id']]);
        if(isset($_GET['status'])){
            $this->UpdateDataFromPost($post);
            if($post->save()){
                return $this->actionView($post->post_id);
            }
        }else{
            return $this->render('update',['post'=>$post]);
        }

    }

    public function actionDelete($id){
        $post = Post::findOne(['post_id'=>$id]);
        if($post->delete()){
            return 1;
        }else{
            return 0;
        }
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

    public function actionIndexWithTags($tag_id){
        if($tag_id==0){
            $tag_arr = Reltag2post::getTagAndCount(0);

            return $this->render('allTagsAndCount',['tag_arr'=>$tag_arr]);

        }else{
            $tag = Tag::find()->where(['tag_id'=>$tag_id])->one();
            $query = Reltag2post::find();

            $pagination = new Pagination([
                'defaultPageSize' => 8,
                'totalCount' => $query->count(),
            ]);

            $posts = $query->select(['blog_post.post_id','blog_post.post_title','blog_post.post_summary','blog_post.post_modify_date','blog_post.post_read_count','blog_post.post_comment_count'])
                ->leftJoin('blog_post','blog_post_tag.post_id=blog_post.post_id')
                //->leftJoin('blog_tag','blog_post_tag.tag_id=blog_tag.tag_id')
                ->where(['blog_post_tag.tag_id'=>$tag_id,'blog_post.post_status'=>1])
                ->orderBy(['blog_post.post_modify_date'=>SORT_DESC])
                ->offset($pagination->offset)
                ->limit($pagination->limit)
                ->asArray()
                ->all();

            return $this->render('indexWithTags',[
                'tag' => $tag,
                'posts'=>$posts,
                'pagination'=>$pagination,
            ]);

        }
    }

    public function actionIndexWithClass($class_id){
        if($class_id==0){
            $class_arr = Relclass2post::getClassAndCount(0);

            return $this->render('allClassAndCount',['class_arr'=>$class_arr]);

        }else{
            $classification = Classification::find()->where(['class_id'=>$class_id])->one();
            $query = Relclass2post::find();

            $pagination = new Pagination([
                'defaultPageSize' => 8,
                'totalCount' => $query->count(),
            ]);

            $posts = $query->select(['blog_post.post_id','blog_post.post_title','blog_post.post_summary','blog_post.post_modify_date','blog_post.post_read_count','blog_post.post_comment_count'])
                ->leftJoin('blog_post','blog_class_post.post_id=blog_post.post_id')
                ->where(['blog_class_post.class_id'=>$class_id,'blog_post.post_status'=>1])
                ->orderBy(['blog_post.post_modify_date'=>SORT_DESC])
                ->offset($pagination->offset)
                ->limit($pagination->limit)
                ->asArray()
                ->all();


            return $this->render('indexWithClass',[
                'classification'=>$classification,
                'posts'=>$posts,
                'pagination'=>$pagination,
            ]);
        }
    }

    public function actionDraft(){
        $query = Post::find();
        $pagination = new Pagination([
            'defaultPageSize' => 9,
            'totalCount' => $query->count(),
        ]);

        $posts = $query->select(['post_id','post_title','post_summary','post_modify_date','post_read_count','post_comment_count'])
            ->where(['post_status'=>0])
            ->orderBy(['post_modify_date'=>SORT_DESC])
            ->offset($pagination->offset)
            ->limit($pagination->limit)
            ->all();

        return $this->render('draft',[
            'posts'=>$posts,
            'pagination'=>$pagination,
        ]);


    }
}







