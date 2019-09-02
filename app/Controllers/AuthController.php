<?php
/**
 * AuthController.php
 * Контроллер для authetication users
 */
require_once MODELS.'/User.php';
require_once CORE.'/Session.php';

class AuthController extends Controller
{
    private $logged_in = false;
    private $email;
    private $userId;
    
    //array to hold all of the errors 
    private $errors = NULL;
    private $messages = NULL;

    //The user's userinfo in an array
	public $user = NULL;
   
    //a string holding the cookie prefix
	private $cookie_prefix = '';
	    
    public function __construct()
	{
        parent::__construct();
		$this->errors = array();

        $session_id = Session::init($this->cookie_prefix.'Login');
		
        if($userId=Session::get('userId'))
		{
            $this->user = (new User())->getById($userId);
            if( $this->user != NULL )
				$this->logged_in = true;
		}
		
		//session failed, try cookies
		if($this->logged_in === false && isset($_COOKIE[$this->cookie_prefix.'ID']))
		{
			$id 			= intval($_COOKIE[ $this->cookie_prefix.'ID']);
			$email 		    = strval($_COOKIE[ $this->cookie_prefix.'UserEmail']);
			$password 		= strval($_COOKIE[ $this->cookie_prefix.'Password']);
							
			if($id && $email && $password)
                $this->signin();
		}
	}

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

    function signin()
	{
        if ($this->logged_in === true) {
            Helper::redirect('/profile'); //перенаправляем в личный кабинет
        }

        if (isset($_POST) and (!empty($_POST))) {

            $email = trim(strip_tags($_POST['email']));
            $password = trim(strip_tags($_POST['password']));
            $remember_me = isset($_POST['remember_me'])?$_POST['remember_me']:false;

            $instance = new User();
            $userId = $instance->checkUser($email, $password);
        
            if ($userId === false) {
                $this->errors[] = "Пользователя с таким email или паролем не существует";
                Session::set('errors', $this->errors);
                return FALSE;
            } else {
                $this->user = $instance->getById($userId);
                $this->logged_in = true;
                $this->messages[] = "You Are Logged";

                Session::set('messages', $this->messages);
                Session::set('userId', $this->user->id);

                setcookie($this->cookie_prefix.'Logged', $this->logged_in); 
                
                if($remember_me && !isset($_COOKIE[$this->cookie_prefix.'ID']))
                {
                    setcookie($this->cookie_prefix.'ID', $this->user->id, TIME_NOW + COOKIE_TIMEOUT, ''); 
                    setcookie($this->cookie_prefix.'UserEmail', $this->user->email, TIME_NOW + COOKIE_TIMEOUT, ''); 
                    setcookie($this->cookie_prefix.'Password', $this->user->password, TIME_NOW + COOKIE_TIMEOUT, ''); 
                }
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
    function logout()
	{
		//destroy the cookies
        if( isset($_COOKIE[$this->cookie_prefix.'ID']) )
		{	
			//Set cookies to one ago. Browser will auto-purge them.
			setcookie( $this->cookie_prefix.'ID', '', TIME_NOW - 3600 );	//User ID
			setcookie( $this->cookie_prefix.'UserEmail', '', TIME_NOW - 3600 ); //User Email
            setcookie( $this->cookie_prefix.'Password', '', TIME_NOW - 3600 ); //User Password
            setcookie($this->cookie_prefix.'Logged', '', TIME_NOW - 3600); 
		}
        Session::destroy('userId');
        $this->logged_in = FALSE;
        setcookie($this->cookie_prefix.'Logged', $this->logged_in, TIME_NOW - 3600); 
		Helper::redirect('/');
	}
}