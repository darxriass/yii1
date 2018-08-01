<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "news".
 *
 * @property int $id
 * @property string $title
 * @property string $description
 * @property string $datetime
 */
class News extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'news';
    }

    public $verifyCode;
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        if (Yii::$app->user->isGuest) {
            return [
            [['title', 'description', 'datetime','nickname',], 'required'],
            [['description'], 'string'],
            [['datetime'], 'safe'],
            [['title'], 'string', 'max' => 255],
            [['author'], 'integer', 'max' => 255],
            [['nickname'], 'string', 'max' => 50],
            [['parent'], 'integer', 'max' => 255],
            ['verifyCode', 'captcha','captchaAction'=>'news/captcha'],
        ];} else {
            return [
                [['title', 'description', 'datetime',], 'required'],
                [['description'], 'string'],
                [['datetime'], 'safe'],
                [['title'], 'string', 'max' => 255],
                [['author'], 'integer', 'max' => 255],
                [['nickname'], 'string', 'max' => 50],
                [['parent'], 'integer', 'max' => 255],
            ];
        };

    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Заголовок',
            'description' => 'Текст',
            'datetime' => 'Создано',
            'author' => 'Автор',
            'nickname' => 'Никнейм'
        ];
    }

    public function getAuthors()
    {
        // комментарий принадлежит одному пользователю
        return $this->hasOne(User::className(), ['id' => 'author']);
    }
}

class UserSearch extends User
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user';
    }




}

