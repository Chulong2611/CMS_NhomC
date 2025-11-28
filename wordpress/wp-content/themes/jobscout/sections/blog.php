<?php
/**
 * Template part for displaying blog section on front page
 * SỬA ĐỔI CHO PROJECT NHÓM C
 */

$blog_heading = get_theme_mod( 'blog_section_title', __( 'Latest Articles', 'jobscout' ) );
$sub_title    = get_theme_mod( 'blog_section_subtitle', __( 'We will help you find it. We are your first step to becoming everything you want to be.', 'jobscout' ) );
$blog         = get_option( 'page_for_posts' );
$label        = get_theme_mod( 'blog_view_all', __( 'See More Posts', 'jobscout' ) );
$hide_author  = get_theme_mod( 'ed_post_author', false );
$hide_date    = get_theme_mod( 'ed_post_date', false );
$ed_blog      = get_theme_mod( 'ed_blog', true );
?>

<section id="blog-section" class="widget widget_jobscout_blog_widget section-blog-group-c">
    <div class="container">
        
        <?php 
            if( $blog_heading ) echo '<h2 class="section-title">' . esc_html( $blog_heading ) . '</h2>';
            if( $sub_title ) echo '<div class="section-desc">' . wpautop( wp_kses_post( $sub_title ) ) . '</div>'; 
        ?>

        <div class="blog-items-wrapper">
            <?php
            // Query lấy 4 bài viết mới nhất
            $args = array(
                'post_type'           => 'post',
                'posts_per_page'      => 4, // Lấy 4 bài để chia thành 2 hàng x 2 cột
                'ignore_sticky_posts' => 1,
            );
            $blog_query = new WP_Query( $args );

            if ( $blog_query->have_posts() ) :
                while ( $blog_query->have_posts() ) : $blog_query->the_post();
            ?>
                    <div class="blog-item-horizontal">
                        
                        <div class="blog-img-col">
                            <a href="<?php the_permalink(); ?>">
                                <?php 
                                if ( has_post_thumbnail() ) {
                                    the_post_thumbnail( 'medium' ); // Lấy ảnh vừa phải
                                } else {
                                    // Placeholder nếu không có ảnh
                                    echo '<img src="https://via.placeholder.com/300x200?text=No+Image" alt="No Image">';
                                }
                                ?>
                            </a>
                        </div>

                        <div class="blog-content-col">
                            <h3 class="entry-title">
                                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                            </h3>

                            <div class="entry-summary">
                                <?php echo wp_trim_words( get_the_excerpt(), 12, '...' ); ?>
                            </div>

                            <a href="<?php the_permalink(); ?>" class="read-more-link">Read More</a>
                        </div>
                    </div>
                    <?php
                endwhile;
                wp_reset_postdata();
            else :
                echo '<p>Chưa có bài viết nào.</p>';
            endif;
            ?>
        </div>
    </div>
</section>