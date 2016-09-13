<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%class}}".
 *
 * @property integer $class_id
 * @property string $class_name
 * @property string $class_description
 * @property integer $post_count
 *
 * @property BlogClassPost[] $blogClassPosts
 */
class Classification extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%class}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['class_name'], 'required'],
            [['class_description'], 'string'],
            [['class_name'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'class_id' => 'Class ID',
            'class_name' => 'Class Name',
            'class_description' => 'Class Description',
            'post_count' => 'Post Count',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBlogClassPosts()
    {
        return $this->hasMany(Relclass2post::className(), ['class_id' => 'class_id']);
    }
}
