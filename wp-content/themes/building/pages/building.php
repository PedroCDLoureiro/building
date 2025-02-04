<section class="page" id="page-building">
    <div class="container-fluid">
        <?php
        $args = array(
            'post_type' => 'sobre_nos',
            'posts_per_page' => 1,
        );
        $query = new WP_Query($args);
        
        if ($query->have_posts()) :
            while ($query->have_posts()) : $query->the_post(); ?>
                <div class="row">
                    <div class="col-lg-4 offset-lg-1 col-12 d-flex flex-column justify-content-around">
                        <div class="d-flex flex-column descricao">
                            <h1><?php the_field('titulo_topo') ?></h1>
                            <?php the_field('texto_topo') ?>
                        </div>
                        <div class="d-flex flex-column descricao">
                            <div class="info1">
                                <h3>
                                    <?php the_field('titulo_info_1') ?>
                                    <p><?php the_field('descricao_info_1') ?></p>
                                </h3>
                            </div>
                            <hr>
                            <div class="info2">
                                <h3>
                                    <?php the_field('titulo_info_2') ?>
                                    <p><?php the_field('descricao_info_2') ?></p>
                                </h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-7 col-12 pe-0 img-topo">
                        <img src="<?php the_field('imagem_topo') ?>" alt="" width="100%">
                    </div>
                </div>
                <div class="col-lg-8 offset-lg-2 col-12 middle">
                    <?php the_field('texto_meio') ?>
                    <img src="<?php the_field('imagem_meio') ?>" alt="" width="100%" class="mt-2">
                </div>
                <div class="row row-final">
                    <div class="col-lg-6 col-12 ps-0 img-final">
                        <img src="<?php the_field('imagem_final') ?>" alt="" width="100%">
                    </div>
                    <div class="col-lg-4 col-12 d-flex flex-column justify-content-around">
                        <div class="d-flex flex-column descricao">
                            <h2><?php the_field('titulo_final') ?></h2>
                            <?php the_field('texto_final') ?>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8 offset-lg-2 col-12 middle">
                    <?php the_field('texto_final_2') ?>
                </div>
                
                <?php $video_url = get_field('video_url'); ?>
                
                <?php if ($video_url): ?>
                    <div class="row">
                        <div class="video">
                            <?php
                                if (preg_match('/\.(mp4|webm|ogg)$/', $video_url)) {
                                    echo '<video controls width="100%"><source src="' . esc_url($video_url) . '" type="video/mp4">Seu navegador não suporta a reprodução de vídeo.</video>';
                                } else {
                                    echo '<p>URL inválida ou formato não suportado.</p>';
                                }
                            ?>
                        </div>
                    </div>
                <?php endif; ?>
           <?php endwhile;
            wp_reset_postdata();
        endif; ?>
    </div>
</section>