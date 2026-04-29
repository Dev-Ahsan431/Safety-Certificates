<?php
/**
 * Plugin Name:     HTML to Elementor
 * Plugin URI:      #
 * Description:     Loads Tailwind CSS (with custom config), Lucide Icons, Google Fonts, and your project's global CSS & JS. Auto-registers every Elementor widget found in the /widgets/ folder.
 * Version:         1.1.0
 * Author:          Your Name
 * Text Domain:     html-to-elementor
 * Requires Plugins: elementor
 */

if ( ! defined( 'ABSPATH' ) ) exit;

define( 'HTE_VERSION', '1.1.0' );
define( 'HTE_DIR',     plugin_dir_path( __FILE__ ) );
define( 'HTE_URL',     plugin_dir_url( __FILE__ ) );

// ─────────────────────────────────────────────────────────────────────────────
//  TAILWIND CONFIG
//  Edit this array to match your original tailwind.config = { … } object.
//  It is printed as an inline <script> before the Tailwind CDN script.
// ─────────────────────────────────────────────────────────────────────────────
define( 'HTE_TAILWIND_CONFIG', json_encode( [
    'theme' => [
        'extend' => [
            'colors' => [
                'navy'        => '#0B1F3A',
                'electric'    => '#1E90FF',
                'safety'      => '#28C76F',
                'orange'      => '#FF7A00',
                'light-grey'  => '#F8FAFC',
            ],
            'fontFamily' => [
                'sans'    => [ 'Inter', 'sans-serif' ],
                'heading' => [ 'Space Grotesk', 'sans-serif' ],
            ],
        ],
    ],
] ) );

// ─────────────────────────────────────────────────────────────────────────────
//  LIBRARY VERSIONS  (update here if you ever want a newer release)
// ─────────────────────────────────────────────────────────────────────────────
define( 'HTE_LUCIDE_VERSION',   'latest' );   // e.g. '0.395.0' to pin
define( 'HTE_TAILWIND_VERSION', 'latest' );   // CDN latest; pin if needed

/**
 * Main plugin class.
 */
final class HTML_To_Elementor {

    private static $_instance = null;

    public static function instance() {
        if ( is_null( self::$_instance ) ) {
            self::$_instance = new self();
        }
        return self::$_instance;
    }

    private function __construct() {
        add_action( 'plugins_loaded', [ $this, 'init' ] );
    }

    public function init() {

        if ( ! did_action( 'elementor/loaded' ) ) {
            add_action( 'admin_notices', [ $this, 'notice_missing_elementor' ] );
            return;
        }

        // ── Front-end ──────────────────────────────────────────────────
        add_action( 'wp_enqueue_scripts', [ $this, 'enqueue_assets' ] );

        add_filter( 'style_loader_src', function( $href, $handle ) {

            if ( strpos( $href, 'reset.css' ) !== false ) {
                return false;
            }

            return $href;

        }, 10, 2 );


        // ── Elementor editor preview iframe ───────────────────────────
        // elementor/preview/enqueue_scripts fires inside the preview iframe,
        // so ALL libraries (Tailwind, Lucide, fonts, your CSS/JS) load there too.
        add_action( 'elementor/preview/enqueue_scripts', [ $this, 'enqueue_assets' ] );

        // ── Google Fonts in the Elementor editor shell (outer page) ───
        add_action( 'elementor/editor/before_enqueue_styles', [ $this, 'enqueue_google_fonts' ] );

        // ── Widget category + auto-loader ─────────────────────────────
        add_action( 'elementor/elements/categories_registered', [ $this, 'register_category' ] );
        add_action( 'elementor/widgets/register',               [ $this, 'register_widgets' ] );
    }

    /* ------------------------------------------------------------------ */
    /*  Google Fonts                                                        */
    /*  Shared helper — called from enqueue_assets() and the editor hook.  */
    /* ------------------------------------------------------------------ */

    public function enqueue_google_fonts() {
        wp_enqueue_style(
            'hte-google-fonts',
            'https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Space+Grotesk:wght@400;500;600;700&display=swap',
            [],
            null  // no version on external URL
        );
    }

    /* ------------------------------------------------------------------ */
    /*  Main asset loader                                                   */
    /*  Runs on: front-end  +  Elementor preview iframe                    */
    /* ------------------------------------------------------------------ */

    public function enqueue_assets() {

        // ── 1. Google Fonts ─────────────────────────────────────────────
        $this->enqueue_google_fonts();

        // ── 2. Tailwind config (MUST print before the CDN script) ───────
        //    We register a dummy script just so we can attach an inline
        //    script to it. The inline script sets window.tailwind.config
        //    before the Tailwind CDN script evaluates it.
        wp_register_script( 'hte-tailwind-config', false, [], HTE_VERSION, false );
        wp_enqueue_script(  'hte-tailwind-config' );
        wp_add_inline_script(
            'hte-tailwind-config',
            'window.tailwind = window.tailwind || {}; window.tailwind.config = ' . HTE_TAILWIND_CONFIG . ';'
        );

        // ── 3. Tailwind CDN ─────────────────────────────────────────────
        //    Must load in <head> (not footer) so Tailwind can scan the DOM.
        wp_enqueue_script(
            'hte-tailwindcss',
            'https://cdn.tailwindcss.com',
            [ 'hte-tailwind-config' ],  // guarantees config is printed first
            null,                        // no version string on CDN URL
            false                        // <head> — required by Tailwind
        );

        // ── 4. Lucide Icons ─────────────────────────────────────────────
        //    Exposes a global window.lucide object.
        //    Call lucide.createIcons() in your scripts.js, or let the inline
        //    init below handle it automatically.
        wp_enqueue_script(
            'hte-lucide',
            'https://unpkg.com/lucide@' . HTE_LUCIDE_VERSION,
            [],
            null,
            true  // footer is fine for Lucide
        );

        // Auto-init Lucide on DOMContentLoaded.
        // Remove this if your scripts.js already calls lucide.createIcons().
        wp_add_inline_script(
            'hte-lucide',
            'document.addEventListener("DOMContentLoaded", function(){ if(window.lucide){ lucide.createIcons(); } });',
            'after'
        );

        // ── 5. Project CSS ───────────────────────────────────────────────
        $css_file = HTE_DIR . 'assets/css/styles.css';
        if ( file_exists( $css_file ) ) {
            wp_enqueue_style(
                'hte-style',
                HTE_URL . 'assets/css/styles.css',
                [ 'hte-google-fonts' ],
                filemtime( $css_file )
            );
        }

        // ── 6. Project JS ────────────────────────────────────────────────
        $js_file = HTE_DIR . 'assets/js/scripts.js';
        if ( file_exists( $js_file ) ) {
            wp_enqueue_script(
                'hte-script',
                HTE_URL . 'assets/js/scripts.js',
                [ 'jquery', 'hte-lucide' ],  // runs after Lucide is available
                filemtime( $js_file ),
                true
            );
        }
    }

    /* ------------------------------------------------------------------ */
    /*  Elementor widget category                                           */
    /* ------------------------------------------------------------------ */

    public function register_category( $elements_manager ) {
        $elements_manager->add_category( 'hte-widgets', [
            'title' => __( 'HTE Widgets', 'html-to-elementor' ),
            'icon'  => 'fa fa-plug',
        ] );
    }

    /* ------------------------------------------------------------------ */
    /*  Auto-discover & register widgets                                    */
    /*                                                                      */
    /*  Naming convention:                                                  */
    /*    widgets/widget-<slug>.php  →  class HTE_Widget_<Slug>            */
    /*  Examples:                                                           */
    /*    widget-hero.php            →  HTE_Widget_Hero                    */
    /*    widget-features-grid.php   →  HTE_Widget_Features_Grid           */
    /* ------------------------------------------------------------------ */

    // public function register_widgets( $widgets_manager ) {
    //     $widgets_base_dir = HTE_DIR . 'widgets/';
    //     if ( ! is_dir( $widgets_base_dir ) ) return;

    //     // Get all widget files from root /widgets/ folder
    //     $widget_files = glob( $widgets_base_dir . 'widget-*.php' );

    //     // Get all widget files from page-specific subfolders
    //     $page_folders = glob( $widgets_base_dir . '*', GLOB_ONLYDIR );
    //     foreach ( $page_folders as $folder ) {
    //         $page_widgets = glob( $folder . '/widget-*.php' );
    //         if ( $page_widgets ) {
    //             $widget_files = array_merge( $widget_files, $page_widgets );
    //         }
    //     }

    //     // Register all discovered widgets
    //     foreach ( $widget_files as $file ) {
    //         require_once $file;

    //         $slug       = basename( $file, '.php' );
    //         $without    = substr( $slug, strlen( 'widget-' ) );
    //         $class_name = 'HTE_Widget_' . str_replace(
    //             ' ', '_',
    //             ucwords( str_replace( '-', ' ', $without ) )
    //         );

    //         if ( class_exists( $class_name ) ) {
    //             $widgets_manager->register( new $class_name() );
    //         }

    //         // echo "<pre>";
    //         // var_dump('$class_name', $class_name);

    //     }

    //     // die();
        
    // }

    public function register_widgets( $widgets_manager ) {

        $widgets_base_dir = HTE_DIR . 'widgets/';

        if ( ! is_dir( $widgets_base_dir ) ) return;

        $widget_files = [];

        $iterator = new RecursiveIteratorIterator(

            new RecursiveDirectoryIterator( $widgets_base_dir )

        );

        foreach ( $iterator as $file ) {

            if ( $file->isFile() && strpos( $file->getFilename(), 'widget-' ) === 0 && $file->getExtension() === 'php' ) {

                $widget_files[] = $file->getPathname();

            };

        };

        // Register all discovered widgets
        foreach ( $widget_files as $file ) {

            require_once $file;

            $slug       = basename( $file, '.php' );
            $without    = substr( $slug, strlen( 'widget-' ) );

            $class_name = 'HTE_Widget_' . str_replace(
                ' ', '_',
                ucwords( str_replace( '-', ' ', $without ) )
            );

            if ( class_exists( $class_name ) ) {
                $widgets_manager->register( new $class_name() );
            }

            // Debug if needed
            // echo "<pre>"; var_dump($class_name);
        }
    }

    /* ------------------------------------------------------------------ */
    /*  Admin notice                                                        */
    /* ------------------------------------------------------------------ */

    public function notice_missing_elementor() {
        echo '<div class="notice notice-error"><p>';
        printf(
            __( '<strong>HTML to Elementor</strong> requires %s to be installed and activated.', 'html-to-elementor' ),
            '<a href="https://wordpress.org/plugins/elementor/" target="_blank">Elementor</a>'
        );
        echo '</p></div>';
    }
}

HTML_To_Elementor::instance();
