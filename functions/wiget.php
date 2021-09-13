<?php
//----------------------------------------------------
// Widgetの追加
//----------------------------------------------------

// Add widget
function add_widgets() {
    $args = [
        'name'          => 'Sidebar',
        'id'            => 'sidebar',
        'before_widget' => '<aside id="%1$s" class="p-widget -light %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h2 class="p-widget__title">'
    ];
    register_sidebar($args);
}
add_action('widgets_init', 'add_widgets');
