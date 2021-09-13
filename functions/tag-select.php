<?php
//----------------------------------------------------
// タグをチェックボックスから選ぶ
//----------------------------------------------------

function register_post_tag_taxonomy() {

$tag_slug_args = get_taxonomy('post_tag');
$tag_slug_args -> hierarchical = true;
$tag_slug_args -> meta_box_cb = 'post_categories_meta_box';

register_taxonomy( 'post_tag', 'post',(array) $tag_slug_args);

}
add_action( 'init', 'register_post_tag_taxonomy', 1 );
