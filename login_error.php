<?php
mb_internal_encoding("utf8");
session_start();

if(isset($_SESSION['id'])){
    header("Location:mypage.php");
}
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>【課題】PHP</title>
    <link rel="stylesheet" type="text/css" href="login_error.css">
</head>
<body>
<header>
    <img src="4eachblog_logo.jpg">
    <div class="login">
        <a href="register.php">登録ページに戻る</a>
    </div>
</header>
<main>
    <form action="mypage.php" method="post">
    <div class="form_contents">
        <h2>ログイン画面</h2>
        <p>メールアドレスまたはパスワードが間違っています。</p>
        <div class="mail">
            <label>メールアドレス</label><br>
            <input type="text" name="mail" size="50" class="formbox">
        </div>
        <div class="password">
            <label>パスワード</label><br>
            <input type="password" name="password" size="50" class="formbox">
        </div>
        <div class="login_check">
            <label><input type="checkbox" class="formbox" size="40" name="login_keep" value="login_keep">ログイン機能を保持する</label>
        </div>
        <div class="toroku">
            <input type="submit" value="ログインする" size="35" class="submit_button">
        </div>
    </div>
    </form>
</main>
<footer>
    © 2018 InterNous.inc All rights reserverd
</fotter>
</body>
</html>
