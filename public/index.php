<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <?php
        echo ("Hello World");
    /**
     * PHP version 7.2
     * 
     * @category Php
     * @package  Php_Project
     * @author   Janus Nic <janusnic@gmail.com>
     * @license  MIT License https://github.com/couchjanus/php7.2-fundamental/LICENSE
     * @link     https://github.com/couchjanus/php7.2-fundamental
     **/

    // var_dump('PHP_INT_SIZE: ', PHP_INT_SIZE);
    // var_dump('PHP_INT_MAX: ', PHP_INT_MAX);
    // var_dump('PHP_INT_MIN: ', PHP_INT_MIN);

    // Переполнение целых на 32-битных системах
    // $large_number = 2147483647;
    // var_dump($large_number);                     // int(2147483647)
    // $large_number = 2147483648;
    // var_dump($large_number);                     // float(2147483648)
    // $million = 1000000;
    // $large_number =  50000 * $million;
    // var_dump($large_number);                     // float(50000000000)


    // Для большего контроля над округлением используйте функцию round().

    // var_dump(25/7);         // float(3.5714285714286)
    // var_dump((int) (25/7)); // int(3)
    // var_dump(round(25/7));  // float(4)

    // Новая функция intdiv() производит целочисленное деление операндов и возвращает его результат.

    // var_dump(intdiv(10, 3));

    // echo intdiv(10, 3); //> 3
    // echo intdiv(5, 2); //> 2


    // Манипуляции с типами

    // $foo = "1";  // $foo - это строка (ASCII-код 49)
    // $foo *= 2;   // $foo теперь целое число (2)
    // $foo = $foo * 1.3;  // $foo теперь число с плавающей точкой (2.6)
    // $foo = 5 * "10 Little Piggies"; // $foo - это целое число (50)
    // $foo = 5 * "10 Small Pigs";     // $foo - это целое число (50)

    // $foo = "5bar"; // строка
    // $bar = true;   // булевое значение

    // Чтобы указать тип переменной непосредственно, используйте функцию settype().

    // settype($foo, "integer"); // $foo теперь 5   (целое)

    // Максимальное значение для "int" равно PHP_INT_MAX.
    // echo PHP_INT_MAX;
    // settype($bar, "string");  // $bar теперь "1" (строка)

    // Приведение типов в PHP работает так же, как и в C: имя требуемого типа записывается в круглых скобках перед приводимой переменной.

    // $foo = 10;   // $foo - это целое число
    // $bar = (boolean) $foo;   // $bar - это булев тип

    // Внутри скобок допускаются пробелы и символы табуляции, поэтому следующие примеры равносильны по своему действию:

    // $foo = (int) $bar;
    // $foo = ( int ) $bar;
    
    // Приведение строковых литералов и переменных к бинарным строкам:
    // $binary = (binary) $string;
    // $binary = b"binary string";

    // Вместо использования приведения переменной к string, можно также заключить ее в двойные кавычки.
    
    // $foo = 10;   // $foo - это целое число
    // $bar = (boolean) $foo;   // $bar - это булев тип
    // $foo = 10;            // $foo - это целое число
    // $str = "$foo";        // $str - это строка
    // $fst = (string) $foo; // $fst - это тоже строка
    // // Это напечатает "они одинаковы"
    // if ($fst === $str) {
    //     echo "они одинаковы";
    // }

    // $great = 'Hello';
    // echo "{ $great} there";// Не работает, выводит: { Hello  there}
    // echo "{$great}  there"; // Работает, выводит: Hello  there

    // define("NUMB", 3.1456);

    // define("CONSTANT", "Здравствуй, мир.");
    // теперь можно объявить константу и так:
    // const HELLO = 'Здравствуй, мир.';
    // const PI = 3.14;
    // echo HELLO;
    // print NUMB;
    // print PI;   
    // define("MAXSIZE", 100);

    // echo MAXSIZE;
    // echo constant("MAXSIZE"); // результат аналогичен предыдущему выводу


    // define('SHORTINIT', 'true');


    // print_r(get_defined_constants());






    // Простой массив
    // $array = array(
    //     "foo" => "bar",
    //     "bar" => "foo",
    // );
    // var_dump($array);

    // Начиная с PHP 5.4

    // $array = [
    //     "foo" => "bar",
    //     "bar" => "foo",
    // ];
    // var_dump($array);
    
    // $array = array(
    //     1    => "a",
    //     "1"  => "b",
    //     1.5  => "c",
    //     true => "d",);
    // var_dump($array);

    // $array = array(
    //     "foo" => "bar",
    //     "bar" => "foo",
    //     100   => -100,
    //     -100  => 100,
    // );
    // var_dump($array);

    // $array = array("foo", "bar", "hallo", "world");
    // var_dump($array);

    // $array = array(
    //         "a",
    //         "b",
    // 6 => "c",
    //         "d",
    // );
    // var_dump($array);

    // Доступ к элементам массива с помощью квадратных скобок
    // $array = array(
    //     "foo" => "bar",
    //     42    => 24,
    //     "multi" => array(
    //         "dimensional" => array(
    //             "array" => "foo"
    //         )
    //     )
    // );

    // var_dump($array["foo"]);
    // var_dump($array[42]);
    // var_dump($array["multi"]["dimensional"]["array"]);

    // $array = array(1, 2, 3, 4, 5);    // Создаем простой массив.
    // print_r($array);
    // Теперь удаляем каждый элемент, но сам массив оставляем нетронутым:
    // foreach ($array as $i => $value) {
    //     unset($array[$i]);
    // }
    // print_r($array);

    // Добавляем элемент (новым ключом будет 5, вместо 0).
    // $array[] = 6;
    // print_r($array);

    // Переиндексация:
    // $array = array_values($array);
    // $array[] = 7;
    // print_r($array);

    // echo "<br>Имя сервера - ".$_SERVER['SERVER_NAME']."<br />";

    // echo "IP-адрес сервера - ".$_SERVER['REMOTE_ADDR']."<br />";
    // echo "Порт сервера - ".$_SERVER['SERVER_PORT']."<br />";
    
    // echo "Web-сервер - ".$_SERVER['SERVER_SOFTWARE']."<br />";
    // echo "Версия HTTP-протокола - ".$_SERVER['SERVER_PROTOCOL'];

    // echo("<br> SERVER_NAME: ");
    // echo "http://".$_SERVER['SERVER_NAME'];
    // echo("<br> REQUEST_URI: ");
    // echo $_SERVER['REQUEST_URI'];
    // echo("<br> URL: ");
    // echo "http://".$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'];
    // echo("<br>");
    
    // if ($_SERVER['REQUEST_URI']=='/') {
    //     echo "<h1>Home Page</h1>";
    //     echo $_SERVER['REQUEST_URI'];
    // }
    // else {
    //     echo "<h1>404</h1>";
    // }

    // Оператор объединения с null 

    // Оператор объединения с null (??), являющийся синтаксическим сахаром для действия, когда совместно используются тернарный оператор и функция isset(). Он возвращает первый операнд, если он задан и не равен NULL, а в обратном случае возвращает второй операнд.
        
    // $bNull = $aNull ?? 'сахар'; 
    // echo $bNull;
    
    // $cNull = $aNull ?? 'сахар';
    // echo $cNull;
        
    // Это идентично следующему коду:
    
    // $cNull = isset($aNull) ? $aNull : 'сахар';
    // echo $cNull;
    
    // Оператор spaceship (космический корабль) 

    // Оператор spaceship предназначен для сравнения двух выражений. Он возвращает -1, 0 или 1 если $a, соответственно, меньше, равно или больше чем $b. Сравнение производится в соответствии с правилами сравнения типов PHP.
    
    // Целые числа
    // echo 1 <=> 1; // 0
    // echo 1 <=> 2; // -1
    // echo 2 <=> 1; // 1
    
    // Числа с плавающей точкой
    // echo 1.5 <=> 1.5; // 0
    // echo 1.5 <=> 2.5; // -1
    // echo 2.5 <=> 1.5; // 1
    
    // Строки
    // echo "a" <=> "a"; // 0
    // echo "a" <=> "b"; // -1
    // echo "b" <=> "a"; // 1
    
    // Определение констант массивов с помощью define() 

    // Можно определить константу типа array с помощью функции define(). В PHP 5.6 такие константы можно было задавать только с помощью const.
    
    // define('ANIMALS', [
    //     'dog',
    //     'cat',
    //     'bird'
    // ]);
    
    // echo ANIMALS[1]; // выводит "cat"
    

    // Синтаксис кодирования Unicode 

    // Он принимает шестнадцатеричный код Unicode и записываем его в формате UTF-8 в двойных кавычках или формате heredoc. Любой корректный код будет принят. Ведущие нули по желанию.
    // echo "\u{aa}";
    // echo "\u{0000aa}";
    // echo "\u{9999}";
    
    // Результат выполнения данного примера:
    
    // ª
    // ª (То же самое, что и первый вариант, но с ведущими нулями)
    // 香
    
    ?>
    </body>
</html>
