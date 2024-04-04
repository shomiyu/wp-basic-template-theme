<?php
//----------------------------------------------------
// 関数設定
//----------------------------------------------------

// テーマ内の画像パスを取得
function get_img_src_uri() {
  echo esc_url( get_theme_file_uri() ) . '/src/img';
}

// 引数のドメインとURLを比較して真偽値へ返す
function get_domain() {
  return $_SERVER['HTTP_HOST'];
}

// 引数から判断して欲しいclassを返す
// ex. getClass($cat->slug)
function getClass($arg) {
  $class = '--foo';

  if ( $arg === 'fuga' ) {
    $class = '--fuga';
  }

  echo $class;
}
