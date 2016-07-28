<?php
if ($_GET['page']) {  
include "./action/".$_GET['page'].".php";  
} else {  
include "./action/show.php";  
}
