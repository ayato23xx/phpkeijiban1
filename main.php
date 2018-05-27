<?php
require_once '../Encode.php';
session_start();
?>
<DOCTYPE html>
<head>
	<meta charset="UTF-8" />
	<title>メインページ</title>
</head>
<html>
	<frameset rows="25%,75%">
	<frame src="info.php" name="info">
	<frame src="linesns.php" name="linesns">
	</frameset>
</html>