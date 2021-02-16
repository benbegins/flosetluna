<?php get_header(); 

$post_id = get_option( 'woocommerce_shop_page_id' );
?>

<section class="section-pad bg-light">
    <div class="container pad-page-top">
        <div class="lg:w-1/2 lg:mx-auto lg:grid lg:grid-cols-6">
            <h1 class="text-4xl lg:col-span-6 fade-in" data-delay="0">Recherche</h1>
        </div>
    </div>
</section>

<!-- Liste Produits -->
<?php
    
    $args = array(
        'post_type'              => array( 'product' ),
        'posts_per_page'         => 100,
        'paged'          => $paged,
    );

    $query = new WP_Query( $args );

    if ( $query->have_posts() ) :
?>

<section class="section-pad">
    <div class="container">

        <div class="archive-product__list">

            <!-- LISTE DES PRODUITS -->
            <div class="produits-list__list bg-white md:grid md:grid-cols-2 lg:grid-cols-4 md:gap-x-7">
            <?php
                while ( $query->have_posts() ) :
                    $query->the_post();
                    get_template_part('template-parts/product');
                endwhile;
            ?>                  
            </div>

            <!-- PAGINATION -->
            <?php if($query->found_posts > 100): ?>
            <div class="pagination section-pad-top">
                <div class="pagination__list">
                <?php
                    $big = 999999999;
                    echo paginate_links( array(
                        'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
                        'format' => '?paged=%#%',
                        'current' => max( 1, get_query_var('paged') ),
                        'total' => $query->max_num_pages,
                        'show_all' => true,
                        'prev_next' => false
                    ) );
                ?>        
                </div>
            </div>
            <?php endif; ?>

        </div>

        

    </div>
</section>

<?php
    endif;
    wp_reset_postdata();
?>

<?php get_footer(); ?>