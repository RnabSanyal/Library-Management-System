<?php
$ts = 36917;
$date = new DateTime("@$ts");
echo $date->format('U = Y-m-d H:i:s') . "\n";
?>