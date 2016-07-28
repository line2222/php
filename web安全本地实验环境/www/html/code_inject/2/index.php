<?php
$data = $_GET['data'];
echo "\$ret = '$data';";
eval("\$ret = strtolower('$data');");
echo $ret;
