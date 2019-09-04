<?php

require_once MODELS.'/User.php';
require_once MODELS.'/Order.php';

/**
 * OrderController.php
 * 
 */

class OrderController extends Controller
{
    public function cart()
    {
        // Only allow POST requests
        if (strtoupper($_SERVER['REQUEST_METHOD']) != 'POST') {
            throw new Exception('Only POST requests are allowed');
        }

        //Получаем id пользователя из сессии
        $userId=Session::get('userId');
        $instance = new User();
        //Получаем всю информацию о пользователе из БД
        $user = $instance->getById($userId);
        
        // Make sure Content-Type is application/json 
        $content_type = isset($_SERVER['CONTENT_TYPE']) ? $_SERVER['CONTENT_TYPE'] : '';
        if (stripos($content_type, 'application/json') === false) {
            throw new Exception('Content-Type must be application/json');
        } else {
            // Read the input stream
            // Receive the RAW post data.
            $content = trim(file_get_contents("php://input"));

            // Decode the JSON object
            $decoded = json_decode($content, true);

            // Throw an exception if decoding failed
            if (!is_array($decoded)) {
                throw new Exception('Failed to decode JSON object');
            }
            $options = [];
            $instance->updateProfile($user->id, ["first_name" => $decoded["first_name"], "last_name" => $decoded["last_name"], "phone_number" => $decoded["phone_number"]]);
            
            (new Order)->save($user->id, json_encode($decoded['cart']));
            echo json_encode($options);
        }
    }
}