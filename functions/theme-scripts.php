<?php
//----------------------------------------------------
// Theme scripts & styles
//----------------------------------------------------

function add_files() {
    define("TEMPLATE_DIR", get_template_directory_uri());
    define("TEMPLATE_PATH", get_template_directory());

    function wp_css($css_name, $file_path) {
        wp_enqueue_style(
            $css_name, TEMPLATE_DIR . $file_path, array(),
            date('YmdGis', filemtime(TEMPLATE_PATH . $file_path))
        );
    }

    function wp_web_font() {
        wp_enqueue_style( 'google-font-noto-sans', 'https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@400;700&display=swap' );
        wp_enqueue_style( 'google-font-bebas-neue', 'https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap' );
        wp_enqueue_style( 'google-font-ubuntu', 'https://fonts.googleapis.com/css2?family=Ubuntu:wght@400;700&display=swap' );
        wp_enqueue_style( 'google-font-m-plus-rounded', 'https://fonts.googleapis.com/css2?family=M+PLUS+Rounded+1c:wght@400;700&display=swap' );
    }

    function wp_script($script_name, $file_path, $bool = true) {
        wp_enqueue_script(
            $script_name, TEMPLATE_DIR . $file_path, array('jquery'),
            date('YmdGis', filemtime(TEMPLATE_PATH . $file_path)), $bool
        );
    }

  // ダッシュボードまたは管理画面の表示中以外のときに適用
    if (!is_admin()) {
        wp_script('project-js', '/dist/js/main.js');
        wp_css('project-css', '/dist/css/main.css');
        wp_css('style', '/style.css');
        wp_web_font();
    }
}
add_action('wp_enqueue_scripts', 'add_files');
