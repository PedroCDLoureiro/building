<?php 

//  Slider
function create_slider_post_type() {
    $args = array(
        'labels' => array(
            'name'               => 'Slider Topo',
            'singular_name'      => 'Slider Topo',
            'add_new'            => 'Adicionar Novo',
            'add_new_item'       => 'Adicionar Novo Slider Topo',
            'edit_item'          => 'Editar Slider Topo',
            'new_item'           => 'Novo Slider Topo',
            'view_item'          => 'Ver Slider Topo',
            'search_items'       => 'Procurar Slider Topo',
            'not_found'          => 'Nenhum Slider Topo encontrado',
            'not_found_in_trash' => 'Nenhum Slider Topo encontrado na lixeira',
            'all_items'          => 'Todos os Slider Topo',
            'archives'           => 'Arquivos de Slider Topo',
            'attributes'         => 'Atributos de Slider Topo',
            'insert_into_item'   => 'Inserir no Slider Topo',
            'uploaded_to_this_item' => 'Carregado para este Slider Topo',
            'filter_items_list'  => 'Filtrar lista de Slider Topo',
        ),
        'public' => true,
        'has_archive' => true,
        'menu_icon' => 'dashicons-images-alt2',
        'supports' => array( 'title', 'editor', 'thumbnail' ),
        'rewrite' => array( 'slug' => 'slider' ), 
    );

    register_post_type( 'slider', $args );
}
add_action( 'init', 'create_slider_post_type' );

// Incorporadora
function create_incorporadora_post_type() {
    $args = array(
        'labels' => array(
            'name'               => 'Incorporadora',
            'singular_name'      => 'Incorporadora',
            'add_new'            => 'Adicionar Novo',
            'add_new_item'       => 'Adicionar Novo Incorporadora',
            'edit_item'          => 'Editar Incorporadora',
            'new_item'           => 'Novo Incorporadora',
            'view_item'          => 'Ver Incorporadora',
            'search_items'       => 'Procurar Incorporadoras',
            'not_found'          => 'Nenhum Incorporadora encontrado',
            'not_found_in_trash' => 'Nenhum Incorporadora encontrado na lixeira',
            'all_items'          => 'Todos os Incorporadoras',
            'archives'           => 'Arquivos de Incorporadora',
            'attributes'         => 'Atributos de Incorporadora',
            'insert_into_item'   => 'Inserir no Incorporadora',
            'uploaded_to_this_item' => 'Carregado para este Incorporadora',
            'filter_items_list'  => 'Filtrar lista de Incorporadoras',
        ),
        'public' => true,
        'has_archive' => true,
        'menu_icon' => 'dashicons-text',
        'supports' => array( 'title', 'editor' ),
        'rewrite' => array( 'slug' => 'incorporadora' ), 
    );

    register_post_type( 'incorporadora', $args );
}
add_action( 'init', 'create_incorporadora_post_type' );

// Portfólio
function create_portfolio_post_type() {
    $args = array(
        'labels' => array(
            'name'               => 'Portfólio',
            'singular_name'      => 'Portfólio',
            'add_new'            => 'Adicionar Novo',
            'add_new_item'       => 'Adicionar Novo Imóvel',
            'edit_item'          => 'Editar Imóvel',
            'new_item'           => 'Novo Imóvel',
            'view_item'          => 'Ver Imóvel',
            'search_items'       => 'Procurar Imóveis',
            'not_found'          => 'Nenhum Portfólio encontrado',
            'not_found_in_trash' => 'Nenhum Portfólio encontrado na lixeira',
            'all_items'          => 'Todos os Imóveis',
            'archives'           => 'Arquivos de Portfólio',
            'attributes'         => 'Atributos de Portfólio',
            'insert_into_item'   => 'Inserir no Portfólio',
            'uploaded_to_this_item' => 'Carregado para este Portfólio',
            'filter_items_list'  => 'Filtrar lista de Imóveis',
        ),
        'public' => true,
        'has_archive' => true,
        'menu_icon' => 'dashicons-images-alt2',
        'supports' => array( 'title', 'thumbnail' ),
        'rewrite' => array( 'slug' => 'portfolio' ), 
    );

    register_post_type( 'portfolio', $args );
}
add_action( 'init', 'create_portfolio_post_type' );

// Seção Sobre nós
function create_secao_sobre_nos_post_type() {
    $args = array(
        'labels' => array(
            'name'               => 'Seção Sobre nós',
            'singular_name'      => 'Seção Sobre nós',
            'add_new'            => 'Adicionar Novo',
            'add_new_item'       => 'Adicionar Novo',
            'edit_item'          => 'Editar Seção Sobre nós',
            'new_item'           => 'Novo Seção Sobre nós',
            'view_item'          => 'Ver Seção Sobre nós',
            'search_items'       => 'Procurar',
            'not_found'          => 'Nenhum Seção Sobre nós encontrado',
            'not_found_in_trash' => 'Nenhum Seção Sobre nós encontrado na lixeira',
            'all_items'          => 'Todos',
            'archives'           => 'Arquivos de Seção Sobre nós',
            'attributes'         => 'Atributos de Seção Sobre nós',
            'insert_into_item'   => 'Inserir no Seção Sobre nós',
            'uploaded_to_this_item' => 'Carregado para este Seção Sobre nós',
            'filter_items_list'  => 'Filtrar lista de Seção Sobre nós',
        ),
        'public' => true,
        'has_archive' => true,
        'menu_icon' => 'dashicons-images-alt2',
        'supports' => array( 'title', 'editor', 'thumbnail' ),
        'rewrite' => array( 'slug' => 'secao_sobre_nos' ), 
    );

    register_post_type( 'secao_sobre_nos', $args );
}
add_action( 'init', 'create_secao_sobre_nos_post_type' );

// Seção Fale conosco
function create_secao_fale_conosco_post_type() {
    $args = array(
        'labels' => array(
            'name'               => 'Seção Fale conosco',
            'singular_name'      => 'Seção Fale conosco',
            'add_new'            => 'Adicionar Novo',
            'add_new_item'       => 'Adicionar Novo',
            'edit_item'          => 'Editar Seção Fale conosco',
            'new_item'           => 'Novo Seção Fale conosco',
            'view_item'          => 'Ver Seção Fale conosco',
            'search_items'       => 'Procurar',
            'not_found'          => 'Nenhum Seção Fale conosco encontrado',
            'not_found_in_trash' => 'Nenhum Seção Fale conosco encontrado na lixeira',
            'all_items'          => 'Todos',
            'archives'           => 'Arquivos de Seção Fale conosco',
            'attributes'         => 'Atributos de Seção Fale conosco',
            'insert_into_item'   => 'Inserir no Seção Fale conosco',
            'uploaded_to_this_item' => 'Carregado para este Seção Fale conosco',
            'filter_items_list'  => 'Filtrar lista de Seção Fale conosco',
        ),
        'public' => true,
        'has_archive' => true,
        'menu_icon' => 'dashicons-images-alt2',
        'supports' => array( 'title', 'editor', 'thumbnail' ),
        'rewrite' => array( 'slug' => 'secao_fale_conosco' ), 
    );

    register_post_type( 'secao_fale_conosco', $args );
}
add_action( 'init', 'create_secao_fale_conosco_post_type' );

// Vídeo Inconstitucional
function create_video_institucional_post_type() {
    $args = array(
        'labels' => array(
            'name'               => 'Vídeo Institucional',
            'singular_name'      => 'Vídeo Institucional',
            'add_new'            => 'Adicionar Novo',
            'add_new_item'       => 'Adicionar Novo',
            'edit_item'          => 'Editar Vídeo Institucional',
            'new_item'           => 'Novo Vídeo Institucional',
            'view_item'          => 'Ver Vídeo Institucional',
            'search_items'       => 'Procurar',
            'not_found'          => 'Nenhum Vídeo Institucional encontrado',
            'not_found_in_trash' => 'Nenhum Vídeo Institucional encontrado na lixeira',
            'all_items'          => 'Todos',
            'archives'           => 'Arquivos de Vídeo Institucional',
            'attributes'         => 'Atributos de Vídeo Institucional',
            'insert_into_item'   => 'Inserir no Vídeo Institucional',
            'uploaded_to_this_item' => 'Carregado para este Vídeo Institucional',
            'filter_items_list'  => 'Filtrar lista de Vídeo Institucional',
        ),
        'public' => true,
        'has_archive' => true,
        'menu_icon' => 'dashicons-video-alt3',
        'supports' => array( 'title', 'editor', 'thumbnail' ),
        'rewrite' => array( 'slug' => 'video_institucional' ), 
    );

    register_post_type( 'video_institucional', $args );
}
add_action( 'init', 'create_video_institucional_post_type' );

// Dados Rodapé
function create_dados_rodape_post_type() {
    $args = array(
        'labels' => array(
            'name'               => 'Dados Rodapé',
            'singular_name'      => 'Dados Rodapé',
            'add_new'            => 'Adicionar Novo',
            'add_new_item'       => 'Adicionar Novo',
            'edit_item'          => 'Editar Dados Rodapé',
            'new_item'           => 'Novo Dados Rodapé',
            'view_item'          => 'Ver Dados Rodapé',
            'search_items'       => 'Procurar',
            'not_found'          => 'Nenhum Dados Rodapé encontrado',
            'not_found_in_trash' => 'Nenhum Dados Rodapé encontrado na lixeira',
            'all_items'          => 'Todos',
            'archives'           => 'Arquivos de Dados Rodapé',
            'attributes'         => 'Atributos de Dados Rodapé',
            'insert_into_item'   => 'Inserir no Dados Rodapé',
            'uploaded_to_this_item' => 'Carregado para este Dados Rodapé',
            'filter_items_list'  => 'Filtrar lista de Dados Rodapé',
        ),
        'public' => true,
        'has_archive' => true,
        'menu_icon' => 'dashicons-clipboard',
        'supports' => array( 'title' ),
        'rewrite' => array( 'slug' => 'dados_rodape' ), 
    );

    register_post_type( 'dados_rodape', $args );
}
add_action( 'init', 'create_dados_rodape_post_type' );

// Sobre Nós
function create_sobre_nos_post_type() {
    $args = array(
        'labels' => array(
            'name'               => 'Sobre Nós',
            'singular_name'      => 'Sobre Nós',
            'add_new'            => 'Adicionar Novo',
            'add_new_item'       => 'Adicionar Novo',
            'edit_item'          => 'Editar Sobre Nós',
            'new_item'           => 'Novo Sobre Nós',
            'view_item'          => 'Ver Sobre Nós',
            'search_items'       => 'Procurar',
            'not_found'          => 'Nenhum Sobre Nós encontrado',
            'not_found_in_trash' => 'Nenhum Sobre Nós encontrado na lixeira',
            'all_items'          => 'Todos',
            'archives'           => 'Arquivos de Sobre Nós',
            'attributes'         => 'Atributos de Sobre Nós',
            'insert_into_item'   => 'Inserir no Sobre Nós',
            'uploaded_to_this_item' => 'Carregado para este Sobre Nós',
            'filter_items_list'  => 'Filtrar lista de Sobre Nós',
        ),
        'public' => true,
        'has_archive' => true,
        'menu_icon' => 'dashicons-clipboard',
        'supports' => array( 'title' ),
        'rewrite' => array( 'slug' => 'sobre_nos' ), 
    );

    register_post_type( 'sobre_nos', $args );
}
add_action( 'init', 'create_sobre_nos_post_type' );

// Contato
function create_page_contato_post_type() {
    $args = array(
        'labels' => array(
            'name'               => 'Página Contato',
            'singular_name'      => 'Página Contato',
            'add_new'            => 'Adicionar Novo',
            'add_new_item'       => 'Adicionar Novo',
            'edit_item'          => 'Editar Página Contato',
            'new_item'           => 'Novo Página Contato',
            'view_item'          => 'Ver Página Contato',
            'search_items'       => 'Procurar',
            'not_found'          => 'Nenhum Página Contato encontrado',
            'not_found_in_trash' => 'Nenhum Página Contato encontrado na lixeira',
            'all_items'          => 'Todos',
            'archives'           => 'Arquivos de Página Contato',
            'attributes'         => 'Atributos de Página Contato',
            'insert_into_item'   => 'Inserir no Página Contato',
            'uploaded_to_this_item' => 'Carregado para este Página Contato',
            'filter_items_list'  => 'Filtrar lista de Página Contato',
        ),
        'public' => true,
        'has_archive' => true,
        'menu_icon' => 'dashicons-clipboard',
        'supports' => array( 'title' ),
        'rewrite' => array( 'slug' => 'page_contato' ), 
    );

    register_post_type( 'page_contato', $args );
}
add_action( 'init', 'create_page_contato_post_type' );


?>