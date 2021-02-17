<?php get_header(); 

$post_id = get_option( 'woocommerce_shop_page_id' );
?>

<section class="section-pad bg-light">
    <div class="container pad-page-top">
        <div class="lg:w-1/2 lg:mx-auto lg:grid lg:grid-cols-6">
            <h1 class="text-4xl lg:col-span-6 fade-in" data-delay="0">La boutique</h1>
            <div class="pl-12 lg:pl-0 lg:col-span-5 lg:col-start-2 fade-in" data-delay="0.25">
                <p class="text-lg mt-6 lg:mt-12"><?php the_field('texte_intro', $post_id); ?></p>
            </div>
        </div>
    </div>
</section>

<section class="intro-boutique relative">
    <div class="overflow-hidden parallax-container">
        
        <?php 
            
            $image_principale = get_field('image_principale', $post_id)['sizes']; ?>

        <img src="<?php echo $image_principale['xxl']; ?>" 
            alt="Flos et Luna - magie et bien-être" 
            srcset="<?php echo
                $image_principale['xxxl'] . ' ' . $image_principale['xxxl-width'] . 'w, ' .
                $image_principale['xxl'] . ' ' . $image_principale['xxl-width'] . 'w, ' .
                $image_principale['xl'] . ' ' . $image_principale['xl-width'] . 'w, ' .
                $image_principale['large'] . ' ' . $image_principale['large-width'] . 'w, ' .
                $image_principale['medium_large'] . ' ' . $image_principale['medium_large-width'] . 'w'
                ;?>"
            sizes="100vw"
            class="w-full img-parallax">
    </div>
    <div class="intro-boutique__block"></div>
</section>

<section class="archive-product__cat">
    <div class="container">

        <!-- Liste Catégories Desktop -->
        <ul class="archive-product__cat__list text-center uppercase tracking-wider py-6 hidden lg:flex justify-around border-b border-greendark border-opacity-25 bg-white text-sm">
            <li class="py-2">
                <button class="archive-product__cat__link hover:text-green uppercase focus:outline-none <?php if(!is_product_category()){echo 'active';} ?>" data-category="0">Tous les produits</button>
            </li>

            <?php
                $categories = get_terms( array(
                    'orderby' => 'name',
                    'taxonomy'=> 'product_cat',
                ));

            foreach ($categories as $categorie):
                $name = $categorie->name;
                $slug = $categorie->slug;
                $link = get_term_link($categorie->slug, 'product_cat');
            ?>
            
            <li class="py-2">
                <button class="archive-product__cat__link hover:text-green uppercase focus:outline-none <?php if(get_queried_object()->term_id == $categorie->term_id){echo 'active';} ?>" data-category="<?php echo $slug; ?>"><?php echo $name; ?></button>
            </li>

            <?php endforeach; ?>
        </ul>
        
        <!-- Liste catégories Mobile -->
        <div class="archive-product__cat__select-container p-2 md:p-4 fixed inset-x-0 bg-white z-10 opacity-0 transition duration-500 lg:hidden">
                
            <select class="archive-product__cat__select p-4 w-full text-center bg-light">
                <option value="0">- Tous les produits -</option>
                <?php
                    $categories = get_categories( array(
                        'orderby' => 'none',
                        'taxonomy'=> 'product_cat',
                    ));

                foreach ($categories as $categorie):
                    $name = $categorie->name;
                    $slug = $categorie->slug;
                ?>
                
                <option value="<?= $slug ?>"><?= $name ?></option>

                <?php endforeach; ?>
            </select>
        </div>


    </div>
</section>

<!-- Liste Produits -->
<?php
    if(is_product_category()){
        $cateID = get_queried_object()->term_id;
        $args = array(
            'post_type'              => array( 'product' ),
            'tax_query'      		=> array(
                array(
                    'taxonomy' => 'product_cat',
                    'field'    => 'id',
                    'terms'    => $cateID,
                ),
            ),
            'posts_per_page'         => -1,
            'meta_key'              => '_stock',
            'orderby'               => 'meta_value',
        );
    } else {
        $args = array(
            'post_type'              => array( 'product' ),
            'posts_per_page'         => -1,
        );
    }

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

        </div>

        

    </div>
</section>

<?php
    endif;
    wp_reset_postdata();
?>

<?php get_footer(); ?>