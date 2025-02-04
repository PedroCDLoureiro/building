<section id="page-portfolio" class="page">
    <div class="container">
        <div id="portfolio-categories" class="d-flex justify-content-between align-items-center mb-5">
            <h1>Portfólio Building</h1>
            <div class="categorias-portfolio d-flex align-items-center">
                <div class="btns-categorias">
                    <?php
                        $categories = get_terms(array(
                            'taxonomy' => 'categoria',
                            'hide_empty' => true,
                        ));

                        if (!empty($categories)) {
                            foreach ($categories as $category) {
                                echo '<button class="category-btn category-portfolio" data-category-id="' . esc_attr($category->term_id) . '">' . esc_html($category->name) . '</button>';
                            }
                        }
                    ?>

                </div>
                <div class="div-search-portfolio d-flex align-items-center">
                    <i id="search-icon-portfolio" class="fa-solid fa-magnifying-glass"></i>
                    <input type="text" name="s" id="search-input-portfolio" class="search-input" placeholder="Buscar..." value="<?php echo get_search_query(); ?>" />
                </div>
            </div>
        </div>
        <div id="portfolio-posts" class="row">
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