<form method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>">
    <input type="text" name="s" placeholder="Rechercher un produit" value="<?php echo get_search_query(); ?>">
    <input type="submit" value="Rechercher">
</form>