<?php
add_action('after_setup_theme', 'blankslate_setup');
function blankslate_setup()
{
    load_theme_textdomain('blankslate', get_template_directory() . '/languages');
    add_theme_support('title-tag');
    add_theme_support('automatic-feed-links');
    add_theme_support('post-thumbnails');
    add_theme_support('html5', array('search-form'));
    global $content_width;
    if (!isset($content_width)) {
        $content_width = 1920;
    }
    register_nav_menus(array('main-menu' => esc_html__('Main Menu', 'blankslate')));
}

add_action('wp_enqueue_scripts', 'blankslate_load_scripts');
function blankslate_load_scripts()
{
    global $post;

    wp_enqueue_style('blankslate-style', get_stylesheet_uri());
    wp_enqueue_style('flickity.css', get_stylesheet_directory_uri()."/css/flickity.css");
    wp_enqueue_style('default-skin.css', get_stylesheet_directory_uri()."/css/default-skin.css");
    wp_enqueue_style('photoswipe.css', get_stylesheet_directory_uri()."/css/photoswipe.css");
    wp_enqueue_script('jquery');
    wp_enqueue_script('flickity.js', get_stylesheet_directory_uri() . "/js/flickity.js", array('jquery'));
    wp_enqueue_script('vivus.min.js', get_stylesheet_directory_uri() . "/js/vivus.min.js", array('jquery'));

    wp_enqueue_script('photoswipe.min.js', get_stylesheet_directory_uri() . "/js/photoswipe.min.js", array('jquery'));
    wp_enqueue_script('photoswipe-ui-default.min', get_stylesheet_directory_uri() . "/js/photoswipe-ui-default.min.js", array('jquery'));
    //wp_enqueue_script('main.js', get_stylesheet_directory_uri() . "/js/main.js", array('jquery','isotope.js'));
    if(is_home() || is_category() || get_post_type($post) === "referenciak" || get_post_type($post) === "nyomda_technikak"){
        wp_enqueue_script('isotope.js', get_stylesheet_directory_uri() . "/js/isotope.pkgd.min.js", array('jquery'));
        wp_enqueue_script('isotopeHandler.js', get_stylesheet_directory_uri() . "/js/isotopeHandler.js", array('jquery','isotope.js'));
    }
    if(get_post_type($post) === "szolgaltatasok"){
        wp_enqueue_script('isotope.js', get_stylesheet_directory_uri() . "/js/isotope.pkgd.min.js", array('jquery'));
        wp_enqueue_script('szolgaltatasok.js', get_stylesheet_directory_uri() . "/js/szolgaltatasok.js", array('jquery','isotope.js'));
    }
}
add_action( 'after_setup_theme', function() {
    add_theme_support( 'responsive-embeds' );
} );
add_action('wp_footer', 'blankslate_footer_scripts');
function blankslate_footer_scripts()
{
    ?>
    <script>
        jQuery(document).ready(function ($) {
            var deviceAgent = navigator.userAgent.toLowerCase();
            if (deviceAgent.match(/(iphone|ipod|ipad)/)) {
                $("html").addClass("ios");
                $("html").addClass("mobile");
            }
            if (navigator.userAgent.search("MSIE") >= 0) {
                $("html").addClass("ie");
            } else if (navigator.userAgent.search("Chrome") >= 0) {
                $("html").addClass("chrome");
            } else if (navigator.userAgent.search("Firefox") >= 0) {
                $("html").addClass("firefox");
            } else if (navigator.userAgent.search("Safari") >= 0 && navigator.userAgent.search("Chrome") < 0) {
                $("html").addClass("safari");
            } else if (navigator.userAgent.search("Opera") >= 0) {
                $("html").addClass("opera");
            }
        });
    </script>
    <?php
}

add_filter('document_title_separator', 'blankslate_document_title_separator');
function blankslate_document_title_separator($sep)
{
    $sep = '|';
    return $sep;
}

add_filter('the_title', 'blankslate_title');
function blankslate_title($title)
{
    if ($title == '') {
        return '...';
    } else {
        return $title;
    }
}

add_filter('the_content_more_link', 'blankslate_read_more_link');
function blankslate_read_more_link()
{
    if (!is_admin()) {
        return ' <a href="' . esc_url(get_permalink()) . '" class="more-link">...</a>';
    }
}

add_filter('excerpt_more', 'blankslate_excerpt_read_more_link');
function blankslate_excerpt_read_more_link($more)
{
    if (!is_admin()) {
        global $post;
        return ' <a href="' . esc_url(get_permalink($post->ID)) . '" class="more-link">...</a>';
    }
}

add_filter('intermediate_image_sizes_advanced', 'blankslate_image_insert_override');
function blankslate_image_insert_override($sizes)
{
    unset($sizes['medium_large']);
    return $sizes;
}

add_action('widgets_init', 'blankslate_widgets_init');
function blankslate_widgets_init()
{
    register_sidebar(array(
        'name' => esc_html__('Sidebar Widget Area', 'blankslate'),
        'id' => 'primary-widget-area',
        'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
        'after_widget' => '</li>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    ));
}

add_action('wp_head', 'blankslate_pingback_header');
function blankslate_pingback_header()
{
    if (is_singular() && pings_open()) {
        printf('<link rel="pingback" href="%s" />' . "\n", esc_url(get_bloginfo('pingback_url')));
    }
}

add_action('comment_form_before', 'blankslate_enqueue_comment_reply_script');
function blankslate_enqueue_comment_reply_script()
{
    if (get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}

function blankslate_custom_pings($comment)
{
    ?>
    <li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>"><?php echo comment_author_link(); ?></li>
    <?php
}

add_filter('get_comments_number', 'blankslate_comment_count', 0);
function blankslate_comment_count($count)
{
    if (!is_admin()) {
        global $id;
        $get_comments = get_comments('status=approve&post_id=' . $id);
        $comments_by_type = separate_comments($get_comments);
        return count($comments_by_type['comment']);
    } else {
        return $count;
    }
}
function custom_post_type_cat_filter($query) {
    if ( !is_admin() && $query->is_main_query() ) {
        if ($query->is_category()) {
            $query->set( 'post_type', array( 'post', 'szolgaltatasok' ) );
        }
    }
}

add_action('pre_get_posts','custom_post_type_cat_filter');
add_filter('show_admin_bar', '__return_false');

acf_add_options_page(array(
    'page_title' 	=> 'Főoldal',
    'menu_title'	=> 'Főoldal',
    'menu_slug' 	=> 'fooldal-settings',
    'capability'	=> 'edit_posts',
    'redirect'		=> false
));
add_filter( 'upload_mimes', 'my_myme_types', 1, 1 );
function my_myme_types( $mime_types )
{
    $mime_types['svg'] = 'image/svg+xml';     // Adding .svg extension
    $mime_types['json'] = 'application/json'; // Adding .json extension

    unset($mime_types['xls']);  // Remove .xls extension
    unset($mime_types['xlsx']); // Remove .xlsx extension

    return $mime_types;
}
