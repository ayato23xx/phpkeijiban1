<?php 
require_once '../Encode.php';
session_start();
if (isset($_POST['id'])===TRUE){$_SESSION['Rid']=$_POST['id']; }
if (isset($_POST['pass'])===TRUE){$_SESSION['Rpass']=$_POST['pass']; }
if (isset($_POST['pass2'])===TRUE){$_SESSION['Rpass2']=$_POST['pass2']; }
 ?>
<DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8" />
	<title>登録内容確認ページ</title>
</head>
<body>
<?php
try{
	$db = new PDO('mysql:host=localhost;dbname=keijibans;charset=utf8','root','');

}catch(PDOException $e){
	die('エラーメッセージ'.$e->getMessage());
}
?>
<h3>確認画面</h3>
<form method="POST" action="login.php">
以下の内容で新規登録しました。<br><br>
<dl>

<dt>ID</dt>
<dd><?php print(e($_SESSION['Rid'])); ?></dd>

<dt>パスワード</dt>
<dd><?php print(e($_SESSION['Rpass'])); ?></dd>

</dl>
<?php
$pass = $_SESSION['Rpass'];
$pass2 = $_SESSION['Rpass2'];
	if($pass == $pass2){
		echo '<button type="button" onclick="location.href=\'login.php\'">登録されました</button>';
		$stt = $db->prepare('INSERT INTO keijiban(id, pass)VALUES(:id, :pass)');
		$stt->bindValue(':id',$_SESSION['Rid']);
		$stt->bindValue(':pass',md5($_SESSION['Rpass']));
		$stt->execute();
		$db = NULL;
	}else{
		echo "パスワード不一致<br>";
		echo "前の画面に戻って再度登録してください<br>";
		echo '<button type="button" onclick="location.href=\'registration.php\'">パスワード不一致</button>';
	}
?>
<br>
	<input type="hidden" name="quest_num" value="XXX15204" />
<?php session_unset(); ?>
</body>
</html>