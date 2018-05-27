**データーベース**
ユーザネーム：kijimausr
パスワード：phppass
データベース名：test
テーブル名：keijiban

***テーブル情報***
項目名	データ型　	その他
sid	int(11)		A/I,主キー
id	varchar(32)	utf8_general_ci	
pass	varchar(32)	*MD5ﾊｯｼｭで保存。最低32以上



**各種ファイル**
・securimageフォルダ	画像認証ライブラリ
・login.php		ログインページ（ここがTOPページです）
・registration.php	新規登録画面ページ
・request1.php		登録実行ページ
・authentication.php	認証ページ	
・main.php		掲示板ページ（フレーム分割）
・info.php		掲示板入力ページ(フレーム上段)
・linesns.php		掲示板本体（フレーム下段）
・members.php		会員ページ
・writer.php/chat.dat	ログ書き込み/保存
・Encode.php		エンコードファイル（*）
・readme.txt		このファイルです。



