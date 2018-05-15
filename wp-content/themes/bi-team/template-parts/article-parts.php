<article class="pb-4">
    <header class="pb-2">
        <h2>
            <a class="underline-color" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
        </h2>
        <?php echo render_template_part('post-date'); ?>
    </header>

    <img src="<?php the_post_thumbnail_url('image_article_large'); ?>"
         alt="<?php the_post_thumbnail_caption(); ?>"
         class="img-fluid"/>
    <?php the_excerpt(); ?>
    <footer class="d-flex justify-content-between pb-3 pt-2 align-items-center flex-wrap">
     
        <a class="d-inline-block link-read-more text-uppercase font-weight-bold"
           href="<?php the_permalink(); ?>"><?php _e('read more', 'bi-team') ?></a>
    </footer>
    <hr>
</article>