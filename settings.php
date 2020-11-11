<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php ob_start(); session_start(); ?>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ru" lang="ru">
    <head>
        <title>Настройки</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <meta http-equiv="Content-Language" content="ru" />
        <meta http-equiv="X-UA-Compatible" content="IE=8" />
        <link rel="stylesheet" href="system.css" type="text/css" />
			<link href="css/bootstrap.min.css" rel="stylesheet">
			<link href="css/cover.css" rel="stylesheet">
    </head>
   <body>
   		<?php
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
                <li><a href="zapis.php">Записи</a></li>
                <li><a href="race.php">Квалификация</a></li>
                <li class="active"><a href="#">Настройки</a></li>
              </ul>
            </div>
          </div>
<?php
        $connect = mysqli_connect("localhost","racing","123456","racing");
		mysqli_set_charset($connect, "utf8");
		$result = $connect->query("SELECT `value` FROM `settings` where `name` = 'header'");
		$header = mysqli_fetch_row($result);
		$resultdr = $connect->query("SELECT `value` FROM `settings` where `name` = 'headerdrift'");
		$headerdr = mysqli_fetch_row($resultdr);
		//while($re = mysqli_fetch_array($result)) {
        //$id = $re['id'];
    	//}
    		?>
          <div class="inner cover">
            <h1 class="cover-heading">Настройки сайта</h1>
	        <p> Заголовок на странице тайматак:</p>
	        <form method="post">
	            <input type="text" class="form-control" name="hd" placeholder="<?php echo $header[0]; ?>">
	            <input type="submit" name="changehd" class="btn btn-reg" value="Поменять">
	        </form>
	        <p> Заголовок на странице дрифт:</p>
	        <form method="post">
	            <input type="text" class="form-control" name="hddr" placeholder="<?php echo $headerdr[0]; ?>">
	            <input type="submit" name="changehddr" class="btn btn-reg" value="Поменять">
	        </form>
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
	if(isset($_POST['changehd'])){	
		$connect = mysqli_connect("localhost","racing","VYq0ekNo","racing");
		mysqli_set_charset($connect, "utf8");
		$newhd = $_POST['hd'];
		$result = $connect->query("UPDATE `settings` SET `value` = '$newhd' WHERE `name` = 'header';");
		//header("Location: settings.php");
	}
	if(isset($_POST['changehddr'])){	
		$connect = mysqli_connect("localhost","racing","VYq0ekNo","racing");
		mysqli_set_charset($connect, "utf8");
		$newhddr = $_POST['hddr'];
		$result = $connect->query("UPDATE `settings` SET `value` = '$newhddr' WHERE `name` = 'headerdrift';");
		//header("Location: settings.php");
	}
} else {
echo "<script>document.location.href = 'admin.php';</script>";
} ?>
	</body>

</html>