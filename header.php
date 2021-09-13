<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php if( is_singular() ) : ?>
    <?php
    // ------------------------------------------
    // meta description の設定
    // - 投稿ページ、固定ページ、添付ファイルページのみ本文から取得。抜粋があるときは抜粋から取得。
    // - その他のページはキャッチフレーズから取得
    // - プラグインで対応する場合は削除する
    // ------------------------------------------
    $id = get_the_ID();
    $description = wp_html_excerpt(get_the_content($id), 110, "…");
    if(has_excerpt()) {
        $description = wp_html_excerpt(get_the_excerpt(), 110, '…');
    }
    ?>
        <meta name="description" content="<?php echo esc_attr($description); ?>">
    <?php else: ?>
        <meta name="description" content="<?php bloginfo('description'); ?>">
    <?php endif; ?>
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
    <header>
        <h1>Hello World</h1>
    </header>
