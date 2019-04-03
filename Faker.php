<?php
 
require "vendor/autoload.php";

$faker = Faker\Factory::create('ru_RU');


require_once "connect.php";

/*
$servername = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "guestform";

$mysqli = new mysqli($servername,$username , $password, $dbname);
if ($mysqli->connect_errno) {
   
    echo "Извините, возникла проблема на сайте";

    echo "Ошибка: Не удалась создать соединение с базой MySQL и вот почему: \n";
    echo "Номер ошибки: " . $mysqli->connect_errno . "\n";
    echo "Ошибка: " . $mysqli->connect_error . "\n";
    exit;
}else {

	echo "Соединение установленно!";
}
*/
   
  
for ($i = 1; $i <= 1000; $i++) {
   $DataTime = ("$faker->date"." "."$faker->time");
$sql = "INSERT INTO posts (Username, emeil, Homepage, text1, CreatedAt) VALUES ('$faker->name','$faker->email','$faker->url','$faker->realText','$DataTime')";
if ($mysqli->query($sql)=== TRUE) {
    echo "Записано  в бд";
}else{
    echo "Ошибка записи";
}
}




?>

<script type="text/javascript">document.location.href="index.php"</script>



