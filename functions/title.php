<?php
//----------------------------------------------------
// Titleタグ
//----------------------------------------------------

// titleタグをサポート
add_theme_support('title-tag');

// セパレーターを変更
function title_separator_change( $sep ){
    $sep = '|';
    return $sep;
}
add_filter('document_title_separator', 'title_separator_change');
