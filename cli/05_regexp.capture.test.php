<?php

// regexp.capture.test.php

$subject = "Email you sent was blaha@muha.com. Is it correct?";

$regexp = "/([^\s]+)@([^\s\.]+\.[a-z]+)/";

$result = preg_match_all($regexp, $subject, $match);

var_dump($result,   $match);
