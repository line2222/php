<meta charset='utf-8'>
<?php
date_default_timezone_set('Asia/Dhaka');

$allowtype = array("gif", "png", "jpg");
$size = 1000000;
$path = "./uploads";

if (!is_dir($path)) {
	mkdir($path);
}

// 判断文件是否可以成功上传到
if ($_FILES['upload_file']['error'] > 0) {	
	die("Error: 上传错误");
}

//判断上传的文件是否为允许的文件类型，通过文件的后缀名
$hz = array_pop(explode(".", $_FILES['upload_file']['name']));
if (!in_array($hz, $allowtype)) {
	die("Error: 上传类型{$hz}不允许");
}

// 也可以通过获取上传文件的MIME类型中的主类型和子类型，来限制文件上传的类型
list($maintype, $subtype) = explode("/", $_FILES['upload_file']['type']);
if ($maintype == 'text') {			// 通过主类型来限制文件上传
	die("Error: 不能上传文本类型文件");
}

//判断上传的文件是否为允许大小
if ($_FILES['upload_file']['size'] > $size) {
	die("Error: 超过了允许的{$size}字节大小");
}

//为了系统安全， 也为了同名文件不回被覆盖上传后文件使用系统定义
$filename = date("YmdHis").rand(100,999).".".$hz;

//判断是否为上传文件
if ( is_uploaded_file($_FILES['upload_file']['tmp_name']) ) {
	if ( !move_uploaded_file($_FILES['upload_file']['tmp_name'], $path.'/'.$filename) ) {
		die("Error: 不能将文件移动到指定目录");
	}
} else {
	die("Error: 上传文件{$_FILES['upload_file']['tmp_name']}不是一个合法的文件");
}
echo "上传文件{$_FILES['upload_file']['name']}成功， 保存在{$path}/{$filename}, 大小为{$_FILES['upload_file']['size']}字节";
?>