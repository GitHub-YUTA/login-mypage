<?php
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
    <link rel="stylesheet" type="text/css" href="login.css">
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
        <div class="mail">
            <label>メールアドレス</label><br>
            <input type="text" name="mail" size="50" class="formbox" value="<?php if(isset($_COOKIE['login_keep'])){echo $_COOKIE['mail'];}?>">
        </div>
        <div class="password">
            <label>パスワード</label><br>
            <input type="password" name="password" size="50" class="formbox" value="<?php if(isset($_COOKIE['login_keep'])){echo $_COOKIE['password'];}?>">
        </div>
        <div class="login_check">
            <label><input type="checkbox" class="formbox" size="40" name="login_keep" value="login_keep"
            <?php
            if(isset($_COOKIE['login_keep'])){
                echo "checked='checked'";
            }
            ?>
            >ログイン機能を保持する</label>
        </div>
        <div class="toroku">
            <input type="submit" value="ログインする" size="35" class="submit_button">

            <!-- <input type="hidden" value="<?php echo $_POST['name'];?>" name="name">
            <input type="hidden" value="<?php echo $_POST['mail'];?>" name="mail">
            <input type="hidden" value="<?php echo $_POST['password'];?>" name="password">
            <input type="hidden" value="<?php echo $path_filename;?>" name="picture">
            <input type="hidden" value="<?php echo $_POST['comments'];?>" name="comments"> -->
            <!-- ↑諸悪の根源（#^ω^） -->
            <!-- 戒めとして残しておく（#^ω^） -->

        </div>
    </div>
    </form>
</main>
<footer>
    © 2018 InterNous.inc All rights reserverd
</fotter>
</body>
</html>
