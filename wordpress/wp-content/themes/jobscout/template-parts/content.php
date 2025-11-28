<?php
/**
 * Template part for displaying posts - Style giống ảnh 2 (2 cột thumbnail trái)
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class('post'); ?>>
    <div class="blog-post-wrapper"> <!-- thêm wrapper để dễ style -->
        <div class="blog-post-lr">
            <?php 
            if ( has_post_thumbnail() ) { ?>
                <div class="thumb-img">
                    <a href="<?php the_permalink(); ?>" class="post-thumbnail">
                        <?php the_post_thumbnail( 'jobscout-article', array( 'itemprop' => 'image' ) ); ?>
                    </a>
                </div>
            <?php } ?>

            <div class="content-area">
                <header class="entry-header">
                    <?php
                    if ( is_singular() ) :
                        the_title( '<h1 class="entry-title">', '</h1>' );
                    else :
                        the_title( '<h3 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h3>' );
                    endif;

                    if ( 'post' === get_post_type() ) : ?>
                        <div class="entry-meta">
                            <?php jobscout_posted_by(); ?>
                            <span class="posted-on">
                                <?php jobscout_posted_on(); ?>
                            </span>
                        </div>
                    <?php endif; ?>
                </header>

                <div class="entry-content">
                    <?php
                    the_excerpt();
                    ?>
                </div>

                <div class="entry-footer">
                    <a href="<?php the_permalink(); ?>" class="btn-readmore"><?php esc_html_e( 'Read More', 'jobscout' ); ?></a>
                </div>
            </div>
        </div>
    </div>
</article>