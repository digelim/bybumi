<?php

/**
 * The file that defines the core plugin class
 *
 * A class definition that includes attributes and functions used across both the
 * public-facing side of the site and the admin area.
 *
 * @link       https://powerfulwp.com/
 * @since      1.0.0
 *
 * @package    Aafw
 * @subpackage Aafw/includes
 */
if ( !class_exists( 'Aafw' ) ) {
    /**
     * The core plugin class.
     *
     * This is used to define internationalization, admin-specific hooks, and
     * public-facing site hooks.
     *
     * Also maintains the unique identifier of this plugin as well as the current
     * version of the plugin.
     *
     * @since      1.0.0
     * @package    Aafw
     * @subpackage Aafw/includes
     * @author     powerfulwp <apowerfulwp@gmail.com>
     */
    class Aafw
    {
        /**
         * The loader that's responsible for maintaining and registering all hooks that power
         * the plugin.
         *
         * @since    1.0.0
         * @access   protected
         * @var      Aafw_Loader    $loader    Maintains and registers all hooks for the plugin.
         */
        protected  $loader ;
        /**
         * The unique identifier of this plugin.
         *
         * @since    1.0.0
         * @access   protected
         * @var      string    $plugin_name    The string used to uniquely identify this plugin.
         */
        protected  $plugin_name ;
        /**
         * The current version of the plugin.
         *
         * @since    1.0.0
         * @access   protected
         * @var      string    $version    The current version of the plugin.
         */
        protected  $version ;
        /**
         * Define the core functionality of the plugin.
         *
         * Set the plugin name and the plugin version that can be used throughout the plugin.
         * Load the dependencies, define the locale, and set the hooks for the admin area and
         * the public-facing side of the site.
         *
         * @since    1.0.0
         */
        public function __construct()
        {
            
            if ( defined( 'AAFW_VERSION' ) ) {
                $this->version = AAFW_VERSION;
            } else {
                $this->version = '1.0.0';
            }
            
            $this->plugin_name = 'aafw';
            $this->load_dependencies();
            $this->set_locale();
            $this->define_admin_hooks();
            $this->define_public_hooks();
        }
        
        /**
         * Load the required dependencies for this plugin.
         *
         * Include the following files that make up the plugin:
         *
         * - Aafw_Loader. Orchestrates the hooks of the plugin.
         * - Aafw_I18n. Defines internationalization functionality.
         * - Aafw_Admin. Defines all hooks for the admin area.
         * - Aafw_Public. Defines all hooks for the public side of the site.
         *
         * Create an instance of the loader which will be used to register the hooks
         * with WordPress.
         *
         * @since    1.0.0
         * @access   private
         */
        private function load_dependencies()
        {
            /**
             * Plugin global functions
             */
            require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/functions.php';
            if ( !defined( 'AAFW_AUTOCOMPLETE' ) ) {
                define( 'AAFW_AUTOCOMPLETE', aafw_autocomplete() );
            }
            /**
             * The class responsible for orchestrating the actions and filters of the
             * core plugin.
             */
            require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-aafw-loader.php';
            /**
             * The class responsible for defining internationalization functionality
             * of the plugin.
             */
            require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-aafw-i18n.php';
            /**
             * The class responsible for defining all actions that occur in the admin area.
             */
            require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/class-aafw-admin.php';
            /**
             * The class responsible for defining all actions that occur in the public-facing
             * side of the site.
             */
            require_once plugin_dir_path( dirname( __FILE__ ) ) . 'public/class-aafw-public.php';
            $this->loader = new Aafw_Loader();
        }
        
        /**
         * Define the locale for this plugin for internationalization.
         *
         * Uses the Aafw_I18n class in order to set the domain and to register the hook
         * with WordPress.
         *
         * @since    1.0.0
         * @access   private
         */
        private function set_locale()
        {
            $plugin_i18n = new Aafw_I18n();
            $this->loader->add_action( 'plugins_loaded', $plugin_i18n, 'load_plugin_textdomain' );
        }
        
        /**
         * Register all of the hooks related to the admin area functionality
         * of the plugin.
         *
         * @since    1.0.0
         * @access   private
         */
        private function define_admin_hooks()
        {
            $plugin_admin = new Aafw_Admin( $this->get_plugin_name(), $this->get_version() );
            $this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin, 'enqueue_styles' );
            $this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin, 'enqueue_scripts' );
            /**
             * Add menu
             */
            $this->loader->add_action(
                'admin_menu',
                $plugin_admin,
                'admin_menu',
                99
            );
            /**
             * Settings
             */
            $this->loader->add_action( 'admin_init', $plugin_admin, 'settings_init' );
            /**
             * Plugin review
             */
            $this->loader->add_action( 'admin_init', $plugin_admin, 'plugin_review' );
            /**
             * Ajax calls
             */
            $this->loader->add_action( 'wp_ajax_aafw_ajax', $plugin_admin, 'aafw_ajax' );
            $this->loader->add_action( 'wp_ajax_nopriv_aafw_ajax', $plugin_admin, 'aafw_ajax' );
        }
        
        /**
         * Register all of the hooks related to the public-facing functionality
         * of the plugin.
         *
         * @since    1.0.0
         * @access   private
         */
        private function define_public_hooks()
        {
            $plugin_public = new Aafw_Public( $this->get_plugin_name(), $this->get_version() );
            $this->loader->add_action( 'wp_enqueue_scripts', $plugin_public, 'enqueue_styles' );
            $this->loader->add_action( 'wp_enqueue_scripts', $plugin_public, 'enqueue_scripts' );
            // Show the maps on checkout page.
            $aafw_map = get_option( 'aafw_initial_map', '' );
            
            if ( '1' === $aafw_map ) {
                $aafw_map_position = '1';
                
                if ( '2' === $aafw_map_position ) {
                } else {
                    // Show map after form.
                    $this->loader->add_action(
                        'woocommerce_after_checkout_billing_form',
                        $plugin_public,
                        'billing_map',
                        10,
                        1
                    );
                    $this->loader->add_action(
                        'woocommerce_after_checkout_shipping_form',
                        $plugin_public,
                        'shipping_map',
                        10,
                        1
                    );
                    if ( in_array( 'pickup-and-delivery-from-customer-locations-for-woocommerce-pro', AAFW_PLUGINS, true ) ) {
                        $this->loader->add_action(
                            'pdfclw_after_checkout_pickup_form',
                            $plugin_public,
                            'pickup_map',
                            10,
                            1
                        );
                    }
                }
            
            }
        
        }
        
        /**
         * Run the loader to execute all of the hooks with WordPress.
         *
         * @since    1.0.0
         */
        public function run()
        {
            $this->loader->run();
        }
        
        /**
         * The name of the plugin used to uniquely identify it within the context of
         * WordPress and to define internationalization functionality.
         *
         * @since     1.0.0
         * @return    string    The name of the plugin.
         */
        public function get_plugin_name()
        {
            return $this->plugin_name;
        }
        
        /**
         * The reference to the class that orchestrates the hooks with the plugin.
         *
         * @since     1.0.0
         * @return    Aafw_Loader    Orchestrates the hooks of the plugin.
         */
        public function get_loader()
        {
            return $this->loader;
        }
        
        /**
         * Retrieve the version number of the plugin.
         *
         * @since     1.0.0
         * @return    string    The version number of the plugin.
         */
        public function get_version()
        {
            return $this->version;
        }
    
    }
}