<?php
//----------------------------------------------------
// 検索結果に投稿記事以外表示しない
//----------------------------------------------------
function custom_search($search, $wp_query)
{
    //サーチページ以外だったら終了
    if (!$wp_query->is_search) return;
    //投稿記事のみ検索
    $search .= " AND post_type = 'post'";
    return $search;
}
add_filter('posts_search', 'custom_search', 10, 2);
