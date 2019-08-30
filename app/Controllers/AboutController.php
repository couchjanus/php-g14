<?php
// AboutController.php

class AboutController extends Controller
{
    public function index()
    {
        $title = 'About <b>Our Cats</b> Members';
        $this->view->render('about/index', compact('title'));
    }
}
