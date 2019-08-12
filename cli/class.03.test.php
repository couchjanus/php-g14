<?php
/**
 * class.03.test
 */
 
class MyClass
{
  // Class properties and methods go here
  public $prop1 = "I'm a class property!";
  public $prop2 = "I'm a public property!";
  protected $prop3 = "I'm a protected property!";
  private $_prop4 = "I'm a private property!";
}

$instance = new MyClass();
 
var_dump($instance);
