<?php
// HomeController.php

class HomeController
{
    // Class properties and methods go here   
    public function __construct()
    {
		  view('home/index', ['title'=>'<b>Our Cats</b> Members Home Page']);
    }

    public function index()
    {
      $title = 'Our <b>Best Cat Members Home Page </b>';
		  view('home/index', ['title'=>$title]);
    }
}