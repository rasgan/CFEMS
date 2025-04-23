<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "production_article".
 *
 * @property int $id
 * @property string $item_no
 * @property string|null $description
 */
class ProductionArticle extends \yii\db\ActiveRecord
{


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'production_article';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['description'], 'default', 'value' => null],
            [['item_no'], 'required'],
            [['description'], 'string'],
            [['item_no'], 'string', 'max' => 20],
            [['item_no'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'item_no' => Yii::t('app', 'Item No'),
            'description' => Yii::t('app', 'Description'),
        ];
    }

}
