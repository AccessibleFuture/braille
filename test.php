<?php

include 'PHP-LibLouis/php-liblouis.php';

$output = _performSystemCall(kCallTypeASCIIText, "Hello, World!", "");

echo $output;

?>