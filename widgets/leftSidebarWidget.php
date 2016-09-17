<?php
namespace app\widgets;

use yii\base\Widget;
use app\models\Post;
use app\models\Comment;
use app\models\Reltag2post;
use app\models\Relclass2post;

class leftSidebarWidget extends Widget{
    public $post_count;
    public $comment_count;
    public $recent_posts;
    public $recent_comments;
    public $tags;
    public $classifications;

    public function init(){
        parent::init();

        $this->post_count = Post::getPostCount();
        $this->comment_count = Comment::getCommentCount();
        $this->recent_posts = Post::getRecentPosts();
        $this->recent_comments = Comment::getRecentComments();
        $this->tags = Reltag2post::getTagAndCount(3);
        $this->classifications = Relclass2post::getClassAndCount(3);
    }

    public function run(){
        return $this->render('leftSidebar',[
            'post_count' => $this->post_count,
            'comment_count' => $this->comment_count,
            'recent_posts' => $this->recent_posts,
            'recent_comments' => $this->recent_comments,
            'tags' => $this->tags,
            'classifications' => $this->classifications,
        ]);
    }

}