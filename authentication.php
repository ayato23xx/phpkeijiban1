<?php 
require_once '../Encode.php';
session_start();
$_SESSION['Lid'] = $_POST['Lid'];
$_SESSION['Lpass'] = $_POST['Lpass'];
?>
<DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8" />
	<title>認証ページ</title>
</head>
<body>
<?php
try{
	$db = new PDO('mysql:host=localhost;dbname=keijibans;charset=utf8','root','');
}catch(PDOException $e){
	die('エラーメッセージ'.$e->getMessage());
}
?>

<?php
	$stt = $db->prepare('SELECT * FROM keijiban');
	$stt->execute();
	$db = NULL;
	while($row = $stt->fetch()){
		$db_id = $row['id'];
		$db_pass = $row['pass'];
//ここまでは正常動作//
	if($_POST['Lid'] == $db_id){
		$flag = 1;
//ID出力	//print($db_id);
		if(md5($_POST['Lpass']) == $db_pass && $flag == 1){
			$flag = 2;
//PASS出力	//print($db_pass);
		}else{
			$flag = 0;
		}
	}
}

//flag出力//print($flag);

	if($flag == 1){
		print('パスワードが違います。</br>');
		print('戻って再度ログインしてください<br><br>。');
		echo '<button type="button" onclick="location.href=\'login.php\'">戻る</button>';
	}
	if($flag == 2){
		print('ログイン成功');
		header("Location: main.php");
	}
	if($flag == 0){
		print('IDまたはパスワードが違います。<br>');
		print('戻って再度ログインしてください。<br><br>');
		echo '<button type="button" onclick="location.href=\'login.php\'">戻る</button>';
	}

?>
</body>
</html>