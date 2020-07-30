<?php
mb_internal_encoding("utf8");

$temp_pic_name=$_FILES['picture']['tmp_name'];
// ↑「picture」という名前の箱に入ったファイル「自体」を取得している

$original_pic_name=$_FILES['picture']['name'];
// ↑「picture」という名前の箱に入ったファイル「名」を取得している

$path_filename='./image/'.$original_pic_name;
// ↑「register_confirm.php(俺自身)」から見たファイル「パス」の先にファイル「名」をぶちこむ
// 追記：ここ、もしかして文字列を連結させているだけだったりする？

move_uploaded_file($temp_pic_name,$path_filename);
// ↑取得した「ファイル自体」を「俺自身から見たファイルパス」の先に取得したファイル「名」で物理的にぶちこむ
?>

<!doctype html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <title>【課題】PHP</title>
    <link rel="stylesheet" type="text/css" href="register_confirm.css">
</head>

<body>
<header>
    <img src="4eachblog_logo.jpg">
</header>
<main>
    <div class="form">
        <div class="check">
            <h2>会員登録 確認</h2>
            <p>こちらの内容で登録しても宜しいでしょうか？</p>
        </div>
        <div class="hyoji">
        <p class="formbox">氏名:
            <?php echo $_POST['name'];?>
        </p>
        <p class="formbox">メール:
            <?php echo $_POST['mail'];?>
        </p>
        <p class="formbox">パスワード:
            <?php echo $_POST['password'];?>
        </p>
        <p class="formbox">プロフィール写真:
            <?php echo $original_pic_name;?>
        </p>
        <p class="formbox">コメント:
            <?php echo $_POST['comments'];?>
        </p>
        </hyoji>

        <div class="koreiruno">
        <div class="form_">
            <form action="register.php">
                <input type="submit" class="button1" value="戻って修正する">
            </form>
        </div>
        <div class="form_">
            <form action="register_insert.php" method="post">
                <input type="submit" class="button2" value="登録する">
                <input type="hidden" value="<?php echo $_POST['name'];?>" name="name">
                <input type="hidden" value="<?php echo $_POST['mail'];?>" name="mail">
                <input type="hidden" value="<?php echo $_POST['password'];?>" name="password">
                <input type="hidden" value="<?php echo $path_filename;?>" name="picture">
                <input type="hidden" value="<?php echo $_POST['comments'];?>" name="comments">
            </form>
        </div>
        </div>
    </div>
</main>

<footer>
    © 2018 InterNous.inc All rights reserverd
</fotter>
</body>
</html>
