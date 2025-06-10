<?php

if ( ! defined( '_S_VERSION' ) ) {
	define( '_S_VERSION', '1.0.0' );
}

if ( ! function_exists( 'bianca_setup' ) ) {
    function bianca_setup()
    {
        add_theme_support('automatic-feed-links');

        add_theme_support('title-tag');

        add_theme_support('post-thumbnails');

        register_nav_menus(array(
            'primary'=>'主导航菜单',
            'footer'=>'页脚菜单',
            'menus'=>'菜单',
        ));

        add_theme_support(
            'html5',
            array(
                'search-form',
                'gallery',
                'caption',
            )
        );


    }
}

add_action( 'after_setup_theme', 'bianca_setup' );

// function bianca_scripts(){
//     // wp_enqueue_style(
//     //     'theme-style',
//     //     get_stylesheet_directory_uri() . '/style.css', 
//     //     array(), // 无依赖
//     //     filemtime( get_stylesheet_directory() . '/style.css' ) 
//     // );
//     // wp_enqueue_script('test',get_template_directory_uri() .'/assets/test.js');
// }

// add_action('wp_enqueue_scripts','bianca_scripts');

// function custom_modify_main_query($query) {
//     // 只修改前台主查询
//     if (!is_admin() && $query->is_main_query()) {

//         // 首页、搜索页、分类页、标签页等统一按发布时间降序排序
//         if (is_home() || is_search() || is_category() || is_tag()) {
//             $query->set('orderby', 'date');
//             $query->set('order', 'DESC');
//         }
//     }
// }
// add_action('pre_get_posts', 'custom_modify_main_query',999);

// 记录文章浏览数
function set_post_views($post_id) {
    $countKey = 'views';
    $count = get_post_meta($post_id, $countKey, true);
    if($count==''){
        $count = 0;
        delete_post_meta($post_id, $countKey);
        add_post_meta($post_id, $countKey, '1');
    }else{
        $count++;
        update_post_meta($post_id, $countKey, $count);
    }
}

// 获取文章浏览数
function get_post_views($post_id) {
    $countKey = 'views';
    $post_views_count = get_post_meta( $post_id, $countKey, true );
    if ($post_views_count == '') {
        delete_post_meta($post_id, $countKey);
        add_post_meta($post_id, $countKey, '0');
        return "0";
    }
    return $post_views_count;
}
