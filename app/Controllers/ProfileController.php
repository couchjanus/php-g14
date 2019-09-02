<?php

require_once MODELS.'/User.php';
require_once CORE.'/Session.php';

/**
 * ProfileController.php
 * Контроллер для authetication users
 */

class ProfileController extends Controller
{
    private $user;
    
    public function __construct()
    {
        parent::__construct();
        $session_id = Session::init('Profile');
        $userId = Session::get('userId');
        $this->user = (new User())->getById($userId);
    }
     
    /**
     * страница index
     *
     * @return bool
     */
    public function index()
    {
        $userId = Session::get('userId');

        if (!$this->user) {
            Helper::redirect('/login');
        }

        $user = $this->user;
        if ($this->user->role_id == 1) {
            $title = 'Admin Profile';
            $this->view->render('admin/index', compact('user',  'title'), 'admin');
        } else {
            $title = 'My Profile';
            $this->view->render('profile/index', compact('title', 'user'));
        }
    }

    /**
     * Редактирование профиля
     *
     * @return bool
    */
    public function edit()
    {
        $title = 'Личный кабинет ';
        $user = $this->user;
        $this->_view->renderView('profile/edit', compact('user', 'title'));
    }

    public function update()
    {
        $res = false;
        //Флаг ошибок
        $errors = false;
        
        $options['name'] = trim(strip_tags($_POST['name']));
        $options['phone_number'] = trim(strip_tags($_POST['phone_number']));
        $options['first_name'] = trim(strip_tags($_POST['first_name']));
        $options['last_name'] = trim(strip_tags($_POST['last_name']));

        // Валидация полей
        // if (!User::checkName($options['name'])) {
        //     $errors[] = "Имя не может быть короче 2-х символов";
        // }
        if ($errors == false) {
            $res = User::updateProfile($this->userId, $options);
        }
    }

    /**
     * Просмотр истории заказов пользователя
     *
     * @return bool
    */

    public function ordersList()
    {
        
    }
  
}