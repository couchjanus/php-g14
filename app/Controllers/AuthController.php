<?php
/**
 * AuthController.php
 * Контроллер для authetication users
 */
require_once MODELS.'/User.php';

class AuthController extends Controller
{
    private $logged = false;
    private $email;
    private $userId;
    
    private $errors = [];
    private $messages = [];

    public function get_user_id() { return $this->userId; }

	// Get email
	public function get_email() { return $this->email; }

	// Check if the user is logged
	public function logged() { return Session::get('logged'); }

	// Get info messages
	public function get_info() { return $this->messages; }

	// Get errors
	public function get_errors() { return $this->errors; }

    /**
     * страница signup
     *
     * @return bool
     */

    public function signup()
    {
        if (isset($_POST) and (!empty($_POST))) {

            $password = trim(strip_tags($_POST['password']));
            $confirmpassword = trim(strip_tags($_POST['confirmpassword']));

            if (self::is_valid_passwords($password, $confirmpassword))
            {
                $email = trim(strip_tags($_POST['email']));
                $options['email'] = $email;
                list($name, $domain) = explode('@', $email);
                $options['name'] = $name;
                $options['role'] = 3;
                $options['password'] = $password;
                
                if ((new User())->store($options)) {
                    Helper::redirect('/login');
                }else{
                    echo 'Error Registering User!';
                }
            }
            
        }
        
        $this->view->render('auth/index', [], 'auth');
    }

    // method for password verification
    static private function is_valid_passwords($password, $confirmpassword) 
    {
        // Your validation code.
        if (empty($password)) {
            echo "Password is required.";
            return false;
        } else if ($password != $confirmpassword) {
            // error matching passwords
            echo 'Your passwords do not match. Please type carefully.';
            return false;
        }
        // passwords match
        return true;
    }

    /**
     * Авторизация пользователя
     *
     * @return bool
     */
    public function signin()
    {
        if ($this->logged()===true) {
            Helper::redirect('/profile'); //перенаправляем в личный кабинет
        }
        
        if (isset($_POST) and (!empty($_POST))) {
            $instance = new User();
            $email = trim(strip_tags($_POST['email']));
            $password = $_POST['password'];
            
            // Проверяем, существует ли пользователь
            $userId = $instance->checkUser($email, $password);
            
            if ($userId == false) {
                $this->errors[] = "Пользователя с таким email или паролем не существует";
                Session::set('errors', $this->errors);
            } else {
                $this->user = (new User())->getById($userId);
                Helper::auth($this->user); //записываем пользователя в сессию
                $this->logged = Session::get('logged');
                $this->userId = Session::get('userId');
                $this->email = Session::get('email');
                $this->messages[] = "You Are Logged";
                Session::set('messages', $this->messages[]);
                Helper::redirect('/profile'); //перенаправляем в личный кабинет
            }
        }
        $this->view->render('auth/index', [], 'auth');
    }
    /**
     * Выход из учетной записи
     *
     * @return bool
     */
    public function logout()
    {
        Session::destroy();
        $this->logged = false;
		setcookie('userId', '', time()-3600);
        Helper::redirect('/');
    }  
}