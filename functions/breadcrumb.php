<?php
//----------------------------------------------------
// パンくずリスト
//----------------------------------------------------

function custom_breadcrumb(){
    global $post;
    global $paged;
    $str ='';
    $str.= '<nav">';
    $str.= '<ol itemscope itemtype="https://schema.org/BreadcrumbList" class="p-breadcrumbList">';

    // トップ
    $str.= '<li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem" class="p-breadcrumbList__item">';
    $str.= '<a itemtype="https://schema.org/Thing" itemprop="item" href="'. home_url() .'">';
    $str.= '<span itemprop="name">ホーム</span>';
    $str.= '</a><meta itemprop="position" content="1" /></li>';
    $cnt = 2;


    // カテゴリーとタグ
    if( is_archive() ) {
        $obj = get_queried_object();

        if($obj->parent != 0){
            $ancestors = array_reverse(get_ancestors($obj->term_id, 'category'));
            foreach($ancestors as $ancestor){
                $str .= '<li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem" class="p-breadcrumbList__item">';
                $str .= '<a itemtype="https://schema.org/Thing" itemprop="item" href="'. get_category_link($ancestor) .'">';
                $str .= '<span itemprop="name">'. get_term($ancestor)->name .'</span>';
                $str .= '</a><meta itemprop="position" content="'. $cnt .'" /></li>';
                $cnt++;
            }
        }
        if($obj->name){
            $str .= '<li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem" class="p-breadcrumbList__item">';
            $str .= '<a itemtype="https://schema.org/Thing" itemprop="item" href="'. get_category_link($obj->term_id) .'">';
            $str .= '<span itemprop="name">'. $obj->name .'</span>';
            $str .= '</a><meta itemprop="position" content="'. $cnt .'" /></li>';
        } else {
            if( is_month() ){
                $url = get_month_link( get_query_var('year'), get_query_var('monthnum') );
            } else if( is_year() ){
                $url = get_year_link( get_query_var('year') );
            }
            $str .= '<li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem" class="p-breadcrumbList__item">';
            $str .= '<a itemtype="https://schema.org/Thing" itemprop="item" href="'. $url  .'">';
            $str .= '<span itemprop="name">'. get_the_archive_title() .'</span>';
            $str .= '</a><meta itemprop="position" content="'. $cnt .'" /></li>';
        }
    }

    // 検索結果ページ
    elseif(is_search()){
        $str .= '<li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem" class="p-breadcrumbList__item">';
        $str .= '<a itemtype="https://schema.org/Thing" itemprop="item" href="'. get_search_link( get_search_query() ) .'">';
        $str .= '<span itemprop="name">「'. get_search_query() .'」の検索結果</span>';
        $str .= '</a><meta itemprop="position" content="'. $cnt .'" /></li>';
    }

    // 固定ページ
    elseif(is_page()){
        if($post -> post_parent != 0 ){
            $ancestors = array_reverse(get_post_ancestors( $post->ID ));
            foreach($ancestors as $ancestor){
                $str.='<a href="'. get_permalink($ancestor).'" itemprop="url"><span itemprop="title">'. get_the_title($ancestor) .'</span></a><span class="delimiter">&gt;</span>';
            }
        }
        $str .= '<li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem" class="p-breadcrumbList__item">';
        $str .= '<a itemtype="https://schema.org/Thing" itemprop="item" href="'. get_page_link() .'">';
        $str .= '<span itemprop="name">'. get_the_title() .'</span>';
        $str .= '</a><meta itemprop="position" content="'. $cnt .'" /></li>';
    }

    // 個別記事
    elseif(is_single()){
        // 親カテゴリー
        $categories = get_the_category($post->ID);
        $cat = $categories[0];
        if($cat->parent != 0){
            $ancestors = array_reverse(get_ancestors($cat->cat_ID, 'category' ));
            foreach($ancestors as $ancestor){
                $str .= '<li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem" class="p-breadcrumbList__item">';
                $str .= '<a itemtype="https://schema.org/Thing" itemprop="item" href="'. get_category_link($ancestor) .'">';
                $str .= '<span itemprop="name">'. get_cat_name($ancestor) .'</span>';
                $str .= '</a><meta itemprop="position" content="'. $cnt .'" /></li>';
                $cnt++;
            }
        }

        // category
        $str .= '<li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem" class="p-breadcrumbList__item">';
        $str .= '<a itemtype="https://schema.org/Thing" itemprop="item" href="'. get_category_link($cat->cat_ID) .'">';
        $str .= '<span itemprop="name">'. $cat->cat_name .'</span>';
        $str .= '</a><meta itemprop="position" content="'. $cnt .'" /></li>';
        $cnt++;

        // entry
        $str .= '<li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem" class="p-breadcrumbList__item">';
        $str .= '<a itemtype="https://schema.org/Thing" itemprop="item" href="'. get_permalink() .'">';
        $str .= '<span itemprop="name">';
        $str .= get_the_title();
        $str .= '</span></a><meta itemprop="position" content="'. $cnt .'" /></li>';
    }

    // 2ページ目以降
    if ($paged > 1) {
        $str .= '<li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem" class="p-breadcrumbList__item">';
        $str .= '<a itemprop="item" href="' . get_pagenum_link($paged) . '">';
        $str .= '<span itemprop="name">ページ' . $paged . '</span>';
        $str .= '</a><meta itemprop="position" content="' . $cnt . '" /></li>';
    }

    $str.='</ol>';
    $str.='</nav>';
    echo $str;
}
