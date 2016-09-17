<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%blog_tag}}".
 *
 * @property integer $tag_id
 * @property string $tag_name
 * @property string $tag_description
 * @property integer $post_count
 *
 * @property BlogPostTag[] $blogPostTags
 */
class Tag extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%tag}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['tag_name'], 'required'],
            [['tag_description'], 'string'],
            [['tag_name'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'tag_id' => 'Tag ID',
            'tag_name' => 'Tag Name',
            'tag_description' => 'Tag Description',
            'post_count' => 'Post Count',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBlogPostTags()
    {
        return $this->hasMany(Reltag2post::className(), ['tag_id' => 'tag_id']);
    }


}
