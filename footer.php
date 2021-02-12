   
    <!-- Réassurance -->
    <div class="footer_reassurance bg-light section-pad">
        <div class="container text-center leading-normal grid grid-cols-1 gap-8 md:grid-cols-2 md:gap-12 lg:grid-cols-4 lg:gap-8">
            <div>
                <div class="h-28 flex items-center">
                    <img src="<?php echo get_template_directory_uri(); ?>/dist/img/icon-madeinfrance.svg" alt="made in France" class="mx-auto">
                </div>
                <h5 class="text-lg font-bold">Made in France</h5>
                <p>Produits fabriqués artisanalement <br>en France.</p>
            </div>
            <div>
                <div class="h-28 flex items-center">
                    <img src="<?php echo get_template_directory_uri(); ?>/dist/img/icon-naturel.svg" alt="Naturel" class="mx-auto">
                </div>
                <h5 class="text-lg font-bold">Naturel</h5>
                <p>Ingrédients principalement issus <br>de l’agriculture biologique.</p>
            </div>
            <div>
                <div class="h-28 flex items-center">
                    <img src="<?php echo get_template_directory_uri(); ?>/dist/img/icon-ecoresponsable.svg" alt="made in France" class="mx-auto">
                </div>
                <h5 class="text-lg font-bold">Eco-responsable</h5>
                <p>Emballages réutilisables ou <br>compostables.</p>
            </div>
            <div>
                <div class="h-28 flex items-center">
                    <img src="<?php echo get_template_directory_uri(); ?>/dist/img/icon-fraisdeport.svg" alt="made in France" class="mx-auto">
                </div>
                <h5 class="text-lg font-bold">Frais de port offerts</h5>
                <p>En point relais à partir de 50€ <br>de commande.</p>
            </div>
        </div>
    </div>


    <!-- Instagram -->
    <div class="footer__instagram bg-light hidden lg:block">
        <div class="container">
            <?php echo do_shortcode('[instagram-feed]'); ?>
        </div>
    </div>


    <!-- Footer -->
    <footer class="site-footer bg-dark text-light">
        <div class="container text-center section-pad grid gap-12 grid-cols-1 lg:text-left lg:grid-cols-3 xl:grid-cols-12">
            
            <!-- Nos produits -->
            <div class="xl:col-span-3 xl:col-start-2">
                <h4 class="text-lg">Nos produits</h4>
                <?php 
                wp_nav_menu(array(
                    'theme_location' => 'menu-footer-produits',
                    'menu_class' => 'mt-4 site-footer__menu lg:mt-8'
                )); 
                ?>
            </div>    

            <!-- Flos et Luna -->
            <div class="xl:col-span-3">
                <h4 class="text-lg">Flos & Luna</h4>
                <?php 
                wp_nav_menu(array(
                    'theme_location' =>  'menu-footer-flosetluna',
                    'menu_class' => ' mt-4 site-footer__menu lg:mt-8'
                )); 
                ?>
            </div>    

            <!-- Newsletter -->
            <div class="xl:col-span-4">
                <h4 class="text-lg">Newsletter</h4>
                <p class="mt-4 mb-4 lg:mt-8">Inscrivez-vous pour rester au courant de notre actualité et de nos nouveautés</p>
                <form action="https://flosetluna.us10.list-manage.com/subscribe/post?u=413ab96e8643aa4c596f942de&amp;id=735d474ad6" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
                    <div id="mc_embed_signup_scroll">
                        <div class="newsletter-form-content">
                            <div class="mc-field-group email-container">
                                <input type="email" value="" name="EMAIL" class="required email" id="mce-EMAIL" placeholder="Votre adresse email">
                            </div>
                            <div id="mce-responses" class="clear">
                                <div class="response" id="mce-error-response" style="display:none"></div>
                                <div class="response" id="mce-success-response" style="display:none"></div>
                            </div>
                            <div style="position: absolute; left: -5000px;" aria-hidden="true">
                                <input type="text" name="b_413ab96e8643aa4c596f942de_735d474ad6" tabindex="-1" value="">
                            </div>
                            <div class="clear submit-container">
                                <input type="submit" value="S'inscrire" name="subscribe" id="mc-embedded-subscribe" class="button">
                            </div>
                        </div>
                    </div>
                </form>
            </div>    

        </div>

        <div class="container">
            <div class="section-pad text-center border-t border-light border-opacity-10 text-center">
                <a href="<?php echo get_site_url(); ?>" class="inline-block">
                    <img src="<?php echo get_template_directory_uri(); ?>/dist/img/logo-flos-et-luna-vert.svg" alt="Logo Flos & Luna" class="site-footer__logo">
                </a>
                <ul class="flex justify-center mt-12 lg:mt-20">
                    <li class="px-4">
                        <a href="https://www.instagram.com/flosetluna/" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/dist/img/icon-instagram.svg" alt="instagram"></a>
                    </li>
                    <li class="px-4">
                        <a href="https://www.facebook.com/flosetluna" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/dist/img/icon-facebook.svg" alt="facebook"></a>
                    </li>
                    <li class="px-4">
                        <a href="https://www.pinterest.fr/flosetluna/" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/dist/img/icon-pinterest.svg" alt="pinterest"></a>
                    </li>
                    <li class="px-4">
                        <a href="https://open.spotify.com/playlist/2IkFflczkONdZUkAHzmnng?si=djKdFjcWRyiEizUSTsImUA" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/dist/img/icon-spotify.svg" alt="spotify"></a>
                    </li>
                </ul>
            </div>
        </div>

        <div class="container">
            <div class="border-t border-light border-opacity-10 py-8 text-center">
                <p class="text-xs">©Flos&Luna 2020-2021 - Design by <a href="https://bemy.studio" target="_blank" class="italic">bemy studio</a></p>
            </div>
            
        </div>
    </footer>



</div><!-- #page -->

<div class="cursor"></div>

<?php wp_footer(); ?>

</body>
</html>