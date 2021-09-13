<?php
    the_posts_pagination(
        array(
            'mid_size'      => 1, // 現在ページの左右に表示するページ番号の数
            'prev_next'     => false, // 「前へ」「次へ」のリンクを表示する場合はtrue
            'type'          => 'list', // 戻り値の指定 (plain/list)
        )
    );
?>
