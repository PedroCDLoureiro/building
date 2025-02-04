<?php get_header(); ?>
<section id="single" class="sec-m">
    <div class="container">
        <div class="single-post-header">
            <a href="javascript:history.back()" class="btn-voltar"><i class="fa-solid fa-left-long"></i>Voltar</a>
            <a href="#" class="btn-compartilhar btn primary-button m-0" data-url="<?= get_permalink(); ?>" data-title="<?php the_title(); ?>"><i class="fa-solid fa-share-nodes"></i>Compartilhar</a>
        </div>
        
        <div class="single-post">
            <?php
            if (have_posts()) :
                while (have_posts()) : the_post();
                    ?>
                    <h1 class="post-title"><?php the_title(); ?></h1>
                    
                    <div class="post-image">
                        <?php
                        if (has_post_thumbnail()) :
                            the_post_thumbnail('full');
                        endif;
                        ?>
                    </div>
                    
                    <div class="post-content d-flex flex-column">
                        <?php if(get_field('citacao')) { ?>
                            <div class="citacao col-12 d-flex align-items-start">
                                <img src="<?= WP_TEMPLATE; ?>/assets/images/aspas.png" alt="">
                                <?php the_field('citacao'); ?>
                            </div>
                        <?php } ?>
                        <?php the_content(); ?>
                    </div>
                                        
                    <?php
                endwhile;
            else :
                echo '<p>Este post não foi encontrado.</p>';
            endif;
            ?>
        </div>

        <!-- Posts Recomendados -->
        <div class="recommended-posts">
            <h2>Posts Recomendados</h2>
            <div class="recommended-grid">
                <?php
                // Obtém as categorias do post atual
                $categories = get_the_category();
                if ($categories) :
                    $category_ids = array_map(function ($category) {
                        return $category->term_id;
                    }, $categories);

                    // Query para pegar posts relacionados
                    $args = [
                        'category__in' => $category_ids, // Filtrar pelos IDs das categorias
                        'post__not_in' => [get_the_ID()], // Excluir o post atual
                        'posts_per_page' => 4, // Limite de posts relacionados
                        'ignore_sticky_posts' => true,
                    ];
                    $related_posts = new WP_Query($args);

                    if ($related_posts->have_posts()) :
                        while ($related_posts->have_posts()) :
                            $related_posts->the_post();
                            ?>
                            <div class="recommended-item">
                                <a href="<?php the_permalink(); ?>" class="recommended-link">
                                    <?php if (has_post_thumbnail()) : ?>
                                        <div class="recommended-thumbnail">
                                            <?php the_post_thumbnail('medium'); ?>
                                        </div>
                                    <?php endif; ?>
                                    <div class="recommended-info">
                                        <h3 class="recommended-title"><?php the_title(); ?></h3>
                                    </div>
                                </a>
                            </div>
                            <?php
                        endwhile;
                        wp_reset_postdata();
                    else :
                        echo '<p>Nenhum post relacionado encontrado.</p>';
                    endif;
                else :
                    echo '<p>Este post não pertence a nenhuma categoria.</p>';
                endif;
                ?>
            </div>
        </div>

        <!-- Modal de Compartilhamento -->
        <div id="shareModal" class="share-modal">
            <div class="modal-content">
                <span class="close-modal" data-modal="shareModal">&times;</span>
                <h3>Compartilhe este post:</h3>
                <div class="post-share-buttons">
                    <a href="#" class="btn-share facebook" data-network="facebook">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a href="#" class="btn-share twitter" data-network="twitter">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a href="#" class="btn-share whatsapp" data-network="whatsapp">
                        <i class="fab fa-whatsapp"></i>
                    </a>
                    <a href="#" class="btn-share linkedin" data-network="linkedin">
                        <i class="fab fa-linkedin-in"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>
