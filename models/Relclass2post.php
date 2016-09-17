<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%blog_class_post}}".
 *
 * @property integer $id
 * @property integer $post_id
 * @property integer $class_id
 *
 * @property BlogClass $class
 * @property BlogPost $post
 */
class Relclass2post extends \yii\db\ActiveRecord
{

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%class_post}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['post_id', 'class_id'], 'required'],
            [['post_id', 'class_id'], 'integer'],
            [['class_id'], 'exist', 'skipOnError' => true, 'targetClass' => Classification::className(), 'targetAttribute' => ['class_id' => 'class_id']],
            [['post_id'], 'exist', 'skipOnError' => true, 'targetClass' => Post::className(), 'targetAttribute' => ['post_id' => 'post_id']],
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
            'class_id' => 'Class ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getClass()
    {
        return $this->hasOne(Classification::className(), ['class_id' => 'class_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPost()
    {
        return $this->hasOne(Post::className(), ['post_id' => 'post_id']);
    }

    public static function getClassAndCount($limit){
        if($limit!==0){
            //widget中使用
            $class_arr = Relclass2post::find()
                ->select(['count(*) as count','blog_class_post.class_id','blog_class.class_name'])
                ->leftJoin('blog_class','blog_class_post.class_id=blog_class.class_id')
                ->leftJoin('blog_post','blog_class_post.post_id=blog_post.post_id')
                ->where(['blog_post.post_status'=>1])
                ->groupBy(['class_id'])
                ->orderBy(['count'=>SORT_DESC])
                ->limit($limit)
                ->asArray()
                ->all();


            return $class_arr;
        }else{
            //PostController中使用
            $class_arr = Relclass2post::find()
                ->select(['count(*) as count','blog_class_post.class_id','blog_class.class_name'])
                ->leftJoin('blog_class','blog_class_post.class_id=blog_class.class_id')
                ->leftJoin('blog_post','blog_class_post.post_id=blog_post.post_id')
                ->where(['blog_post.post_status'=>1])
                ->groupBy(['class_id'])
                ->orderBy(['count'=>SORT_DESC])
                ->asArray()
                ->all();

            return $class_arr;
        }



    }
}
