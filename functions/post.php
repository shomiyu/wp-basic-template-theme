<?php
//----------------------------------------------------
//  投稿の設定
//  - 投稿をNewsに変更
//----------------------------------------------------
function change_post_menu_label() {
    global $menu;
    global $submenu;
    $menu[5][0] = 'News';
    $submenu['edit.php'][5][0] = 'News一覧';
    $submenu['edit.php'][10][0] = '新規追加';
}

function change_post_object_label() {
    global $wp_post_types;
    $labels = &$wp_post_types['post']->labels;
    $labels->name = 'News';
    $labels->singular_name = 'News';
    $labels->add_new = _x('新規追加', 'News');
    $labels->add_new_item = '新しいNews';
    $labels->edit_item = 'Newsの編集';
    $labels->new_item = '新しいNews';
    $labels->view_item = 'Newsを表示';
    $labels->search_items = 'News検索';
    $labels->not_found = 'Newsが見つかりませんでした';
    $labels->not_found_in_trash = 'ゴミ箱のNewsにも見つかりませんでした';
}

add_action( 'init', 'change_post_object_label' );
add_action( 'admin_menu', 'change_post_menu_label' );


//----------------------------------------------------
//  投稿からタグを削除
//----------------------------------------------------
// function my_unregister_taxonomies() {
//     global $wp_taxonomies;

//     if (! empty($wp_taxonomies['post_tag']->object_type)) {
//         foreach ($wp_taxonomies['post_tag']->object_type as $i => $object_type) {
//             if ($object_type == 'post') {
//                 unset($wp_taxonomies['post_tag']->object_type[$i]);
//             }
//         }
//     }

//     return true;
// }

// add_action('init', 'my_unregister_taxonomies');

//----------------------------------------------------
// 投稿アーカイブのスラッグ調整
//----------------------------------------------------

// 投稿のアーカイブを有効にする
function post_has_archive( $args, $post_type ) {
    if ( 'post' == $post_type ) {
        $args['rewrite'] = true;
        $args['has_archive'] = 'news';
        $args['label'] = 'News';
    }
    return $args;
}
add_filter( 'register_post_type_args', 'post_has_archive', 10, 2 );


add_filter( 'post_type_archive_link', function( $link, $post_type ) {
    if ( 'post' === $post_type ) {
        $post_type_object = get_post_type_object( 'post' );
        $slug = $post_type_object->has_archive;
        $link = get_home_url( null, '/' . $slug . '/' );
    }
    return $link;
}, 10, 2 );

function add_article_post_permalink( $permalink ) {
    $permalink = '/news' . $permalink;
    return $permalink;
}
add_filter( 'pre_post_link', 'add_article_post_permalink' );

function add_article_post_rewrite_rules( $post_rewrite ) {
    $return_rule = array();
    foreach ( $post_rewrite as $regex => $rewrite ) {
        $return_rule['news/' . $regex] = $rewrite;
    }
    return $return_rule;
}
add_filter( 'post_rewrite_rules', 'add_article_post_rewrite_rules' );
