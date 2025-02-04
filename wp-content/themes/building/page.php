<?php 
$pagina = $post->post_name;

if ($post->post_type == 'page') {
    get_header();
    echo '<main>';
    echo '<h1 style="display: none">' . $post->post_title . '</h1>';
    
    // Verifica se o template específico existe
    $template_part = locate_template('pages/' . $pagina . '.php');

    if ($template_part) {
        // Se existir, carrega o template
        get_template_part('pages/' . $pagina);
    } else {
        // Caso contrário, exibe o padrão
        echo '<section id="' . $post->post_name . '" class="page">';
		echo '<div class="container">';
        echo '<h1>' . get_the_title() . '</h1>';
        echo '<div>' . get_the_content() . '</div>';
        echo '</div>';
        echo '</section>';
    }

    echo '</main>';
    get_footer();
}
?>
