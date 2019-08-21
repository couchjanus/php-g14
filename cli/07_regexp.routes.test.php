<?php

// regexp.routes.test.php

$subject = "Email, you sent was - bla-ha__2018@muha.com! Is it correct?";
var_dump($subject);

// Замена не алфавитных символов на разделитель
var_dump(preg_replace('/[^\pL]+/u', '-', $subject));
var_dump(preg_replace('/[^\p{L}]+/u', '-', $subject));

// Замена не алфавитно-цифровых символов на разделитель
$subject = preg_replace('/[^\p{L}\p{Nd}]+/u', '-', $subject);
var_dump($subject);

// Убираем дубли разделителей
$subject = preg_replace('/(' . preg_quote('-', '/') . '){2,}/', '$1', $subject);
var_dump($subject);


$key="edit/{id}";
var_dump(preg_replace("/{([a-zA-Z]+)}/", "$0", $key));
// var_dump(preg_replace("/{([a-zA-Z]+)}/", "#$1#", $key));
// var_dump(preg_replace("/{([a-zA-Z]+)}/", "?#$1#", $key));
// var_dump(preg_replace("/{([a-zA-Z]+)}/", "(?#$1#)", $key));
// $pattern = "@^" .preg_replace('/{([a-zA-Z]+)}/', "(?'$1'11)", 'edit/{id}'). "$@";
// $pattern = "@^" .preg_replace('/{([a-zA-Z]+)}/', "(?P<$1>11)", 'edit/{id}'). "$@";
// preg_match($pattern, 'edit/11', $matches);
// var_dump($matches);
// $pattern = "@^" .preg_replace('/{([a-zA-Z]+)}/', '(?<$1>)', 'edit/{id}'). "$@";
// var_dump($pattern);
// preg_match($pattern, 'edit/', $matches);
// var_dump($matches);
// =========================================

// $uri = 'admin/categories/edit/11';
// $key = 'admin/categories/edit/{id}';

// $pattern = "@^" .preg_replace('/{([a-zA-Z]+)}/', '(?<$1>[0-9]+)', $key). "$@";
// var_dump($pattern);
// $result = preg_match($pattern, $uri, $matches);

// print_r("result: ".$result);
// print_r("\n\nmatches: ");
// var_dump($matches);

// =========================================
// $uri = 'admin/posts/edit/bala11';
// $key = 'admin/posts/edit/{id}';

// $pattern = "@^" .preg_replace('/{([a-zA-Z0-9\_\-]+)}/', '(?<$1>[a-zA-Z0-9\_\-]+)', $key). "$@";

// $result = preg_match($pattern, $uri, $matches);

// print_r("result: ".$result);
// print_r("\n\nmatches: ");
// var_dump($matches);
