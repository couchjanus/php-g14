<?php
/**
 * RoleController.php
 * Контроллер для управления roles
 */
require_once MODELS.'/Role.php';

class RoleController extends Controller
{
    /**
     * Главная страница управления roles
     *
     * @return bool
     */
    public function index()
    {
        $roles = (new Role())->index();
        $title = 'Category List Page ';
        $this->view->render('admin/roles/index', compact('title', 'roles'), 'admin');
    }

    /**
     * Добавление role
     *
     * @return bool
     */
    public function create()
    {
        if (isset($_POST) and !empty($_POST)) {
            $opts = [];
            array_push($opts, trim(strip_tags($_POST['name'])));
            (new Role())->store($opts);
            Helper::redirect('/admin/roles');
        }
        $this->view->render('admin/roles/create', ['title'=> 'Add New Role '], 'admin');
    }

    public function edit($vars)
    {
        extract($vars);
        $instance = new Role();
        
        //Принимаем данные из формы
        if (isset($_POST) and !empty($_POST)) {
            $options['name'] = trim(strip_tags($_POST['name']));
            $instance->update($id, $options);
            Helper::redirect('/admin/roles');
        }
        $role = $instance->getById($id);
        $title = 'Role Edit Page';
        $this->view->render('admin/roles/edit', compact('title', 'role'), 'admin');
    }
    public function delete($vars)
    {
        extract($vars);
        $instance = new Role();
        
        if (isset($_POST['submit'])) {
            $instance->destroy($id);
            Helper::redirect('/admin/roles');
        } elseif (isset($_POST['reset'])) {
            Helper::redirect('/admin/roles');            
        }
        $title = 'Delete Role';
        $role = $instance->getById($id);
        $this->view->render('admin/roles/delete', compact('title', 'role'), 'admin');
    }
}