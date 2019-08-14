<?php
// DashboardController.php

// class DashboardController
// {
//     public function index()
//     {
//       $title = 'Admin Dashboard';
// 		  view('admin/index', ['title'=>$title], 'admin');
//     }
// }

class DashboardController extends Controller
{
    public function index()
    {
        $title = 'Admin Dashboard';
        $this->view->render('admin/index', compact('title'), 'admin');
    }
}
