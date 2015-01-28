<?php
// don't call file directly
if ( !defined( 'ABSPATH' ) )
    exit;

/*
 * Main class that holds the entire plugin
 */
class PWP_Lytebox {
    /*
     * Constructor 
     * Sets up all the appropriate hooks and actions
     */
    function __construct() {
        // Loads scripts and styles
        add_action( 'wp_enqueue_scripts', array($this, 'enqueue_scripts') );
        //add_action( 'admin_enqueue_scripts', array($this, 'enqueue_admin_scripts') );

        // add lydebox data to anchors
        add_filter('the_content', array($this, 'add_lytebox_data') );
    }
    /*
     * Enqueue scripts and styles
     */
    public function enqueue_scripts() {
        // styles
        wp_enqueue_style( 'pwp-lytebox-styles',   plugins_url( 'lytebox/lytebox.css', __FILE__ ), array(), date('Y-m') );
        // scripts
        wp_enqueue_script( 'pwp-scripts',         plugins_url( 'scripts.js', __FILE__ ),  array('jquery'), date('Y-m'), true );
        wp_enqueue_script( 'pwp-lytebox-scripts', plugins_url( 'lytebox/lytebox.js', __FILE__ ),  array('jquery'), date('Y-m'), true );
    }
    
    /*
     * Add lytebox data to links
     */ 
    public function add_lytebox_data($content){
        global $post;
        // only those <a...><img...></a>, which have not "class" property in <a tag
        /*$content = preg_replace('|<a((?:(?!class).)+?><img.*?<\/a>)|is', '<a class="lytebox" data-lyte-options="group:pageimages"'.'$1', $content);
*/
        $out = array();
        preg_match_all('|(<a.*?>)(.+?)(</a>)|is', $content, $out, PREG_SET_ORDER);

        if ( !count($out) ) return $content; 

        foreach ( $out as $o) {
            $full_match = $o[0]; // we'll need it as search-mask later
            $open_a = $o[1];
            $anchor = $o[2];
            $close_a = $o[3];

            // use lytebox only for links pointing on images
            // do not use lytebox when link ends with ? or & symbol
            if (    preg_match('|href=.*?[jpegifn]{3,4}[\'\"]|is', $open_a) 
                && !preg_match('|href=.*?[?&][\'\"]|is', $open_a) ){

                // if the link already has a class property, add new class to existing ones
                if ( preg_match('|class=|', $open_a) ){
                    $open_a = preg_replace('|class=([\'\"])(.*?)([\'\"])|is', 'class=$1$2 lytebox$3', $open_a);
                }
                // else - create it
                else{
                    $open_a = str_replace('<a', '<a class="lytebox"', $open_a);
                }

                // make all pictures-links groupped
                $open_a = str_replace('<a', '<a data-lyte-options="group:pageimages"', $open_a);

                $replacement = $open_a.$anchor.$close_a;
                $content = str_replace ( $full_match, $replacement, $content );
            }

        }

        return $content;
    }
}

