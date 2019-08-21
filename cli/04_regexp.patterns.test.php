<?php

// regexp.patterns.test.php

$subject='Give me 10 blahs';
/**
 * Метасимволы - границы слов
 * \b     Совпадает на границе слова
 * \B     Совпадает не на границе слова
 */

$patternw='/\w+\b/';

$success = preg_match($patternw, $subject, $match);

if ($success) {
    var_dump("Match: ".$match[0]);
}


// Примеры:
// /\bbla/ соответствует 'bla' в слове "blahs" ;

$patternb='/\bbla\w+\b/';

$success = preg_match($patternb, $subject, $match);

if ($success) {
    var_dump("Match: ".$match[0]);
}

// /la\b/ не соответствует 'la' в слове "blahs", поскольку за 'la' следует символ 'h' , являющимся символом слова;

$patternb='/la\b\w+\b/';

$success = preg_match($patternb, $subject, $match);

if ($success) {
    var_dump("Match: ".$match[0]);
}

// /lahs\b/ соответствует 'oon' в слове "blahs", поскольку 'lahs' является окончанием строки, и таким образом, за этими символами не следует другой символ слова;

$patternb='/\w+lahs\b/';

$success = preg_match($patternb, $subject, $match);

if ($success) {
    var_dump("Match: ".$match[0]);
}

// /\w\b\w/ никогда не будет ничему соответствовать, поскольку за символом слова никогда не может следовать и граница слова, и символ слова.

$patternw='/\w\b\w/';

$success = preg_match($patternw, $subject, $match);

if ($success) {
    var_dump("Match: ".$match[0]);
}

$pattern='~\b(\d+)\s*(\w+)$~';

$success = preg_match($pattern, $subject, $match);
if ($success) {
    echo "Match: ".$match[0].PHP_EOL; 
    echo "Group 1: ".$match[1].PHP_EOL; 
    echo "Group 2: ".$match[2].PHP_EOL; 
}