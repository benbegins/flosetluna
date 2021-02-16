<?php 
/*
Template Name: Page Texte
*/
get_header();
?>
    <div class="page-texte">

        <section class="section-pad-top bg-light">
            <div class="container pad-page-top pb-24">
                <div class="lg:w-1/2 lg:mx-auto">
                    <?php the_title( '<h1 class="text-4xl fade-in" data-delay="0">', '</h1>', true ); ?>
                </div>
            </div>
        </section>

        <section class="section-pad">
            <div class="container xl:w-2/3 xl:mx-auto">
                <?php 
                    while(have_posts()): the_post();
                        the_content(); 
                    endwhile;
                ?>
            </div>
        </section>

    </div>
    

<?php get_footer(); ?>