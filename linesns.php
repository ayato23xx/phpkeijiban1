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
<h4>書き込み一覧</h4>
<?php
$data = @file('chat.dat')
	or die('file no open');
//本人
print('<dl>');
foreach(array_reverse($data) as $row){
	$datum = explode("\t",$row);
?>
<?php
if($_SESSION['Lid'] == $datum[1]){
?>
	<Div Align="right">
	<dt><?php print(e($datum[1])); ?>
		<?php print(e('('.$datum[0].')')); ?></dt>
	<dd><?php print(e($datum[2])); ?>：メッセージ<hr /></dd></Div>
<?php
	}
print('</dl>');
}
?>
<!--本人以外-->
<?php
print('<dl>');
foreach(array_reverse($data) as $row){
	$datum = explode("\t",$row);
?>
<?php
if($_SESSION['Lid'] != $datum[1]){
?>
	<dt><?php print(e($datum[1])); ?>
		<?php print(e('('.$datum[0].')')); ?></dt>
	<dd>メッセージ：<?php print(e($datum[2])); ?><hr /></dd>
<?php
	}
print('</dl>');
}
?>
</body>
</html>