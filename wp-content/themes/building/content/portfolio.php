<section id="portfolio">
    <div class="container-fluid">
        <div class="container container-categories">
            <div id="portfolio-categories">
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
        </div>
    </div>
    <div class="container">
        <div id="portfolio-posts" class="row">
        </div>
        <a href="<?php echo site_url('/portfolio-completo'); ?>" class="btn primary-button">
            Ver portfólio
        </a>
    </div>

</section>