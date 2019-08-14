<?php

class View
{
    public function render($path, $data = null, $layout='app', $error = false) 
    {
        if ( $data ) {
            extract($data);
        }
        $path .= '.php';
        return require VIEWS."/layouts/${layout}.php";
    }

}
   