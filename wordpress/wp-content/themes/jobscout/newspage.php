<?php
/**
 * Template Name: Custom News Page (Project Nhom C)
 */

get_header(); 
?>

<div class="custom-news-banner" style="background-image: url('https://4kwallpapers.com/images/walls/thumbs_3t/22326.jpg');">
    <div class="overlay"></div>
    <div class="container">
        <h1 class="page-title">TIN TỨC - BÀI VIẾT</h1>
    </div>
</div>

<div id="primary" class="content-area section-blog-group-c" style="padding-top: 60px; padding-bottom: 60px;">
    <main id="main" class="site-main container">
        
        <div class="section-header" style="text-align: center; margin-bottom: 40px;">
            <h2 class="section-title" style="font-size: 24px; font-weight: bold; text-transform: uppercase;">TIN TỨC - BÀI VIẾT MỚI NHẤT</h2>
        </div>

        <div class="blog-items-wrapper">
            <?php
            // Lấy danh sách bài viết (có phân trang)
            $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
            $args = array(
                'post_type' => 'post',
                'paged'     => $paged,
            );
            $the_query = new WP_Query( $args );

            if ( $the_query->have_posts() ) :
                while ( $the_query->have_posts() ) : $the_query->the_post();
            ?>
                    <div class="blog-item-horizontal">
                        <div class="blog-img-col">
                            <a href="<?php the_permalink(); ?>">
                                <?php 
                                if ( has_post_thumbnail() ) {
                                    the_post_thumbnail( 'medium_large' );
                                } else {
                                    echo '<img src="https://via.placeholder.com/300x200?text=No+Image">';
                                }
                                ?>
                            </a>
                        </div>
                        <div class="blog-content-col">
                            <h3 class="entry-title">
                                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                            </h3>
                            <div class="entry-summary">
                                <?php echo wp_trim_words( get_the_excerpt(), 15, '...' ); ?>
                            </div>
                            <a href="<?php the_permalink(); ?>" class="read-more-link">Xem thêm</a>
                        </div>
                    </div>

            <?php
                endwhile;
                
                // Phân trang (Pagination)
                echo '<div class="news-pagination" style="grid-column: 1 / -1; text-align: center; margin-top: 30px;">';
                echo paginate_links( array(
                    'total' => $the_query->max_num_pages,
                    'prev_text' => '&laquo; Trang trước',
                    'next_text' => 'Trang sau &raquo;',
                ) );
                echo '</div>';

                wp_reset_postdata();
            else :
                echo '<p>Chưa có bài viết nào.</p>';
            endif;
            ?>
        </div>

    </main>
</div>

<div class="news-letter">
    <?php get_template_part( 'sections/newsletter' ); ?>
</div>

<?php get_footer(); ?>

<style>
    .custom-news-banner {
        width: 100vw !important; /* Rộng bằng màn hình */
    position: relative !important;
    left: 50% !important;
    right: 50% !important;
    margin-left: -50vw !important; /* Kéo sang trái 1 nửa màn hình */
    margin-right: -50vw !important;
    }
</style>