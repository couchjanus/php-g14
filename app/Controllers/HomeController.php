<?php
// HomeController.php

// class HomeController
// {
//     public function index()
//     {
//       $title = 'Our <b>Best Cat Members Home Page </b>';
// 		  view('home/index', ['title'=>$title]);
//     }
// }

class HomeController extends Controller
{
    public function index()
    {
        $title = 'Our <b>Best Cat Members Home Page </b>';
        $this->view->render('home/index', compact('title'));
    }
}