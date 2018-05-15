<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package bi-team
 */

get_header();
?>

    <div class="container py-3">
        <div class="row">
            <?php echo render_template_part('back-blog-link');

            if (have_posts()) : while (have_posts()) :
            the_post(); ?>
            <article class="col-md-8 m-auto py-4 article-item">
                <header class="py-2">
                    <h1><?php the_title(); ?></h1>
                    <?php echo render_template_part('post-date'); ?>
                </header>
                <img src="<?php the_post_thumbnail_url('image_article_large'); ?>"
                     alt="<?php the_post_thumbnail_caption(); ?>"
                     class="img-fluid"/>
                <?php the_content(); ?>
                <footer class="pt-5">
                    <?php echo render_template_part('tags-social-post'); ?>
                </footer>
            </article>
            <div>
                <?php
                // If comments are open or we have at least one comment, load up the comment template.
                if (comments_open() || get_comments_number()) :
                    comments_template();
                endif;
                endwhile; // End of the loop.
                endif; ?>

            </div>
            <?php echo render_template_part('back-blog-link'); ?>
        </div>
    </div>
<?php
get_footer();
