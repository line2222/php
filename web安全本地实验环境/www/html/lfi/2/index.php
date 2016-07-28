<?php
if ($_GET['page']) {  
include("./action/".$_GET['page']);  
} else {  
include "./action/show.php";  
}
