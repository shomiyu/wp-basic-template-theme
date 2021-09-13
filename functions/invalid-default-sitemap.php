<?php
//----------------------------------------------------
// デフォルトのサイトマップ機能を無効化
//
// MEMO:
// - v5.5からサイトマップがデフォルトで生成されるようになり
// - リダイレクトループを引き起こしているため無効化する
//----------------------------------------------------

add_filter( 'wp_sitemaps_enabled', '__return_false' );