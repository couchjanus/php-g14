<?php
require_once MODELS.'/Product.php';

class HomeController extends Controller
{
    public function index()
    {
        $title = 'Our <b>Best Cat Members Home Page </b>';
        $this->view->render('home/index', compact('title'));
    }

    public function getProducts($vars)
    {
        $products = (new Product())->getProducts();
        echo json_encode($products);
    }

    public function getProduct($vars)
    {
        extract($vars);
        $product = (new Product())->getBySlug($id);
        echo json_encode($product);
    }

    public function getProductItem($vars)
    {
        extract($vars);
        $product = (new Product())->getProductBySlug($id);
        echo json_encode($product);
    }
}