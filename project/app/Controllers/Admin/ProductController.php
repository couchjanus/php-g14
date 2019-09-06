<?php

require_once MODELS.'/Category.php';
require_once MODELS.'/Product.php';
require_once MODELS.'/Picture.php';
require_once CORE.'/Uploader.php';
require_once CORE.'/Validation.php';

class ProductController extends Controller
{
    private $_resource = 'products';

    /**
     * Просмотр всех товаров
     * @return bool
    */
    public function index()
    {
        $products = (new Product())->index();
        $title = 'Product List Page';
        $this->view->render('admin/products/index', compact('title', 'products'), 'admin');
    }

    /**
     * Добавление товара
     *
     * @return bool
    */
    public function create0()
    {
        if (isset($_POST) and !empty($_POST)) {
            $options['name'] = trim(strip_tags($_POST['name']));
            $options['price'] = trim(strip_tags($_POST['price']));
            $options['category_id'] = trim(strip_tags($_POST['category_id']));
            $options['brand'] = trim(strip_tags($_POST['brand']));
            $options['description'] = trim(strip_tags($_POST['description']));
            $options['is_new'] = trim(strip_tags($_POST['is_new']));
            $options['status'] = trim(strip_tags($_POST['status']));
                    
            (new Product())->store($options);

            if (!empty($_FILES['image'])) {
                $upload = Uploader::factory('images/products');
                $upload->file($_FILES['image']);
                $validation = new Validation();
                $upload->callbacks($validation, array('check_name_length'));
                $results = $upload->upload();
                $opts['filename'] = $results["filename"];
                $opts['resource_id'] = (int)Product::lastId();
                $opts['resource'] = $this->_resource;
                (new Picture())->store($opts);
            }
            Helper::redirect('/admin/products');
        }
        
        $title = 'Admin Product Add New Product ';
        $categories = (new Category())->index();
        $this->view->render('admin/products/create', compact('title', 'categories'), 'admin');
    }

    public function create()
    {
        if (isset($_POST) and !empty($_POST)) {
            $options['name'] = trim(strip_tags($_POST['name']));
            $options['price'] = trim(strip_tags($_POST['price']));
            $options['category_id'] = trim(strip_tags($_POST['category_id']));
            $options['brand'] = trim(strip_tags($_POST['brand']));
            $options['description'] = trim(strip_tags($_POST['description']));
            $options['is_new'] = trim(strip_tags($_POST['is_new']));
            $options['status'] = trim(strip_tags($_POST['status']));
                    
            (new Product())->store($options);

            if (!empty($_FILES['images'])) {
                
                $files = $_FILES['images'];
                for ($i = 0; $i < count($files["name"]); $i++) {
                    $file["name"] = $files["name"][$i];
                    $file["tmp_name"] = $files["tmp_name"][$i];
                    $file["size"] = $files["size"][$i];
                    $file["type"] = $files["type"][$i];
                    $file["error"] = $files["error"][$i];

                    $upload = Uploader::factory('images/products');
                    $upload->file($file);
                    $validation = new Validation();
                    $upload->callbacks($validation, array('check_name_length'));
                    $results = $upload->upload();
                    $opts['filename'] = $results["filename"];
                    $opts['resource_id'] = (int)Product::lastId();
                    $opts['resource'] = $this->_resource;
                    (new Picture())->store($opts);
                }    
            }
            Helper::redirect('/admin/products');
        }
        
        $title = 'Admin Product Add New Product ';
        $categories = (new Category())->index();
        $this->view->render('admin/products/create', compact('title', 'categories'), 'admin');
    }
}