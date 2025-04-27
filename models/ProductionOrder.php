<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "production_order".
 *
 * @property int $id
 * @property int $production_line_id
 * @property int $production_article_id
 *
 * @property ProductionArticle $productionArticle
 * @property ProductionLine $productionLine
 */
class ProductionOrder extends \yii\db\ActiveRecord
{


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'production_order';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['production_line_id', 'production_article_id'], 'required'],
            [['production_line_id', 'production_article_id'], 'integer'],
            [['production_article_id'], 'exist', 'skipOnError' => true, 'targetClass' => ProductionArticle::class, 'targetAttribute' => ['production_article_id' => 'id']],
            [['production_line_id'], 'exist', 'skipOnError' => true, 'targetClass' => ProductionLine::class, 'targetAttribute' => ['production_line_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'production_line' => Yii::t('app', 'Production Line'),
            'production_article' => Yii::t('app', 'Production Article'),
        ];
    }

    /**
     * Gets query for [[ProductionArticle]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProductionArticle()
    {
        return $this->hasOne(ProductionArticle::class, ['id' => 'production_article_id']);
    }

    /**
     * Gets query for [[ProductionLine]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProductionLine()
    {
        return $this->hasOne(ProductionLine::class, ['id' => 'production_line_id']);
    }

}
