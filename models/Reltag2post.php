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
            [['post_id'], 'exist', 'skipOnError' => true, 'targetClass' => BlogPost::className(), 'targetAttribute' => ['post_id' => 'post_id']],
            [['tag_id'], 'exist', 'skipOnError' => true, 'targetClass' => BlogTag::className(), 'targetAttribute' => ['tag_id' => 'tag_id']],
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
        return $this->hasOne(BlogPost::className(), ['post_id' => 'post_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTag()
    {
        return $this->hasOne(BlogTag::className(), ['tag_id' => 'tag_id']);
    }
}
