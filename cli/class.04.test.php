<?php

/**
 * class.04.test
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

echo $instance->prop1; // Output the property
var_dump($instance->prop1);

echo $instance->prop2; // Output the property
echo $instance->prop3; // Output the property
echo $instance->_prop4; // Output the property

// выражение $instance->$prop1 будет пытаться найти значение, присвоенное переменной по имени $prop1, а затем обратиться к свойству $instance–>значение
echo $instance->$prop1;


// var_dump($instance);
