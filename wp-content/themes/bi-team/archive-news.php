<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package bi-team
 */

get_header();
?>

<div class="container py-5">
    <div class="row">
        <div class="col-md-9">
            <?php if (have_posts()) :

                /* Start the Loop */
                while (have_posts()) :
                    the_post();
                    get_template_part('template-parts/article-parts');
                    /*
                     * Include the Post-Type-specific template for the content.
                     * If you want to override this in a child theme, then include a file
                     * called content-___.php (where ___ is the Post Type name) and that will be used instead.
                     */
                endwhile;
                custom_paginate_links();
            else :
                get_template_part('template-parts/content', 'none');

            endif;
            ?>
        </div>
        <div class="col-md-3">
            <?php get_sidebar(); ?>
        </div>
    </div>
</div>


<?php get_footer(); ?>
