<?php

namespace app\models;

/**
 * This is the model class for table "admin".
 *
 * @property integer $user_id
 * @property string $user_login_name
 * @property string $user_password
 * @property string $user_last_login_time
 * @property string $user_auth_key
 * @property string $user_access_token
 * */


class User extends \yii\db\ActiveRecord implements \yii\web\IdentityInterface
{
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

    /**
     * @inheritdoc
     */
    public static function findIdentity($id)
    {
        return static::findOne($id);
        //return isset(self::$users[$id]) ? new static(self::$users[$id]) : null;
    }

    /**
     * @inheritdoc
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        return static::findOne(['user_access_token' => $token]);
        /*foreach (self::$users as $user) {
            if ($user['accessToken'] === $token) {
                return new static($user);
            }
        }

        return null;*/
    }

    /**
     * Finds user by username
     *
     * @param string $username
     * @return static|null
     */
    public static function findByUsername($username)
    {
        $user = User::find()
            ->where(['user_login_name' => $username])
            ->one();

        if($user){
            return new static($user);
        }
        return null;
    }

    /**
     * @inheritdoc
     */
    public function getId()
    {
        return $this->user_id;
    }

    /**
     * @inheritdoc
     */
    public function getAuthKey()
    {
        return $this->user_auth_key;
    }

    /**
     * @inheritdoc
     */
    public function validateAuthKey($authKey)
    {
        return $this->user_auth_key === $authKey;
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return boolean if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return $this->user_password === md5($password);

    }
}
