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
}
