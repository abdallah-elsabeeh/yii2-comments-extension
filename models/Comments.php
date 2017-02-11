<?php

namespace abdallah\comments\models;

use Yii;

/**
 * This is the model class for table "{{%comments}}".
 *
 * @property integer $id
 * @property string $body
 * @property string $status_code
 * @property string $auther_taxonomy
 * @property integer $auther_id
 * @property string $object_taxonomy
 * @property integer $object_id
 * @property integer $reply_on
 * @property integer $updated_at
 * @property integer $created_at
 */
class Comments extends \yii\db\ActiveRecord
{

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%comments}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
                [['body'], 'string'],
                [['auther_id', 'object_id', 'reply_on', 'updated_at', 'created_at'], 'integer'],
                [['status_code', 'auther_taxonomy', 'object_taxonomy'], 'string', 'max' => 10],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'body' => Yii::t('app', 'Body'),
            'status_code' => Yii::t('app', 'Status Code'),
            'auther_taxonomy' => Yii::t('app', 'Auther Taxonomy'),
            'auther_id' => Yii::t('app', 'Auther ID'),
            'object_taxonomy' => Yii::t('app', 'Object Taxonomy'),
            'object_id' => Yii::t('app', 'Object ID'),
            'reply_on' => Yii::t('app', 'Reply On'),
            'updated_at' => Yii::t('app', 'Updated At'),
            'created_at' => Yii::t('app', 'Created At'),
        ];
    }

    /**
     * @inheritdoc
     * @return CommentsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new CommentsQuery(get_called_class());
    }

    /**
     * @inheritdoc
     * @return CommentsQuery the active query used by this AR class.
     */
    public static function getChild()
    {
        Comments::findAll(['reply_on' => $this->id]);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAuther()
    {
        return $this->hasOne(User::className(), ['id' => 'auther_id']);
    }
}
