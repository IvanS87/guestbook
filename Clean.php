<?php
 
require "vendor/autoload.php";

$faker = Faker\Factory::create();


require_once "connect.php";

/*$servername = "127.0.0.1";
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
  

$sql = "delete from `posts` ";
$result = $mysqli->query($sql); if (!$result) die($mysql->error);



?>

<script type="text/javascript">document.location.href="index.php"</script>





