<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "admin".
 *
 * @property integer $user_id
 * @property string $user_login_name
 * @property string $user_password
 * @property string $user_last_login_time
 * @property string $user_auth_key
 * @property string $user_access_token
 */
class Admin extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'admin';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_login_name', 'user_password', 'user_last_login_time', 'user_auth_key', 'user_access_token'], 'required'],
            [['user_last_login_time'], 'safe'],
            [['user_login_name', 'user_auth_key', 'user_access_token'], 'string', 'max' => 128],
            [['user_password'], 'string', 'max' => 32],
            [['user_login_name'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'user_id' => 'User ID',
            'user_login_name' => 'User Login Name',
            'user_password' => 'User Password',
            'user_last_login_time' => 'User Last Login Time',
            'user_auth_key' => 'User Auth Key',
            'user_access_token' => 'User Access Token',
        ];
    }
}
