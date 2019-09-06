<?php
// DashboardController.php
require_once MODELS.'/User.php';
require_once CORE.'/Session.php';

class DashboardController extends Controller
{
    private $user;
    
    public function __construct()
    {
        parent::__construct();
        $session_id = Session::init('Profile');
        $userId = Session::get('userId');
        $this->user = (new User())->getById($userId);
    }

    public function index()
    {
        $userId = Session::get('userId');
        if (!$this->user) {
            Helper::redirect('/login');
        }
        if ($this->user->role_id == 1) {
            $title = 'Admin Profile';
            $this->view->render('admin/index', compact('user',  'title'), 'admin');
        } else {
            $title = 'My Profile';
            $this->view->render('profile/index', compact('title', 'user'));
        }
    }
}
