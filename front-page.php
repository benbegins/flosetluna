<?php get_header(); ?>


    <!-- Page Title -->
    <section class="bg-light pad-page-top">
        <div class="container section-pad flex justify-center">
            <div class="md:w-3/4 lg:w-2/3 text-left">
                <h1 class="text-4xl fade-in" data-delay="0">Créations artisanales de&nbsp;bien-être et&nbsp;magie à&nbsp;base de&nbsp;plantes</h1>
                <a href="<?php echo wc_get_page_permalink('shop'); ?>" class="btn-primary mt-10 lg:mt-14 fade-in" data-delay="0.25">Voir la boutique</a>
            </div>
        </div>
    </section>


    <!-- Image d'intro -->
    <section class="home-intro">
        <div class="home-intro__container">
            <div class="overflow-hidden parallax-container">

                <?php $image_principale = get_field('image_principale')['sizes']; ?>
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
                    class="home-intro__image w-full img-parallax">
            </div>
        </div>
    </section>


    <!-- Texte de présentation -->
    <section class="section-pad">
        <div class="container md:grid md:grid-cols-2 md:items-center">
            <div class="hidden md:block">
                <img src="<?php echo get_template_directory_uri(); ?>/dist/img/sigle-flos-luna.svg" alt="sigle Flos et Luna" class="w-2/3 mx-auto lg:w-1/2">
            </div>
            <div class="lg:grid lg:grid-cols-6">
                <h2 class="text-3xl lg:col-span-4">Nous croyons au&nbsp;pouvoir de&nbsp;la&nbsp;nature.</h2>
                <div class="pl-12 lg:pl-0 lg:col-span-4 lg:col-start-2">
                    <p class="text-lg mt-6 lg:mt-12">Nous croyons à la magie des plantes et à leurs bienfaits. Inspirés par l’herboristerie et les magies blanche et verte, nos produits sont imaginés pour répondre à vos besoins du quotidien, soigner les petits bobos et vous accompagner dans votre travail de développement personnel et spirituel. </p>
                    <a href="<?php echo get_site_url(); ?>/a-propos" class="btn-secondary mt-6 lg:mt-12">Nous connaître</a>
                </div>
            </div>
        </div>
    </section>


    <!-- Catégories de produit -->
    <section class="products-cat bg-dark text-light section-pad relative overflow-hidden">

        <div class="word-slide from-right top-0 md:-mt-10 lg:-mt-24 text-light">Responsable</div>
        <div class="word-slide from-left bottom-0 text-light">Magique</div>

        <div class="w-full h-full swiper-container">
            <?php
                $categories = get_categories( array(
                    'orderby' => 'none',
                    'taxonomy'=> 'product_cat',
                ));
            ?>

            <!-- Categories Thumbnails -->
            <div class="products-cat__list swiper-wrapper">
                <?php
                foreach ($categories as $categorie):
                    $name = $categorie->name;
                    $link = get_term_link($categorie->slug, 'product_cat');
                    $image = get_field('image_thumbnail', 'product_cat_' . $categorie->term_id);
                    $image_url = $image['sizes']['medium_large'];

                    if($categorie->slug != 'non-classe'):
                ?>

                <a class="products-cat__item swiper-slide" href="<?php echo $link; ?>">
                    <div class="products-cat__image-container">
                        <div class="products-cat__image" style="background-image:url('<?php echo $image_url; ?>');"></div>
                    </div>
                    <div class="products-cat__text-container">
                        <div class="products-cat__line"></div>
                        <p class="products-cat__title"><?php echo $name; ?></p>
                    </div>
                </a>

                <?php 
                    endif;
                endforeach; 
                ?>
            </div>
            
            <!-- Scrollbar -->
            <div class="w-1/2 lg:w-1/4 h-1 lg:h-1.5 relative mx-auto mt-10 lg:mt-20">
                <div class="swiper-scrollbar h-1 lg:h-1.5"></div>
            </div>
            
            <!-- Pagination -->
            <div class="pagination-container">
                <button class="pagination-left pagination-slider"></button>
                <button class="pagination-right pagination-slider ml-3"></button>
            </div>
                
        </div>
    </section>


    <!-- Produits coup de coeur -->
    <?php
        $args = array(
            'post_type'              => array( 'product' ),
            'posts_per_page'         => '4',
            'post_status'    => 'publish',
            'tax_query'      => array(
                array(
                    'taxonomy' => 'product_visibility',
                    'field'    => 'name',
                    'terms'    => 'featured',
                    'operator' => 'IN'
                ),  
            ),
        );
        $query = new WP_Query( $args );
        if ( $query->have_posts() ) :
    ?>

    <section class="section-pad">
        <div class="container">
            <div class="text-center">
                <p class="text-base text-green uppercase tracking-wider leading-none">Nos produits</p>
                <h2 class="text-3xl leading-none">Vos coups de coeur</h2>
            </div>
            <div class="produits-list__list bg-white md:grid md:grid-cols-2 lg:grid-cols-4 md:gap-x-7 pt-6">
                
                <?php
                    while ( $query->have_posts() ) :
                        
                        $query->the_post();
                        get_template_part('template-parts/product');

                    endwhile;
                ?>                

            </div>

            <div class="text-center">
                <a href="<?php echo wc_get_page_permalink( 'shop' ); ?>" class="btn-primary mt-10 lg:mt-28">Voir la boutique</a>
            </div>
        </div>
    </section>

    <?php
        endif;
        wp_reset_postdata();
    ?>


<?php get_footer(); ?>