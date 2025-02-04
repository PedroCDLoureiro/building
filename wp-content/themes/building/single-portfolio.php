<?php get_header(); ?>
<section id="single-portfolio" class="sec-m">
    <div class="container">
        <?php
            if (have_posts()) :
                while (have_posts()) : the_post(); ?>
                    <div class="row">
                        <div class="col-lg-7 col-12 img-post">
                            <?php
                                if (has_post_thumbnail()) :
                                    the_post_thumbnail('full');
                                endif;
                            ?>
                        </div>
                        <div class="col-lg-5 col-12 ps-lg-6 pt-5 dados-topo">
                            <h1 class="post-title"><?php the_title(); ?></h1>
                            <p>
                                <b class="status"><?php the_field('status') ?>, veja o <a href="#status">status</a>.</b>
                            </p>
                            <p>
                                <?php the_field('texto_curto') ?>
                            </p>
                            <div class="info-topo">
                                <?php if(get_field('suites')) { ?>
                                    <p><img src="<?= get_template_directory_uri(); ?>/assets/images/suites.png" /><b><?= get_field('suites') . ' ' . (get_field('suites') == '1' ? 'suíte' : 'suítes'); ?></b></p>
                                <?php } ?>
                                <?php if(get_field('area_privativa')) { ?>
                                    <p><img src="<?= get_template_directory_uri(); ?>/assets/images/metragem.png" /><b><?= get_field('area_privativa') . ' ' . 'de área privativa' ?></b></p>
                                <?php } ?>
                                <?php if(get_field('vagas')) { ?>
                                    <p><img src="<?= get_template_directory_uri(); ?>/assets/images/vagas.png" /><b><?= get_field('vagas') . ' ' . (get_field('vagas') == '1' ? 'vaga' : 'vagas'); ?></b></p>
                                <?php } ?>
                                <?php if(get_field('lancamento')) { ?>
                                    <p><img src="<?= get_template_directory_uri(); ?>/assets/images/lancamento.png" /><b>Lançamento</b></p>
                                <?php } ?>
                            </div>
                            <div class="localizacao">
                                <h2>
                                    <?php
                                        $endereco = get_field('endereco');
                                        $bairro = get_field('bairro');
                                        $cidade = get_field('cidade');

                                        if ($bairro && $cidade) {
                                            echo $bairro . ' - ' . $cidade;
                                        } elseif ($bairro) {
                                            echo $bairro;
                                        } elseif ($cidade) {
                                            echo $cidade;
                                        }
                                    ?>
                                </h2>
                                <?php if(get_field('endereco')) : ?>
                                    <div class="d-flex justify-content-between endereco">
                                        <span><?php the_field('endereco') ?></span>
                                        <a href="https://www.google.com/maps?q=<?= urlencode($endereco . ', ' . $bairro . ', ' . $cidade); ?>" target="_blank" rel="noopener">ver mapa</a>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <?php if(get_field('descricao')) : ?>
                        <section id="descricao">
                            <div class="col-12">
                                <?php
                                    $descricao = get_field('descricao');
    
                                    $paragrafos = explode('</p>', $descricao);
    
                                    if (!empty($paragrafos[0])) {
                                        echo $paragrafos[0] . '</p>';
                                    }
                                ?>
                                <div class="d-flex justify-content-center btn-ler-mais">
                                    <a href="#" class="ler-mais">Ler mais</a>
                                </div>
    
                                <div class="descricao-completa" style="display: none;">
                                    <?php
                                        array_shift($paragrafos);
                                        echo implode('</p>', $paragrafos);
                                    ?>
                                </div>
                            </div>
                        </section>
                    <?php endif; ?>
                    <?php if(get_field('imagem_secundaria')) : ?>
                        <section>
                            <div class="col-12">
                                <img src="<?php the_field('imagem_secundaria') ?>" alt="<?php the_title(); ?>" class="w-100">
                            </div>
                        </section>
                    <?php endif; ?>                    
                    <?php if(get_field('nome_arquiteto')) : ?>
                        <section id="arquiteto" class="sec-m">
                            <div class="row">
                                <div class="col-lg-6 col-12 d-flex flex-column justify-content-center descricao">
                                    <span>O arquiteto</span>
                                    <h2><?php the_field('nome_arquiteto'); ?></h2>
                                    <?php the_field('descricao_arquiteto'); ?>
                                </div>
                                <?php 
                                $midia = get_field('midia_arquiteto');

                                if ($midia) : 
                                    $file_type = wp_check_filetype($midia);
                                    $is_image = in_array($file_type['ext'], ['jpg', 'jpeg', 'png', 'gif', 'webp']);
                                    $is_video = in_array($file_type['ext'], ['mp4', 'webm', 'ogg']);
                                ?>
                                    <div class="col-lg-6 col-12 img-arquiteto">
                                        <?php if ($is_image) : ?>
                                            <img src="<?= esc_url($midia); ?>" alt="<?php the_title(); ?>" class="w-100">
                                        <?php elseif ($is_video) : ?>
                                            <video class="w-100" controls>
                                                <source src="<?= esc_url($midia); ?>" type="<?= esc_attr($file_type['type']); ?>">
                                                Seu navegador não suporta vídeos.
                                            </video>
                                        <?php endif; ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </section>
                    <?php endif; ?>
                    <?php if(get_field('galeria_de_imagens')) : ?>
                        <?php
                            $galeria = get_field('galeria_de_imagens');
                            $primeira_imagem = $galeria[0];
                            $segunda_imagem = $galeria[1]; 
                            $terceira_imagem = $galeria[2];
                        ?>
                        <section id="galeria" class="sec-m">
                            <div class="row">
                                <h2>Galeria de imagens</h2>
                                <div class="col-lg-7 col-12">
                                    <div class="content-card verGaleria" data-item-id="0">
                                        <div class="thumbnail">
                                            <img src="<?= esc_url($primeira_imagem); ?>" class="w-100 mb-3" data-img-url="<?= esc_url($primeira_imagem); ?>">
                                        </div>
                                    </div>    
                                </div>
                                <div class="col-lg-5 col-12 mt-lg-0 mt-3">
                                    <div class="row">
                                        <div class="col-12 mb-3">
                                            <div class="content-card verGaleria" data-item-id="1">
                                                <div class="thumbnail">
                                                    <img src="<?= esc_url($segunda_imagem); ?>" class="w-100" data-img-url="<?= esc_url($segunda_imagem); ?>">
                                                </div>
                                            </div>    
                                        </div>
                                        <div class="col-12">
                                            <div class="content-card verGaleria" data-item-id="2">
                                                <div class="thumbnail">
                                                    <img src="<?= esc_url($terceira_imagem); ?>" class="w-100" data-img-url="<?= esc_url($terceira_imagem); ?>">
                                                </div>
                                            </div>    
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="d-flex justify-content-end mt-3">
                                <a href="#" class="btn tertiary-button verGaleria" data-item-id="0">Ver toda a galeria</a>
                            </div>

                            <!-- Slider -->
                            <div id="modalGaleria" class="modal">
                                <div class="modal-content">
                                    <div class="top-modal">
                                        <button id="zoom-btn-galeria" class="zf-button">
                                            <i class="fas fa-search-plus"></i> Zoom
                                        </button>
                                        <a href="#" class="btn-compartilhar m-0" data-url="<?= get_permalink(); ?>" data-title="<?php the_title(); ?>"><i class="fa-solid fa-share-nodes"></i></a>
                                        <span class="close-modal" data-modal="modalGaleria">&times;</span>
                                    </div>
                                    <div class="modal-body">
                                        <div id="slider-galeria">
                                            <?php foreach ($galeria as $index => $imagem) : ?>
                                                <div class="galeria-item" style="background-image: url(<?= esc_url($imagem); ?>)"></div>
                                            <?php endforeach; ?>
                                        </div>
                                        <div id="slider-galeria-dots">
                                            <?php foreach ($galeria as $index => $imagem) : ?>
                                                <div class="galeria-dot" style="background-image: url(<?= esc_url($imagem); ?>);"></div>
                                            <?php endforeach; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Modal de Compartilhamento -->
                            <div id="shareModal" class="share-modal">
                                <div class="modal-content">
                                    <span class="close-modal" data-modal="shareModal">&times;</span>
                                    <h3>Compartilhe este imóvel:</h3>
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
                        </section>
                    <?php endif; ?>
                    <?php if(get_field('diferenciais')) : ?>
                        <section id="diferenciais" class="sec-m">
                            <div id="diferenciais-categories" class="d-flex justify-content-between align-items-center mb-5">
                                <h2>Diferenciais <?php the_title(); ?></h2>
                                <div class="categorias-diferenciais d-flex align-items-center">
                                    <div class="categories-btns">
                                        <button class="category-btn category-diferenciais active" data-category="areas-comuns">Áreas comuns</button>
                                        <button class="category-btn category-diferenciais" data-category="apartamento">Apartamento</button>
                                        <button class="category-btn category-diferenciais" data-category="demais">Demais</button>
                                    </div>
                                </div>
                            </div>
                            <div class="div-diferenciais">
                                <?php
                                    $categorias = ['areas-comuns', 'apartamento', 'demais'];
                                    $itemId = 0;
                                    if (have_rows('diferenciais')): 
                                        foreach ($categorias as $categoriaAtual): ?>
                                            <div class="slider-diferenciais" data-category="<?= esc_attr($categoriaAtual); ?>">
                                                <?php while (have_rows('diferenciais')): the_row();
                                                    $categoria = get_sub_field('_categoria_diferencial');
                                                    $imagem = get_sub_field('imagem_diferencial');
                                                    $titulo = get_sub_field('titulo_diferencial');
                                                    $texto_curto = get_sub_field('texto_curto_diferencial');
                                                    $descricao = get_sub_field('descricao_diferencial');
                                                ?>
                                                    <?php if ($categoria === $categoriaAtual): ?>
                                                        <div class="slider-item-template open-modal" data-category="<?= esc_attr($categoriaAtual); ?>" data-item-id="<?= $itemId; ?>">
                                                            <div class="content-card">
                                                                <div class="thumbnail">
                                                                    <img src="<?= esc_url($imagem); ?>" alt="<?= esc_attr($texto_curto); ?>">
                                                                </div>
                                                                <h3><?= esc_html($titulo); ?></h3>
                                                                <p><?= $texto_curto; ?></p>
                                                                <div class="descricao" style="display: none;"><?= $descricao; ?></div>
                                                                <span>Ler mais</span>
                                                            </div>
                                                        </div>
                                                    <?php 
                                                    $itemId++;
                                                    endif; ?>
                                                <?php endwhile; ?>
                                            </div>
                                        <?php 
                                        $itemId = 0;
                                        endforeach;
                                    endif;
                                ?>
                            </div>
    
                            <!-- Slider -->
                            <div id="modalSlider" class="modal bg-modal-black" style="display: none;">
                                <div class="modal-content">
                                    <span class="close-modal" data-modal="modalSlider">&times;</span>
                                    <div class="modal-slider">
                                        <!-- Os itens serão injetados aqui dinamicamente -->
                                    </div>
                                </div>
                            </div>
                        </section>
                    <?php endif; ?>
                    <?php if(get_field('imagem_principal_plantas')) : ?>
                        <section id="plantas-implantacao">
                            <h2 class="mb-5">Veja as plantas disponíveis</h2>
                            <div class="row">
                                <div class="col-6">
                                    <span><b>Plantas</b></span>
                                    <div class="content-card">
                                        <div class="thumbnail mt-2">
                                            <img src="<?php the_field('imagem_principal_plantas') ?>" alt="Plantas <?php the_title() ?>" class="w-100" data-toggle="modal" data-target="plantas">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <span><b>Implantação</b></span>
                                    <div class="content-card">
                                        <div class="thumbnail mt-2">
                                            <img src="<?php the_field('imagem_principal_implantacao') ?>" alt="Implantação <?php the_title() ?>" class="w-100" data-toggle="modal" data-target="implantacao">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Modal Plantas/Implantação -->
                            <div id="modalPlantasImplantacao" class="modal bg-modal-black">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button id="zoom-btn" class="zf-button">
                                            <i class="fas fa-search-plus"></i> Zoom
                                        </button>
                                        <button id="fullscreen-btn" class="zf-button">
                                            <i class="fas fa-expand"></i> Fullscreen
                                        </button>
                                        <span class="close-modal" data-modal="modalPlantasImplantacao">&times;</span>
                                    </div>
                                    <div class="modal-body">
                                        <div class="modal-menu">
                                            <span id="plantas">Plantas</span>
                                            <span class="separator"></span>
                                            <span id="implantacao">Implantação</span>
                                        </div>
                                        <div id="content-plantas" class="content" style="display: none;">
                                            <div class="navbar-plantas">
                                                <?php if (have_rows('plantas')): 
                                                    $is_first = true;
                                                    $counter = 1;
                                                ?>
                                                    <?php while (have_rows('plantas')): the_row(); ?>
                                                        <button class="category-btn category-plantas <?= $is_first ? 'active' : ''; ?>" data-id="<?= 'planta'.$counter ?>">
                                                            <?= get_sub_field('titulo_planta'); ?>
                                                        </button>
                                                    <?php 
                                                        $is_first = false;
                                                        $counter++;
                                                    ?>
                                                    <?php endwhile; ?>
                                                <?php endif; ?>
                                            </div>
    
                                            <div class="image-container">
                                                <?php 
                                                if (have_rows('plantas')): 
                                                    $is_first = true;
                                                    $counter = 1;
                                                    while (have_rows('plantas')): the_row(); 
                                                ?>
                                                    <img 
                                                        src="<?= get_sub_field('imagem_planta'); ?>" 
                                                        alt="<?= get_sub_field('titulo_planta'); ?>" 
                                                        class="planta-image <?= $is_first ? 'visible' : ''; ?>" 
                                                        id="<?= 'planta'.$counter ?>" 
                                                        style="<?= $is_first ? '' : 'display: none;'; ?>" 
                                                    />
                                                    <?php 
                                                        $is_first = false;
                                                        $counter++;
                                                    ?>
                                                    <?php endwhile; ?>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                        <div id="content-implantacao" class="content" style="display: none;">
                                            <div class="image-container">
                                                <img src="<?php the_field('imagem_principal_implantacao') ?>" alt="Implantação <?php the_title() ?>" class="visible">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                    <?php endif; ?>
                    <?php if( have_rows('areas_comuns') ): ?>
                        <section id="areas-comuns">
                            <h2 class="mb-5">Áreas comuns</h2>                        
                            <div class="slider-areas-comuns">
                                <?php while( have_rows('areas_comuns') ): the_row(); 
                                    $imagem_area_comum = get_sub_field('imagem_area_comum');
                                    $titulo_area_comum = get_sub_field('titulo_area_comum');
                                ?>
                                    <div class="d-flex flex-column align-items-center justify-content-center area-comum-item">
                                        <img src="<?php echo esc_url($imagem_area_comum); ?>" alt="<?php echo esc_attr($titulo_area_comum); ?>">
                                        <h3><?php echo esc_html($titulo_area_comum); ?></h3>
                                    </div>
                                <?php endwhile; ?>
                            </div>
                        </section>
                    <?php endif; ?>
                    <?php if(get_field('descricao_ficha_tecnica_principal')) : ?>
                        <section id="ficha-tecnica" class="sec-m">
                            <div class="row">
                                <div class="col-lg-6 col-12 d-flex flex-column justify-content-start descricao">
                                    <h2 class="mb-4">Ficha técnica</h2>
                                    <?php the_field('descricao_ficha_tecnica_principal'); ?>
                                </div>
                                <div class="col-lg-6 col-12 d-flex flex-column justify-content-center ficha">
                                    <?php if( have_rows('ficha_tecnica') ): ?>
                                        <?php while( have_rows('ficha_tecnica') ): the_row(); 
                                            $titulo = get_sub_field('titulo_ficha_tecnica');
                                            $descricao = get_sub_field('descricao_ficha_tecnica');
                                        ?>
                                            <div class="d-flex flex-column ficha-tecnica-item">
                                                <h3><b><?php echo esc_html($titulo); ?></b></h3>
                                                <?= $descricao; ?>
                                            </div>
                                        <?php endwhile; ?>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </section>
                    <?php endif; ?>
                    <?php if( have_rows('andamento_da_obra') ): ?>
                        <section id="status" class="sec-m">
                            <h2 class="mb-5">Acompanhar a Obra</h2>
                            <div class="row">
                                <?php if(get_field('imagens_acompanhar_a_obra')) : ?>
                                    <div class="col-lg-6 col-12 img-status">
                                        <div class="slider-status">
                                            <?php while( have_rows('imagens_acompanhar_a_obra') ): the_row(); 
                                                $imagem_acompanhar_a_obra = get_sub_field('imagem_acompanhar_a_obra');
                                            ?>
                                                <div class="d-flex flex-column align-items-start area-comum-item">
                                                    <img class="mb-2" src="<?php echo esc_url($imagem_acompanhar_a_obra); ?>">
                                                    <span><?php the_sub_field('legenda_imagem_acompanhar_a_obra') ?></span>
                                                </div>
                                            <?php endwhile; ?>
                                        </div>
                                    </div>
                                <?php endif; ?>
                                <div class="col-lg-6 col-12 mt-lg-0 mt-4 d-flex flex-column justify-content-center descricao">
                                    <?php if(get_field('data_de_entrega_prevista')) : ?>
                                        <h3>Data de entrega prevista <?php the_field('data_de_entrega_prevista'); ?></h3>
                                    <?php endif; ?>
                                    <?php while( have_rows('andamento_da_obra') ): the_row(); 
                                        $titulo_andamento = get_sub_field('titulo_andamento');
                                        $subitens = get_sub_field('subitens_andamento');
                                    ?>
                                        <div class="accordion-item">
                                            <button class="accordion-header">
                                                <h3><?php echo esc_html($titulo_andamento); ?></h3>
                                                <span class="accordion-icon">+</span>
                                            </button>
                                            <div class="accordion-content">
                                                <?php if( $subitens ): ?>
                                                    <ul>
                                                        <?php foreach( $subitens as $subitem ): ?>
                                                            <li>
                                                                <span><?php echo esc_html($subitem['descricao_subitem']); ?></span>
                                                                <span><?php echo esc_html($subitem['porcentagem']); ?>%</span>
                                                            </li>
                                                        <?php endforeach; ?>
                                                    </ul>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    <?php endwhile; ?>
                                </div>
                            </div>
                        </section>
                    <?php endif; ?>
                <?php
                endwhile;
            else :
                echo '<p>Este post não foi encontrado.</p>';
            endif;
        ?>
    </div>
    <div class="container-fluid">
        <div id="contato">
            <div class="content d-flex flex-column align-items-center">
                <h2>Fale com a gente!</h2>
                <p>Construir relacionamentos é um privilégio para nós.</p>
                <button id="btn-contato" class="btn primary-button">Entre em contato</button>
            </div>
            <!-- Modal Contato -->
            <div id="modalContato" class="modal bg-modal-black">
                <div class="modal-content">
                    <span class="close-modal" data-modal="modalContato">&times;</span>
                    <div class="modal-body">
                        <h2>Contato</h2>
                        <span>Preencha os dados</span>
                        <div id="form-contato">
                            <?php echo do_shortcode('[contact-form-7 id="154c1ba" title="Formulário de contato"]'); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>