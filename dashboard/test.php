<?php
 
#echo '1';
$a="Hello";
$n='1';
$hashed = hash("sha512", $a);
echo shell_exec("python test.py $n $hashed");
#echo '2';

?>