<?php
/**
 * class.07.test
 */

class User 
{
    private $name;
    public $login;
    public $email;

    static public $status = 0;

    public function setName($name)
    {
        $this->name = $name;
    }
   
    public function getName()
    {
        return $this->name;
    }
}
   
// создадим объект, только что сформированного класса.

$newUser = new User();

// Таким образом, у нас есть новый объект – новый пользователь, но его данные не определены

var_dump($newUser);

// укажем значения для свойств $newUser.

$newUser->setName("Ben");
$newUser->login = "ben";
$newUser->email = "beny@mail.cat"; 

var_dump($newUser);

// определив значения свойств, мы можем их считать при необходимости, или же присвоить новые — то есть работать как с обычными переменными.

echo $newUser->getName();
$newUser->setName("Tom");

echo $newUser->email;
echo $newUser->email = "tomcat@mail.cat";
 
// Create second object

$secondUser = new User();

$secondUser->setName("John");
$secondUser->login = "john";
$secondUser->login = "john@mail.cat";


// Get the value of $name from both objects
echo $secondUser->getName();
echo $newUser->getName();
 
// Set new values for both objects
$secondUser->setName("John Cat");
$newUser->setName("Tomt Cat");
 
// Output both objects $name value
echo $secondUser->getName();
echo $newUser->getName();


$newUser->address = "Киев";
var_dump($newUser);

User::$status = 1;

var_dump($newUser);