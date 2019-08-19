<?php

class PagesController extends Controller
{
    
    public function notFound()
    {
        $this->view->render('errors/404');
    }
}

