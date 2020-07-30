<?php
mb_internal_encoding("utf8");
session_start();

if(empty($_POST['from_mypage'])){
    header("Location:login_error.php");
}

?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>【課題】PHP</title>
    <link rel="stylesheet" type="text/css" href="mypage_hensyu.css">
</head>
<body>
<header>
    <img src="4eachblog_logo.jpg">
    <div class="login">
        <a href="log_out.php">ログアウト</a>
    </div>
</header>
<main>
    <form action="mypage_update.php" method="post">
    <div class="form_contents">
        <h2>会員情報</h2>
        <div>
        <?php echo "こんにちは！".$_SESSION['name']."さん！"?>
        </div>
        <div class="profile_picture">
            <img src="<?php echo $_SESSION['picture'];?>">
        </div>
        <div class="right">
            <p class="name">氏名:
                <input type="text" value="<?php echo $_SESSION['name'];?>" name="name" class="formbox">
            </p>
            <p class="mail">メール:
                <input type="text" value="<?php echo $_SESSION['mail'];?>" name="mail" class="formbox">
            </p>
            <p class="password">パスワード:
                <input type="password" value="<?php echo $_SESSION['password'];?>" id="password" name="password" class="formbox">
            </p>
        </div>
        <div class="comments">
            <textarea name="comments" class="formbox" rows="5" cols="70"><?php echo $_SESSION['comments'];?></textarea>
        </div>
        <div class="toroku">
            <input type="submit" class="submit_button" size="35" value="この内容で登録する">
        </div>
    </div>
    </form>
</main>
<footer>
    © 2018 InterNous.inc All rights reserverd
</fotter>
</body>
</html>
