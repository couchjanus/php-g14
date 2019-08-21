<?php

// regexp.preg.match.any.test.php


$test = "Не могу перевести I dont know, помогите!";

if (preg_match("/[A-Za-z\s]{2,}/", $test, $match)) {
    echo "+ Найдено '{$match[0]}'\n";
} else {
    echo "- Ничего не найдено\n";
}


$regexp = "/р[а-яё]{3,}й/ui";

// строки, к которым мы будем по очереди применять регулярку
$lines = [
  'рыжий кот',
  'рыжий крот',
  'дикий кіт',
  'рудий кіт',
  'клята дзиґа',
  'blaha muha'
];

foreach ($lines as $line) {
    echo "Строка: $line\n";

    // сюда будет помещено первое
    // совпадение с шаблоном
    $match = [];
    if (preg_match($regexp, $line, $match)) {
        echo "+ Найдено слово '{$match[0]}'\n";
    } else {
        echo "- Ничего не найдено\n";
    }
}
