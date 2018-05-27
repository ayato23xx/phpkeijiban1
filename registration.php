<?php
require_once '../Encode.php';
require_once './securimage/securimage.php';
session_start();
if (isset($_POST['id'])===TRUE){$_SESSION['Rid']=$_POST['id']; }
if (isset($_POST['pass'])===TRUE){$_SESSION['Rpass']=$_POST['pass']; }
if (isset($_POST['pass2'])===TRUE){$_SESSION['Rpass2']=$_POST['pass2']; }
$gazou = isset($_POST['gazou']) ? $_POST['gazou']:null;

if($gazou != null){
	$img = new securimage();
	if ($img->check($gazou) == false){
		$gazou = 2;
	}else{
		echo("<META HTTP-EQUIV=Refresh CONTENT=1;URL='./request1.php'>\n");
		exit;
	}
}
?>
<DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8" />
	<title>登録ページ</title>
</head>
<body>
<h3>登録画面</h3>

<form method="post" action="">
	<div class="container">
		<label for="id">登録ID</label><br />
		<input type="text" id="id" name="id"
		value="<?php print(e($_SESSION['Rid'])); ?>" />
	</div>

	<div class="container">
		<label for="pass">パスワード</label><br />
		<input type="password" id="pass" name="pass"
		value="<?php print(e($_SESSION['Rpass'])); ?>" />
	</div>

	<div class="container">
		<label for="pass2">パスワード（確認）</label><br />
		<input type="password" id="pass2" name="pass2"
		value="<?php print(e($_SESSION['Rpass2'])); ?>" />
	</div>

画像認証<br>
<table cellpadding="5" cellspacing="0" border="3" bordercolor="#cccccc">
<tr>
<td>
<?php
if($gazou == 2){echo "<p style=\"text-align:center;margin-top:0;\"><font color=\"red\">文字列が違います！</font></p>";}
?>
<img src="./securimage/securimage_show.php?sid=<?php echo md5(uniqid()) ?>" id="siimage">
<a tabindex="-1" style="border-style: none;" href="#" title="画像を更新する" onclick="document.getElementById('siimage').src = './securimage/securimage_show.php?sid=' + Math.random(); this.blur(); return false">
<img src="./securimage/images/refresh.png" width="25" height="25" alt="Reload Image" onclick="this.blur()" align="bottom" border="0"></a>
<input type="text" name="gazou" id="gazous" size="10" maxlength="6" style="ime-mode: inactive;">
</td>
<tr>
</table>

<br>

	<input type="hidden" name="quest_num" value="XXX15204" />
	<input type="submit" value="登録" />

</form>
</body>
</html>