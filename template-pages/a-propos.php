<?php 
/*
Template Name: A propos
*/
get_header();
?>

    <!-- Titre & intro -->
    <section class="section-pad bg-light">
        <div class="container pad-page-top">
        <div class="lg:w-1/2 lg:mx-auto lg:grid lg:grid-cols-6">
                <h1 class="text-4xl lg:col-span-6 fade-in" data-delay="0">Le pouvoir de la nature et des plantes.</h1>
                <div class="pl-12 lg:pl-0 lg:col-span-5 lg:col-start-2 fade-in" data-delay="0.25">
                    <p class="text-lg mt-6 lg:mt-12"><?php the_field('texte_dintro');?></p>
                </div>
            </div>
        </div>
    </section>


    <!-- Image d'intro -->
    <section class="a-propos-intro">
        <div class="a-propos-intro__container">
            <div class="overflow-hidden parallax-container">
                <?php $photo_1 = get_field('photo_intro')['sizes']; ?>
                <img src="<?php echo $photo_1['xxl']; ?>" 
                    alt="Flos et Luna - magie et bien-être" 
                    srcset="<?php echo
                        $photo_1['xxxl'] . ' ' . $photo_1['xxxl-width'] . 'w, ' .
                        $photo_1['xxl'] . ' ' . $photo_1['xxl-width'] . 'w, ' .
                        $photo_1['xl'] . ' ' . $photo_1['xl-width'] . 'w, ' .
                        $photo_1['large'] . ' ' . $photo_1['large-width'] . 'w, ' .
                        $photo_1['medium_large'] . ' ' . $photo_1['medium_large-width'] . 'w'
                     ;?>"
                    sizes="100vw"
                    class="a-propos-intro__image w-full img-parallax">
            </div>
        </div>
    </section>


    <!-- Démarche -->
    <section class="section-pad relative overflow-hidden">
        <div class="container lg:grid lg:grid-cols-12">
            <h2 class="text-3xl lg:col-span-6 lg:col-start-2">Notre démarche</h2>
            <div class="pl-12 lg:pl-0 lg:col-span-5 lg:col-start-3">
                <p class="text-lg mt-6 lg:mt-12"><?php the_field('notre_demarche');?></p>
            </div>
        </div>
        <div class="word-slide from-right top-0 mt-24 text-greendark hidden lg:block">Artisanal</div>
        <div class="word-slide from-left bottom-0 mb-24 text-greendark hidden lg:block">Ethique</div>
    </section>


    <!-- Photo -->
    <section class="relative">
        <div class="overflow-hidden parallax-container">
            <?php $photo_2 = get_field('photo_2')['sizes']; ?>
            <img src="<?php echo $photo_2['xxl']; ?>" 
                alt="Flos et Luna - magie et bien-être" 
                srcset="<?php echo
                    $photo_2['xxxl'] . ' ' . $photo_2['xxxl-width'] . 'w, ' .
                    $photo_2['xxl'] . ' ' . $photo_2['xxl-width'] . 'w, ' .
                    $photo_2['xl'] . ' ' . $photo_2['xl-width'] . 'w, ' .
                    $photo_2['large'] . ' ' . $photo_2['large-width'] . 'w, ' .
                    $photo_2['medium_large'] . ' ' . $photo_2['medium_large-width'] . 'w'
                    ;?>"
                sizes="100vw"
                class="a-propos-intro__image w-full img-parallax">
        </div>
        <div class="absolute top-0 left-0 w-2/3 h-24 bg-white hidden lg:block"></div>
    </section>


    <!-- Marine -->
    <section class="section-pad relative overflow-hidden">
        <div class="word-slide from-right top-0 text-greendark hidden lg:block mt-48">Marine</div>
        <div class="container lg:grid lg:grid-cols-12 lg:items-center lg:mt-24">
            <div class="lg:col-span-4 lg:col-start-2">
                <?php 
                $photo_marine = get_field('photo_marine'); 
                ?>
                <img 
                src="<?php echo $photo_marine['sizes']['medium_large']; ?>" 
                alt="Marine Nina Denis"
                class="w-full"
                srcset="<?php 
                    echo $photo_marine['sizes']['medium'] . ' ' . $photo_marine['sizes']['medium-width'] . 'w, ' .
                    $photo_marine['sizes']['medium_large'] . ' ' . $photo_marine['sizes']['medium_large-width'] . 'w, ' .
                    $photo_marine['sizes']['large'] . ' ' . $photo_marine['sizes']['large-width'] . 'w, ' .
                    $photo_marine['sizes']['xl'] . ' ' . $photo_marine['sizes']['xl-width'] . 'w'
                ?>">
            </div>
            <div class="mt-12 lg:mt-0 lg:col-start-7 lg:col-span-4 lg:grid lg:grid-cols-4">
                <h2 class="text-3xl lg:col-span-4">Marine</h2>
                <p class="text-lg pl-12 mt-6 lg:pl-0 lg:col-span-3 lg:col-start-2"><?php the_field('marine'); ?></p>
            </div>
        </div>    
    </section>


    <!-- Flora -->
    <section class="section-pad-bottom relative overflow-hidden">
        <div class="word-slide from-left top-0 text-greendark hidden lg:block">Flora</div>
        <div class="container lg:grid lg:grid-cols-12 lg:items-center">
            <div class="lg:col-span-4 lg:col-start-8 lg:row-start-1">
                <?php 
                $photo_flora = get_field('photo_flora'); 
                ?>
                <img 
                src="<?php echo $photo_flora['sizes']['medium_large']; ?>" 
                alt="Flora Denis"
                class="w-full"
                srcset="<?php 
                    echo $photo_flora['sizes']['medium'] . ' ' . $photo_flora['sizes']['medium-width'] . 'w, ' .
                    $photo_flora['sizes']['medium_large'] . ' ' . $photo_flora['sizes']['medium_large-width'] . 'w, ' .
                    $photo_flora['sizes']['large'] . ' ' . $photo_flora['sizes']['large-width'] . 'w, ' .
                    $photo_flora['sizes']['xl'] . ' ' . $photo_flora['sizes']['xl-width'] . 'w'
                ?>">
            </div>
            <div class="mt-12 lg:mt-0 lg:col-start-3 lg:col-span-4 lg:grid lg:grid-cols-4 lg:row-start-1">
                <h2 class="text-3xl lg:col-span-4">Flora</h2>
                <p class="text-lg pl-12 mt-6 lg:pl-0 lg:col-span-3 lg:col-start-2"><?php the_field('flora'); ?></p>
            </div>
        </div>
    </section>


    <!-- Bouton Boutique -->
    <section class="section-pad-bottom">
        <div class="container text-center">
            <a href="<?php echo wc_get_page_permalink( 'shop' ); ?>" class="btn-primary">Voir nos créations</a>
        </div>
    </section>

<?php get_footer(); ?>