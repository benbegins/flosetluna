<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

get_header(); ?>

<?php while ( have_posts() ) : ?>
	<?php 
		the_post(); 
		defined( 'ABSPATH' ) || exit;
		global $product;
	?>

	<!-- Présentation principale -->
	<section class="produit-single__wrapper bg-light section-pad-bottom relative">		
		<div class="lg:grid lg:grid-cols-2">

			<!-- Images du produit -->
			<div class="produit-single__image">
				<?php 
				/**
				 * Hook: woocommerce_before_single_product_summary.
				 *
				 * @hooked woocommerce_show_product_sale_flash - 10
				 * @hooked woocommerce_show_product_images - 20
				 */
				do_action( 'woocommerce_before_single_product_summary' );	
				?>
			</div>

			<!-- Description du produit -->
			<div class="produit-single__content">
				

				<!-- Titre -->
				<div class="produit-single__title-container lg:pl-10">
					<p class="uppercase tracking-wider fade-in" data-delay="0"><?php the_field('proprietes'); ?></p>
					<h1 class="text-4xl leading-none fade-in" data-delay="0.15"><?php the_title(); ?></h1>
				</div>

				<!-- Prix / Ajouter au panier / Composition / Description -->
				<div class="lg:grid grid-cols-6">
					<div class="col-span-5 col-start-2">
						<?php
						/**
						 * Hook: woocommerce_before_single_product.
						 *
						 * @hooked woocommerce_output_all_notices - 10
						 */
						do_action( 'woocommerce_before_single_product' ); 

						/**
						 * Hook: woocommerce_single_product_summary.
						 *
						 * @hooked woocommerce_template_single_title - 5
						 * @hooked woocommerce_template_single_rating - 10
						 * @hooked woocommerce_template_single_price - 10
						 * @hooked woocommerce_template_single_excerpt - 20
						 * @hooked woocommerce_template_single_add_to_cart - 30
						 * @hooked woocommerce_template_single_meta - 40
						 * @hooked woocommerce_template_single_sharing - 50
						 * @hooked WC_Structured_Data::generate_product_data() - 60
						 */
						do_action( 'woocommerce_single_product_summary' );						
						?>
						<p class="italic opacity-50 mb-12 lg:mb-16">Frais de port offert à partir de 50€</p>

						<?php 
							$composition = get_field('composition');
							if($composition): 
						?>
						<div class="my-12 lg:my-16 text-center bg-greendark text-light py-8 px-12 rounded-2xl">
							<p class="text-lg uppercase leading-tight font-bold">Composition :</p>
							<p class="leading-tight"><?php the_field('composition'); ?></p>
						</div>
						<?php endif; ?>
						
						<?php 
							$contre_indication = get_field('contre-indications');
							if($contre_indication):
						?>
						<p class="text-base mb-12 pl-6 border-l italic"><?php echo $contre_indication; ?></p>
						<?php endif; ?>

						<p class="text-lg"><?php the_field('description'); ?></p>
					</div>
				</div>

			</div>
		</div>
	</section>

	<!-- Description détaillée -->
	<section class="bg-light">
		<div class="container section-pad lg:w-3/5 xxl:w-1/2 border-t border-greendark border-opacity-25">
		
			<!-- Propriétés détaillés -->
			<?php 
			$proprietes_detaillees = get_field('proprietes_detaillees');
			if($proprietes_detaillees):
			?>
			<div>
				<h2 class="text-2xl mb-6 lg:mb-12">Propriétés</h2>
				<div class="text-lg mb-12 lg:mb-24 pl-12 lg:pl-24"><?php echo $proprietes_detaillees; ?></div>	
			</div>
			<?php endif; ?>
			
			<!-- Conseils d'utilisation -->
			<?php 
			$conseils_dutilisation = get_field('conseils_dutilisation');
			if($conseils_dutilisation):
			?>
			<div>
				<h2 class="text-2xl mb-6 lg:mb-12">Conseils d'utilisation</h2>
				<div class="text-lg mb-12 lg:mb-24 pl-12 lg:pl-24"><?php echo $conseils_dutilisation; ?></div>
			</div>
			<?php endif; ?>
			
			<!-- Détails -->
			<?php 
			$details = get_field('details');
			if($details):
			?>
			<div>
				<h2 class="text-2xl mb-6 lg:mb-12">Détails</h2>
				<div class="text-lg pl-12 lg:pl-24"><?php echo $details; ?></div>	
			</div>
			<?php endif; ?>
						
		</div>
	</section>

<?php 
	endwhile;
	wp_reset_postdata(); 
?>


	<!-- A decouvrir aussi -->
    <section class="section-pad">
        <div class="container">
            <div class="text-center">
                <p class="text-base text-green uppercase tracking-wider leading-none">Nos produits</p>
                <h2 class="text-3xl leading-none">À découvrir aussi</h2>
            </div>
            <div class="produits-list__list bg-white md:grid md:grid-cols-2 lg:grid-cols-4 md:gap-x-7 pt-6 ">
				<?php
					// On affiche en priorité les produits de la même catégorie
					$category = get_the_terms($post->ID, 'product_cat');
					$args = array(
						'post_type'          	=> array( 'product' ),
						'posts_per_page'        => '4',
						'post_status'    		=> 'publish',
						'post__not_in'    		=> array($post->ID),
						'tax_query'      		=> array(
							array(
								'taxonomy' => 'product_cat',
								'field'    => 'slug',
								'terms'    => $category[0]->slug,
							),
						),
					);
					
					$query = new WP_Query( $args );
					// Calcul s'il y a moins de 4 produits complémentaires
					$remaining_posts = 4 - $query->found_posts;
					// Regroupe les IDs des produits affichés sur la page
					$post_affichees = array($post->ID);
					
					if ( $query->have_posts() ) :
						while ( $query->have_posts() ) :
							$query->the_post();
							get_template_part('template-parts/product');
							array_push($post_affichees, $post->ID);
						endwhile;
					endif;

					wp_reset_postdata();

					// S'il n'y a pas 4 produits à afficher, 
					// on affiche des produits toutes catégories confondues
					if($remaining_posts > 0){
						$args = array(
							'post_type'          	=> array( 'product' ),
							'posts_per_page'        => $remaining_posts,
							'post_status'    		=> 'publish',
							'post__not_in'    		=> $post_affichees,
						);
						
						$query = new WP_Query( $args );

						if ( $query->have_posts() ) :
							while ( $query->have_posts() ) :
								$query->the_post();
								get_template_part('template-parts/product');
							endwhile;
						endif;
					}

					wp_reset_postdata();
					
				?>         
			</div>
			
            <div class="text-center">
                <a href="<?php echo get_site_url(); ?>/boutique" class="btn-primary mt-10 lg:mt-28">Voir tous nos produits</a>
            </div>
        </div>
    </section>

    


<?php
get_footer();