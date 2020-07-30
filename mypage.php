<?php
mb_internal_encoding("utf8");
session_start();

if(empty($_SESSION['id'])){
    try{
        $pdo=new PDO("mysql:dbname=yuta;host=localhost;","root","");
    }catch(PDOException $e){
        die("<p>申し訳ございません。現在サーバーが込み合っており一時的にアクセスが出来ません。<br>しばらくしてから再度ログインをしてください。</p>
        <a href='http://localhost/4_login_mypage/login.php'>ログイン画面へ</a>"
        );
    }
    // ↑データベースに接続し、もし接続できなかった場合にエラーメッセージを表示する

    $stmt=$pdo->prepare("select * from login_mypage where mail=? && password=?");

    $stmt->bindValue(1,$_POST["mail"]);
    $stmt->bindValue(2,$_POST["password"]);

    $stmt->execute();
    $pdo=NULL;

    while($row=$stmt->fetch()){
        $_SESSION['id']=$row['id'];
        $_SESSION['name']=$row['name'];
        $_SESSION['mail']=$row['mail'];
        $_SESSION['password']=$row['password'];
        $_SESSION['picture']=$row['picture'];
        $_SESSION['comments']=$row['comments'];
    }

    if(empty($_SESSION['id'])){
        header("Location:login_error.php");
    }
}

if(!empty($_POST['login_keep'])){
    $_SESSION['login_keep']=$_POST['login_keep'];
}

if(!empty($_SESSION['id']) && !empty($_SESSION['login_keep'])){
    setcookie('mail',$_SESSION['mail'],time()+60*60*24*7);
    setcookie('password',$_SESSION['password'],time()+60*60*24*7);
    setcookie('login_keep',$_SESSION['login_keep'],time()+60*60*24*7);
    
}else if(empty($_SESSION['login_keep'])){
    setcookie('mail','',time()-1);
    setcookie('password','',time()-1);
    setcookie('login_keep','',time()-1);
}
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>【課題】PHP</title>
    <link rel="stylesheet" type="text/css" href="mypage.css">
</head>
<body>
<header>
    <img src="4eachblog_logo.jpg">
    <div class="login">
        <a href="log_out.php">ログアウト</a>
    </div>
</header>
<main>
    <form action="mypage_hensyu.php" method="post">
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
                <?php echo $_SESSION['name'];?>
            </p>
            <p class="mail">メール:
                <?php echo $_SESSION['mail'];?>
            </p>
            <p class="password">パスワード:
                <?php echo $_SESSION['password'];?>
            </p>
        </div>
        <div class="comments">
            <?php echo $_SESSION['comments'];?>
        </div>
        <div class="toroku">
            <input type="hidden" value="<?php echo rand(1,10);?>" name="from_mypage">
            <input type="submit" class="submit_button" size="35" value="編集する">
        </div>
    </div>
    </form>
</main>
<footer>
    © 2018 InterNous.inc All rights reserverd
</fotter>
</body>
</html>
