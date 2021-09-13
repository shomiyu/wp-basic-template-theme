<?php
//----------------------------------------------------
//  カスタム投稿タイプ
//----------------------------------------------------
function sample_post_type_init() {
    $labels = [
        'name'      => 'カスタム投稿サンプル',
        'all_items' => 'カスタム投稿サンプル一覧',
    ];

    $args = [
        'labels'        => $labels,
        'discription'   => 'カスタム投稿タイプのサンプルです。',
        'public'        => true,
        'menu_position' => 5,
        'menu_icon'     => 'dashicons-excerpt-view',
        'supports'      => [
            'title',
            'editor',
            'thumbnail',
            'custom-fields',
        ],
        'has_archive'   => true,
        'query_var'     => true,
        'show_in_rest'  => true,
    ];
    register_post_type('refresh', $args);
}
add_action('init', 'sample_post_type_init');
