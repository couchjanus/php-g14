<?php
namespace App\Controllers\Admin;

use Core\Controller;
use App\Models\Category;

class CategoryController extends Controller
{
    /**
     * Главная страница управления категориями
     *
     * @return bool
     */
    public function index()
    {
        $categories = (new Category())->index();
        $title = 'Category List Page ';
        // $this->view->render('admin/categories/index', compact('title', 'categories'), 'admin');

        $this->view->setOptions(
            ['path' => 'admin/categories/index',
            'template' => 'admin',
            'data' => compact('title', 'categories')]
        );
        $this->view->render();
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

    public function show($vars)
    {
        // $url = 'http://localhost:8000/admin/categories/show?id=1';
        // // $url = $_SERVER['REQUEST_URI'];
        // var_dump(parse_url($url));

        // var_dump(parse_url($url, PHP_URL_QUERY));

        // parse_str(parse_url($url, PHP_URL_QUERY), $output);
        
        // $id = $output['id'];
        // // var_dump($id);
        // // $category = (new Category())->getById(1);
        
        extract($vars);
        $category = (new Category())->getById($id);
        var_dump($category);
        
        // $title = 'Category List Page ';
        // $this->view->render('admin/categories/show', compact('title', 'category'), 'admin');
    }

    public function edit($vars)
    {
        extract($vars);
        $instance = new Category();
        $category = $instance->getById($id);

        if (isset($_POST) and !empty($_POST)) {
            $options['name'] = trim(strip_tags($_POST['name']));
            $options['status'] = $_POST['status'];
            $instance->update($id, $options);
            Helper::redirect('/admin/categories');
        }
        $title = 'Admin Category Edit Page ';
        $this->view->render('admin/categories/edit', compact('title', 'category'), 'admin');
    }

    public function delete($vars)
    {
        extract($vars);
        $instance = new Category();
        $category = $instance->getById($id);
        
        if (isset($_POST['submit'])) {
            $instance->destroy($id);
            Helper::redirect('/admin/categories');
        } elseif (isset($_POST['reset'])) {
            Helper::redirect('/admin/categories');            
        }
        $title = 'Admin Delete Category ';
        $this->view->render('admin/categories/delete', compact('title', 'category'), 'admin');
    }
}
