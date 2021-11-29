<?php global $product; ?>

<div class="produits-list__item<?php if(! $product->is_in_stock()){echo ' produits-list__item-out';} ?>">

    <?php 
    if(get_field('nouveaute')): 
    ?>
    <div class="text-left inset-x-0 uppercase absolute leading-none font-bold text-xs -mt-5 tracking-wide">C'est nouveau !</div>
    <?php endif; ?>
    
    <a class="produits-list__image-container" href="<?php the_permalink(); ?>">
        <img src="<?php the_post_thumbnail_url('medium_large');?>" alt="">
    </a>

    <?php 
        $terms = get_the_terms( get_the_ID(), 'product_cat' );
        $term_link = get_term_link( $terms[0] );

        // Don't display cat name if is "Non classé"
        if($terms[0]->slug != 'non-classe'):
    ?>
    <a class="produits-list__category" href="<?php echo $term_link; ?>"><?php echo $terms[0]->name; ?></a>

    <?php endif; ?>
    
    <div class="produits-list__text-container">
        <h3 class="text-xl leading-tight hover:text-green"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
        <p class="text-sm uppercase mt-1"><?php the_field('proprietes'); ?></p>
        <p class="font-bold mt-4"><?php echo $product->get_price_html(); ?></p>
    </div>
</div>