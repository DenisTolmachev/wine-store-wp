<?php
/*
Plugin Name: WP News and Scrolling Widgets
Plugin URL: https://www.wponlinesupport.com
Text Domain: sp-news-and-widget
Domain Path: /languages/
Description: A simple News and three widgets(static, scrolling and with thumbs) plugin
Version: 4.0
Author: WP Online Support
Author URI: https://www.wponlinesupport.com
Contributors: WP Online Support
*/

if( !defined( 'WPNW_VERSION' ) ) {
    define( 'WPNW_VERSION', '4.0' ); // Version of plugin
}
if( !defined( 'WPNW_DIR' ) ) {
    define( 'WPNW_DIR', dirname( __FILE__ ) ); // Plugin dir
}
if( !defined( 'WPNW_POST_TYPE' ) ) {
    define( 'WPNW_POST_TYPE', 'news' ); // Plugin post type
}

/* Plugin Analytics Data Starts */

function wnasw_fs() {
    global $wnasw_fs;

    if ( ! isset( $wnasw_fs ) ) {
        // Include Freemius SDK.
        require_once dirname(__FILE__) . '/freemius/start.php';

        $wnasw_fs = fs_dynamic_init( array(
            'id'                  => '1773',
            'slug'                => 'sp-news-and-widget',
            'type'                => 'plugin',
            'public_key'          => 'pk_0b3f591a735ebcfd6f8bf21db5d9e',
            'is_premium'          => false,
            'has_addons'          => false,
            'has_paid_plans'      => false,
            'menu'                => array(
                'slug'           => 'edit.php?post_type=news',
                'account'        => false,
                'contact'        => false,
                'support'        => false,
            ),
        ));
    }
    return $wnasw_fs;
}

// Init Freemius.
wnasw_fs();

// Signal that SDK was initiated.
do_action( 'wnasw_fs_loaded' );

/* Plugin Analytics Data Ends */

register_activation_hook( __FILE__, 'install_newsfree_version' );
function install_newsfree_version(){
if( is_plugin_active('wp-news-and-widget-pro/sp-news-and-widget.php') ){
     add_action('update_option_active_plugins', 'deactivate_newsfree_version');
    }
}
function deactivate_newsfree_version(){
   deactivate_plugins('wp-news-and-widget-pro/sp-news-and-widget.php',true);
}
add_action( 'admin_notices', 'freenews_admin_notice');
function freenews_admin_notice() {
    $dir = ABSPATH . 'wp-content/plugins/wp-news-and-widget-pro/sp-news-and-widget.php';
    if( is_plugin_active( 'sp-news-and-widget/sp-news-and-widget.php' ) && file_exists($dir)) {
        global $pagenow;
        if( $pagenow == 'plugins.php' ){
            deactivate_plugins ( 'wp-news-and-widget-pro/sp-news-and-widget.php',true);
            if ( current_user_can( 'install_plugins' ) ) {
                echo '<div id="message" class="updated notice is-dismissible"><p><strong>Thank you for activating WP News and three widgets</strong>.<br /> It looks like you had PRO version <strong>(<em>WP News and Five Widgets Pro</em>)</strong> of this plugin activated. To avoid conflicts the extra version has been deactivated and we recommend you delete it. </p></div>';
            }
        }
    }
} 

add_action('plugins_loaded', 'sp_news_load_textdomain');
function sp_news_load_textdomain() {
	load_plugin_textdomain( 'sp-news-and-widget', false, dirname( plugin_basename(__FILE__) ) . '/languages/' );
}

add_action( 'wp_enqueue_scripts','wpnawstyle_css_script' );
function wpnawstyle_css_script() {
    wp_enqueue_style( 'cssnews',  plugin_dir_url( __FILE__ ). 'assets/css/stylenews.css', array(), WPNW_VERSION );
    wp_enqueue_script( 'vnewsticker', plugin_dir_url( __FILE__ ) . 'assets/js/jquery.newstape.js', array( 'jquery' ), WPNW_VERSION);
}	

function string_limit_newswords( $post_id = null, $content = '', $word_length = '55', $more = '...' ) {

    $has_excerpt  = false;
    $word_length    = !empty($word_length) ? $word_length : '55';

    // If post id is passed
    if( !empty($post_id) ) {
        if (has_excerpt($post_id)) {
            $has_excerpt    = true;
            $content        = get_the_excerpt();
        } else {
            $content = !empty($content) ? $content : get_the_content();
        }
    }

    if( !empty($content) && (!$has_excerpt) ) {
        $content = strip_shortcodes( $content ); // Strip shortcodes
        $content = wp_trim_words( $content, $word_length, $more );
    }

    return $content;
}

function spnews_display_tags( $query ) {
    if( is_tag() && $query->is_main_query() ) {       
       $post_types = array( 'post', 'news' );
        $query->set( 'post_type', $post_types );
    }
}
add_filter( 'pre_get_posts', 'spnews_display_tags' );


// Manage Category Shortcode Columns

add_filter("manage_news-category_custom_column", 'news_category_columns', 10, 3);
add_filter("manage_edit-news-category_columns", 'news_category_manage_columns'); 
function news_category_manage_columns($theme_columns) {
    $new_columns = array(
            'cb' => '<input type="checkbox" />',
            'name' => __('Name'),
            'news_shortcode' => __( 'News Category Shortcode', 'sp-news-and-widget' ),
            'slug' => __('Slug'),
            'posts' => __('Posts')
			);
    return $new_columns;
}

function news_category_columns($out, $column_name, $theme_id) {
    $theme = get_term($theme_id, 'news-category');
    switch ($column_name) {
        case 'title':
            echo get_the_title();
        break;
        case 'news_shortcode': 
             echo '[sp_news category="' . $theme_id. '"]';
        break;
        default:
            break;
    }
    return $out; 
}

function news_pagination($args = array()){    
    $big = 999999999; // need an unlikely integer
    $paging = apply_filters('news_blog_paging_args', array(
                    'base'      => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
                    'format'    => '?paged=%#%',
                    'current'   => max( 1, $args['paged'] ),
                    'total'     => $args['total'],
                    'prev_next' => true,
                    'prev_text' => __('', 'wp-blog-and-widgets'),
                    'next_text' => __('', 'wp-blog-and-widgets'),
                ));
    
    echo paginate_links($paging);
}

function news_get_unique() {
  static $unique = 0;
  $unique++;

  return $unique;
}

// Posttype
require_once( WPNW_DIR . '/includes/sp-news-post-type.php' );

// Shortcode
require_once( WPNW_DIR . '/includes/sp-news-shortcode.php' );

// Widget
require_once( WPNW_DIR . '/widget_function.php' );

// Shortcode
require_once( WPNW_DIR . '/admin/class-wpnw-admin.php' );

// How it work file, Load admin files
if ( is_admin() || ( defined( 'WP_CLI' ) && WP_CLI ) ) {
    require_once( WPNW_DIR . '/admin/wpnw-how-it-work.php' );
}