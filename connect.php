<?php

$servername = "GuestBook";
$username = "root";
$password = "";
$dbname = "guestform";

$mysqli = new mysqli('127.0.0.1',$username , $password, $dbname);
if ($mysqli->connect_errno) {
   
    echo "Извините, возникла проблема на сайте";

    echo "Ошибка: Не удалась создать соединение с базой MySQL и вот почему: \n";
    echo "Номер ошибки: " . $mysqli->connect_errno . "\n";
    echo "Ошибка: " . $mysqli->connect_error . "\n";
    exit;
}else {

	echo "Соединение установленно!";

}

?>