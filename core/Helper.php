<?php

class Helper
{
    public static function redirect($redirect_url = '/')
    {
        header('HTTP/1.1 200 OK');
        header('Location: http://'.$_SERVER['HTTP_HOST'].$redirect_url);
        exit();
    }


    // Вместо числового статуса категории, отображаем определенную строку
    public static function getStatusText($status)
    {
        switch ($status) {
        case '1':
            return 'Отображается';
            break;
        case '0':
            return 'Скрыта';
            break;
        }
    }
    /**
     * 
     *Запись пользователя в сессию
     *
     * @param $userId
     */
    
    public static function auth($user)
    {
        session_regenerate_id(true);
        Session::set('id', session_id());
        Session::set('userId', $user->id);
        Session::set('email', $user->email);
        Session::set('logged', true);
        setcookie("userId", $user->id);
    }
}
