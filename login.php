<?php 
require_once '../Encode.php';
session_start();
?>

<DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8" />
	<title>ログインページ</title>
</head>
<body>
<h3>ログインフォーム</h3>
<form method="POST" action="authentication.php">
	<div class="container">
		<label for="Lid">ID</label><br />
		<input type="text" id="Lid" name="Lid"
		value="<?php print(e($_SESSION['Lid'])); ?>" />
	</div>

	<div class="container">
		<label for="Lpass">パスワード</label><br />
		<input type="password" id="Lpass" name="Lpass"
		value="<?php print(e($_SESSION['Lpass'])); ?>" />
	</div>
<br>
	<input type="hidden" name="quest_num" value="XXX15204" />
	<input type="submit" value="送信" />
	<input type="submit" value="新規登録" onclick="form.action='registration.php';return true" />

</form>
</body>
</html>