<div class="row align-items-center tags-social-posts">
    <div class="col-md-6">
        <p>
            <i class="fa fa-share-alt color-icon" aria-hidden="true"></i>
            Share this article
        </p>
    </div>

    <?php
    global $post;
    if (is_object_in_term($post->ID, 'news-tag')) { ?>
        <div class="col-md-6">
            <ul class="tag-posts list-style-none p-0 m-0 d-flex flex-row flex-wrap align-items-center">
                <li>
                    <i class="fa fa-tag fa-rotate-90 align-middle" aria-hidden="true"></i>
                    <span>Tags:</span>
                </li>
                <?php $taxonomies = get_the_terms(get_the_ID(), 'news-tag');
                if (!empty($taxonomies)) :
                    $taxonomies = get_the_terms(get_the_ID(), 'news-tag');
                    foreach ($taxonomies as $term) :
                        ?>
                        <li class="tag-news-item mx-2 mt-1">
                            <a class="link-hover" href="<?php echo get_term_link($term); ?>">
                                <?php echo $term->name; ?>
                            </a>
                        </li>
                        <?php
                    endforeach;
                endif; ?>
            </ul>
        </div>
    <?php } ?>
</div>