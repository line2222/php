<?php
$data = $_GET['data'];
echo $data;
preg_replace('/<data>(.*)<\/data>/e', '$ret = "\\1";', $data);
echo $ret;