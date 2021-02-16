<?php get_header(); 

$post_id = get_option( 'woocommerce_shop_page_id' );
?>

<section class="section-pad bg-light relative overflow-hidden">
    <div class="container pad-page-top">
        <div class="lg:w-1/2 lg:mx-auto ">
            <p class="text-xl fade-in" data-delay="0">Recherche :</p>
            <h1 class="text-4xl fade-in" data-delay="0.25"><?php echo ucfirst(get_search_query()); ?></h1>
        </div>
    </div>
    <div class="word-slide from-right bottom-0 -mb-10 text-greendark hidden lg:block">Recherche</div>
</section>

<!-- Liste Produits -->
<?php
    
    $args = array(
        'post_type'              => array( 'product' ),
        's'                      => get_search_query(),
        'posts_per_page'         => -1
    );

    $query = new WP_Query( $args );

    if ( $query->have_posts() ) :
?>

<section class="section-pad">
    <div class="container">

            <!-- LISTE DES PRODUITS -->
            <div class="produits-list__list bg-white md:grid md:grid-cols-2 lg:grid-cols-4 md:gap-x-7">
            <?php
                while ( $query->have_posts() ) :
                    $query->the_post();
                    get_template_part('template-parts/product');
                endwhile;
            ?>                  
            </div>       

    </div>
</section>

<section class="section-pad-bottom">
    <div class="container text-center pb-10">
        <h2 class="text-3xl mx-auto md:w-2/3 xl:w-1/2">Vous n’avez pas trouvé votre bonheur&nbsp;?</h2>
        <a href="<?php echo wc_get_page_permalink( 'shop' ); ?>" class="btn-primary my-16 md:my-24">Voir tous les produits</a>
        <p class="text-lg mb-3">Ou faire une nouvelle recherche :</p>
        <div class="search-form form mx-auto md:w-1/2 xl:w-1/3">
            <?php echo get_search_form(); ?>
        </div>
    </div>
</section>


<?php 
    // PAS DE RESULTAT DE RECHERCHE
    else : 
?>


<section class="section-pad">
    <div class="container lg:grid lg:grid-cols-2 lg:gap-16 lg:items-center">
        <div class="text-center">
            <img src="https://media.giphy.com/media/JUh0yTz4h931K/giphy.gif" alt="Search disney movie" class="mx-auto w-full">
        </div>
        <div class="mt-16 text-center lg:text-left lg:mt-0 lg:w-2/3">
            <h2 class="text-3xl">Aucun résultat</h2>
            <p class="text-lg mt-3">Aucun produit ne correspond à votre recherche mais rien n'est perdu, vous pouvez toujours :</p>
            <a href="<?php echo wc_get_page_permalink( 'shop' ); ?>" class="btn-primary my-16">Voir tous les produits</a>
            <p class="text-lg mb-3">Ou faire une nouvelle recherche :</p>
            <div class="search-form form">
                <?php echo get_search_form(); ?>
            </div>    
        </div>
        
    </div>
</section>


<?php
    endif;
    wp_reset_postdata();
?>

<?php get_footer(); ?>