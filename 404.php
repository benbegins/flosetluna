<?php get_header(); ?>

	<main class="site-main">

		<h1><?php esc_html_e("Page introuvable"); ?></h1>
		<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">Retour à l'accueil</a>

	</main>

<?php
get_footer();
