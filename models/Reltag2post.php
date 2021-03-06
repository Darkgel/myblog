<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%blog_post_tag}}".
 *
 * @property integer $id
 * @property integer $post_id
 * @property integer $tag_id
 *
 * @property BlogPost $post
 * @property BlogTag $tag
 */
class Reltag2post extends \yii\db\ActiveRecord
{

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%post_tag}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['post_id', 'tag_id'], 'required'],
            [['post_id', 'tag_id'], 'integer'],
            [['post_id'], 'exist', 'skipOnError' => true, 'targetClass' => Post::className(), 'targetAttribute' => ['post_id' => 'post_id']],
            [['tag_id'], 'exist', 'skipOnError' => true, 'targetClass' => Tag::className(), 'targetAttribute' => ['tag_id' => 'tag_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'post_id' => 'Post ID',
            'tag_id' => 'Tag ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPost()
    {
        return $this->hasOne(Post::className(), ['post_id' => 'post_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTag()
    {
        return $this->hasOne(Tag::className(), ['tag_id' => 'tag_id']);
    }

    public static function getTagAndCount($limit){
        if($limit!==0){
            //widget中使用
            $tag_arr = Reltag2post::find()
                ->select(['count(*) as count','blog_post_tag.tag_id','blog_tag.tag_name'])
                ->leftJoin('blog_tag','blog_post_tag.tag_id=blog_tag.tag_id')
                ->leftJoin('blog_post','blog_post_tag.post_id=blog_post.post_id')
                ->where(['blog_post.post_status'=>1])
                ->groupBy(['blog_post_tag.tag_id'])
                ->orderBy(['count'=>SORT_DESC])
                ->limit($limit)
                ->asArray()
                ->all();

            return $tag_arr;
        }else{
            //PostController中使用
            $tag_arr = Reltag2post::find()
                ->select(['count(*) as count','blog_post_tag.tag_id','blog_tag.tag_name'])
                ->leftJoin('blog_tag','blog_post_tag.tag_id=blog_tag.tag_id')
                ->leftJoin('blog_post','blog_post_tag.post_id=blog_post.post_id')
                ->where(['blog_post.post_status'=>1])
                ->groupBy(['blog_post_tag.tag_id'])
                ->orderBy(['count'=>SORT_DESC])
                ->asArray()
                ->all();

            return $tag_arr;
        }

    }
}
