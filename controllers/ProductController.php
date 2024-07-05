<?php

namespace app\controllers;

use app\models\form\ProductForm;
use app\models\Product;
use Yii;
use yii\data\ActiveDataProvider;
use yii\db\Exception;
use yii\rest\Serializer;

class ProductController extends Controller
{

    public function actionUpdate($id)
    {
        $product = Product::find()->where(["id" => $id])->one();
        if (!$product) {
            return $this->json(false, [], "Product not found", 404);
        }
        $product->load(Yii::$app->request->post());
        if (!$product->validate() || !$product->save()) {
            return $this->json(false, [], "Can't update product", 400);
        }
        return $this->json(true, $product, "Update successfully");
    }

    public function actionListSearch()
    {
//        // join raw
//        $product = Product::find()
//            ->andFilterWhere(["LIKE", "categories.name", Yii::$app->request->getQueryParam("category_name")])
//            ->leftJoin("categories", "products.category_id=categories.id")
//            ->all();
//        $product = Product::find()
//            ->andFilterWhere(["LIKE", "categories.name", Yii::$app->request->getQueryParam("category_name")])
//            ->joinWith("category")
//            ->all()
//        return $this->json($product);
    }

    public function actionIndex()
    {
        $query = Product::find();
        $dataProvider = new ActiveDataProvider([
            "query" => $query,
            "sort" => [
                'defaultOrder' => [
                    'id' => SORT_DESC,
                ]
            ]
        ]);
        $serializer = new Serializer(["collectionEnvelope" => "items"]);
    }

    /**
     * @return array|ProductForm
     * @throws Exception
     */
    public function actionCreate()
    {
        $product = new ProductForm();
        $product->load(Yii::$app->request->post());
        if (!$product->validate() || !$product->save()) {
            return $this->json(false, [
                "errors" => $product->getErrors()
            ], "Can't update product", 400);
        }
        return $this->json(true, $product, "Success");
    }

    public function actionDelete($id)
    {
        $product = Product::find()->select(["id"])->where(["id" => $id])->one();
        if (!$product) {
            return $this->json(false, [], "Product not found");
        }
        if (!$product->delete()) {
            return $this->json(false, [], "Can't delete product", 400);
        }
        return $this->json(true, [], "Success");
    }

}
