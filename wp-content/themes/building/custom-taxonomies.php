<?php 

function portfolio_register_taxonomy() {
    register_taxonomy(
        'categoria',
        'portfolio',
        array(
            'labels' => array(
                'name'              => 'Categorias',
                'singular_name'     => 'Categoria',
                'search_items'      => 'Buscar Categorias',
                'all_items'         => 'Todas as Categorias',
                'parent_item'       => 'Categoria Pai',
                'parent_item_colon' => 'Categoria Pai:',
                'edit_item'         => 'Editar Categoria',
                'update_item'       => 'Atualizar Categoria',
                'add_new_item'      => 'Adicionar Nova Categoria',
                'new_item_name'     => 'Novo Nome da Categoria',
                'menu_name'         => 'Categorias',
            ),
            'hierarchical' => true,
            'show_ui' => true,
            'show_admin_column' => true,
            'query_var' => true,
            'rewrite' => array('slug' => 'portfolio-categoria'),
        )
    );
}
add_action('init', 'portfolio_register_taxonomy');