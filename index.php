<?php

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
                <?php foreach ($enemy_show_hand as $card) : // 手札の表示（相手）?>
                    <img src="./image_trump/gif/<?php echo $card ?>.gif">
                <?php endforeach; ?>
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
                <?php foreach ($player_show_hand as $card) : // 手札の表示（あなた）?>
                    <img src="./image_trump/gif/<?php echo $card ?>.gif">
                <?php endforeach; ?>
                <p>あなたの役は<span><?php echo $player_yaku; ?></span>です。</p>
            <?php endif; ?>
        </div>

    </body>
</html>
