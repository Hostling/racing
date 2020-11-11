<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php ob_start(); session_start(); ?>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ru" lang="ru">
<head>
<title>Админка</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <meta http-equiv="Content-Language" content="ru" />
        <meta http-equiv="X-UA-Compatible" content="IE=8" />
<link rel="stylesheet" href="system.css" type="text/css" />
<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="http://bootstrap-3.ru/examples/signin/signin.css" rel="stylesheet">
<link href="css/cover.css" rel="stylesheet">
</head><body>
<?php
header('Content-Language: ru;');
header('Content-Type: text/html; charset=utf-8');
	mysqli_connect ("localhost", "racing","123456", "racing");
	ini_set("display_errors", 1);
	
if (isset($_POST['login']) && isset($_POST['password'])){
	$login = $_POST['login'];
	$password = md5(trim($_POST['password'])); //SarRac1ng
    $query = "SELECT user_id, user_login
            FROM users
            WHERE user_login= '$login' AND user_password = '$password'
            LIMIT 1";
    $sql = mysqli_query($query);
    if (mysqli_num_rows($sql) == 1) {
        $row = mysqli_fetch_assoc($sql);
		$_SESSION['user_id'] = $row['user_id'];
		$_SESSION['user_login'] = $row['user_login'];
		setcookie("CookieMy", $row['user_login'], time()+60*60*24*10);
		
   }
    else {
		header("Location: admin.php"); 
    }
}
if (isset($_SESSION['user_id'])){ ?>
<script src="http://code.jquery.com/jquery-latest.js"></script>
<script src="js/bootstrap.min.js"></script>

 
    

<div class="site-wrapper">

      <div class="site-wrapper-inner">

        <div class="cover-container">

          <div class="masthead clearfix">
            <div class="inner">
              <h3 class="masthead-brand">Админка</h3>
              <ul class="nav masthead-nav">
                <li class="active"><a href="#">Главная</a></li>
                <li><a href="zapis.php">Записи</a></li>
                <li><a href="race.php">Квалификация</a></li>
                <li><a href="settings.php">Настройки</a></li>
              </ul>
            </div>
          </div>

          <div class="inner cover">
            <h1 class="cover-heading">Текущие записи:</h1>
            <table width="700px;" class="table table-striped">
			<tr><th style="width:5%;">№</th><th style="width:60%;">ФИО</th><th style="width:20%;">Автомобиль</th><th style="width:15%;">Состояние</th><th style="width:15%;">Подтвердить</th><th style="width:15%;">Удалить</th></tr>
			<?php 
				$connect = mysqli_connect("localhost","racing","123456","racing");
				mysqli_set_charset($connect, "utf8");
				$result = $connect->query("SELECT * FROM `racing`");
				$i = 1;
				while($re = mysqli_fetch_array($result)) {
    				$id = $re['id'];
  					$fio = $re['fio'];
    				$auto = $re['auto'];
    				if($re['accept'] == '1'){
						$accept = "<td style=\"background:green;\">Да</td><td><a class=\"btn btn-info\" href=\"admin.php?id=$id&accept=0\">Отменить</a></td>";    				
    				}else{
						$accept = "<td style=\"background:red;\">Нет</td><td><a class=\"btn btn-success\" href=\"admin.php?id=$id&accept=1\">Подтвердить</a></td>";
					}
					echo "<tr><td>$i</td><td>$fio</td><td>$auto</td>$accept<td><a class=\"btn btn-danger\" href=\"admin.php?id=$id&del=1\">Удалить</a></td></tr>";
					$i++;
				}
				unset($i);
			?>				
    </table>
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

} else {
	$login = '';
	if (isset($_COOKIE['CookieMy'])){
		$login = htmlspecialchars($_COOKIE['CookieMy']);
	}
	print <<< 	html
	
	<div class="container">
        <form class="form-signin" action="admin.php" method="POST">
        <h2 class="form-signin-heading">Админка</h2>
		    <input class="form-control" placeholder="Логин" name="login" type="text" value = $login><br>
		    <input class="form-control" placeholder="Пароль" name="password" type="password"><br>
	    	<input class="btn btn-lg btn-primary btn-block" name="submit" type="submit" value="Войти">
    	</form>
	</div>
html;
}

	if(isset($_GET['accept']) and isset($_SESSION['user_id'])){
		$id = $_GET['id'];
		$accept = $_GET['accept'];		
		$connect = mysqli_connect("localhost","racing","123456","racing");
		mysqli_set_charset($connect, "utf8");
			if($accept == 1) {
				$maxid = $connect->query("SELECT MAX(accorder) FROM `racing`;");
				$maxid = mysqli_fetch_row($maxid);
				$maxid = $maxid[0];
				$maxid = $maxid + 1;
				$acc = $connect->query("UPDATE `racing` SET `accept` = \"1\", `accorder` = \"$maxid\" WHERE `id` = \"$id\";");
			} else {
				$acc = $connect->query("UPDATE `racing` SET `accept` = \"0\", `accorder` = \"0\" WHERE `id` = \"$id\";");				
				}
			if(isset($acc)){
            echo "<script>setTimeout(function () { document.location.href = 'admin.php'; }, 250);</script>";
            unset($acc);
        	}
	}
	
	if(isset($_GET['del']) and isset($_SESSION['user_id'])){
		$id = $_GET['id'];
		$connect = mysqli_connect("localhost","racing","123456","racing");
		mysqli_set_charset($connect, "utf8");
		$del = $connect->query("DELETE FROM `racing` WHERE `id` = \"$id\";");
		if(isset($del)){
            echo "<script>alert('Удалено');document.location.href = 'admin.php';</script>";
            unset($del);
        }
	}

?>
</body>
</html>