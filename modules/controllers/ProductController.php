<?php

namespace app\modules\controllers;

use app\controllers\Controller;
use app\modules\models\Product;

class ProductController extends Controller
{
    public function actionIndex()
    {
        return Product::find()->all();
    }

    public function actionTestManyQuery()
    {
        $products = Product::find()->with("category")->all();

        $countCategory = 0;

        foreach ($products as $product) {
            if ($product->category->name === "Điện Thoại") {
                $countCategory++;
            }
        }
        return $countCategory > 3;
    }
}
