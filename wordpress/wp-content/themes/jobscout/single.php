<?php
/**
 * Template hiển thị chi tiết bài viết (Single Post)
 */
get_header(); 
?>

<div class="job-breadcrumbs-section" style="background-color: #f5f5f5; padding: 20px 0 0;">
    <div class="container">
        <ul class="job-breadcrumbs-list" style="list-style: none; padding: 0; margin: 0; font-size: 13px; color: #999;">
            <li style="display: inline-block;"><a href="<?php echo home_url(); ?>" style="color: #e67e22; text-decoration: none;">Trang chủ</a></li>
            <li style="display: inline-block; margin: 0 5px;">/</li>
            <li style="display: inline-block;"><a href="<?php echo home_url('/news'); ?>" style="color: #e67e22; text-decoration: none;">Tin tức</a></li>
            <li style="display: inline-block; margin: 0 5px;">/</li>
            <li style="display: inline-block;">Chi tiết bài viết</li>
        </ul>
    </div>
</div>

<div class="single-post-wrapper" style="background-color: #f5f5f5; padding-top: 30px; padding-bottom: 60px;">
    <div class="container">

        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

            <div class="single-job-header-card single-post-header">
                <div class="header-logo">
                    <?php 
                    if ( has_post_thumbnail() ) {
                        the_post_thumbnail( array(80, 80) ); // Ảnh nhỏ 80x80
                    } else {
                        echo '<img src="https://via.placeholder.com/80x80" alt="No Image">';
                    }
                    ?>
                </div>

                <div class="header-info">
                    <h1 class="single-job-title"><?php the_title(); ?></h1>
                    <div class="single-job-date" style="margin-bottom: 10px;">
                        Posted: <?php echo get_the_date('M d, Y'); ?>
                    </div>
                    <div class="job-meta-single-pill">
                        <span class="meta-item"><?php the_category(', '); ?></span>
                        <span class="meta-item">Ho Chi Minh City</span>
                    </div>
                </div>

                <div class="header-actions">
                    <button class="btn-share" style="background: #fff; border: 1px solid #333; padding: 8px 20px; text-transform: uppercase; font-weight: bold; cursor: pointer;">SHARE</button>
                </div>
            </div>

            <div class="content-box-white single-post-content">
                <?php the_content(); ?>
            </div>

        <?php endwhile; endif; ?>

        <div class="related-posts-section" style="margin-top: 60px;">
            <h2 class="section-title text-center" style="margin-bottom: 30px; text-align: center; text-transform: uppercase; font-weight: 800;">NEWEST BLOG ENTRIES</h2>
            
            <div class="blog-items-wrapper">
                <?php
                // Lấy 4 bài viết mới nhất (trừ bài hiện tại)
                $args = array(
                    'post_type'      => 'post',
                    'posts_per_page' => 4,
                    'post__not_in'   => array( get_the_ID() ),
                );
                $related_query = new WP_Query( $args );

                if ( $related_query->have_posts() ) :
                    while ( $related_query->have_posts() ) : $related_query->the_post();
                ?>
                        <div class="blog-item-horizontal">
                            <div class="blog-img-col">
                                <a href="<?php the_permalink(); ?>">
                                    <?php 
                                    if ( has_post_thumbnail() ) {
                                        the_post_thumbnail( 'medium' );
                                    } else {
                                        echo '<img src="https://via.placeholder.com/300x200" alt="No Image">';
                                    }
                                    ?>
                                </a>
                            </div>
                            <div class="blog-content-col">
                                <h3 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                                <div class="entry-summary"><?php echo wp_trim_words( get_the_excerpt(), 10, '...' ); ?></div>
                                <a href="<?php the_permalink(); ?>" class="read-more-link">Xem thêm</a>
                            </div>
                        </div>
                <?php
                    endwhile;
                    wp_reset_postdata();
                endif;
                ?>
            </div>
        </div>

    </div>
</div>

<div class="news-letter">
    <?php get_template_part( 'sections/newsletter' ); ?>
</div>

<?php get_footer(); ?>