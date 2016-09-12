<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%blog_comment}}".
 *
 * @property integer $comment_id
 * @property integer $comment_post_id
 * @property string $comment_author_name
 * @property string $comment_author_email
 * @property string $comment_content
 * @property string $comment_date
 * @property integer $comment_after
 * @property integer $comment_replyto_id
 * @property string $comment_replyto_author
 *
 * @property Comment $commentAfter
 * @property Comment[] $comments
 * @property Comment $commentReplyto
 * @property Comment[] $comments0
 * @property Comment $commentReplytoAuthor
 * @property Comment[] $comments1
 * @property BlogPost $commentPost
 */
class Comment extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%comment}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['comment_post_id', 'comment_author_name', 'comment_content', 'comment_date'], 'required'],
            [['comment_post_id', 'comment_after', 'comment_replyto_id'], 'integer'],
            [['comment_content'], 'string'],
            [['comment_date'], 'safe'],
            [['comment_author_name', 'comment_replyto_author'], 'string', 'max' => 128],
            [['comment_author_email'], 'string', 'max' => 100],
            [['comment_after'], 'exist', 'skipOnError' => true, 'targetClass' => Comment::className(), 'targetAttribute' => ['comment_after' => 'comment_id']],
            [['comment_replyto_id'], 'exist', 'skipOnError' => true, 'targetClass' => Comment::className(), 'targetAttribute' => ['comment_replyto_id' => 'comment_id']],
            [['comment_replyto_author'], 'exist', 'skipOnError' => true, 'targetClass' => Comment::className(), 'targetAttribute' => ['comment_replyto_author' => 'comment_author_name']],
            [['comment_post_id'], 'exist', 'skipOnError' => true, 'targetClass' => Post::className(), 'targetAttribute' => ['comment_post_id' => 'post_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'comment_id' => 'Comment ID',
            'comment_post_id' => 'Comment Post ID',
            'comment_author_name' => 'Comment Author Name',
            'comment_author_email' => 'Comment Author Email',
            'comment_content' => 'Comment Content',
            'comment_date' => 'Comment Date',
            'comment_after' => 'Comment After',
            'comment_replyto_id' => 'Comment Replyto ID',
            'comment_replyto_author' => 'Comment Replyto Author',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCommentAfter()
    {
        return $this->hasOne(Comment::className(), ['comment_id' => 'comment_after']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getComments()
    {
        return $this->hasMany(Comment::className(), ['comment_after' => 'comment_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCommentReplyto()
    {
        return $this->hasOne(Comment::className(), ['comment_id' => 'comment_replyto_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getComments0()
    {
        return $this->hasMany(Comment::className(), ['comment_replyto_id' => 'comment_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCommentReplytoAuthor()
    {
        return $this->hasOne(Comment::className(), ['comment_author_name' => 'comment_replyto_author']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getComments1()
    {
        return $this->hasMany(Comment::className(), ['comment_replyto_author' => 'comment_author_name']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCommentPost()
    {
        return $this->hasOne(Post::className(), ['post_id' => 'comment_post_id']);
    }
}
