
<?php
    $args = array(
        'post_type' => 'video_institucional',
        'posts_per_page' => 1,
    );
    $query = new WP_Query($args);

    if ($query->have_posts()) :
        while ($query->have_posts()) : $query->the_post(); 
        $video_url = get_field('video_url');
?>
    <section id="video-institucional" style="background-image: url(<?= esc_url(get_the_post_thumbnail_url()) ?>)">
        <div class="container">
            <div class="row">
                <div class="<?= $video_url ? 'col-md-5' : 'col-md-6' ?> col-12 d-flex flex-column justify-content-end">
                    <?php if ($video_url): ?>
                        <span><?php the_field('cabecalho'); ?></span>
                        <h2><?php the_field('titulo'); ?></h2>
                        <div class="video-wrapper">
                            <?php
                                if (preg_match('/\.(mp4|webm|ogg)$/', $video_url)) {
                                    echo '<video controls width="100%"><source src="' . esc_url($video_url) . '" type="video/mp4">Seu navegador não suporta a reprodução de vídeo.</video>';
                                } else {
                                    echo '<p>URL inválida ou formato não suportado.</p>';
                                }
                            ?>
                        </div>
                    <?php endif; ?>
                </div>
                <div class="<?= $video_url ? 'col-md-7' : 'col-md-6' ?> col-12 d-flex flex-column justify-content-center">
                    <h2 class="sec-titulo"><?php the_title(); ?></h2>
                    <?php the_content(); ?>
                </div>
            </div>
        </div>
    </section>
    <?php endwhile;
    wp_reset_postdata();
endif; ?>
