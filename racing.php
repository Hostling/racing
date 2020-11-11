<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ru" lang="ru">
    <head>
        <title>Запись на гонки</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <meta http-equiv="Content-Language" content="ru" />
        <meta http-equiv="X-UA-Compatible" content="IE=8" />
        <link rel="stylesheet" href="system.css" type="text/css" />
			<link href="css/bootstrap.min.css" rel="stylesheet">
			<link href="css/cover.css" rel="stylesheet">
			<link href="css/signin.css" rel="stylesheet">
    </head>
   <body>
   	
	<?php


	 if($_GET['action'] == 'zapis'){ //Регистрация на гонку ?>
	 	

	<?php	} else { //Страница по умолчанию ?>
	<script src="http://code.jquery.com/jquery-latest.js"></script>
	<script src="js/bootstrap.min.js"></script>
	
	<div class="site-wrapper">

      <div class="site-wrapper-inner">

        <div class="cover-container">

          <div class="masthead clearfix">
            <div class="inner">
              <h3 class="masthead-brand">Гонки в Саратове</h3>
              <ul class="nav masthead-nav">
                <li><a href="drift.php">Дрифт</a></li>
                <li class="active"><a href="#">Тайматак</a></li>
              </ul>
            </div>
          </div>

          <div class="inner cover">
              <?php
              $connect = mysqli_connect("localhost","racing","VYq0ekNo","racing");
		mysqli_set_charset($connect, "utf8");
		$result = $connect->query("SELECT `value` FROM `settings` where `name` = 'header'");
		$header = mysqli_fetch_row($result);
            ?>
            <h1 class="cover-heading"><?php echo $header[0]; ?></h1>
		<form method="POST" class="form-signin">
            <input type="text" class="form-control" style="" placeholder="Имя" name="fio" required>
            <input type="text" class="form-control" style="" placeholder="Авто" name="auto" required>
            <input type="text" class="form-control" style="" placeholder="Город" name="city" required>
			<input type="submit" name="reg" class="btn btn-lg btn-block btn-reg" value="Зарегистрироваться">
	 	</form>
	 	<br />
			<table width="700px" class="table table-striped">
			<th style="width:5%;">№</th><th style="width:60%;">ФИО</th><th style="width:20%;">Автомобиль</th><th style="width:20%;">Город</th>
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
					echo "<tr><td>$i</td><td>$fio</td><td>$auto</td><td>$city</td></tr>";
					$i++;
				}
				unset($i);
			
			?>				
			</table>
			
			</div>

          <div class="mastfoot">
            <div class="inner">
              <p>2016г. Саратов.</p>
            </div>
          </div>

        </div>

      </div>

    </div>
				 	<?php
	 	if(isset($_POST['reg'])){
				$fio = $_POST['fio'];
				$auto = $_POST['auto'];
				$city = $_POST['city'];
				
				$connect = mysqli_connect("localhost","racing","VYq0ekNo","racing");
				mysqli_set_charset($connect, "utf8");
					$result = $connect->query("SELECT MAX(id) FROM `racing`;");
				   $res = mysqli_fetch_row($result);
    				$maxid = $res[0];
    				$maxid = $maxid + 1; 			
				$result = $connect->query("INSERT INTO `racing` (id, fio, auto, city) VALUES(\"$maxid\",\"$fio\",\"$auto\",\"$city\");"); 	
	 			header('Location: racing.php');
	 	}
		?>	

	<?php	} ?>
	</body>

</html>