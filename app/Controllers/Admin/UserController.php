<?php
/**
 * UserController.php
 * Контроллер для управления users
 */
require_once MODELS.'/User.php';
require_once MODELS.'/Role.php';

class UserController extends Controller
{
    /**
     * Главная страница управления users
     *
     * @return bool
     */
    public function index()
    {
        $users = (new User())->index();
        $title = 'User List Page';
        $this->view->render('admin/users/index', compact('users', 'title'), 'admin');
    }

    /**
     * Добавление user
     *
     * @return bool
     */

    public function create()
    {
        if (isset($_POST) and !empty($_POST)) {
            $options['name'] = trim(strip_tags($_POST['name']));
            $options['email'] = trim(strip_tags($_POST['email']));
            $options['role'] = $_POST['role'];
            $options['password'] = trim(strip_tags($_POST['password']));
            (new User())->store($options);
            Helper::redirect('/admin/users');
        }
        $title = 'Create User';
        $roles = (new Role())->index();
        $this->view->render('admin/users/create', compact('title', 'roles'), 'admin');
    }

    public function edit($vars)
    {
        extract($vars);
        $instance = new User();
        if (isset($_POST) and !empty($_POST)) {
            $options['name'] = trim(strip_tags($_POST['name']));
            $options['email'] = trim(strip_tags($_POST['email']));
            $options['password'] = trim(strip_tags($_POST['password']));
            $options['role_id'] = (int) $_POST['role_id'];
            $options['status'] = $_POST['status'];
            $instance->update($id, $options);
            Helper::redirect('/admin/users');
        }
        $user = $instance->getById($id);
        $title = 'Admin User Edit Page ';
        $roles = (new Role())->index();
        $this->view->render('admin/users/edit', compact('user', 'title', 'roles'), 'admin');
    }
    
    public function delete($vars)
    {
        extract($vars);
        $instance = new User();
        if (isset($_POST['submit'])) {
            $instance->destroy($id);
            Helper::redirect('/admin/users');
        } elseif (isset($_POST['reset'])) {
            Helper::redirect('/admin/users');            
        }
        $title = 'Delete user';
        $user = $instance->getById($id);
        $this->view->render('admin/users/delete', compact('title', 'user'), 'admin');
    }
}