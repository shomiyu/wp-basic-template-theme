<?php
//----------------------------------------------------
// OGP設定
//----------------------------------------------------
function my_meta_ogp() {
    if (is_front_page() || is_home() || is_singular()) {
        // 画像 （アイキャッチ画像が無い時に使用する代替画像URL）
        $ogp_image = get_theme_file_uri().'/dist/img/ogp.jpg';

        global $post;
        $ogp_title = '';
        $ogp_description = '';
        $ogp_url = '';
        $html = '';
        $twitter_card = 'summary_large_image';

        if (is_singular()) {
            // 記事＆固定ページ
            setup_postdata($post);
            $ogp_title = $post->post_title;
            $id = get_the_ID();
            // og:description は description と同様、本文から取得。抜粋があるときは抜粋から取得。
            $ogp_description =  wp_html_excerpt(get_the_content($id), 110, '…');
            if (has_excerpt()) {
                $ogp_description = wp_html_excerpt(get_the_excerpt(), 110, '…');
            }
            $ogp_url = get_permalink();
            wp_reset_postdata();
        } elseif (is_front_page() || is_home()) {
            // トップページ
            $ogp_title = get_bloginfo('name');
            $ogp_description = get_bloginfo('description');
            $ogp_url = home_url('/');
        }

        // og:type
        $ogp_type = (is_front_page() || is_home()) ? 'website' : 'article';

        // og:image
        if (is_singular() && has_post_thumbnail()) {
            $ps_thumb = wp_get_attachment_image_src(get_post_thumbnail_id(), 'full');
            $ogp_image = $ps_thumb[0];
        }

        // 出力するOGPタグをまとめる
        $html = "\n";
        $html .= '<meta name="description" content="' . esc_attr($ogp_description) . '">' . "\n";
        $html .= '<meta property="og:title" content="' . esc_attr($ogp_title) . '">' . "\n";
        $html .= '<meta property="og:description" content="' . esc_attr($ogp_description) . '">' . "\n";
        $html .= '<meta property="og:type" content="' . $ogp_type . '">' . "\n";
        $html .= '<meta property="og:url" content="' . esc_url($ogp_url) . '">' . "\n";
        $html .= '<meta property="og:image" content="' . esc_url($ogp_image) . '">' . "\n";
        $html .= '<meta property="og:site_name" content="' . esc_attr(get_bloginfo('name')) . '">' . "\n";
        $html .= '<meta name="twitter:card" content="' . $twitter_card . '">' . "\n";

        echo $html;
    }
}

add_action('wp_head', 'my_meta_ogp');
