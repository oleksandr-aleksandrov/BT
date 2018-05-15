<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package bi-team
 */

?>

</main>

<footer class="main-footer">
    <div class="container">
        <?php
        wp_nav_menu(array(
            'theme_location' => 'menu-1',
            'menu_id' => 'primary-menu',
            'menu_class' => 'footer-main-menu d-flex flex-column flex-lg-row justify-content-center navbar-nav m-auto py-5',
            'container' => 'nav'
        ));
        ?>
        <div class="footer-info-wrapper py-3 d-flex flex-column flex-lg-row justify-content-between align-items-center">
            <p class="m-0">
                © <?php echo date("Y");?>, Bi Team.pro
            </p>
            <ul class="privacy-list list-style-none m-0 p-0 d-flex">
                <li><a href="#">Privacy Policy</a></li>
                <li><span class="sep"> | </span></li>
                <li><a href="#">Terms of Services</a></li>
            </ul>
            <ul class="social-networks list-style-none m-0 py-2 pl-0 d-flex">
                <li>
                    <a href="#">
                        <i class="fa fa-facebook" aria-hidden="true"></i>
                    </a>
                </li>

                <li>
                    <a href="#">
                        <i class="fa fa-twitter" aria-hidden="true"></i>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="fa fa-youtube" aria-hidden="true"></i>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</footer>

<?php wp_footer(); ?>

</body>
</html>
