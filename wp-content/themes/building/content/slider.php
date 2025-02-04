<section id="slider-top" class="page">
    <?php
    $args = array(
        'post_type' => 'slider',
        'posts_per_page' => -1,
    );
    $query = new WP_Query( $args );

    if ( $query->have_posts() ) : ?>
        <div class="container">
            <div id="slider-topo" class="slider">
                <?php while ( $query->have_posts() ) : $query->the_post(); ?>
                    <?php if(get_field('url_slider')) : ?>
                        <a href="<?= get_field('url_slider') ?>">
                    <?php endif; ?>
                        <div class="slider-item">
                            <?php if ( has_post_thumbnail() ) : ?>
                                <div class="slider-image">
                                    <?php the_post_thumbnail( 'full' ); ?>
                                </div>
                            <?php endif; ?>
                            
                            <div class="slider-text">
                                <h2 class="slider-title"><?php the_title(); ?></h2>
                                <div class="slider-content"><?php the_content(); ?></div>
                            </div>
                        </div>
                        <?php if(get_field('url_slider')) : ?>
                            </a>
                        <?php endif; ?>
                <?php endwhile; ?>
            </div>
        </div>
    <?php
    endif;
    wp_reset_postdata();
    ?>
</section>
