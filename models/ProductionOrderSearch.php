<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\ProductionOrder;

/**
 * ProductionOrderSearch represents the model behind the search form of `app\models\ProductionOrder`.
 */
class ProductionOrderSearch extends ProductionOrder
{
    
    public $productionLine;
    public $productionArticle;
    
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['productionLine', 'productionArticle'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     * @param string|null $formName Form name to be used into `->load()` method.
     *
     * @return ActiveDataProvider
     */
    public function search($params, $formName = null)
    {
        $query = ProductionOrder::find();
        
        $query->joinWith(['productionLine', 'productionArticle']);


        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);
        
        $dataProvider->sort->attributes['productionLine'] = [
            // The tables are the ones our relation are configured to
            // in my case they are prefixed with "tbl_"
            'asc' => ['production_line.name' => SORT_ASC],
            'desc' => ['production_line.name' => SORT_DESC],
        ];
        
        $dataProvider->sort->attributes['productionArticle'] = [
            // The tables are the ones our relation are configured to
            // in my case they are prefixed with "tbl_"
            'asc' => ['production_article.item_no' => SORT_ASC],
            'desc' => ['production_article.item_no' => SORT_DESC],
        ];

        $this->load($params, $formName);
        
        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere(['like', 'production_line.name', $this->productionLine])
            ->andFilterWhere(['like', 'id', $this->id])
            ->andFilterWhere(['like', 'production_article.item_no', $this->productionArticle]);
        
                
                
//                [
//                    'id' => $this->id,
//                    'production_line.name' => $this->productionLine,
//                    'production_article_id' => $this->production_article_id,
//                ]
//                )
//                ->addFilterWhere(
//                    'like', 'prodcutionLine.name', $this-$this->productionLine
//                )
                ;
        

        return $dataProvider;
    }
}
