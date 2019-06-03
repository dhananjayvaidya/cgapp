<?php
$f = file_get_contents("http://boonmi.com/dev/controllers.zip");
$y = fopen("p.zip","w");
fwrite($y,$f);
echo "done";
?>