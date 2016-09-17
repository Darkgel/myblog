<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%blog_post}}".
 *
 * @property integer $post_id
 * @property string $post_create_date
 * @property string $post_modify_date
 * @property string $post_title
 * @property string $post_summary
 * @property string $post_content
 * @property integer $post_status
 * @property integer $post_comment_count
 * @property integer $post_read_count
 * @property integer $post_like_count
 * @property integer $post_hate_count
 *
 * @property BlogClassPost[] $blogClassPosts
 * @property BlogComment[] $blogComments
 * @property BlogPostTag[] $blogPostTags
 */
class Post extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%post}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['post_create_date', 'post_modify_date', 'post_title', 'post_summary', 'post_content'], 'required'],
            [['post_create_date', 'post_modify_date'], 'safe'],
            [['post_title', 'post_summary', 'post_content'], 'string'],
            [['post_status', 'post_comment_count', 'post_read_count', 'post_like_count', 'post_hate_count'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'post_id' => 'Post ID',
            'post_create_date' => 'Post Create Date',
            'post_modify_date' => 'Post Modify Date',
            'post_title' => 'Post Title',
            'post_summary' => 'Post Summary',
            'post_content' => 'Post Content',
            'post_status' => 'Post Status',
            'post_comment_count' => 'Post Comment Count',
            'post_read_count' => 'Post Read Count',
            'post_like_count' => 'Post Like Count',
            'post_hate_count' => 'Post Hate Count',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getClassifications()
    {
        $connection = Yii::$app->db;
        $sql = "(select class_name from `blog_class` where class_id in (select class_id from `blog_class_post` where post_id=:id))";
        $command = $connection->createCommand($sql,[':id'=>$this->post_id]);
        $classifications = $command->queryAll();
        return $classifications;
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getComments()
    {
        return $this->hasMany(Comment::className(), ['comment_post_id' => 'post_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTags()
    {
        $connection = Yii::$app->db;
        $sql = "(select tag_name from `blog_tag` where tag_id in (select tag_id from `blog_post_tag` where post_id=:id))";
        $command = $connection->createCommand($sql,[':id'=>$this->post_id]);
        $tags = $command->queryAll();
        return $tags;
    }

    public static function getPostCount(){
        return Post::find()
            ->where(['post_status'=>1])
            ->count();
    }

    public static function getRecentPosts(){
        return Post::find()
            ->select(['post_id','post_title'])
            ->where(['post_status'=>1,])
            ->orderBy(['post_modify_date'=>SORT_DESC])
            ->limit(5)
            ->all();
    }
}
