<?php
//----------------------------------------------------
// CSSやJSの外部ファイルから末尾の ?ver=x.x.x を削除する
//----------------------------------------------------

function vc_remove_wp_ver_css_js($src) {
  if (strpos($src, 'ver='))
    $src = remove_query_arg('ver', $src);
  return $src;
}

add_filter('style_loader_src', 'vc_remove_wp_ver_css_js', 9999);
add_filter('script_loader_src', 'vc_remove_wp_ver_css_js', 9999);
