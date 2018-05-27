<?php
require_once '../Encode.php';
session_start();
?>
<DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8" />
	<title>メインページ</title>
</head>
<body>
&nbsp;
<input type="button" onclick="top.location.replace('login.php')" value="ログアウト" />
&nbsp;&nbsp;
<input type="button" onclick="top.location.replace('members.php')" value="会員ページ" />
<br><br>
ようこそ『<b><?php print(e($_SESSION['Lid'])); ?></b>』さん。<br>
<hr />
<br>
<form method="POST" action="writer.php" target="info">
	<div class="container">
		<label for="chat">メッセージ：</label>
		<input type="text" id="chat" name="chat"
		size="100" maxlength="255" />
	<input type="submit" value="送信" onclick="parent.frames.linesns.location.reload(true)" />
	<input type="button" value="更新" onclick="parent.frames.linesns.location.reload(true);" />
	</div>
	<br>
</form>
</body>
</html>