<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php ob_start(); session_start(); ?>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ru" lang="ru">
    <head>
        <title>Квалификация</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <meta http-equiv="Content-Language" content="ru" />
        <meta http-equiv="X-UA-Compatible" content="IE=8" />
        <link rel="stylesheet" href="system.css" type="text/css" />
			<link href="css/bootstrap.min.css" rel="stylesheet">
			<link href="css/cover.css" rel="stylesheet">
    </head>
   <body>
   		<?php
if (true){ ?>

		<script src="http://code.jquery.com/jquery-latest.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<div class="site-wrapper">

      <div class="site-wrapper-inner">

        <div class="cover-container">

          <div class="masthead clearfix">
            <div class="inner">
              <h3 class="masthead-brand">Админка</h3>
              <ul class="nav masthead-nav">
                <li><a href="admin.php">Главная</a></li>
                <li><a href="zapis.php">Записи</a></li>
                <li class="active"><a href="#">Квалификация</a></li>
                <li><a href="settings.php">Настройки</a></li>
              </ul>
            </div>
          </div>

          <div class="inner cover">
            <h1 class="cover-heading">Квалификация</h1>
		<table width="700px" class="table table-striped">
			<th style="">№</th><th style="">ФИО</th><th style="">Авто</th><th style="">Результат 1</th><th style="">Результат 2</th><th style="">Результат 3</th>
			
			
			
			
			<?php
			$connect = mysqli_connect("localhost","racing","123456","racing");
		mysqli_set_charset($connect, "utf8");
		$result = $connect->query("SELECT * FROM `qual`");
		while($re = mysqli_fetch_array($result)) {
    		$id = $re['id'];
  			$fio = $re['fio'];
    		$auto = $re['auto'];
    		$res1 = $re['res1'];
     		$res2 = $re['res2'];
    		$res3 = $re['res3'];
			echo "<tr><td>$id</td><td>$fio</td><td>$auto</td>";
			if($res1 == 0){
			echo "<td><input type=\"text\" name=\"{$id}res1\" style=\"width:30px;height: 32px;color: black;\"><input type=\"button\" class=\"btn btn-default\" onclick=\"instime('$id', '', 'res1')\" value=\"Записать\"></td>";
		}else { echo "<td>$res1</td>"; }
			if($res2 == 0){
			echo "<td><input type=\"text\" name=\"{$id}res2\" style=\"width:30px;height: 32px;color: black;\"><input type=\"button\" class=\"btn btn-default\" onclick=\"instime('$id', '', 'res2')\" value=\"Записать\"></td>";
		}else { echo "<td>$res2</td>"; }
			if($res3 == 0){
			echo "<td><input type=\"text\" name=\"{$id}res3\" style=\"width:30px;height: 32px;color: black;\"><input type=\"button\" class=\"btn btn-default\" onclick=\"instime('$id', '', 'res3')\" value=\"Записать\"></td>";
			}else { echo "<td>$res3</td>"; }
			echo "</tr>";
		}
			?>				
		</table>
<a href="race.php?action=madequal" class="btn btn-success">Сформировать квалификацию</a>
<a href="race.php?action=clearqual" class="btn btn-danger">Очистить квалификацию</a>
</div>

          <div class="mastfoot">
            <div class="inner">
              <p>Тут что-нибудь напишем.</p>
            </div>
          </div>

        </div>

      </div>

    </div>


<?php	
	if($_GET['action'] == 'madequal'){	
		$connect = mysqli_connect("localhost","racing","123456","racing");
		mysqli_set_charset($connect, "utf8");
		$result = $connect->query("INSERT INTO `qual` (fio, auto) SELECT fio, auto FROM `racing` WHERE accept = 1 ORDER BY accorder ASC;");
		header("Location: race.php");
	}
	if($_GET['action'] == 'clearqual'){	
		$connect = mysqli_connect("localhost","racing","123456","racing");
		mysqli_set_charset($connect, "utf8");
		$result = $connect->query("TRUNCATE TABLE qual");
		header("Location: race.php");
	}
	//<input type=\"button\" class=\"button\" onclick=\"zakaz('$pro', '$detnom', '$detname', '$price1', '$price', '$urls2')\" value=\"Заказать\">
	?>
	
	
	<script type="text/javascript">
function instime(a, b, c)
{
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
	var detalid = xmlhttp.responseText;
    }
  }
  var arg1 = arguments[0];
  var arg2 = arguments[2];
  var restime = document.getElementsByName(''+arg1+arg2)[0].value;
var params = "id="+arguments[0]+"&time="+restime+"&res="+arguments[2];
xmlhttp.open("GET","insert.php?"+params,true);
xmlhttp.send();

setTimeout(function () { 
      location.reload();
    }, 500);

}

</script>
<?php

} else {
echo "<script>document.location.href = 'admin.php';</script>";
} ?>
	</body>

</html>