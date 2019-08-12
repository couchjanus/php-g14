<?php

// Начиная с PHP 5.5.0 доступна специальная константа ::class, которой на этапе компиляции присваивается полное имя класса. Полезна при использовании с классами, использующие пространства имен.

// Пример использования ::class с пространством имен

namespace foob {
    class bar {
    }

    echo bar::class; // foob\bar
}

/**
 * class.06.test
 */   
class MyClass
{

    // объявление свойства private
    private $_var = "I'm a private property!"; // значение по умолчанию

    public $bar = 'свойство';
    
    // Объявление константы
    const CONSTANT = 'значение константы';

    public function showConstant() {
        echo  self::CONSTANT . "\n";
    }
    
    public function bar() {
        return 'метод';
    }
 
    public function displayVar()
    {
           echo $this->_var;
    }
    
}

$obj = new MyClass();

echo $obj->bar, PHP_EOL, $obj->bar(), PHP_EOL;

echo $obj->displayVar(), PHP_EOL;


// использование константы

echo MyClass::CONSTANT . "\n";

$classname = "MyClass";
echo $classname::CONSTANT . "\n"; // начиная с PHP 5.3.0

$class = new MyClass();
$class->showConstant();

echo $class::CONSTANT."\n"; // начиная с PHP 5.3.0

// Пример со статичными данными

class foo {
    // Начиная с PHP 5.3.0
    const BAR = <<<'EOT'
bar
EOT;
    // Начиная с PHP 5.3.0
    const BAZ = <<<EOT
baz
EOT;
}

// Пример констант, заданных выражением
// Для задания констант класса возможно использовать скалярные выражения с цифрами, строками и/или другими константами.

const ONE = 1;

class foot {
    // Начиная с PHP 5.6.0
    const TWO = ONE * 2;
    const THREE = ONE + self::TWO;
    const SENTENCE = 'Значение константы THREE - ' . self::THREE;
}

// Модификаторы видимости констант класса
// Начиная с PHP 7.1.0 для констант класса можно использовать модификаторы области видимости.
class Foo {
    // Начиная с PHP 7.1.0
    public const BAR = 'bar';
    private const BAZ = 'baz';
}
echo Foo::BAR, PHP_EOL;
echo Foo::BAZ, PHP_EOL;

// Fatal error: Uncaught Error: Cannot access private const Foo::BAZ in …
