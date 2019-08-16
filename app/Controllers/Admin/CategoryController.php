<?php

require_once MODELS.'/Category.php';

class CategoryController extends Controller
{
    /**
     * Главная страница управления категориями
     *
     * @return bool
     */
    public function index()
    {
        $categories = new Category();
        $categories = $categories->index();
        $title = 'Category List Page ';
        $this->view->render('admin/categories/index', compact('title', 'categories'), 'admin');
    }
    /**
     * Добавление категории
     *
     * @return bool
     */
    public function create()
    {
        if (isset($_POST) and !empty($_POST)) {
            $opts = [];
            array_push($opts, trim(strip_tags($_POST['name'])));
            array_push($opts, $_POST['status']);
            $category = new Category();
            $category->store($opts);
            Helper::redirect('/admin/categories');
        }

        $title = 'Admin Category Add New Category ';
        $this->view->render('admin/categories/create', compact('title'), 'admin');
    }
}
