<!DOCTYPE html>
<html lang="ja">

    <head>
        <!--文字コードをセット-->
        <meta charset="utf-8">
        <!--CSSの適用-->
        <link rel="stylesheet" href="style.css">

        <!--タイトルを記入-->
        <title>プログラミングに役立つ掲示板</title>

    </head>

    <body>
        <?php

        mb_internal_encoding("utf8");
        $pdo = new PDO("mysql:dbname=lesson01;host=localhost;","root","root");

        $stmt = $pdo->query("select * from 4each_keijiban");

        /*while($row = $stmt->fetch()){
            echo $row['handlename'];
            echo $row['title'];
            echo $row['comments'];
        }*/
        ?>

        <header>
            <!--ヘッダーロゴデザイン-->
            <div class="header-logo">
                <img src="4eachblog_logo.jpg">
            </div>

            <!--ヘッダーメニュー部-->
            <div class="header-menu">
                <ul>
                    <li>トップ</li>
                    <li>プロフィール</li>
                    <li>4eachについて</li>
                    <li>登録フォーム</li>
                    <li>問い合わせ</li>
                    <li>その他</li>
                </ul>
            </div>
        
        </header>


        <main>
            <div class="left">

                <h1>プログラミングに役立つ掲示板</h1>

                <form method="post" action="insert.php">
                    <h2>入力フォーム</h2>

                    <!--ハンドルネームを入力する-->
                    <div>
                        <label>ハンドルネーム</label>
                        <br>
                        <input type="text" class="text" size="35" name="handlename">
                    </div>

                    <!--タイトルを入力する-->
                    <div>
                        <label>タイトル</label>
                        <br>
                        <input type="text" class="text" size="35" name="title">
                    </div>

                    <!--コメントを入力する-->
                    <div>
                        <label>コメント</label>
                        <br>
                        <textarea name="comments" id="" cols="35" rows="7"></textarea>
                    </div>

                    <!--データを投稿（送信）する-->
                    <div>
                        <input type="submit" class="submit" value="投稿する">
                    </div>
                </form>

                <!--掲示板部分-->
                <?php
                while($row = $stmt->fetch()){
                echo "<div class='kiji'>";
                echo "<h3>".$row['title']."</h3>";
                echo "<div class='contents'>";
                echo $row['comments'];
                echo "<div class='handlename'>posted by ".$row['handlename']."</div>";
                echo "</div>";
                echo "</div>";
                }
                ?>

            </div>

            <div class="right">
                <!--右部の記事一覧(boxクラス)-->
                <div class="box">
                        <h2>人気の記事</h2>
                        <ul>
                            <li>PHPオススメ本</li>
                            <li>PHP MyAdminの使い方</li>
                            <li>今人気のエディタ Top5</li>
                            <li>HTMLの基礎</li>
                        </ul>
                    </div>
                    <div class="box">
                        <h2>オススメリンク</h2>
                        <ul>
                            <li>インターノウス株式会社</li>
                            <li>XAMPPのダウンロード</li>
                            <li>Eclipseのダウンロード</li>
                            <li>Bracketsのダウンロード</li>
                        </ul>
                    </div>
                    <div class="box">
                        <h2>カテゴリ</h2>
                        <ul>
                            <li>HTML</li>
                            <li>PHP</li>
                            <li>MySQL</li>
                            <li>JavaScript</li>
                        </ul>
                    </div>
                </div>
            </div>
        </main>


        <!--フッター部-->
        <footer>
            Copyright © internous|4each blog the which provides A to Z about programming.
        </footer>

    </body>
</html>

