<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php ob_start(); session_start(); ?>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ru" lang="ru">
<head>
<title>Записи</title>
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
	mysql_connect ("localhost", "racing","VYq0ekNo");
	mysql_select_db("racing") or die (mysql_error());
	mysql_query('SET character_set_database = utf8'); 
	mysql_query ("SET NAMES 'utf8'");
	error_reporting(E_ALL); 
	ini_set("display_errors", 1);
	
if (isset($_POST['login']) && isset($_POST['password'])){
	$login = mysql_real_escape_string(htmlspecialchars($_POST['login']));
	$password = md5(trim($_POST['password'])); //SarRac1ng
    $query = "SELECT user_id, user_login
            FROM users
            WHERE user_login= '$login' AND user_password = '$password'
            LIMIT 1";
    $sql = mysql_query($query) or die(mysql_error());
    if (mysql_num_rows($sql) == 1) {
        $row = mysql_fetch_assoc($sql);
		$_SESSION['user_id'] = $row['user_id'];
		$_SESSION['user_login'] = $row['user_login'];
		setcookie("CookieMy", $row['user_login'], time()+60*60*24*10);
		
   }
    else {
		header("Location: zapis.php"); 
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
                <li><a href="admin.php">Главная</a></li>
                <li class="active"><a href="#">Записи</a></li>
                <li><a href="race.php">Квалификация</a></li>
                <li><a href="settings.php">Настройки</a></li>
              </ul>
            </div>
          </div>

          <div class="inner cover">
            <h1 class="cover-heading">Тайматак:</h1>
            <?php
                $connect = mysqli_connect("localhost","racing","VYq0ekNo","racing");
				mysqli_set_charset($connect, "utf8");
				$result = $connect->query("SELECT * FROM `racing`");
            ?>
            <form method="POST">
                <select class="form-control" name="id">
                    <?php
                    $i = 1;
                    while($re = mysqli_fetch_array($result)) {
        				$id = $re['id'];
      					$fio = $re['fio'];
    					 echo "<option value=\"$id\">$fio</option>";
    					$i++;
    				}
                   
                    ?>
                </select>
                <select class="form-control" name="field">
                    <option value="fio">ФИО</option>
                    <option value="auto">Авто</option>
                    <option value="city">Город</option>
                </select>
                <input type="text" class="form-control" style="" placeholder="Значение" name="val" required>
    			<input type="submit" class="btn btn-success" name="change" value="Применить">
	 	    </form>
            <table width="700px;" class="table table-striped">
			<tr><th style="width:5%;">№</th><th style="width:60%;">ФИО</th><th style="width:20%;">Автомобиль</th><th style="width:15%;">Город</th><th style="width:15%;">Удалить</th></tr>
			<?php 
			    $connect = mysqli_connect("localhost","racing","VYq0ekNo","racing");
				mysqli_set_charset($connect, "utf8");
				$result = $connect->query("SELECT * FROM `racing`");
				$i = 1;
				while($re = mysqli_fetch_array($result)) {
    				$id = $re['id'];
  					$fio = $re['fio'];
    				$auto = $re['auto'];
    				$city = $re['city'];
					echo "<tr><td>$i</td><td>$fio</td><td>$auto</td><td>$city</td><td><a class=\"btn btn-danger\" href=\"zapis.php?id=$id&del=1&zap=ta\">Удалить</a></td></tr>";
					$i++;
				}
				unset($i);
			?>				
            </table>
            <br />
            <h1 class="cover-heading">Дрифт:</h1>
            <?php
                $connect = mysqli_connect("localhost","racing","VYq0ekNo","racing");
				mysqli_set_charset($connect, "utf8");
				$result = $connect->query("SELECT * FROM `drift`");
            ?>
            <form method="POST">
                <select class="form-control" name="id">
                    <?php
                    $i = 1;
                    while($re = mysqli_fetch_array($result)) {
        				$id = $re['id'];
      					$fio = $re['fio'];
    					 echo "<option value=\"$id\">$fio</option>";
    					$i++;
    				}
                   
                    ?>
                </select>
                <select class="form-control" name="field">
                    <option value="fio">ФИО</option>
                    <option value="auto">Авто</option>
                    <option value="city">Город</option>
                </select>
                <input type="text" class="form-control" style="" placeholder="Значение" name="val" required>
    			<input type="submit" class="btn btn-success" name="changedr" value="Применить">
	 	    </form>
            <table width="700px;" class="table table-striped">
			<tr><th style="width:5%;">№</th><th style="width:60%;">ФИО</th><th style="width:20%;">Автомобиль</th><th style="width:15%;">Город</th><th style="width:15%;">Удалить</th></tr>
			<?php 
				$connect = mysqli_connect("localhost","racing","VYq0ekNo","racing");
				mysqli_set_charset($connect, "utf8");
				$result = $connect->query("SELECT * FROM `drift`");
				$i = 1;
				while($re = mysqli_fetch_array($result)) {
    				$id = $re['id'];
  					$fio = $re['fio'];
    				$auto = $re['auto'];
    				$city = $re['city'];
					echo "<tr><td>$i</td><td>$fio</td><td>$auto</td><td>$city</td><td><a class=\"btn btn-danger\" href=\"zapis.php?id=$id&del=1&zap=dr\">Удалить</a></td></tr>";
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
        <form class="form-signin" action="zapis.php" method="POST">
        <h2 class="form-signin-heading">Админка</h2>
		    <input class="form-control" placeholder="Логин" name="login" type="text" value = $login><br>
		    <input class="form-control" placeholder="Пароль" name="password" type="password"><br>
	    	<input class="btn btn-lg btn-primary btn-block" name="submit" type="submit" value="Войти">
    	</form>
	</div>
html;
}

	
	if(isset($_GET['del']) and isset($_SESSION['user_id'])){
		$id = $_GET['id'];
		$zap = $_GET['zap'];
		$connect = mysqli_connect("localhost","racing","VYq0ekNo","racing");
		mysqli_set_charset($connect, "utf8");
		if($zap == 'ta'){
    		$del = $connect->query("DELETE FROM `racing` WHERE `id` = \"$id\";");
		} else {
		    $del = $connect->query("DELETE FROM `drift` WHERE `id` = \"$id\";");
		}
		if(isset($del)){
            echo "<script>document.location.href = 'zapis.php';</script>";
            unset($del);
        }
	}
	
	if(isset($_POST['change'])){
				$id = $_POST['id'];
				$field = $_POST['field'];
				$val = $_POST['val'];
				
				$connect = mysqli_connect("localhost","racing","VYq0ekNo","racing");
				mysqli_set_charset($connect, "utf8");
				$result = $connect->query("UPDATE `racing` SET `$field` = '$val' where `id` = '$id'"); 	
	 			header('Location: zapis.php');
	}

    if(isset($_POST['changedr'])){
				$id = $_POST['id'];
				$field = $_POST['field'];
				$val = $_POST['val'];
				
				$connect = mysqli_connect("localhost","racing","VYq0ekNo","racing");
				mysqli_set_charset($connect, "utf8");
				$result = $connect->query("UPDATE `drift` SET `$field` = '$val' where `id` = '$id'"); 	
	 			header('Location: zapis.php');
	}
	

?>
</body>
</html>