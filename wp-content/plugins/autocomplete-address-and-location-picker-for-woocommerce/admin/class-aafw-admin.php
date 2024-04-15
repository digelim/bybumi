<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://powerfulwp.com/
 * @since      1.0.0
 *
 * @package    Aafw
 * @subpackage Aafw/admin
 */
/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Aafw
 * @subpackage Aafw/admin
 * @author     powerfulwp <apowerfulwp@gmail.com>
 */
class Aafw_Admin
{
    /**
     * The ID of this plugin.
     *
     * @since    1.0.0
     * @access   private
     * @var      string    $plugin_name    The ID of this plugin.
     */
    private  $plugin_name ;
    /**
     * The version of this plugin.
     *
     * @since    1.0.0
     * @access   private
     * @var      string    $version    The current version of this plugin.
     */
    private  $version ;
    /**
     * Initialize the class and set its properties.
     *
     * @since    1.0.0
     * @param      string $plugin_name       The name of this plugin.
     * @param      string $version    The version of this plugin.
     */
    public function __construct( $plugin_name, $version )
    {
        $this->plugin_name = $plugin_name;
        $this->version = $version;
    }
    
    /**
     * Register the stylesheets for the admin area.
     *
     * @since    1.0.0
     */
    public function enqueue_styles()
    {
        /**
         * This function is provided for demonstration purposes only.
         *
         * An instance of this class should be passed to the run() function
         * defined in Aafw_Loader as all of the hooks are defined
         * in that particular class.
         *
         * The Aafw_Loader will then create the relationship
         * between the defined hooks and the functions defined in this
         * class.
         */
        $screen = get_current_screen();
        
        if ( 'toplevel_page_aafw-settings' === $screen->base ) {
            wp_enqueue_style(
                $this->plugin_name,
                plugin_dir_url( __FILE__ ) . 'css/aafw-admin.css',
                array(),
                $this->version,
                'all'
            );
            wp_enqueue_style(
                'aafw_chosen_css',
                plugin_dir_url( __FILE__ ) . 'css/chosen.min.css',
                array(),
                $this->version,
                'all'
            );
        }
    
    }
    
    /**
     * Register the JavaScript for the admin area.
     *
     * @since    1.0.0
     */
    public function enqueue_scripts()
    {
        /**
         * This function is provided for demonstration purposes only.
         *
         * An instance of this class should be passed to the run() function
         * defined in Aafw_Loader as all of the hooks are defined
         * in that particular class.
         *
         * The Aafw_Loader will then create the relationship
         * between the defined hooks and the functions defined in this
         * class.
         */
        wp_enqueue_script(
            $this->plugin_name,
            plugin_dir_url( __FILE__ ) . 'js/aafw-admin.js',
            array( 'jquery' ),
            $this->version,
            false
        );
        wp_localize_script( $this->plugin_name, 'aafw_ajax', array(
            'ajaxurl' => admin_url( 'admin-ajax.php' ),
        ) );
        wp_localize_script( $this->plugin_name, 'aafw_nonce', array(
            'nonce' => esc_js( wp_create_nonce( 'aafw-nonce' ) ),
        ) );
        $screen = get_current_screen();
        if ( 'toplevel_page_aafw-settings' === $screen->base ) {
            wp_enqueue_script(
                'aafw_chosen_js',
                plugin_dir_url( __FILE__ ) . 'js/chosen.jquery.min.js',
                array( 'jquery' ),
                $this->version,
                false
            );
        }
    }
    
    /**
     * Plugin submenu.
     *
     * @since 1.0.0
     * @return void
     */
    public function admin_menu()
    {
        // add menu to main menu.
        add_menu_page(
            esc_html( __( 'Autocomplete Address Settings', 'aafw' ) ),
            esc_html( __( 'Autocomplete Address', 'aafw' ) ),
            'edit_pages',
            'aafw-settings',
            array( &$this, 'settings' ),
            'dashicons-location-alt',
            56
        );
        add_submenu_page(
            'aafw-settings',
            esc_html( __( 'Settings', 'aafw' ) ),
            esc_html( __( 'Settings', 'aafw' ) ),
            'edit_pages',
            'aafw-settings',
            array( &$this, 'settings' )
        );
    }
    
    /**
     * Plugin settings.
     *
     * @since 1.0.0
     */
    public function settings()
    {
        // Default variables.
        $settings_title = esc_html( __( 'General Settings', 'aafw' ) );
        // Get the current tab from the $_GET param.
        $current_tab = ( isset( $_GET['tab'] ) ? sanitize_text_field( wp_unslash( $_GET['tab'] ) ) : '' );
        // Tabs array.
        $tabs = array( array(
            'slug'  => '',
            'label' => esc_html( __( 'General settings', 'aafw' ) ),
            'title' => esc_html( __( 'General settings', 'aafw' ) ),
            'url'   => '?page=aafw-settings',
        ) );
        foreach ( $tabs as $tab ) {
            
            if ( $current_tab === $tab['slug'] ) {
                $settings_title = $tab['title'];
                break;
            }
        
        }
        echo  aafw_admin_plugin_bar() ;
        ?>
		<div class="wrap">
		<form action='options.php' method='post'>
			<h1 class="wp-heading-inline"><?php 
        echo  esc_html( $settings_title ) ;
        ?></h1>
			<?php 
        
        if ( 1 < count( $tabs ) ) {
            ?>
							<nav class="nav-tab-wrapper">
						<?php 
            foreach ( $tabs as $tab ) {
                $url = ( '' !== $tab['slug'] ? 'admin.php?page=aafw-settings&tab=' . esc_attr( $tab['slug'] ) : 'admin.php?page=aafw-settings' );
                echo  '<a href="' . esc_html( admin_url( $url ) ) . '" class="nav-tab ' . (( $current_tab === $tab['slug'] ? 'nav-tab-active' : '' )) . '">' . esc_html( $tab['label'] ) . '</a>' ;
            }
            ?>
							</nav>
						<?php 
        }
        
        echo  '<hr class="wp-header-end">' ;
        foreach ( $tabs as $tab ) {
            
            if ( '' === $current_tab ) {
                settings_fields( 'aafw' );
                do_settings_sections( 'aafw' );
                break;
            } elseif ( $current_tab === $tab['slug'] ) {
                settings_fields( $tab['slug'] );
                do_settings_sections( $tab['slug'] );
                break;
            }
        
        }
        submit_button();
        ?>
		</form>
	</div>
		<?php 
    }
    
    /**
     * Plugin register settings.
     *
     * @since 1.0.0
     * @return void
     */
    public function settings_init()
    {
        // Get settings tab.
        $tab = ( isset( $_GET['tab'] ) ? sanitize_text_field( wp_unslash( $_GET['tab'] ) ) : '' );
        register_setting( 'aafw', 'aafw_google_api_key' );
        register_setting( 'aafw', 'aafw_shipping_autocomplete' );
        register_setting( 'aafw', 'aafw_billing_autocomplete' );
        register_setting( 'aafw', 'aafw_initial_map' );
        register_setting( 'aafw', 'aafw_address_format' );
        if ( in_array( 'pickup-and-delivery-from-customer-locations-for-woocommerce-pro', AAFW_PLUGINS, true ) ) {
            register_setting( 'aafw', 'aafw_pickup_autocomplete' );
        }
        
        if ( '' === $tab ) {
            // General Settings.
            add_settings_section(
                'aafw_setting_section',
                '',
                '',
                'aafw'
            );
            add_settings_field(
                'aafw_google_api_key',
                __( 'Google API key', 'aafw' ),
                array( $this, 'google_api_key' ),
                'aafw',
                'aafw_setting_section'
            );
            add_settings_field(
                'aafw_billing_autocomplete',
                __( 'Billing address', 'aafw' ),
                array( $this, 'aafw_billing_autocomplete' ),
                'aafw',
                'aafw_setting_section'
            );
            add_settings_field(
                'aafw_shipping_autocomplete',
                __( 'Shipping address', 'aafw' ),
                array( $this, 'aafw_shipping_autocomplete' ),
                'aafw',
                'aafw_setting_section'
            );
            if ( in_array( 'pickup-and-delivery-from-customer-locations-for-woocommerce-pro', AAFW_PLUGINS, true ) ) {
                add_settings_field(
                    'aafw_pickup_autocomplete',
                    __( 'Pickup address', 'aafw' ),
                    array( $this, 'aafw_pickup_autocomplete' ),
                    'aafw',
                    'aafw_setting_section'
                );
            }
            add_settings_field(
                'aafw_restrictions',
                __( 'Country restrictions', 'aafw' ),
                array( $this, 'aafw_restrictions' ),
                'aafw',
                'aafw_setting_section'
            );
            add_settings_field(
                'aafw_address_format',
                __( 'Address format', 'aafw' ),
                array( $this, 'aafw_address_format' ),
                'aafw',
                'aafw_setting_section'
            );
            add_settings_field(
                'aafw_initial_map',
                __( 'Map', 'aafw' ),
                array( $this, 'aafw_initial_map' ),
                'aafw',
                'aafw_setting_section'
            );
            add_settings_field(
                'aafw_map_zoom',
                __( 'Map zoom', 'aafw' ),
                array( $this, 'aafw_map_zoom' ),
                'aafw',
                'aafw_setting_section'
            );
            add_settings_field(
                'aafw_center_map',
                __( 'Center map', 'aafw' ),
                array( $this, 'aafw_center_map' ),
                'aafw',
                'aafw_setting_section'
            );
            add_settings_field(
                'aafw_map_position',
                __( 'Map position on the page', 'aafw' ),
                array( $this, 'aafw_map_position' ),
                'aafw',
                'aafw_setting_section'
            );
            add_settings_field(
                'aafw_location_picker',
                __( 'Location Picker', 'aafw' ),
                array( $this, 'aafw_location_picker' ),
                'aafw',
                'aafw_setting_section'
            );
            add_settings_field(
                'aafw_location_picker_type',
                __( 'Location Picker update options', 'aafw' ),
                array( $this, 'aafw_location_picker_type' ),
                'aafw',
                'aafw_setting_section'
            );
            add_settings_field(
                'aafw_coordinates',
                __( 'Coordinates', 'aafw' ),
                array( $this, 'aafw_coordinates' ),
                'aafw',
                'aafw_setting_section'
            );
            add_settings_field(
                'aafw_customer_location',
                __( 'Customer location', 'aafw' ),
                array( $this, 'aafw_customer_location' ),
                'aafw',
                'aafw_setting_section'
            );
        }
        
        do_action( 'aafw_settings' );
    }
    
    /**
     * Plugin settings.
     *
     * @since 1.0.0
     */
    public function google_api_key()
    {
        ?>
		<p>
			<input type='text' class='regular-text' name='aafw_google_api_key' value='<?php 
        echo  esc_attr( get_option( 'aafw_google_api_key', '' ) ) ;
        ?>'><br>
			<span class="description" id="aafw-gooogle-api-key-description">
				<?php 
        echo  esc_html( __( 'Google Key for Places API, Maps JavaScript API, Maps Embed API, Geocoding API. ( Application restrictions: HTTP referrers )', 'aafw' ) ) ;
        ?>
				<br><?php 
        echo  sprintf( esc_html( __( 'For more information on how to create the Google API key %1$sclick here%2$s.', 'aafw' ) ), '<a href="https://powerfulwp.com/docs/autocomplete-address-and-location-picker-for-woocommerce-premium/getting-started/general-settings/" target="_blank">', '</a>' ) ;
        ?>
			</span>
		</p>
		<?php 
    }
    
    /**
     * Plugin settings.
     *
     * @since 1.0.0
     */
    public function aafw_billing_autocomplete()
    {
        ?>
		<p>
			<input type='checkbox' class='regular-checkbox' name='aafw_billing_autocomplete'  <?php 
        echo  checked( '1', get_option( 'aafw_billing_autocomplete', '' ) ) ;
        ?> value='1' >
			 <?php 
        echo  esc_html( __( 'Enable autocomplete address for the billing address.', 'aafw' ) ) ;
        ?>
		</p>
		<?php 
    }
    
    /**
     * Plugin settings.
     *
     * @since 1.0.0
     */
    public function aafw_shipping_autocomplete()
    {
        ?>
		<p>
			<input type='checkbox' class='regular-checkbox' name='aafw_shipping_autocomplete' <?php 
        echo  checked( '1', get_option( 'aafw_shipping_autocomplete', '' ) ) ;
        ?> value='1'>
			<?php 
        echo  esc_html( __( 'Enable autocomplete address for the shipping address.', 'aafw' ) ) ;
        ?>
		</p>
		<?php 
    }
    
    /**
     * Plugin settings.
     *
     * @since 1.0.0
     */
    public function aafw_pickup_autocomplete()
    {
        
        if ( in_array( 'pickup-and-delivery-from-customer-locations-for-woocommerce-pro', AAFW_PLUGINS, true ) ) {
            ?>
				<p>
					<input type='checkbox' class='regular-checkbox' name='aafw_pickup_autocomplete' <?php 
            echo  checked( '1', get_option( 'aafw_pickup_autocomplete', '' ) ) ;
            ?> value='1'>
					<?php 
            echo  esc_html( __( 'Enable autocomplete address for the pickup address.', 'aafw' ) ) ;
            ?>
				</p>
			<?php 
        }
    
    }
    
    /**
     * Plugin settings.
     *
     * @since 1.0.0
     */
    public function aafw_location_picker()
    {
        $element = '';
        ?>
		<p>
			 <?php 
        echo  aafw_premium_feature( $element ) ;
        ?>
			 <?php 
        echo  esc_html( __( 'Enable location picker on the map. ( map to address )', 'aafw' ) ) ;
        ?>
		</p>
		<?php 
    }
    
    /**
     * Plugin settings.
     *
     * @since 1.0.0
     */
    public function aafw_location_picker_type()
    {
        ?>
		<p>
		   <?php 
        echo  aafw_premium_feature( '' ) ;
        ?>
		   <?php 
        echo  esc_html( __( 'Select which updates the location picker does. ( address or/and location coordinates ).', 'aafw' ) ) ;
        ?>
		</p>
		<?php 
    }
    
    /**
     * Plugin settings.
     *
     * @since 1.0.0
     */
    public function aafw_customer_location()
    {
        $element = '';
        ?>
		<p>
			<?php 
        echo  aafw_premium_feature( $element ) ;
        ?>
			<?php 
        echo  esc_html( __( 'Enable use of customer current location.', 'aafw' ) ) ;
        ?>
		</p>
		<?php 
        ?>
		<?php 
    }
    
    /**
     * Plugin settings.
     *
     * @since 1.0.0
     */
    public function aafw_coordinates()
    {
        $element = '';
        ?>
		<p>
			 <?php 
        echo  aafw_premium_feature( $element ) ;
        ?>
			 <?php 
        echo  esc_html( __( 'Enable adding latitude and longitude to order with a link to show on the map.', 'aafw' ) ) ;
        ?>
		</p>
		<?php 
    }
    
    /**
     * Plugin settings.
     *
     * @since 1.0.0
     */
    public function aafw_map_zoom()
    {
        ?>
			<p>
			  <?php 
        ?>
				<span><?php 
        echo  aafw_premium_feature( '' ) ;
        ?></span>
			</p>
		<?php 
    }
    
    /**
     * Plugin settings.
     *
     * @since 1.0.0
     */
    public function aafw_map_position()
    {
        ?>
			<p>
			  <?php 
        ?>
				<span><?php 
        echo  aafw_premium_feature( '' ) . esc_html( __( 'Choose where to show the map on the checkout page.', 'aafw' ) ) ;
        ?></span>
			</p>
		<?php 
    }
    
    /**
     * Plugin settings.
     *
     * @since 1.0.0
     */
    public function aafw_initial_map()
    {
        ?>
			<label for="aafw_initial_map">
				<input type="checkbox" class="regular-checkbox" name="aafw_initial_map" <?php 
        echo  checked( '1', get_option( 'aafw_initial_map', '' ), false ) ;
        ?> value="1">
				<?php 
        echo  esc_html( __( 'Enable map.', 'aafw' ) ) ;
        ?>
			</label>
		<?php 
    }
    
    /**
     * Plugin settings.
     *
     * @since 1.0.0
     */
    public function aafw_center_map()
    {
        ?>
			<p>
				<?php 
        ?>
				<span><?php 
        echo  aafw_premium_feature( '' ) . sprintf( __( 'Enter latitude & longitude to center the map. You can find the coordinates of a place on <a target="_blank" href="%s">Google Maps</a>.', 'aafw' ), esc_url( 'https://maps.google.com/' ) ) ;
        ?></span>
			</p>
		<?php 
    }
    
    /**
     * Plugin settings.
     */
    public function aafw_address_format()
    {
        ?>
		<p>
		<?php 
        $aafw_address_format = get_option( 'aafw_address_format', '' );
        ?>
					<select name="aafw_address_format" >
						<?php 
        echo  '<option value="1"' . esc_attr( selected( '1', $aafw_address_format, true ) ) . '>' . esc_html( esc_attr( __( 'Number + street name', 'aafw' ) ) ) . '</option>' ;
        echo  '<option value="2"' . esc_attr( selected( '2', $aafw_address_format, true ) ) . '>' . esc_html( esc_attr( __( 'Street name + number', 'aafw' ) ) ) . '</option>' ;
        ?>
					</select>
				<br>
		</p>
		<?php 
    }
    
    /**
     * Plugin settings.
     *
     * @since 1.0.0
     */
    public function aafw_restrictions()
    {
        ?>
		<p>
		<?php 
        ?>
			 <span><?php 
        echo  aafw_premium_feature( '' ) . esc_html( __( 'Choose countries to limit the autocomplete search results, you can choose up to 5 countries.', 'aafw' ) ) ;
        ?></span>
		</p>
		<?php 
    }
    
    /**
     * Plugin review.
     */
    public function plugin_review()
    {
        // Get activation date.
        $aafw_activation_date = get_option( 'aafw_activation_date', '' );
        
        if ( '' === $aafw_activation_date ) {
            // Set activation date.
            $aafw_activation_date = date_i18n( 'Y-m-d H:i:s' );
            update_option( 'aafw_activation_date', $aafw_activation_date );
        }
        
        // Get review user action.
        $aafw_review_action = get_option( 'aafw_review_action', '' );
        
        if ( '' === $aafw_review_action ) {
            $date = strtotime( '+7 days' );
            if ( $date < strtotime( $aafw_activation_date ) ) {
                add_action( 'admin_notices', array( $this, 'plugin_review_notice' ) );
            }
        }
    
    }
    
    /**
     * Plugin review notice.
     */
    public function plugin_review_notice()
    {
        $plugin_name = 'Autocomplete Address and Location Picker for WooCommerce';
        $plugin_link = 'https://wordpress.org/plugins/autocomplete-address-and-location-picker-for-woocommerce/';
        $plugin_review_link = 'https://wordpress.org/support/plugin/autocomplete-address-and-location-picker-for-woocommerce/reviews/?filter=5#new-post';
        ?>
			<div id="aafw_review_notice" class = "notice notice-success is-dismissible">
				<p>
					<?php 
        echo  sprintf( esc_html( __( 'Awesome, you\'ve been using %s Plugin for a while. Could you please do us a BIG favor and give it a 5-star rating on WordPress? Just to help us spread the word and boost our motivation.', 'aafw' ) ), '<a target="_blank" href="' . esc_attr( $plugin_link ) . '">' . $plugin_name . '</a>' ) ;
        ?>
				</p>
				<p>
					<a target="_blank" class="button is-primary aafw_action" data="ok-rate" href="<?php 
        echo  esc_attr( $plugin_review_link ) ;
        ?>"><?php 
        echo  esc_html( __( 'Ok, you deserve it', 'aafw' ) ) ;
        ?></a>
					&nbsp; &nbsp;
					<a target="_blank" data="already-did" class="aafw_action" href="#"><?php 
        echo  esc_html( __( 'I already did', 'aafw' ) ) ;
        ?></a>
					&nbsp; &nbsp;
					<a target="_blank" data="not-good" class="aafw_action" href="#"><?php 
        echo  esc_html( __( 'No, not good enough', 'aafw' ) ) ;
        ?></a>
				</p>
			</div>
		<?php 
    }
    
    /**
     * The function that handles ajax requests.
     *
     * @since 1.0.0
     * @return void
     */
    public function aafw_ajax()
    {
        $aafw_service = ( isset( $_POST['aafw_service'] ) ? sanitize_text_field( wp_unslash( $_POST['aafw_service'] ) ) : '' );
        $aafw_value = ( isset( $_POST['aafw_value'] ) ? sanitize_text_field( wp_unslash( $_POST['aafw_value'] ) ) : '' );
        /**
         * Security check.
         */
        
        if ( isset( $_POST['aafw_wpnonce'] ) ) {
            $nonce = sanitize_text_field( wp_unslash( $_POST['aafw_wpnonce'] ) );
            if ( !wp_verify_nonce( $nonce, 'aafw-nonce' ) ) {
                exit;
            }
        }
        
        // Review action.
        if ( 'aafw_review_action' === $aafw_service ) {
            update_option( 'aafw_review_action', $aafw_value );
        }
    }

}