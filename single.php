<?php
get_header(); 

// 更新浏览次数
set_post_views(get_the_ID());
// 获取特色图片
$featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'full'); 

?>

<div class="site-main single-page">
    <div class="single-banner">
        <?php
            if (has_post_thumbnail()) {
                echo '<img src="' . $featured_img_url . '" alt="">';
            } else {
                echo '<img src="' . get_template_directory_uri() . '/images/bg-article.png" alt="">';
            }
        ?>
    </div>

    <div class="single-content">
        <div class="article-title">
            <h1>
                <?php the_title(); ?>
            </h1>
            <div class="article-time">
                <?php the_time('Y/m/d'); ?>
            </div>
        </div>
        <div class="article-content">
            <?php the_content(); ?>
        </div>
        <div class="article-author">
            <div >
                <?php echo get_avatar(get_the_author_meta('email', $post->post_author), 64); ?>
            </div>
            <div class="name">
                <?php echo get_the_author_meta('display_name', $post->post_author); ?>
            </div> 
        </div>
    </div>


</div>

<?php
get_footer(); 
?>
