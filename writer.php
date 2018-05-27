<?php
require_once '../Encode.php';
session_start();
$file = fopen('chat.dat','ab');
flock($file,LOCK_EX);
fputs($file,date('m月d日(D) H:i:s')."\t");
fputs($file,$_SESSION['Lid']."\t");
sleep(2);
fputs($file,$_POST['chat']."\n");
flock($file,LOCK_UN);
fclose($file);
header('Location: http://localhost/lesson/keijiban/info.php');
?>