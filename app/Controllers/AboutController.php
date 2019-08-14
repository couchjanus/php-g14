<?php
// AboutController.php

// class AboutController
// {
//     public function index()
//     {
//       $title = 'About <b>Our Cats</b> Members';
// 		  view('about/index', ['title'=>$title]);
//     }
// }

class AboutController extends Controller
{
    public function index()
    {
        $title = 'About <b>Our Cats</b> Members';
        $this->view->render('about/index', compact('title'));
    }
}
