<?php
namespace Core\Traits;

trait Options {
    public function setOptions(array $options)
    {
        // apply options
        foreach ($options as $key => $value) {
            $method = 'set' . $this->normalizeKey($key);
            if (method_exists($this, $method)) {
                $this->$method($value);
            }
        }
    }
 
    private function normalizeKey($key)
    {
        $option = str_replace('_', ' ', strtolower($key));
        $option = str_replace(' ', '', ucwords($option));
        return $option;
    }
}