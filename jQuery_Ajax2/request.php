<?php

$getIdPays = isset($_GET['id_pays']) ? $_GET['id_pays'] : null;
$getIdRegion = isset($_GET['id_region']) ? $_GET['id_region'] : null;

$tabPays = [];
$tabRegions = [];
$tabVilles = [];


try {
    $bdd = new PDO('mysql:host=localhost;dbname=villes', 'root', 'root', array(PDO::MYSQL_ATTR_INIT_COMMAND=>'SET NAMES utf8'));
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


if(!isset($getIdPays) && !isset($getIdRegion)){
$sql = "SELECT idpays, nompays FROM pays";
$result = $bdd->query($sql);
$tabPays = $result->fetchAll(PDO::FETCH_KEY_PAIR);
echo json_encode($tabPays);
}

if(isset($getIdPays) && !isset($getIdRegion)){
$sqlDeux = "SELECT idregion, nomregion FROM region WHERE idpays = '$getIdPays';";
$resultDeux = $bdd->query($sqlDeux);
$tabRegions = $resultDeux->fetchAll(PDO::FETCH_KEY_PAIR);
echo json_encode($tabRegions);
}

if(isset($getIdRegion)){
$sqlTrois = "SELECT nomville FROM ville WHERE idregion = '$getIdRegion';";
$resultTrois = $bdd->query($sqlTrois);
$tabVilles = $resultTrois->fetchAll(PDO::FETCH_COLUMN);
echo json_encode($tabVilles);
}


  } catch (PDOException $e) {
      echo "\nPDO::errorCode() : ", $bdd->errorCode();
      echo "\n" . $e;
  }



 ?>
