<!DOCTYPE html>
<html>
<head>
	<meta http-equiv=Content-Type content="text/html; charset=utf-8">
	<title>determining year</title>
</head>
<body>
  <?php
    if (empty(!$_POST["year"]))
    {
        $year = $_POST['year'];
        if ($year==0){$result="你输入的不是年份";}
        if ($year%100 == 0)  //判断是否为世纪年
        {
        	if ($year%400 ==0 && $year%3200 !==0)   //世纪年能被400整除而不能被3200整除的为闰年。
//按一回归年365天5h48'45.5''计算：
//3200年多出16000小时153600分145600秒 =18600小时26分40秒,共32*24(100年里24个闰年)+8（3200年里400年1个闰年）=776闰年 
//776*24=18624小时 >18600小时,所以只能算到775个闰年,3200不是闰年
        	     {$result = "世纪年 => This is a leap year.";}
            else {$result = "世纪年 => This is not a leap year.";}
        }
        elseif ($year%4 == 0)  //普通年为4年1个闰年
         	 {$result = "普通年 => This is a leap year.";}
        else {$result = "普通年 => This is not a leap year.";}  

    }
  elseif ($_POST['year']=='0') {
    $result="你输入的不是年份";
   } 
   else{$result = "请输入年份！";}
  
 
  ?>

  <form method="post">
	<tabe
		<tr>
			<td>请输入年份：</td>
			<td><input type="text" name="year" ></td> <!-- placeholder="格式为纯数字"-->
		</tr>
		<tr>
			<td colspan="2" align="right"><input type="submit" name="submit" value="查询"></td> 
		</tr>
	</table>
  </form>
  <?php
  if (isset($result)) 
  {
  
  echo $result;
  } 
  ?>
</body>
</html>
