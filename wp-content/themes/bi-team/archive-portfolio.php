<?php get_header(); ?>
<div class="container py-4">
    <div class="row">
        <div class="col-md-12">
            <h1 class="py-4">
                <?php echo post_type_archive_title('', false); ?>
            </h1>
        </div>
        <?php if (have_posts()) :

            /* Start the Loop */
            while (have_posts()) :
                the_post(); ?>
                <div class="col-md-6 col-lg-4 pb-5 d-flex">
                    <div class="card shadow-lg portfolio-card position-relative">
                        <img class="card-img-top img-fluid"
                             src="<?php the_post_thumbnail_url('image_portfolio_small'); ?>"
                             alt="<?php the_post_thumbnail_caption(); ?>"/>
                        <div class="card-body text-center">
                            <h2 class="card-title color-icon">
                                <?php the_title(); ?>
                            </h2>
                            <?php $excerpt_posrtfolio = get_the_excerpt(); ?>
                            <p>
                                <?php echo $post->post_excerpt; ?>
                            </p>
                        </div>
                        <a class="d-block position-cover" href="<?php the_permalink(); ?>"></a>
                    </div>
                </div>
                <?php
                /*
                 * Include the Post-Type-specific template for the content.
                 * If you want to override this in a child theme, then include a file
                 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
                 */
            endwhile;
            ?>
            <div class="col-md-12">
                <?php custom_paginate_links(); ?>
            </div>
        <?php else :
            get_template_part('template-parts/content', 'none');

        endif;
        ?>
    </div>
</div>
<?php get_footer(); ?>
