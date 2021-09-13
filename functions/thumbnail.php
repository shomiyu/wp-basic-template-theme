<?php
//----------------------------------------------------
// Thumbnail関連の設定
//----------------------------------------------------

// Support thumbnail
add_theme_support('post-thumbnails');

// Add thumbnail size
add_image_size('card-thumbnail', 384, 237, true); // 投稿一覧用
add_image_size('card-thumbnail@2x', 768, 474, true); // 投稿一覧のRetina用
