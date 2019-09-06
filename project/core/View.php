<?php
namespace Core;

use Core\Traits\Options;

class View
{
    use Options;

    protected $path;
    protected $template;
    protected $data;

    public function setPath($path) {
        $this->path = $path;
    }
    
    public function setTemplate($template) {
        $this->template = $template;
    }

    public function setData($data) {
        $this->data = $data;
    }

    // public function render($path, $data = null, $layout='app', $error = false) 
    public function render() 
    {
        extract($this->data);
        $path = $this->path . '.php';
        return require VIEWS."/layouts/".$this->template.".php";
    }

}
   