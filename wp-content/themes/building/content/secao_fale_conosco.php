<section id="secao-direita">
    <div class="container-fluid">
        <div class="row">
            <?php
            $args = array(
                'post_type' => 'secao_fale_conosco',
                'posts_per_page' => 1,
            );
            $query = new WP_Query($args);
            
            if ($query->have_posts()) :
                while ($query->have_posts()) : $query->the_post(); ?>
                    <div class="col-lg-4 offset-lg-1 col-12 d-flex flex-column justify-content-center align-items-start pe-lg-5">
                        <h2><?php the_title(); ?></h2>
                        <?php the_content(); ?>
                        <?php if(get_field('link_botao') && get_field('texto_botao')) { ?>
                            <a href="<?php the_field('link_botao') ?>" class="btn primary-button"><?php the_field('texto_botao') ?></a>
                        <?php } ?>
                    </div>
                    <div class="col-lg-7 col-12 px-0 mt-lg-0 mt-3">
                        <?php the_post_thumbnail( 'full', array( 'style' => 'width:100%; height:auto;' ) ); ?>
                    </div>
               <?php endwhile;
                wp_reset_postdata();
            endif; ?>
        </div>
    </div>
</section>