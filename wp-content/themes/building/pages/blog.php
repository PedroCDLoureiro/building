<section id="page-blog">
    <div id="banner-blog" class="container-fluid p-0">
        <?php
        $args = array(
            'post_type' => 'post',
            'posts_per_page' => -1,
        );
        $query = new WP_Query( $args );

        if ( $query->have_posts() ) : ?>
            <?php while ( $query->have_posts() ) : $query->the_post(); ?>
                <div class="slider-blog-item" style="background-image: url(<?php the_field('imagem_horizontal') ?>)">
                    <div class="slider-blog-text">
                        <h2 class="slider-blog-title"><?php the_title(); ?></h2>
                        <div class="slider-blog-content"><?php the_field('citacao'); ?></div>
                    </div>
                </div>
            <?php endwhile; ?>
        <?php
        endif;
        wp_reset_postdata();
        ?>
    </div>
    <div id="blog">
        <div class="container c-blog">
            <div class="col-12">
                <h1>Procure em nosso blog!</h1>
                <div class="div-search">
                    <input type="text" name="s" id="search-input" placeholder="Buscar..." value="<?php echo get_search_query(); ?>" />
                    <button id="search-button" type="submit"><i class="fa fa-search"></i></button>
                </div>
            </div>
            
            <div id="blog-categories" class="container">
                <div class="div-btns">
                    <button class="blog-category-btn">Todas as categorias</button>
                    <?php
                        $categories = get_categories();
                        if (!empty($categories)) {
                            foreach ($categories as $category) {
                                echo '<button class="blog-category-btn" data-category-id="' . esc_attr($category->term_id) . '">' . esc_html($category->name) . '</button>';
                            }
                        }
                    ?>
                </div>
            </div>
    
            <div class="container">
                <div id="blog-posts" class="row">
                </div>
            </div>
        </div>

    </div>
</section>
