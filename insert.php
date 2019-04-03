<?php
 
session_start();

    
        if ($_SESSION['code'] == ($_POST['captcha'])) echo "Успех!"; 
        else die("CAPTCHA");
    
 require_once "connect.php";

   
  


$sql = "INSERT INTO posts (Username, emeil, Homepage, text1, CreatedAt) VALUES ('" .$_POST['Username'] . "','" .$_POST['email'] . "','" .$_POST['Homepage'] . "','" .htmlspecialchars($_POST['text1']). "','" .$_POST['CreatedAt'] . "')";

if ($mysqli->query($sql)=== TRUE) {
	echo "Записано  в бд";
}else{
	echo "Ошибка записи";
}


?>




