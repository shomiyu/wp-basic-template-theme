<?php
//----------------------------------------------------
// pタグとbrタグの自動挿入を無効にする
//----------------------------------------------------

// 投稿・固定ページの本文からpタグとbrタグの自動挿入を無効にする
remove_filter('the_content', 'wpautop');

// 抜粋からpタグとbrタグの自動挿入を無効にする
remove_filter('the_excerpt', 'wpautop');

// テキストウィジェットからpタグとbrタグの自動挿入を無効にする
remove_filter('widget_text_content', 'wpautop');

// コメントからpタグとbrタグの自動挿入を無効にする
remove_filter('comment_text', 'wpautop');
