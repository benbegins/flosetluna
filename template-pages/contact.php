<?php 
/*
Template Name: Contact
*/
get_header();
?>

    <div class="page-contact">

        <!-- Titre & formulaire -->
        <section class="section-pad bg-light relative">
            <div class="container pad-page-top lg:grid lg:grid-cols-12 lg:items-start">
                <div class="lg:col-span-5 lg:col-start-2 lg:grid lg:grid-cols-5">
                    <h1 class="text-4xl lg:col-span-5 fade-in" data-delay="0"><?php the_title(); ?></h1>
                    <div class="fade-in zone-texte text-lg mt-6 lg:mt-12 lg:col-span-4 lg:col-start-2" data-delay="0.25">
                        <?php the_field('texte_intro'); ?>
                    </div>
                </div>
                <div class="form mt-12 lg:mt-0 lg:col-span-4 lg:col-start-8">
                    <?php
                        $formulaire = get_field('formulaire');
                        echo do_shortcode($formulaire); 
                    ?>
                </div>
            </div>
            <div class="page-contact__intro-block"></div>
        </section>

        <!-- Presse, Revendeurs & adresse -->
        <section class="section-pad-top">
            <div class="container md:grid md:grid-cols-2 md:gap-10 lg:items-center lg:grid-cols-12 lg:gap-0">
                <div class="hidden md:block overflow-hidden parallax-container lg:col-span-5">
                    <?php $photo = get_field('photo')['sizes']; ?>
                    <img src="<?php echo $photo_1['large']; ?>" 
                        alt="Flos et Luna - magie et bien-être" 
                        srcset="<?php echo
                            $photo['xl'] . ' ' . $photo['xl-width'] . 'w, ' .
                            $photo['large'] . ' ' . $photo['large-width'] . 'w, ' .
                            $photo['medium_large'] . ' ' . $photo['medium_large-width'] . 'w'
                        ;?>"
                        sizes="50vw"
                        class="a-propos-intro__image w-full img-parallax">
                </div>
                <div class="zone-texte lg:col-span-5 lg:col-start-7 xxl:col-span-4 xxl:col-start-8">
                    <div>
                        <h2 class="text-2xl">Presse & partenariats</h2>
                        <div class="mt-6 text-lg"><?php the_field('presse'); ?></div>    
                    </div>
                    <div class="mt-12 lg:mt-20">
                        <h2 class="text-2xl">Revendeurs</h2>
                        <div class="mt-6 text-lg"><?php the_field('revendeurs'); ?></div>    
                    </div>
                    <div class="mt-12 lg:mt-20">
                        <h2 class="text-2xl">Notre adresse</h2>
                        <div class="mt-6 text-lg"><?php the_field('adresse'); ?></div>    
                    </div>
                    
                </div>
            </div>
        </section>

        <!-- Réseaux sociaux -->
        <section class="section-pad relative overflow-hidden">
            <div class="container py-12">
                <h3 class="text-xl text-center">Et retrouvez nous sur :</h3>
                <ul class="flex justify-center mt-6">
                    <li class="px-4">
                        <a href="https://www.instagram.com/flosetluna/" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/dist/img/icon-instagram-green.svg" alt="instagram"></a>
                    </li>
                    <li class="px-4">
                        <a href="https://www.facebook.com/flosetluna" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/dist/img/icon-facebook-green.svg" alt="facebook"></a>
                    </li>
                    <li class="px-4">
                        <a href="https://www.pinterest.fr/flosetluna/" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/dist/img/icon-pinterest-green.svg" alt="pinterest"></a>
                    </li>
                    <li class="px-4">
                        <a href="https://open.spotify.com/playlist/2IkFflczkONdZUkAHzmnng?si=djKdFjcWRyiEizUSTsImUA" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/dist/img/icon-spotify-green.svg" alt="spotify"></a>
                    </li>
                </ul>
            </div>
            <div class="word-slide from-right w-full bottom-0 -mb-12 text-greendark hidden lg:block">Suivez-nous</div>
        </section>
    
    </div>

    


<?php get_footer(); ?>