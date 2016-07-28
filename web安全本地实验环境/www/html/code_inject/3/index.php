<?php
$data = $_GET['data'];
#echo "\$ret = strtolower(\"$data\");";
eval("\$ret = strtolower(\"$data\");");
echo $ret;
