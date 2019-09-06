<?php

require_once MODELS.'/User.php';
require_once CORE.'/Session.php';
require_once MODELS.'/Order.php';
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
        $this->view->render('profile/edit', compact('title', 'user'));
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
        $orders = (new Order)->getOrdersListByUserId($this->user->id);
        $title = 'Личный кабинет ';
        $subtitle = 'Ваши заказы ';
        $user = $this->user;
        $this->view->render('profile/orders', compact('user', 'orders', 'title', 'subtitle'));
    }

    public function ordersView($vars)
    {
        extract($vars);
        $order = (new Order)->getUserOrderById($id);

        $title = 'Личный кабинет ';
        $subtitle = 'Ваш заказ #'.$order->id;

        // Преобразуем JSON  строку продуктов и их кол-ва в массив
        $orders = json_decode(json_decode($order->products, true));
        $products = [];

        for ($i=0; $i<count($orders); $i++) {
            array_push($products, (array)$orders[$i]);
        }
        $user = $this->user;
        $this->view->render('profile/order', compact('user', 'orders', 'order', 'title', 'subtitle', 'products'));
    }
  
}