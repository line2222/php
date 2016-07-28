<?php
$data = $_GET['data'];
eval("\$ret = strtolower(\"$data\");"); 
echo $ret;