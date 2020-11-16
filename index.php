<?php
/**
 * メイン処理ページ
 * 問題①〜④に回答して下さい
 */

require 'process.php'; // 裏側処理用ページ
$filter = filter_input(INPUT_POST, 'flg');
?>

<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Poker Game</title>
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body>

        <div class="table">
            <?php if ($filter) : ?>
                <!-- 問題① -->
                <!-- foreachを行う適切な配列変数名を記述して下さい -->
                <?php foreach ($enemy_show_hand as $card) : // 手札の表示（相手）?>
                    <img src="./image_trump/gif/<?php echo $card ?>.gif">
                <?php endforeach; ?>
                <!-- 問題② -->
                <!-- echoする適切な変数名を記述して下さい -->
                <p>相手の役は<span><?php echo $enemy_yaku; ?></span>です。</p>
            <?php endif; ?>
        </div>

        <div class="stock">
            <form method="post" action="index.php">
                <h2>↓カードを引くと↓</h2>
                <input type="submit" name="flg" id="stockImage">
                <h2>↑プレイできます↑</h2>
            </form>
        </div>

        <div class="table">
            <?php if ($filter) : ?>
                <!-- 問題③ -->
                <!-- foreachを行う適切な配列変数名を記述して下さい -->
                <?php foreach ($player_show_hand as $card) : // 手札の表示（あなた）?>
                    <img src="./image_trump/gif/<?php echo $card ?>.gif">
                <?php endforeach; ?>
                <!-- 問題④ -->
                <!-- echoする適切な変数名を記述して下さい -->
                <p>あなたの役は<span><?php echo $player_yaku; ?></span>です。</p>
            <?php endif; ?>
        </div>

    </body>
</html>
