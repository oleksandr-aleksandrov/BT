<?php
/**
 * bi-team functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package bi-team
 */

if (!function_exists('bi_team_setup')) :
    /**
     * Sets up theme defaults and registers support for various WordPress features.
     *
     * Note that this function is hooked into the after_setup_theme hook, which
     * runs before the init hook. The init hook is too late for some features, such
     * as indicating support for post thumbnails.
     */
    function bi_team_setup()
    {
        /*
         * Make theme available for translation.
         * Translations can be filed in the /languages/ directory.
         * If you're building a theme based on bi-team, use a find and replace
         * to change 'bi-team' to the name of your theme in all the template files.
         */
        load_theme_textdomain('bi-team', get_template_directory() . '/languages');

        // Add default posts and comments RSS feed links to head.
        add_theme_support('automatic-feed-links');

        /*
         * Let WordPress manage the document title.
         * By adding theme support, we declare that this theme does not use a
         * hard-coded <title> tag in the document head, and expect WordPress to
         * provide it for us.
         */
        add_theme_support('title-tag');

        /*
         * Enable support for Post Thumbnails on posts and pages.
         *
         * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
         */
        add_theme_support('post-thumbnails');

        add_image_size('header_logo', 100, 100);
        add_image_size('small_avatar', 200, 200, true);
        add_image_size('image_article_large', 1000, 500, true);
        add_image_size('image_portfolio_small', 500, 500, true);
        add_image_size('image_portfolio_single', 600, 900, true);


        // This theme uses wp_nav_menu() in one location.
        register_nav_menus(array(
            'menu-1' => esc_html__('Primary', 'bi-team'),
        ));

        /*
         * Switch default core markup for search form, comment form, and comments
         * to output valid HTML5.
         */
        add_theme_support('html5', array(
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
        ));

        // Set up the WordPress core custom background feature.
        add_theme_support('custom-background', apply_filters('bi_team_custom_background_args', array(
            'default-color' => 'ffffff',
            'default-image' => '',
        )));

        // Add theme support for selective refresh for widgets.
        add_theme_support('customize-selective-refresh-widgets');

        /**
         * Add support for core custom logo.
         *
         * @link https://codex.wordpress.org/Theme_Logo
         */
        add_theme_support('custom-logo', array(
            'height' => 100,
            'width' => 100,
            'flex-width' => true,
            'flex-height' => true,
        ));
    }
endif;
add_action('after_setup_theme', 'bi_team_setup');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function bi_team_content_width()
{
    // This variable is intended to be overruled from themes.
    // Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
    // phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
    $GLOBALS['content_width'] = apply_filters('bi_team_content_width', 640);
}

add_action('after_setup_theme', 'bi_team_content_width', 0);

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function bi_team_widgets_init()
{
    register_sidebar(array(
        'name' => esc_html__('Sidebar', 'bi-team'),
        'id' => 'sidebar-1',
        'description' => esc_html__('Add widgets here.', 'bi-team'),
        'before_widget' => '<section id="%1$s" class="widget widget-item %2$s">',
        'after_widget' => '</section>',
        'before_title' => '<h2 class="widget-title">',
        'after_title' => '</h2>',
    ));
}

add_action('widgets_init', 'bi_team_widgets_init');

/**
 * Enqueue scripts and styles.
 */
function bi_team_scripts()
{
    wp_enqueue_style('bi-team-style', get_stylesheet_uri());


    wp_register_style('bootstrap-css', 'https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.1/css/bootstrap.min.css');
    wp_enqueue_style('bootstrap-css');

    wp_register_style('font-awesome-css', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css');
    wp_enqueue_style('font-awesome-css');

    wp_register_style('main-css', get_template_directory_uri() . '/app/css/main.css');
    wp_enqueue_style('main-css');
//
    wp_register_script('html5shiv', 'https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js', array(), null, true);
    wp_enqueue_script('html5shiv');
    wp_script_add_data('html5shiv', 'conditional', 'lt IE 9');
//
    wp_register_script('respond', 'https://oss.maxcdn.com/respond/1.4.2/respond.min.js', array(), null, true);
    wp_enqueue_script('respond');
    wp_script_add_data('respond', 'conditional', 'lt IE 9');

    wp_enqueue_script('bootsrtap-js', 'https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.1/js/bootstrap.min.js', array('jquery'), '1.0.0', true);

    wp_register_script('bi-team-js', get_template_directory_uri() . '/app/js/scripts.js', array('jquery'), null, true);
    wp_enqueue_script('bi-team-js');

//	wp_enqueue_script( 'bi-team-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );
//
//	wp_enqueue_script( 'bi-team-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}

add_action('wp_enqueue_scripts', 'bi_team_scripts');

/**
 * @param $template
 * @param array $params
 * @return string
 */
function render_template_part($template, $params = [])
{
    ob_start();

    extract($params);
    include(locate_template('template-parts/' . $template . '.php'));

    if (isset($_SESSION['errors']))
        unset($_SESSION['errors']);

    return ob_get_clean();
}

\add_filter('excerpt_more', function () {

});

################################################
#
# Portfolio Custom Post type
#
################################################


function portfolio()
{

    $labels = array(
        'name' => _x('Portfolio', 'Post Type General Name', 'bi-team'),
        'singular_name' => _x('Portfolio', 'Post Type Singular Name', 'bi-team'),
        'menu_name' => __('Portfolio', 'bi-team'),
        'name_admin_bar' => __('Portfolio', 'bi-team'),
        'archives' => __('Item Archives', 'bi-team'),
        'attributes' => __('Item Attributes', 'bi-team'),
        'parent_item_colon' => __('Parent Item:', 'bi-team'),
        'all_items' => __('All Items', 'bi-team'),
        'add_new_item' => __('Add New Item', 'bi-team'),
        'add_new' => __('Add New', 'bi-team'),
        'new_item' => __('New Item', 'bi-team'),
        'edit_item' => __('Edit Item', 'bi-team'),
        'update_item' => __('Update Item', 'bi-team'),
        'view_item' => __('View Item', 'bi-team'),
        'view_items' => __('View Items', 'bi-team'),
        'search_items' => __('Search Item', 'bi-team'),
        'not_found' => __('Not found', 'bi-team'),
        'not_found_in_trash' => __('Not found in Trash', 'bi-team'),
        'featured_image' => __('Featured Image', 'bi-team'),
        'set_featured_image' => __('Set featured image', 'bi-team'),
        'remove_featured_image' => __('Remove featured image', 'bi-team'),
        'use_featured_image' => __('Use as featured image', 'bi-team'),
        'insert_into_item' => __('Insert into item', 'bi-team'),
        'uploaded_to_this_item' => __('Uploaded to this item', 'bi-team'),
        'items_list' => __('Items list', 'bi-team'),
        'items_list_navigation' => __('Items list navigation', 'bi-team'),
        'filter_items_list' => __('Filter items list', 'bi-team'),
    );
    $args = array(
        'label' => __('portfolio', 'bi-team'),
        'description' => 'Custom post type for Portfolio',
        'labels' => $labels,
        'supports' => array('title', 'editor', 'thumbnail', 'excerpt', 'page-attributes', 'author'),
        'hierarchical' => false,
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'menu_icon' => 'dashicons-admin-site',
        'menu_position' => 5,
        'show_in_admin_bar' => true,
        'show_in_nav_menus' => true,
        'can_export' => true,
        'has_archive' => true,
        'exclude_from_search' => false,
        'publicly_queryable' => true,
        'capability_type' => 'page',
    );

    register_post_type('portfolio', $args);

}

add_action('init', 'portfolio', 0);

################################################
#
# News Custom Post type
#
################################################


function news()
{

    $labels = array(
        'name' => _x('News', 'Post Type General Name', 'bi-team'),
        'singular_name' => _x('News', 'Post Type Singular Name', 'bi-team'),
        'menu_name' => __('News', 'bi-team'),
        'name_admin_bar' => __('News', 'bi-team'),
        'archives' => __('Item Archives', 'bi-team'),
        'attributes' => __('Item Attributes', 'bi-team'),
        'parent_item_colon' => __('Parent Item:', 'bi-team'),
        'all_items' => __('All Items', 'bi-team'),
        'add_new_item' => __('Add New Item', 'bi-team'),
        'add_new' => __('Add New', 'bi-team'),
        'new_item' => __('New Item', 'bi-team'),
        'edit_item' => __('Edit Item', 'bi-team'),
        'update_item' => __('Update Item', 'bi-team'),
        'view_item' => __('View Item', 'bi-team'),
        'view_items' => __('View Items', 'bi-team'),
        'search_items' => __('Search Item', 'bi-team'),
        'not_found' => __('Not found', 'bi-team'),
        'not_found_in_trash' => __('Not found in Trash', 'bi-team'),
        'featured_image' => __('Featured Image', 'bi-team'),
        'set_featured_image' => __('Set featured image', 'bi-team'),
        'remove_featured_image' => __('Remove featured image', 'bi-team'),
        'use_featured_image' => __('Use as featured image', 'bi-team'),
        'insert_into_item' => __('Insert into item', 'bi-team'),
        'uploaded_to_this_item' => __('Uploaded to this item', 'bi-team'),
        'items_list' => __('Items list', 'bi-team'),
        'items_list_navigation' => __('Items list navigation', 'bi-team'),
        'filter_items_list' => __('Filter items list', 'bi-team'),
    );
    $args = array(
        'label' => __('news', 'bi-team'),
        'description' => 'Custom post type for News',
        'labels' => $labels,
        'supports' => array('title', 'editor', 'thumbnail', 'excerpt', 'page-attributes', 'author'),
        'hierarchical' => false,
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'menu_icon' => 'dashicons-format-aside',
        'menu_position' => 5,
        'show_in_admin_bar' => true,
        'show_in_nav_menus' => true,
        'can_export' => true,
        'has_archive' => true,
        'exclude_from_search' => false,
        'publicly_queryable' => true,
        'capability_type' => 'page',
    );

    register_post_type('news', $args);

}

add_action('init', 'news', 0);


function add_taxonomy()
{
    \register_taxonomy('news-tag', array('news', 'portfolio'), [
        'hierarchical' => false,
        'label' => __('Tag', 'bi-team'),
        'query_var' => true,
        'show_admin_column' => true,
        'show_in_nav_menus' => true,
        'show_tagcloud' => true,
        'rewrite' => ['slug' => 'news-tag']
    ]);
}

add_action('init', 'add_taxonomy');


function custom_paginate_links($prev_page_text = 'Previous page', $next_page_text = 'Next page')
{
    global $wp_rewrite, $wp_query;

    if ($wp_query->max_num_pages <= 1)
        return;

    //Current page
    $current = $wp_query->query_vars['paged'] > 1 ? $wp_query->query_vars['paged'] : 1;

    //Array with arguments for paginate_links()
    $pagination = array(
        'base' => @add_query_arg('page', '%#%'),
        'format' => '',
        'total' => $wp_query->max_num_pages,
        'current' => $current,
        'prev_text' => $prev_page_text,
        'next_text' => $next_page_text,
        'end_size' => 3,
        'mid_size' => 1,
        'show_all' => false,
        'type' => 'array'
    );

    if ($wp_rewrite->using_permalinks())
        $pagination['base'] = user_trailingslashit(trailingslashit(remove_query_arg('s', get_pagenum_link(1))) . 'page/%#%/', 'paged');

    if (!empty($wp_query->query_vars['s']))
        $pagination['add_args'] = array('s' => get_query_var('s'));

    //Generating pages
    $pages = paginate_links($pagination);

//    echo '<div class="">';
    echo '<ul class="pagination posts-pagination d-flex justify-content-center py-4 m-0 align-items-center flex-wrap">';
    if ($current == 1) echo '<li><span class="disabled">' . $prev_page_text . '</span></li>';
    foreach ($pages as $page) {
        echo '<li>' . $page . '</li>';
    }
    if ($current == $wp_query->max_num_pages) echo '<li><span class="disabled">' . $next_page_text . '</span></li>';
    echo '</ul>';
//    echo '</div>';
}


// deleting attribute type in scripts and styles

add_filter('style_loader_tag', 'sj_remove_type_attr', 10, 2);
add_filter('script_loader_tag', 'sj_remove_type_attr', 10, 2);
function sj_remove_type_attr($tag)
{
    return preg_replace("/type=['\"]text\/(javascript|css)['\"]/", '', $tag);
}

function wcs_cpt_recent_posts_widget($params)
{
    $params['post_type'] = array('news', 'portfolio');
    return $params;
}

add_filter('widget_posts_args', 'wcs_cpt_recent_posts_widget');


function blog_url()
{
    $posts = \get_pages([
        'meta_key' => '_wp_page_template',
        'meta_value' => 'archive-news.php',
        'posts_per_page' => 1,
    ]);
    return (isset($posts[0])) ? \get_permalink($posts[0]) : \network_site_url('news/');
}
function portfolio_url()
{
    $posts = \get_pages([
        'meta_key' => '_wp_page_template',
        'meta_value' => 'archive-portfolio.php',
        'posts_per_page' => 1,
    ]);
    return (isset($posts[0])) ? \get_permalink($posts[0]) : \network_site_url('portfolio/');
}