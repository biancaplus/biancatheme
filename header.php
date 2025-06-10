<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0,minimal-ui,shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/images/smile.png" type="image/vnd.microsoft.icon">
    <link  rel="stylesheet" href="<?php echo get_stylesheet_uri(); ?>">
    <link rel='stylesheet' href='https://chinese-fonts-cdn.deno.dev/packages/lxgwwenkai/dist/lxgwwenkai-light/result.css' /> 
    <?php if (is_single()) { 
        echo '<link rel="stylesheet" href="https://cdn.bootcdn.net/ajax/libs/highlight.js/11.11.1/styles/docco.min.css">';
        echo '<script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.11.1/highlight.min.js"></script>';
    } ?>

    <?php 
        wp_head(); 

        if(is_single()){
            echo '<script>hljs.highlightAll();</script>';
        }
    ?>
</head>


    <body <?php body_class(); ?>>
    <div class="container">
        <?php
            if (is_single()) {
                echo '<header class="site-header white-bg" >';
            } else {
                echo '<header class="site-header" >';
            }
            ?>
        <!-- <header class="site-header" > -->
        <!-- class="avatar" -->
            <a href="<?php echo home_url(); ?>">  
                <!-- 获取wordpress设置的头像 -->
                <?php echo get_avatar( get_the_author_meta( 'ID' ), 32 ); ?>

                <!-- 获取images/avatar.jpg -->
                <!-- <img src="<?php echo get_template_directory_uri(); ?>/images/avatar.jpg" alt="logo" class="logo"> -->
            </a>

            <nav class="site-nav">
                <?php
                    echo wp_nav_menu( array( 
                        'container' => 'div',//容器标签 
                        'container_class' => 'navbar-box',//ul父节点class值 
                        'container_id' => 'nav-bar',//ul父节点id值 
                        'theme_location' => 'menus',//导航别名 
                        'items_wrap' => '<ul id="navbar-nav" class="navbar-nav">%3$s</ul>', //包装列表 
                        ) );
                ?>
                <form role="search" method="get" id="search-area" class="search-area" action="<?php echo home_url( '/' ); ?>">
                    <input type="search" name="s" class="search-input" placeholder="搜索" value="<?php echo get_search_query(); ?>" />
                </form>
            </nav>
            <div id="search" class="search cursor">
                <svg class="svgIcon" width="25" height="25">
                    <path d="M20.067 18.933l-4.157-4.157a6 6 0 1 0-.884.884l4.157 4.157a.624.624 0 1 0 .884-.884zM6.5 11c0-2.62 2.13-4.75 4.75-4.75S16 8.38 16 11s-2.13 4.75-4.75 4.75S6.5 13.62 6.5 11z">
                    </path>
                </svg>
            </div>
        </header>          