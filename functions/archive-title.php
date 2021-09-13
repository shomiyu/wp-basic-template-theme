<?php
//----------------------------------------------------
// アーカイブページのタイトル出力
// - [タグ名]or[カテゴリ名]の記事一覧 と出力する
//----------------------------------------------------

function my_archive_title($title) {
  if ( is_category() ) {
      $title = single_cat_title( '', false );
    } elseif ( is_tag() ) {
        $title = single_tag_title( '', false );
    }
    $title = $title. 'の記事一覧';
    return $title;
};
add_filter( 'get_the_archive_title', 'my_archive_title');
