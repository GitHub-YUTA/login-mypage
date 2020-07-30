<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <title>【課題】PHP</title>
    <link rel="stylesheet" type="text/css" href="register.css">
</head>

<body>
    <header>
        <img src="4eachblog_logo.jpg">
        <div class="login"><a href="login.php">ログイン</a></div>
        <!-- ↑「login.php」は後で作るもの -->
    </header>

    <main>
        <form action="register_confirm.php" method="post" enctype="multipart/form-data">
        <!-- ↑「enctype…」はファイルをアップロードする際に必要なものだからとりあえず書いとけ -->

            <div class="form_contents">
                <h2>会員登録</h2>
                <div class="name">
                <div class="hissu">必須</div><lebel>氏名</label><br>
                    <input type="text" class="formbox" size="40" name="name" required>
                    <!-- ↑「required」を書くことで入力を必須にできる -->
                </div>
                <div class="mail">
                <div class="hissu">必須</div><lebel>メールアドレス</label><br>
                    <input type="text" class="formbox" size="40" name="mail" pattern="^[a-z0-9.%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" required>
                    <!-- ↑「pattern…」が正規表現 -->
                </div>
                <div class="password">
                <div class="hissu">必須</div><lebel>パスワード</label><br>
                    <input type="password" class="formbox" size="40" name="password" id="password" pattern="^[a-zA-Z0-9]{6,}$" required>
                </div>
                <div class="password">
                <div class="hissu">必須</div><lebel>パスワード確認</label><br>
                    <input type="password" class="formbox" size="40" name="confirm_password" id="confirm" oninput="Confirm_Password(this)" required>
                    <!-- ↑パスワードチェック(下にJavaScriptが書いてある) -->
                </div>
                <div class="picture">
                <label>プロフィール写真</label><br>
                    <input type="hidden" name="max_file_size" value="1000000">
                    <input type="file" size="40" name="picture">
                </div>

                <div class="comments">
                    <label>コメント</label><br>
                    <textarea rows="5" cols="45" name="comments"></textarea>
                </div>

                <div class="toroku">
                    <input type="submit" class="submit_button" size="35" value="登録する">
                </div>
            </div>
        </form>
    </main>

    <footer>
        © 2018 InterNous.inc All rights reserverd
    </fotter>

    <script>
        function ConfirmPassword(confirm){
            var input1=password.value;
            var input2=password.value;
            if(input1!=input2){
                confirm.setCustomValidity("パスワードが一致しません。");
            }else{
                confirm.setCustomValidity("");
            }
        }
    </script>

</body>
</html>
