<?php
//----------------------------------------------------
// 人気記事
//----------------------------------------------------

/**
 * 人気記事出力用関数（ループ中で記事閲覧回数表示）
 *
 * 使い方：
 *    echo getPostViews(get_the_ID())
 */
function getPostViews($postID){
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
        return "0 View";
    }
    return $count.' Views';
}

/**
 * 記事viewカウント用関数
 *
 * 使い方：
 *    setPostViews(get_the_ID());
 *    $args = array(
 *        'meta_key' => 'post_views_count',
 *        'orderby' => 'meta_value_num',
 *        'order' => 'DESC',
 *        'posts_per_page' => 5 // ← 5件取得
 *    );
 *
 *    $query = new WP_Query($args);
 *    if ($query->have_posts()) :
 *        while ($query->have_posts()) :
 *            $query->the_post();
 *              ループ処理
 *        endwhile;
 *    endif;
 *    wp_reset_postdata();
 */
function setPostViews($postID) {
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);

    if ($count=='') {
        $count = 0;
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
    } else {
        $count++;
        update_post_meta($postID, $count_key, $count);
    }
}

remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);
