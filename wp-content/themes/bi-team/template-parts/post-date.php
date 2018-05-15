<ul class="article-date-time list-style-none m-0 p-0 d-flex align-items-center flex-wrap">
    <li>
        <?php the_author(); ?>
    </li>
    <li>
        <time>
                 <span class="pl-2 text-silver">
                <?php echo get_the_date('j M, Y'); ?>
                 </span>
                <span class="pl-2 text-silver">
                <?php the_time('g:i A'); ?>
                </span>
        </time>
    </li>
</ul>