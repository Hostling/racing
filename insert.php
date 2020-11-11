<?php
header( 'Content-type: text/html; charset=utf-8' );
//Заказ из парсера
if($_GET['id']) {
$id = $_GET['id'];
$time = $_GET['time'];
$res = $_GET['res'];

$connect = mysqli_connect("localhost","racing","VYq0ekNo","racing");
		mysqli_set_charset($connect, "utf8");
		$result = $connect->query("UPDATE `qual` SET $res = '$time' WHERE id = '$id'");
}
?>