<footer id="footer">
    <div class="footer-widgets">
        <div class="container">
            <div class="row row-links">
                <div class="col-lg-9 col-12">
                    <div class="row">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo-branca.png" alt="Building Logo" class="logo">
                        <nav>
                            <?php wp_nav_menu(array('theme_location' => 'footer_menu')); ?>
                        </nav>
                    </div>
                </div>
                <div class="col-lg-3 col-12 icones"></div>
            </div>
            <div class="row row-infos">
                <?php
                $args = array(
                    'post_type' => 'dados_rodape',
                    'posts_per_page' => 1,
                );
                $query = new WP_Query($args);
                
                while ($query->have_posts()) : $query->the_post(); ?>
                    <div class="col-lg-3 col-md-6 col-12 div-info">
                        <h4>Fale conosco</h4>
                        <?php if (have_rows('central_de_relacionamento')) : ?>
                            <?php while (have_rows('central_de_relacionamento')) : the_row(); ?>
                                <?php
                                $tipo = get_sub_field('tipo');
                                $contato = get_sub_field('contato');
                                $icon = '';
                                $link = '';

                                if ($tipo === 'whatsapp') {
                                    $icon = '<i class="fab fa-whatsapp"></i>';
                                    $link = 'https://wa.me/' . preg_replace('/\D+/', '', $contato);
                                } elseif ($tipo === 'telefone') {
                                    $icon = '<i class="fas fa-phone-alt"></i>';
                                    $link = 'tel:' . preg_replace('/\D+/', '', $contato);
                                } elseif ($tipo === 'email') {
                                    $icon = '<i class="fas fa-envelope"></i>';
                                    $link = 'mailto:' . esc_attr($contato);
                                }
                                ?>
                                <div class="relacionamento-item">
                                    <a href="<?php echo esc_url($link); ?>" target="_blank" class="relacionamento-link">
                                        <span class="relacionamento-icon"><?php echo $icon; ?></span>
                                        <span class="relacionamento-contato"><?php echo esc_html($contato); ?></span>
                                    </a>
                                </div>
                            <?php endwhile; ?>
                        <?php endif; ?>
                    </div>
                    <div class="col-lg-4 col-md-6 col-12 div-info">
                        <h4>Endereço</h4>
                        <?php
                        $endereco = get_field('endereco');

                        if ($endereco) :
                            $endereco_maps = urlencode($endereco);
                            $google_maps_link = "https://www.google.com/maps/search/?api=1&query={$endereco_maps}";
                            ?>
                            <div class="endereco">
                                <a href="<?php echo esc_url($google_maps_link); ?>" target="_blank" class="endereco-link">
                                    <?php echo esc_html($endereco); ?>
                                </a>
                            </div>
                        <?php endif; ?>
                    </div>
                    <div class="col-lg-3 col-md-6 col-12 div-info">
                        <h4>Outros assuntos</h4>
                        <a href="<?php echo WP_URL; ?>/politica-de-privacidade">Política de privacidade e Cookies</a>
                        <a href="<?php echo WP_URL; ?>/contato?assunto=Negocie seu terreno">Negocie seu terreno</a>
                        <a href="<?php echo WP_URL; ?>/contato?assunto=Fale com um especialista">Fale com um especialista</a>
                        <a href="<?php echo WP_URL; ?>/contato?assunto=Trabalhe conosco">Trabalhe conosco</a>
                    </div>
                    <div class="col-lg-2 col-md-6 col-12 div-info">
                        <?php
                        $instagram = get_field('instagram');
                        $linkedin = get_field('linkedin');
                        $youtube = get_field('youtube');
                        ?>
                        <ul class="social-icons">
                            <?php if ($instagram): ?>
                                <li><a href="<?php echo esc_url($instagram); ?>" target="_blank"><i class="fab fa-instagram"></i></a></li>
                            <?php endif; ?>
                            <?php if ($linkedin): ?>
                                <li><a href="<?php echo esc_url($linkedin); ?>" target="_blank"><i class="fab fa-linkedin"></i></a></li>
                            <?php endif; ?>
                            <?php if ($youtube): ?>
                                <li><a href="<?php echo esc_url($youtube); ?>" target="_blank"><i class="fab fa-youtube"></i></a></li>
                            <?php endif; ?>
                        </ul>
                    </div>

               <?php endwhile;
                wp_reset_postdata();
                ?>
            </div>
        </div>
    </div>
    <div class="footer-bottom">
        <div class="container">
            <p>© Copyright <?= date('Y'); ?>, Todos os direitos reservados | Building Empreendimentos LTDA | CNPJ 05.394.993/0001-47</p>
        </div>
    </div>
</footer>

</body>
</html>