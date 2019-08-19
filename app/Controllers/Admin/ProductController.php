<?php

require_once MODELS.'/Category.php';
require_once MODELS.'/Product.php';

class ProductController extends Controller
{
    /**
     * Просмотр всех товаров
     * @return bool
    */
    public function index()
    {
        // $products = new Product();
        // $products = $products->index();
        $products = (new Product())->index();
        $title = 'Product List Page';
        $this->view->render('admin/products/index', compact('title', 'products'), 'admin');
    }

    /**
     * Добавление товара
     *
     * @return bool
    */
    public function create()
    {
        //Принимаем данные из формы
        if (isset($_POST) and !empty($_POST)) {
            $options['name'] = trim(strip_tags($_POST['name']));
            $options['price'] = trim(strip_tags($_POST['price']));
            $options['category_id'] = trim(strip_tags($_POST['category_id']));
            $options['brand'] = trim(strip_tags($_POST['brand']));
            $options['description'] = trim(strip_tags($_POST['description']));
            $options['is_new'] = trim(strip_tags($_POST['is_new']));
            $options['status'] = trim(strip_tags($_POST['status']));
            
            (new Product())->store($options);
            Helper::redirect('/admin/products');
        }

        $title = 'Admin Product Add New Product ';
        $categories = (new Category())->index();

        $this->view->render('admin/products/create', compact('title', 'categories'), 'admin');
    }
}