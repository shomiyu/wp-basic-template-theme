<?php
//----------------------------------------------------
// 新着記事一覧で表示する件数の設定
//----------------------------------------------------

// 新着記事数の出しわけ（スマホのときは12件表示）
function mobile_pre_get_posts( $query ) {
    if ( ! is_admin() && wp_is_mobile() && $query->is_main_query() ) {
        $query->set( 'posts_per_page', 12 );
    }
}
add_action( 'pre_get_posts', 'mobile_pre_get_posts' );
