<?php
//----------------------------------------------------
// wp_headの不要なタグの削除
//----------------------------------------------------

// フィード関連のタグ
remove_action('wp_head', 'feed_links_extra', 3);

// 絵文字関連タグ
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');

// Remove oEmbed
remove_action('wp_head', 'rest_output_link_wp_head');
remove_action('wp_head', 'wp_oembed_add_discovery_links');
remove_action('wp_head', 'wp_oembed_add_host_js');
remove_action('template_redirect', 'rest_output_link_header', 11);

// 外部アプリケーションから情報を取得するタグ
remove_action('wp_head', 'rsd_link');
// Windows Live Writer用のタグ
remove_action('wp_head', 'wlwmanifest_link');

//「?p=投稿ID」形式のデフォルトパーマリンクタグ
remove_action('wp_head', 'wp_shortlink_wp_head');

// WordPressのバージョン情報
remove_action('wp_head', 'wp_generator');

// Remove admin bar of site
add_filter( 'show_admin_bar', '__return_false' );

// Remove dns prefetch
function remove_dns_prefetch($hints, $relation_type) {
    if ('dns-prefetch' === $relation_type) {
        return array_diff(wp_dependencies_unique_hosts(), $hints);
    }
    return $hints;
}
add_filter('wp_resource_hints', 'remove_dns_prefetch', 10, 2);

// Remove more id
function remove_more_jump_link($link) {
    $offset = strpos($link, '#more-');
    if ($offset) {
        $end = strpos($link, '"', $offset);
    }
    if ($end) {
        $link = substr_replace($link, '', $offset, $end - $offset);
    }
    return $link;
}
add_filter('the_content_more_link', 'remove_more_jump_link');
