<?php

$getLogin = isset($_GET['login']) ? $_GET['login'] : null;
$getPassword = isset($_GET['password']) ? $_GET['password'] : null;
$getPasswordConfirm = isset($_GET['passwordConfirm']) ? $_GET['passwordConfirm'] : null;



$tabLogin = [];



try {
    $bdd = new PDO('mysql:host=localhost;dbname=users', 'root', 'root', array(PDO::MYSQL_ATTR_INIT_COMMAND=>'SET NAMES utf8'));
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


if(isset($getLogin)){
$sql = "SELECT login from USERS where login = '$getLogin';";
$result = $bdd->query($sql);
$tabLogin = $result->fetch();
echo json_encode($tabLogin);
}

if(isset($getPassword) && isset($getPasswordConfirm)){
 if($getPassword !== $getPasswordConfirm){
echo json_encode(false);
}else{
echo json_encode(true);
}
}


  } catch (PDOException $e) {
      echo "\nPDO::errorCode() : ", $bdd->errorCode();
      echo "\n" . $e;
  }



 ?>
