<?php get_header(); ?>

<section class="section-pad-top bg-light">
    <div class="container pad-page-top pb-24">
        <div class="lg:w-1/2 lg:mx-auto lg:grid lg:grid-cols-6">
            <?php the_title( '<h1 class="text-4xl lg:col-span-6 fade-in" data-delay="0">', '</h1>', true ); ?>
        </div>
    </div>
</section>

<section class="section-pad">
    <div class="container<?php if(is_cart() || is_checkout() || is_account_page()){echo ' woocommerce__container';} ?>">
        <?php 
            while(have_posts()): the_post();
                the_content(); 
            endwhile;
        ?>
    </div>
</section>

<?php get_footer(); ?>