<?php get_header(); ?>
<section id="page-search" class="page">
    <article>
        <div class="container">
            <div class="col-md-12">
            <?php if ( have_posts() ) : ?>
              <h3 class="search-title">Resultados para a pesquisa: <span><?php echo get_search_query(); ?></span></h3>
            <?php else : ?>
                <h2 class="search-title">Nenhum resultado encontrado.</h2>
            <?php 
                endif;
            ?>
            <hr>
            <div class="row">
                <?php if ( have_posts() ) : ?>
                    <?php while (have_posts() ) : the_post(); ?>       
                    <div class="col-lg-3 col-md-6 col-12 cards-search">
                        <a href="<?php the_permalink(); ?>">
                        <?php if (has_post_thumbnail()) : ?>
                                <div class="post-thumbnail">
                                    <?php the_post_thumbnail('medium'); ?>
                                </div>
                            <?php endif; ?>
                            <h3 class="post-title"><?php the_title(); ?></h3>
                            <div class="descricao">
                                <?php echo wp_trim_words(get_the_excerpt(), 10, '...'); ?>
                            </div>
                        </a> 
                    </div>                
                    <?php endwhile; ?>
    
                <?php else : ?>
                <?php endif; ?>            
            </div>
            </div>
        </div>
    </article>
</section>
<?php get_footer(); ?>