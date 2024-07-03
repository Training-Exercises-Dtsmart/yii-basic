<?php

namespace app\controllers;

use app\models\form\ProductForm;
use app\models\Product;
use Yii;
use yii\rest\Controller;

class ProductController extends Controller
{
    public function actionIndex()
    {
        $products = Product::find()->active()->all();
        return $products;
    }

    public function actionCreate()
    {
//        $price = \Yii::$app->request->post("price");

        $productForm = new ProductForm();
        $productForm->load(Yii::$app->request->post());
        if (!$productForm->validate()) {
            return $productForm->getErrors();
        }
        $productForm->save();
        return $productForm;

//        $productForm->price = $price;

    }
}
