<?php
    DEFINE('WP_URL', get_bloginfo('url'));
    DEFINE('WP_NAME', get_bloginfo('name'));
    DEFINE('WP_TEMPLATE', get_bloginfo('template_url'));
    DEFINE('WP_DESCRIPTION', get_bloginfo('description'));

    require_once get_template_directory() . '/custom-posts.php';
    require_once get_template_directory() . '/custom-taxonomies.php';

    // Adiciona tag title
    add_theme_support('title-tag');

    // Adiciona thumbnails aos posts
    add_theme_support( 'post-thumbnails' );

    // Altera title das páginas
    add_filter('pre_get_document_title', function($title) {
        if (is_front_page()) {
            // Página inicial: somente o nome do site
            return get_bloginfo('name');
        } elseif (is_singular()) {
            // Post, página ou outro tipo singular: Nome do site | Nome da página
            return get_bloginfo('name') . ' | ' . get_the_title();
        } else {
            // Outras páginas (como categorias): Nome do site + Título padrão 
            return get_bloginfo('name') . ' | ' . $title;
        }
    }); 

    // Permitir upload de arquivos SVG
    function permitir_svg_upload($extension) {
        $extension['svg'] = 'image/svg+xml';
        return $extension;
    }
    add_filter('upload_mimes', 'permitir_svg_upload');

    // Troca página do login
    add_action('login_enqueue_scripts', 'cutom_login_logo');
    function cutom_login_logo() {
        echo "<style type=\"text/css\">
                body.login div#login h1 a {
                background-image: url(" . get_bloginfo('template_directory') . "/admin/image/logo.png);
                width: 218px;
                background-size: 218px 63px;
            }</style>";
    }
    add_action('login_head', 'my_login_css');
    add_action('admin_enqueue_scripts', 'my_login_css');
    function my_login_css() {
        echo '<link rel="stylesheet" type="text/css" href="' . get_bloginfo('template_directory').'/admin/login.css">';
    }

    // Styles

    function my_theme_enqueue_styles() {
        // CSS principal gerado pelo SASS
        wp_enqueue_style('main-style', get_template_directory_uri() . '/assets/css/style.css', array(), '1.0', 'all');

        // JS principal minificado
        wp_enqueue_script('main-script', get_template_directory_uri() . '/main.min.js', array(), '1.0', true);
    }
    add_action('wp_enqueue_scripts', 'my_theme_enqueue_styles');

    // Bootstrap

    function theme_enqueue_scripts() {
        // Adiciona o Bootstrap CSS
        wp_enqueue_style('bootstrap-css', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css', array(), '5.3.3');
    
        // Adiciona o Bootstrap JS
        wp_enqueue_script('bootstrap-js', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js', array('jquery'), '5.3.3', true);
    
        // Adiciona o estilo principal do tema
        wp_enqueue_style('building', get_stylesheet_uri());
    }
    add_action('wp_enqueue_scripts', 'theme_enqueue_scripts');

    // Menus

    function theme_setup() {
        
        register_nav_menus(array(
            'main_menu' => __('Menu Principal', 'text-domain'),
            'footer_menu' => __('Menu Footer', 'text-domain'),
        ));
    }
    add_action('after_setup_theme', 'theme_setup');

    // URL Portal do cliente
    function url_portal_do_cliente() {
        $post = get_page_by_path('dados-rodape', OBJECT, 'dados_rodape');
    
        if ($post) {
            $post_id = $post->ID;
            return get_field('portal_do_cliente', $post_id);
        }
    
        return null;
    }

    function atualizar_url_portal_no_menu($items, $args) {
        
        if ($args->theme_location === 'main_menu' || $args->theme_location === 'footer_menu') {
            
            $url_portal = url_portal_do_cliente();
            if ($url_portal) {
                $items = preg_replace(
                    '/<a href="#">(.*?)Portal do cliente(.*?)<\/a>/',
                    '<a href="' . esc_url($url_portal) . '">$1Portal do cliente$2</a>',
                    $items
                );
            }
        }
    
        return $items;
    }
    add_filter('wp_nav_menu_items', 'atualizar_url_portal_no_menu', 10, 2);
    
    // Portfólio

    function load_portfolio_posts() {
        // Verifica se o ID da categoria foi enviado
        $category_id = isset($_POST['category_id']) ? intval($_POST['category_id']) : 0;
        // Verifica se o termo de busca foi enviado
        $search_query = isset($_POST['search_query']) ? sanitize_text_field($_POST['search_query']) : '';
        // Verifica se o portfolio_completo foi enviado
        $portfolio_completo = isset($_POST['portfolio_completo']) ? intval($_POST['portfolio_completo']) : 0;
        
        $per_page = intval($_POST['portfolio_completo']) == 0 ? 2 : -1;

        // Configura os argumentos da query
        $args = array(
            'post_type' => 'portfolio',
            'posts_per_page' => $per_page,
        );
        if (!empty($search_query)) {
            $args['s'] = $search_query;
        }
        if ($category_id > 0) {
            $args['tax_query'] = array(
                array(
                    'taxonomy' => 'categoria',
                    'field' => 'term_id',
                    'terms' => $category_id,
                ),
            );
        }
        
        $query = new WP_Query($args);
    
        // Verifica se há posts
        if ($query->have_posts()) {
            $counter = 0;
            while ($query->have_posts()) {
                $query->the_post();
                $column_class = ($portfolio_completo && $counter == 0) ? 'col-12 principal-item ' : ($portfolio_completo ? 'col-md-6 col-12 other-items ' : '');

                ?>
                    <div class="<?php echo $column_class; ?>portfolio-item">
                        <?php if(!$portfolio_completo) { ?>
                            <a href="<?= get_permalink(); ?>">
                        <?php } ?>
                        <div class="content-card">
                            <?php if (has_post_thumbnail()) { ?>
                                    <div class="thumbnail">
                                        <?= ($portfolio_completo && $counter == 0) ? '<img src="'. get_field('imagem_horizontal') . '" />' : the_post_thumbnail('medium'); ?>
                                    </div>
                            <?php } ?>
                            <div class="portfolio-content">
                                <div class="top-content">
                                    <h3><?php the_title(); ?></h3>
                                    <?php if($portfolio_completo) { ?>
                                        <a href="#" class="btn-compartilhar" data-url="<?= get_permalink(); ?>" data-title="<?php the_title(); ?>"><i class="fa-solid fa-share-nodes"></i></a>
                                    <?php } ?>
                                </div>
                                <p><?php the_field('texto_curto'); ?></p>
                                <div class="bottom-content">
                                    <span class="metragem"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/metragem.png" /><?php the_field('metragem'); ?></span>
                                    <?php if($portfolio_completo) { ?>
                                        <a href="<?= get_permalink(); ?>" class="btn primary-button">Conheça mais</a>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                        <?php if(!$portfolio_completo) { ?>
                            </a>
                        <?php } ?>
                    </div>
                <?php
                $counter++;
            }
        } else {
            echo '<p>Nenhum post encontrado para esta categoria.</p>';
        }
    
        wp_reset_postdata();
        wp_die(); // Encerra a execução do AJAX
    }
    add_action('wp_ajax_load_portfolio_posts', 'load_portfolio_posts');
    add_action('wp_ajax_nopriv_load_portfolio_posts', 'load_portfolio_posts');

    function enqueue_portfolio_scripts() {
        wp_enqueue_script('portfolio-js', get_template_directory_uri() . '/assets/js/main.js', array('jquery'), null, true);
        wp_localize_script('portfolio-js', 'ajaxurl', admin_url('admin-ajax.php'));
    }
    add_action('wp_enqueue_scripts', 'enqueue_portfolio_scripts');

    // Blog
   
    function load_blog_posts() {
        // Verifica se o ID da categoria foi enviado
        $category_id = isset($_POST['category_id']) ? intval($_POST['category_id']) : 0;
        // Verifica se o termo de busca foi enviado
        $search_query = isset($_POST['search_query']) ? sanitize_text_field($_POST['search_query']) : '';
        // Verifica se o valor da página (paged) foi enviado
        $paged = isset($_POST['paged']) ? intval($_POST['paged']) : 1;
        
        $args = array(
            'post_type' => 'post',
            'posts_per_page' => 6,
            'paged' => $paged,
        );
        if (!empty($search_query)) {
            $args['s'] = $search_query;
        }
        if ($category_id > 0) {
            $args['tax_query'] = array(
                array(
                    'taxonomy' => 'category',
                    'field' => 'term_id',
                    'terms' => $category_id,
                ),
            );
        }
        // Executa a query
        $query = new WP_Query($args);
        
        // Verifica se há posts
        if ($query->have_posts()) {
            while ($query->have_posts()) {
                $query->the_post();
                $post_time = get_the_time('U');
                $current_time = current_time('timestamp');
                $time_diff = human_time_diff($post_time, $current_time);
                ?>
                <div class="post">
                    <a href="<?php the_permalink(); ?>">
                        <div class="post-thumbnail">
                            <?php if (has_post_thumbnail()) : ?>
                                <?php the_post_thumbnail('medium'); ?>
                            <?php else : ?>
                                <img src="https://via.placeholder.com/300x200" alt="<?php the_title(); ?>">
                            <?php endif; ?>
                        </div>
                        <div class="post-content">
                            <h2><?php the_title(); ?></h2>
                            <p><?php echo wp_trim_words(get_the_excerpt(), 15, '...'); ?></p>
                            <span><?= 'Há ' . $time_diff . ' atrás'; ?></span>
                        </div>
                    </a>
                </div>
                <?php
            }
            
            // Adiciona os links de paginação
            echo '<div class="pagination">';
            echo paginate_links(array(
                'total' => $query->max_num_pages,
                'current' => $paged,
                'format' => '?paged=%#%',
                'prev_text' => '<i class="fa-solid fa-chevron-left"></i>',
                'next_text' => '<i class="fa-solid fa-chevron-right"></i>',
            ));
            echo '</div>';
            
        } else {
            echo '<p>Nenhum post encontrado para esta categoria.</p>';
        }
        
        wp_reset_postdata();
        wp_die(); // Encerra a execução do AJAX
    }
    
    add_action('wp_ajax_load_blog_posts', 'load_blog_posts');
    add_action('wp_ajax_nopriv_load_blog_posts', 'load_blog_posts');

    // Busca

    function limit_search_to_post_types($query) {
        if (!is_admin() && $query->is_main_query() && $query->is_search()) {
            $query->set('post_type', array('post', 'portfolio'));
        }
    }
    add_action('pre_get_posts', 'limit_search_to_post_types');
    
    
?>
