<?php
class ProfileController extends Controller
{
    public function index()
    {
        $title = 'My Profile';
        $this->view->render('profile/index', compact('title'));
    }
}