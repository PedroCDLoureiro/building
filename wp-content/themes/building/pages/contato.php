<section id="page-contato" class="page">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-12 fale-conosco">
                <h2>Fale com a gente!</h2>
                <?php
                $args = array(
                    'post_type' => 'page_contato',
                    'posts_per_page' => 1,
                );
                $query = new WP_Query($args);

                if ($query->have_posts()) :
                    while ($query->have_posts()) : $query->the_post(); 
                        the_field('texto_topo');
                        ?>
                        <a href="<?= url_portal_do_cliente();  ?>" class="btn primary-button"><i class="fas fa-home"></i>Portal do cliente</a>

                        <?php
                        if (have_rows('telefones_para_contato')) : ?>
                            <h4>Telefones para contato</h4>
                            <?php while (have_rows('telefones_para_contato')) : the_row(); ?>
                                <div class="contato-item">
                                    <a href="tel:<?= get_sub_field('telefone'); ?>">
                                        <?= get_sub_field('telefone'); ?>
                                    </a>
                                </div>
                            <?php endwhile; ?>
                        <?php endif; ?>

                        <?php 
                        if (have_rows('emails_para_contato')) : ?>
                            <h4>E-mail de nossos canais</h4>
                            <?php while (have_rows('emails_para_contato')) : the_row(); ?>
                                <div class="contato-item">
                                    <a href="mailto:<?= get_sub_field('email'); ?>">
                                        <?= get_sub_field('email'); ?>
                                    </a>
                                </div>
                            <?php endwhile; ?>
                        <?php endif; ?>

                    <?php endwhile;
                    wp_reset_postdata();
                endif; ?>
            </div>
            <div class="col-lg-6 col-12 mt-lg-0 mt-4 form-dados">
                <h2>Preencha os dados</h2>
                <div id="form-contato">
                    <?php echo do_shortcode('[contact-form-7 id="154c1ba" title="Formulário de contato"]'); ?>
                </div>
            </div>
        </div>
    </div>
</section>