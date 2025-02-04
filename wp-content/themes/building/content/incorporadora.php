<section id="incorporadora">
    <?php
    $args = array(
        'post_type' => 'incorporadora',
        'posts_per_page' => 1,
    );
    $query = new WP_Query( $args );

    if ( $query->have_posts() ) : ?>
        <div class="container">
            <?php while ( $query->have_posts() ) : $query->the_post(); ?>
                <h2><?php the_title(); ?></h2>
                <p><?php the_content(); ?></p>
            <?php endwhile; ?>
        </div>
    <?php
    endif;
    wp_reset_postdata();
    ?>
</section>
