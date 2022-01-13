<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "instagram_settings".
 *
 * @property int $id
 * @property string|null $user
 * @property int|null $count_posts
 */
class InstagramSettings extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'instagram_settings';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['count_posts', 'user'], 'required'],
            [['count_posts'], 'integer'],
            [['user'], 'string', 'max' => 128],
            ['user', 'match', 'pattern' => '/[a-z]\w*$/i', 'message' => 'Введите валидный профиль'],
            ['count_posts', 'in', 'range' => [5, 10, 15], 'message' => 'Значение может быть только 5, 10, 15']
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user' => 'Профиль инстаграм',
            'count_posts' => 'Количество постов',
        ];
    }

}
