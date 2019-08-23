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

            if (isset($_FILES['image'])) {
                //Каталог загрузки картинок
                $uploadDir = 'images/products';
                    
                //Вывод ошибок
                $errors = array();
                // pathinfo — Возвращает информацию о пути к файлу
                $type = pathinfo($_FILES['image']['name']);
                $file_ext = strtolower($type['extension']);

                $extension= array("jpeg","jpg","png",'gif');
                //Определяем типы файлов для загрузки
                $fileTypes = array(
                    'jpg' => 'image/jpeg',
                    'png' => 'image/png',
                    'gif' => 'image/gif'
                );

                //Проверяем пустые данные или нет
                if (empty($_FILES)) {
                    $errors[] = 'File name must have name';
                } elseif ($_FILES['image']['error'] > 0) {
                    // Проверяем на ошибки
                    $errors[] = $_FILES['image']['error'];
                } elseif ($_FILES['image']['size'] > 2097152) {
                    // если размер файла превышает 2 Мб
                    $errors[] = 'File size must be excately 2 MB';
                } elseif (in_array($file_ext, $extension) === false) {
                    $errors[] = "extension not allowed, please choose a JPEG or PNG file.";
                } elseif (!in_array($_FILES['image']['type'], $fileTypes)) {
                    // Проверяем тип файла
                    $errors[] = 'Запрещённый тип файла';
                }
                
                if (empty($errors)) {
                
                    $type = pathinfo($_FILES['image']['name']);
                    $name = uniqid('files_') .'.'. $type['extension'];
                    move_uploaded_file($_FILES['image']['tmp_name'], $uploadDir.'/'.$name);

                    $opts['filename'] = $name;
                    $opts['resource_id'] = (int)Product::lastId();
                    $opts['resource'] = $this->_resource;

                    (new Picture())->store($opts);
                } else {
                    print_r($errors);
                }
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
}