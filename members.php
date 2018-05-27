<?php 
require_once '../Encode.php';
session_start();
?>
<DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8" />
	<title>会員ページ</title>
<STYLE type="text/css">
	table{
		border:2px solid #696969;
		width:250px;
		border-collapse:collapse;
	}
	th{
		padding:10px;
		background-color:#f5fffa;
		border:2px solid #696969;
		padding:10px;
	}
	tr{
		border:2px solid #696969;
		padding:10px;
	}
</STYLE>
</head>
<body>
<?php
	try{
		$db = new PDO('mysql:host=localhost;dbname=keijibans;charset=utf8','root','');
	}catch(PDOException $e){
		die('エラーメッセージ'.$e->getMessage());
	}
?>
<h2>会員ページ</h2>
会員専用ページです。
登録情報の確認・登録情報更新等ができます。<br>
<?php
	$stt = $db->prepare('SELECT * FROM keijiban');
	$stt->execute();
	$db = NULL;
?>
<hr />
<h3>登録情報</h3><br>
<table>
<tr>
<th>ID</th><th><?php print(e($_SESSION['Lid'])); ?></th>
</tr>
<tr>
<th>PASS</th><th><?php print(e($_SESSION['Lpass'])); ?></th>
</tr>
</table>
<br>
&nbsp;
<input type="button" onclick="top.location.replace('login.php')" value="戻る" />
</body>
</html>