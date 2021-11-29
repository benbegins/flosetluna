<?php

function filter_products(){

    $category = $_POST['category'];
	if (isset($category) && !empty($category)) {
		$category = strip_tags($category);
		$category = stripslashes($category);
		$category = trim($category);		
    }
    
    if ($category !== '0'){
        $args = array(
            'post_type'              => array( 'product' ),
            'posts_per_page'         => -1,
            'tax_query'      		=> array(
                'relation'          => 'OR',
                array(
                    'taxonomy' => 'product_cat',
                    'field'    => 'slug',
                    'terms'    => $category,
                ),
                array(
                    'taxonomy' => 'product_cat',
                    'field'    => 'slug',
                    'terms'    => array('non-classe'),
                ),
            ),
            'meta_key'              => '_stock',
            'orderby'               => 'meta_value',
            'post_status'            => array( 'publish' ),
        );    
    } else {
        $args = array(
            'post_type'              => array( 'product' ),
            'posts_per_page'         => -1,
            'post_status'            => array( 'publish' ),
        );  
    }

    $query = new WP_Query( $args );
    if ( $query->have_posts() ) :


        ob_start();
        ?>

        <!-- LISTE DES PRODUITS -->
        <div class="produits-list__list bg-white md:grid md:grid-cols-2 lg:grid-cols-4 md:gap-x-7">
        <?php
            while ( $query->have_posts() ) :
                $query->the_post();
                get_template_part('template-parts/product');
            endwhile;
        ?>                  
        </div>


        <?php
        wp_reset_postdata();

        wp_send_json_success(ob_get_clean());


    endif;

}

add_action('wp_ajax_filter_products', 'filter_products');
add_action('wp_ajax_nopriv_filter_products', 'filter_products');