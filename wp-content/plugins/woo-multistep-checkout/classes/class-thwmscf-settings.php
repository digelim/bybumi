<?php
if(!defined('ABSPATH')){ exit; }

if(!class_exists('THWMSCF_Settings')):

class THWMSCF_Settings {
	const WMSC_SETTINGS = 'THWMSC_SETTINGS';
	protected static $_instance = null;	
	private $tabs = '';
	private $settings = '';
	
	private $cell_props = array();
	private $cell_props_L = array();
	private $cell_props_R = array();
	private $cell_props_CB = array(); 

	public function __construct(){
		$this->tabs = array( 'msc_settings' => 'Multistep Checkout', 'premium_features' => 'Premium features');
		
		$this->cell_props = array( 
			'label_cell_props' => 'style="width: 23%;" class="titledesc" scope="row"', 
			'input_cell_props' => 'class="forminp"', 
			'input_width' => '250px', 'label_cell_th' => true 
		);
		$this->cell_props_L = array( 
			'label_cell_props' => 'style="width: 23%;" class="titledesc" scope="row"', 
			'input_cell_props' => 'style="width: 25%;" class="forminp"', 
			'input_width' => '250px', 'label_cell_th' => true 
		);
		$this->cell_props_R = array( 
			'label_cell_props' => 'style="width: 15%;" class="titledesc" scope="row"', 
			'input_cell_props' => 'style="width: 30%;" class="forminp" ', 
			'input_width' => '250px', 'label_cell_th' => true 
		);
		//$this->cell_props_R = array( 'label_cell_width' => '13%', 'input_cell_width' => '34%', 'input_width' => '250px' );
		$this->cell_props_CB = array( 'cell_props' => 'colspan="3"' );

		$this->settings = $this->get_settings();

		add_action('admin_head', array( $this, 'review_banner_custom_css') );

		add_action( 'admin_init', array( $this, 'thwmsc_notice_actions' ), 20 );
		add_action( 'admin_notices', array($this, 'output_review_request_link'));

		add_action('admin_enqueue_scripts', array($this, 'enqueue_admin_scripts'));
		add_action('admin_menu', array($this, 'admin_menu'));
		add_filter('woocommerce_screen_ids', array($this, 'add_screen_id'));

		add_filter('plugin_action_links_'.THWMSCF_BASE_NAME, array($this, 'add_settings_link'));
		add_action('thwmscf_woocommerce_checkout_review_order', 'woocommerce_order_review');

		add_action('thwmscf_woocommerce_before_checkout_form', array($this, 'hide_checkout_coupon_form'), 10);
		add_action('thwmscf_woocommerce_review_order_before_payment', array($this, 'woocommerce_checkout_coupon_form_custom'));

		add_filter('thwmscf_steps_front_end', array($this, 'thwmsc_make_order_review_on_right'), 10);
		add_action('thwmscf_multi_step_tab_panels', array($this, 'add_review_order_on_right_side'), 25);

		add_action('admin_footer', array($this, 'admin_notice_js_snippet'), 9999);
		add_action('wp_ajax_hide_thwmscf_admin_notice', array($this, 'hide_thwmscf_admin_notice'));

		add_action('admin_footer-plugins.php', array($this, 'thwmscf_deactivation_form'));
        add_action('wp_ajax_thwmscf_deactivation_reason', array($this, 'thwmscf_deactivation_reason'));
		
		$this->init();
	}

	public static function instance(){
		if(is_null(self::$_instance)){
			self::$_instance = new self();
		}
		return self::$_instance;
	}

	/**
	 * menu function.
	 */
	public function admin_menu() {	
		$this->screen_id = add_submenu_page('woocommerce', __('Woo Multistep Checkout', 'woo-multistep-checkout'), __('Multistep Checkout', 'woo-multistep-checkout'), 
		'manage_woocommerce', 'woo_multistep_checkout', array($this, 'multistep_checkout'));

	}	
	
	public function add_settings_link($links) {
		$settings_link = '<a href="'. esc_url(admin_url('admin.php?page=woo_multistep_checkout')) .'">'. __('Settings') .'</a>';
		array_unshift($links, $settings_link);
        $pro_link = '<a style="color:green; font-weight:bold" target="_blank" href="https://www.themehigh.com/product/woocommerce-multi-step-checkout/?utm_source=free&utm_medium=plugin_action_link&utm_campaign=wmsc_upgrade_link">'. __('Get Pro', 'woo-multistep-checkout') .'</a>';
        array_push($links,$pro_link);

		if (array_key_exists('deactivate', $links)) {
            $links['deactivate'] = str_replace('<a', '<a class="thwmscf-deactivate-link"', $links['deactivate']);
        }

		return $links;
	}

	function enqueue_admin_scripts($hook) {
		if(strpos($hook, 'page_woo_multistep_checkout') === false) {
			return;
		}

		wp_enqueue_style('woocommerce_admin_styles');		
		wp_enqueue_style('thwmscf-admin-style', plugins_url('/assets/css/thwmscf-admin.css', dirname(__FILE__)), THWMSCF_VERSION);  
		wp_enqueue_script('thwmscf-admin-js', THWMSCF_ASSETS_URL.'js/thwmscf-admin.js',array('jquery','wp-color-picker'), THWMSCF_VERSION, true);
	}

	/**
	 * add_screen_id function.
	 */
	function add_screen_id($ids){
		$ids[] = 'woocommerce_multistep_checkout';
		$ids[] = strtolower(__('WooCommerce', 'woo-multistep-checkout')) .'_multistep_checkout';

		return $ids;
	}

	function multistep_checkout() { 		
		$this->wmsc_design();
	}

	public function get_settings(){		
		$settings_default = array(
			'enable_wmsc' 			=> __('yes','woo-multistep-checkout'),
			'title_login' 			=> __('Login','woo-multistep-checkout'),
			'title_billing' 		=> __('Billing details','woo-multistep-checkout'),
			'title_shipping' 		=> __('Shipping details','woo-multistep-checkout'),
			'title_order_review' 	=> __('Order review','woo-multistep-checkout'),
			'title_confirm_order' 	=> __('Payment','woo-multistep-checkout'),
			'step_bg_color'   		=> '#F4F4F4',
			'step_text_color'		=> '#8B8B8B',
			'step_bg_color_active'  => get_option('color', '#561F18'),
			'step_text_color_active'=> '#FFFFFF',
			'tab_panel_bg_color' 	=> '#FFFFFF',
		);
		$saved_settings = $this->get_wmsc_settings();
		
		$settings = !empty($saved_settings) ? $saved_settings : $settings_default ;
		return apply_filters('thwmcf_plugin_settings', $settings);

	}

    public function thwmscf_deactivation_form(){
        $is_snooze_time = get_user_meta( get_current_user_id(), 'thwmscf_deactivation_snooze', true );
        $now = time();

        if($is_snooze_time && ($now < $is_snooze_time)){
            return;
        }

        $deactivation_reasons = $this->get_deactivation_reasons();
        ?>
        <div id="thwmscf_deactivation_form" class="thpladmin-modal-mask">
            <div class="thpladmin-modal">
                <div class="modal-container">
                    <div class="modal-content">
                        <div class="modal-body">
                            <div class="model-header">
                                <img class="th-logo" src="<?php echo esc_url(THWMSCF_URL .'assets/images/themehigh.svg'); ?>" alt="themehigh-logo">
                                <span><?php echo __('Quick Feedback', 'woo-multistep-checkout'); ?></span>
                            </div>

                            <!-- <div class="get-support-version-b">
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,</p>
                                <a class="thwmscf-link thwmscf-right-link thwmscf-active" target="_blank" href="https://help.themehigh.com/hc/en-us/requests/new"><?php echo __('Get Support', 'woo-multistep-checkout'); ?></a>
                            </div> -->

                            <main class="form-container main-full">
                                <p class="thwmscf-title-text"><?php echo __('If you have a moment, please let us know why you want to deactivate this plugin', 'woo-multistep-checkout'); ?></p>
                                <ul class="deactivation-reason" data-nonce="<?php echo wp_create_nonce('thwmscf_deactivate_nonce'); ?>">
                                    <?php 
                                    if($deactivation_reasons){
                                        foreach($deactivation_reasons as $key => $reason){
                                            $reason_type = isset($reason['reason_type']) ? $reason['reason_type'] : '';
                                            $reason_placeholder = isset($reason['reason_placeholder']) ? $reason['reason_placeholder'] : '';
                                            ?>
                                            <li data-type="<?php echo esc_attr($reason_type); ?>" data-placeholder="<?php echo esc_attr($reason_placeholder); ?> ">
                                                <label>
                                                    <input type="radio" name="selected-reason" value="<?php echo esc_attr($key); ?>">
                                                    <span><?php echo esc_html($reason['radio_label']); ?></span>
                                                </label>
                                            </li>
                                            <?php
                                        }
                                    }
                                    ?>
                                </ul>
                                <p class="thwmscf-privacy-cnt"><?php echo __('This form is only for getting your valuable feedback. We do not collect your personal data. To know more read our ', 'woo-multistep-checkout'); ?> <a class="thwmscf-privacy-link" target="_blank" href="<?php echo esc_url('https://www.themehigh.com/privacy-policy/');?>"><?php echo __('Privacy Policy', 'woo-multistep-checkout'); ?></a></p>
                            </main>
                            <footer class="modal-footer">
                                <div class="thwmscf-left">
                                    <a class="thwmscf-link thwmscf-left-link thwmscf-deactivate" href="#"><?php echo __('Skip & Deactivate', 'woo-multistep-checkout'); ?></a>
                                </div>
                                <div class="thwmscf-right">
                                    <a class="thwmscf-link thwmscf-right-link thwmscf-active" target="_blank" href="https://help.themehigh.com/hc/en-us/requests/new"><?php echo __('Get Support', 'woo-multistep-checkout'); ?></a>
                                    <a class="thwmscf-link thwmscf-right-link thwmscf-active thwmscf-submit-deactivate" href="#"><?php echo __('Submit and Deactivate', 'woo-multistep-checkout'); ?></a>
                                    <a class="thwmscf-link thwmscf-right-link thwmscf-close" href="#"><?php echo __('Cancel', 'woo-multistep-checkout'); ?></a>
                                </div>
                            </footer>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <style type="text/css">
            .th-logo{
                margin-right: 10px;
            }
            .thpladmin-modal-mask{
                position: fixed;
                background-color: rgba(17,30,60,0.6);
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                z-index: 9999;
                overflow: scroll;
                transition: opacity 250ms ease-in-out;
            }
            .thpladmin-modal-mask{
                display: none;
            }
            .thpladmin-modal .modal-container{
                position: absolute;
                background: #fff;
                border-radius: 2px;
                overflow: hidden;
                left: 50%;
                top: 50%;
                transform: translate(-50%,-50%);
                width: 50%;
                max-width: 960px;
                /*min-height: 560px;*/
                /*height: 80vh;*/
                /*max-height: 640px;*/
                animation: appear-down 250ms ease-in-out;
                border-radius: 15px;
            }
            .model-header {
                padding: 21px;
            }
            .thpladmin-modal .model-header span {
                font-size: 18px;
                font-weight: bold;
            }
            .thpladmin-modal .model-header {
                padding: 21px;
                background: #ECECEC;
            }
            .thpladmin-modal .form-container {
                margin-left: 23px;
                clear: both;
            }
            .thpladmin-modal .deactivation-reason input {
                margin-right: 13px;
            }
            .thpladmin-modal .thwmscf-privacy-cnt {
                color: #919191;
                font-size: 12px;
                margin-bottom: 31px;
                margin-top: 18px;
                max-width: 75%;
            }
            .thpladmin-modal .deactivation-reason li {
                margin-bottom: 17px;
            }
            .thpladmin-modal .modal-footer {
                padding: 20px;
                border-top: 1px solid #E7E7E7;
                float: left;
                width: 100%;
                box-sizing: border-box;
            }
            .thwmscf-left {
                float: left;
            }
            .thwmscf-right {
                float: right;
            }
            .thwmscf-link {
                line-height: 31px;
                font-size: 12px;
            }
            .thwmscf-left-link {
                font-style: italic;
            }
            .thwmscf-right-link {
                padding: 0px 20px;
                border: 1px solid;
                display: inline-block;
                text-decoration: none;
                border-radius: 5px;
            }
            .thwmscf-right-link.thwmscf-active {
                background: #0773AC;
                color: #fff;
            }
            .thwmscf-title-text {
                color: #2F2F2F;
                font-weight: 500;
                font-size: 15px;
            }
            .reason-input {
                margin-left: 31px;
                margin-top: 11px;
                width: 70%;
            }
            .reason-input input {
                width: 100%;
                height: 40px;
            }
            .reason-input textarea {
                width: 100%;
                min-height: 80px;
            }
            input.th-snooze-checkbox {
                width: 15px;
                height: 15px;
            }
            input.th-snooze-checkbox:checked:before {
                width: 1.2rem;
                height: 1.2rem;
            }
            .th-snooze-select {
                margin-left: 20px;
                width: 172px;
            }

            /* Version B */
            .get-support-version-b {
                width: 100%;
                padding-left: 23px;
                clear: both;
                float: left;
                box-sizing: border-box;
                background: #0673ab;
                color: #fff;
                margin-bottom: 20px;
            }
            .get-support-version-b p {
                font-size: 12px;
                line-height: 17px;
                width: 70%;
                display: inline-block;
                margin: 0px;
                padding: 15px 0px;
            }
            .get-support-version-b .thwmscf-right-link {
                background-image: url(<?php echo esc_url(THWMSCF_URL .'assets/css/get_support_icon.svg'); ?>);
                background-repeat: no-repeat;
                background-position: 11px 10px;
                padding-left: 31px;
                color: #0773AC;
                background-color: #fff;
                float: right;
                margin-top: 17px;
                margin-right: 20px;
            }
            .thwmscf-privacy-link {
                font-style: italic;
            }
        </style>

        <script type="text/javascript">
            (function($){
                var popup = $("#thwmscf_deactivation_form");
                var deactivation_link = '';

                $('.thwmscf-deactivate-link').on('click', function(e){
                    e.preventDefault();
                    deactivation_link = $(this).attr('href');
                    popup.css("display", "block");
                    popup.find('a.thwmscf-deactivate').attr('href', deactivation_link);
                });

                popup.on('click', 'input[type="radio"]', function () {
                    var parent = $(this).parents('li:first');
                    popup.find('.reason-input').remove();

                    var type = parent.data('type');
                    var placeholder = parent.data('placeholder');

                    var reason_input = '';
                    if('text' == type){
                        reason_input += '<div class="reason-input">';
                        reason_input += '<input type="text" placeholder="'+ placeholder +'">';
                        reason_input += '</div>';
                    }else if('textarea' == type){
                        reason_input += '<div class="reason-input">';
                        reason_input += '<textarea row="5" placeholder="'+ placeholder +'">';
                        reason_input += '</textarea>';
                        reason_input += '</div>';
                    }else if('checkbox' == type){
                        reason_input += '<div class="reason-input ">';
                        reason_input += '<input type="checkbox" id="th-snooze" name="th-snooze" class="th-snooze-checkbox">';
                        reason_input += '<label for="th-snooze">Snooze this panel while troubleshooting</label>';
                        reason_input += '<select name="th-snooze-time" class="th-snooze-select" disabled>';
                        reason_input += '<option value="<?php echo HOUR_IN_SECONDS ?>">1 Hour</option>';
                        reason_input += '<option value="<?php echo 12*HOUR_IN_SECONDS ?>">12 Hour</option>';
                        reason_input += '<option value="<?php echo DAY_IN_SECONDS ?>">24 Hour</option>';
                        reason_input += '<option value="<?php echo WEEK_IN_SECONDS ?>">1 Week</option>';
                        reason_input += '<option value="<?php echo MONTH_IN_SECONDS ?>">1 Month</option>';
                        reason_input += '</select>';
                        reason_input += '</div>';
                    }else if('reviewlink' == type){
                    	reason_input += '<div class="reason-input wmsc-review-link">';
                    	/*
                    	reason_input += '<?php _e('Deactivate and ', 'woo-multistep-checkout');?>'
                    	reason_input += '<a href="#" target="_blank" class="thwmsc-review-and-deactivate">';
                    	reason_input += '<?php _e('leave a review', 'woo-multistep-checkout'); ?>';
                    	reason_input += '<span class="wmscf-rating-link"> &#9733;&#9733;&#9733;&#9733;&#9733; </span>';
                    	reason_input += '</a>';
                    	*/
                    	reason_input += '<input type="hidden" value="<?php _e('Upgraded', 'woo-multistep-checkout');?>">';
                    	reason_input += '</div>';
                    }

                    if(reason_input !== ''){
                        parent.append($(reason_input));
                    }
                });

                popup.on('click', '.thwmscf-close', function () {
                    popup.css("display", "none");
                });

                popup.on('click', '.thwmscf-submit-deactivate', function (e) {
                    e.preventDefault();
                    var button = $(this);
                    if (button.hasClass('disabled')) {
                        return;
                    }
                    var radio = $('.deactivation-reason input[type="radio"]:checked');
                    var parent_li = radio.parents('li:first');
                    var parent_ul = radio.parents('ul:first');
                    var input = parent_li.find('textarea, input[type="text"], input[type="hidden"]');
                    var wmscf_deacive_nonce = parent_ul.data('nonce');

                    $.ajax({
                        url: ajaxurl,
                        type: 'POST',
                        data: {
                            action: 'thwmscf_deactivation_reason',
                            reason: (0 === radio.length) ? 'none' : radio.val(),
                            comments: (0 !== input.length) ? input.val().trim() : '',
                            security: wmscf_deacive_nonce,
                        },
                        beforeSend: function () {
                            button.addClass('disabled');
                            button.text('Processing...');
                        },
                        complete: function () {
                            window.location.href = deactivation_link;
                        }
                    });
                });

                popup.on('click', '#th-snooze', function () {
                    if($(this).is(':checked')){
                        popup.find('.th-snooze-select').prop("disabled", false);
                    }else{
                        popup.find('.th-snooze-select').prop("disabled", true);
                    }
                });

            }(jQuery))
        </script>

        <?php 
    }

    private function get_deactivation_reasons(){
        return array(
        	'upgraded_to_pro' => array(
				'radio_val'          => 'upgraded_to_pro',
				'radio_label'        => __('Upgraded to premium.', 'woo-multistep-checkout'),
				'reason_type'        => 'reviewlink',
				'reason_placeholder' => '',
			),

            'found_better_plugin' => array(
                'radio_val'          => 'found_better_plugin',
                'radio_label'        => __('I found a better Plugin', 'woo-multistep-checkout'),
                'reason_type'        => 'text',
                'reason_placeholder' => __('Could you please mention the plugin?', 'woo-multistep-checkout'),
            ),

            'hard_to_use' => array(
                'radio_val'          => 'hard_to_use',
                'radio_label'        => __('It was hard to use', 'woo-multistep-checkout'),
                'reason_type'        => 'text',
                'reason_placeholder' => __('How can we improve your experience?', 'woo-multistep-checkout'),
            ),

            'feature_missing'=> array(
                'radio_val'          => 'feature_missing',
                'radio_label'        => __('A specific feature is missing', 'woo-multistep-checkout'),
                'reason_type'        => 'text',
                'reason_placeholder' => __('Type in the feature', 'woo-multistep-checkout'),
            ),

            'not_working_as_expected'=> array(
                'radio_val'          => 'not_working_as_expected',
                'radio_label'        => __('The plugin didn’t work as expected', 'woo-multistep-checkout'),
                'reason_type'        => 'text',
                'reason_placeholder' => __('Specify the issue', 'woo-multistep-checkout'),
            ),

            'temporary' => array(
                'radio_val'          => 'temporary',
                'radio_label'        => __('It’s a temporary deactivation - I’m troubleshooting an issue', 'woo-multistep-checkout'),
                'reason_type'        => 'checkbox',
                'reason_placeholder' => __('Could you please mention the plugin?', 'woo-multistep-checkout'),
            ),

            'other' => array(
                'radio_val'          => 'other',
                'radio_label'        => __('Not mentioned here', 'woo-multistep-checkout'),
                'reason_type'        => 'textarea',
                'reason_placeholder' => __('Kindly tell us your reason, so that we can improve', 'woo-multistep-checkout'),
            ),
        );
    }

    public function thwmscf_deactivation_reason(){
        global $wpdb;

        check_ajax_referer('thwmscf_deactivate_nonce', 'security');

        if(!isset($_POST['reason'])){
            return;
        }

        if($_POST['reason'] === 'temporary'){

            $snooze_period = isset($_POST['th-snooze-time']) && $_POST['th-snooze-time'] ? $_POST['th-snooze-time'] : MINUTE_IN_SECONDS ;
            $time_now = time();
            $snooze_time = $time_now + $snooze_period;

            update_user_meta(get_current_user_id(), 'thwmscf_deactivation_snooze', $snooze_time);

            return;
        }
        
        $data = array(
            'plugin'        => 'wmsc',
            'reason'        => sanitize_text_field($_POST['reason']),
            'comments'      => isset($_POST['comments']) ? sanitize_textarea_field(wp_unslash($_POST['comments'])) : '',
            'date'          => gmdate("M d, Y h:i:s A"),
            'software'      => $_SERVER['SERVER_SOFTWARE'],
            'php_version'   => phpversion(),
            'mysql_version' => $wpdb->db_version(),
            'wp_version'    => get_bloginfo('version'),
            'wc_version'    => (!defined('WC_VERSION')) ? '' : WC_VERSION,
            'locale'        => get_locale(),
            'multisite'     => is_multisite() ? 'Yes' : 'No',
            'plugin_version'=> THWMSCF_VERSION
        );

        $response = wp_remote_post('https://feedback.themehigh.in/api/add_feedbacks', array(
            'method'      => 'POST',
            'timeout'     => 45,
            'redirection' => 5,
            'httpversion' => '1.0',
            'blocking'    => false,
            'headers'     => array( 'Content-Type' => 'application/json' ),
            'body'        => json_encode($data),
            'cookies'     => array()
                )
        );

        wp_send_json_success();
    }

    public function review_banner_custom_css(){

        ?>
        <style>
        	.thwmsc-notice .logo {
			    float: right;
			}
			.thwmsc-notice .logo img {
			    height: 18px;
			    margin-top: 12px;
			}
			.thwmsc-review-wrapper {
			    padding: 0px 28px 21px 0px !important;
			    margin-top: 35px;
                background: linear-gradient(92.32deg, #6E55FF 37.32%, #845DE2 101.65%);
                border: none;
                border-radius: 10px
			}
			.thwmsc-review-image {
			    float: left;
                position: relative;
                left: -1px;
			}
			.thwmsc-review-content p {
                color: #ffffff;
                line-height: 21.5px;
			}
            .thwmsc-review-content-text {
                padding-bottom: 14px !important;
                font-style: italic;
            }
            .thwmsc-review-content h3 {
                color: #ffffff;
                padding-top: 19px;
                margin: 0px;
            }
			.thwmsc-review-content {
			    padding-right: 5px;
                padding-left: 160px;
			}
            .thwmsc-review-wrapper .notice-dismiss::before {
                color: #ffffff;
                font-size: 19px;
            }
			.thwmsc-notice-action{ 
			    padding: 8px 18px 8px 18px;
			    background: #6A43E6;
			    color: #ffffff;
			    border-radius: 2px;
			    border: none;
			}
			.thwmsc-notice-action.thwmsc-yes {
			    background-color: #ffffff;
			    color: #5647BE;
			}
			.thwmsc-notice-action.thwmsc-yes:hover {
			    background: #393176;
                color: #ffffff;
			}
            .thwmsc-notice-action:hover {
                color: #ffffff;
                background: #5630CC;
            }
			.thwmsc-notice-action .dashicons{
			    display: none;
			}
			.thwmsc-themehigh-logo {
                position: absolute;
                background: white;
                padding: 8px 20px 6px 20px;
                right: 0px;
                border-radius: 15px 0px 10px 0px;
                top: calc(100% - 35px);
			}
            .thwmsc-review-star {
                position: absolute;
                padding: 3px;
                right: 152px;
                top: calc(100% - 35px);
            }
            .thwmsc-review-image img {
                height: 149px;
            }
            @media only screen and (max-width: 1436px) {
                .thwmsc-review-image img {
                    height: 171px;
                }
            }
            .thwmsc-notice button.notice-dismiss {
                right: 10px;
                top: 10px;
            }
        </style>
        <?php    
    }



	public function get_tabs(){
		return $this->tabs; 
	}

	function get_current_tab(){
		return isset( $_GET['tab'] ) ? sanitize_key( $_GET['tab'] ) : 'msc_settings';
	}

	public function get_settings_fields(){
		$tab_postion = array(
			'align-left' 	=> __('Left','woo-multistep-checkout'),
			'align-center' 	=> __('Center','woo-multistep-checkout')
		);

		$layout_options = array(			
			'thwmscf_horizontal_box' => array('name' => __('Horizontal Box Layout', 'woo-multistep-checkout'), 'layout_image' => 'horizontal_box.svg'),
			'thwmscf_time_line_step' 	 => array('name' => __('Time Line Layout', 'woo-multistep-checkout'), 'layout_image' => 'timeline.svg'),
            'thwmscf_vertical_box'   => array('name' => __('Vertical Box Layout', 'woo-multistep-checkout'), 'layout_image' => 'vertical_box.svg'),
			'thwmscf_accordion_step' 	 => array('name' => __('Accordion Layout', 'woo-multistep-checkout'), 'layout_image' => 'accordion.svg'),
		);

		$layout_field = array(
			'enable_wmsc' => array(
				'name'=>'enable_wmsc', 'label'=>__('Activate Multi-Step', 'woo-multistep-checkout'), 'type'=>'checkbox', 'value'=>'yes', 'checked'=>1	
			),	
            'title_display_general_sttng' => array('title'=>__('General Settings', 'woo-multistep-checkout'), 'type'=>'separator', 'colspan'=>'6'),
			'title_display_texts' => array('title'=>__('Step Display Texts', 'woo-multistep-checkout'), 'type'=>'separator', 'colspan'=>'6'),
			'enable_login_step' => array(
				'name'=>'enable_login_step', 'label'=>__('Display Login Step', 'woo-multistep-checkout'), 'type'=>'checkbox', 'value'=>'yes', 'checked'=>1, 'hint_text'=>"Enable 'Allow customers to log into an existing account during checkout' under woocommerce Accounts & Privacy settings tab.", 'onchange'=>'thwmscfDisplayLogin(this)',
			),
			'enable_step_validation' => array(
				'name'=>'enable_step_validation', 'label'=>__('Activate Step Validation', 'woo-multistep-checkout'), 'type'=>'checkbox', 'value'=>'yes', 'checked'=>1
			),
			'coupon_form_above_payment' => array(
				'name'=>'coupon_form_above_payment', 'label'=>__('Show Coupon form above Payment', 'woo-multistep-checkout'), 'type'=>'checkbox', 'value'=>'yes', 'checked'=>0,
			),
			
			'make_billing_shipping_together' => array(
				'name'=>'make_billing_shipping_together', 'label'=>__('Combine Billing Step and Shipping Step', 'woo-multistep-checkout'), 'type'=>'checkbox', 'value'=>'yes', 'checked'=>1, 'onchange'=>'thwmscfShippingTitle(this)'
			),
			'make_order_review_separate' => array(
				'name'=>'make_order_review_separate', 'label'=>__('Show Order Review and Payment in Separate Steps', 'woo-multistep-checkout'), 'type'=>'checkbox', 'value'=>'yes', 'checked'=>0, 'onchange'=>'thwmscfOrderReview(this)'
			),
			'show_order_review_right' => array(
				'name'=>'show_order_review_right', 'label'=>__('Show Order Review and Payment on Right side', 'woo-multistep-checkout'), 'type'=>'checkbox', 'value'=>'yes', 'checked'=>0
			),
			'title_login' => array(
				'name'=>'title_login', 'label'=>__('Login', 'woo-multistep-checkout'), 'type'=>'text', 'value'=>'Login', 'post_sanitize'=>1,
			),
			'title_billing' => array(
				'name'=>'title_billing', 'label'=>__('Billing Details', 'woo-multistep-checkout'), 'type'=>'text', 'value'=>'Billing details', 'post_sanitize'=>1,
			),
			'title_shipping' => array(
				'name'=>'title_shipping', 'label'=>__('Shipping Details', 'woo-multistep-checkout'), 'type'=>'text', 'value'=>'Shipping details', 'post_sanitize'=>1,
			),
			'title_order_review' => array(
				'name'=>'title_order_review', 'label'=>__('Order Review', 'woo-multistep-checkout'), 'type'=>'text', 'value'=>'Order review', 'post_sanitize'=>1,
			),
			'title_confirm_order' => array(
				'name'=>'title_confirm_order', 'label'=>__('Payment', 'woo-multistep-checkout'), 'type'=>'text', 'value'=>'Payment', 'post_sanitize'=>1,
			),
			'title_layouts' => array('title'=>__('Layouts', 'woo-multistep-checkout'), 'type'=>'separator', 'colspan'=>'6'),
			'tab_align' => array(  
				'name'=>'tab_align', 'label'=>__('Tab Position', 'woo-multistep-checkout'), 'type'=>'select', 'value'=>'center', 'hint_text'=>'For the vertical layout, this will be treated as text alignment.', 'options'=> $tab_postion										
			),
			'tab_panel_bg_color' => array( 
				'name'=>'tab_panel_bg_color', 'label'=>__('Content Background Color', 'woo-multistep-checkout'), 'type'=>'colorpicker', 'value'=>'#FFFFFF'
			),
			'step_bg_color' => array( 
				'name'=>'step_bg_color', 'label'=>__('Step Background Color', 'woo-multistep-checkout'), 'type'=>'colorpicker', 'value'=>'#F4F4F4'
			),  
			'step_text_color' => array(
				'name'=>'step_text_color', 'label'=>__('Step Text Color', 'woo-multistep-checkout'), 'type'=>'colorpicker', 'value'=>'#8B8B8B'
			),
			'step_bg_color_active' => array(       
				'name'=>'step_bg_color_active', 'label'=>__('Step Background Color - Active', 'woo-multistep-checkout'), 'type'=>'colorpicker', 'value'=>get_option('color', '#561F18') 
			),
			'step_text_color_active' => array(    
				'name'=>'step_text_color_active', 'label'=>__('Step Text Color - Active', 'woo-multistep-checkout'), 'type'=>'colorpicker', 'value'=>'#FFFFFF'
			),

			'thwmscf_layout' => array( 
				'name'=>'thwmscf_layout', 'label'=>__('Multistep Layout', 'woo-multistep-checkout'), 'type'=>'radio', 'value'=>'thwmscf_time_line_step', 'options'=> $layout_options, 'onchange'=>'thwmscLayoutChange(this)',
			),
			'next_previuos_button' => array('title'=>__('Button Settings', 'woo-multistep-checkout'), 'type'=>'separator', 'colspan'=>'6'),
			'button_prev_text' => array(
				'name'=>'button_prev_text', 'label'=>__('Previous Button Text', 'woo-multistep-checkout'), 'type'=>'text', 'value'=>'Previous', 'placeholder'=>'',
			),
			'button_next_text' => array(
				'name'=>'button_next_text', 'label'=>__('Next Button Text', 'woo-multistep-checkout'), 'type'=>'text', 'value'=>'Next', 'placeholder'=>'',
			),
			'back_to_cart_button' => array(
				'name'=>'back_to_cart_button', 'label'=>__('Activate Back to Cart Button', 'woo-multistep-checkout'), 'type'=>'checkbox', 'value'=>'yes', 'checked'=>0, 'onchange'=>'thwmscfBackToCart(this)',
			),
			'back_to_cart_button_text' => array(
				'name'=>'back_to_cart_button_text', 'label'=>__('Back to Cart Button Text', 'woo-multistep-checkout'), 'type'=>'text', 'value'=>'Back to cart', 'post_sanitize'=>1,
			),
		);

		return $layout_field;  
	}

	public function get_wmsc_settings(){
		$settings = get_option(self::WMSC_SETTINGS);
		return empty($settings) ? false : $settings;
	}
	
	public function update_settings($settings){
		$result = update_option(self::WMSC_SETTINGS, $settings);
		return $result;
	}

	public function reset_settings(){
		check_admin_referer( 'manage_msc_settings', 'manage_msc_nonce' );

		if(!current_user_can('manage_woocommerce')){
			wp_die();
		}

		delete_option(self::WMSC_SETTINGS);

		return '<div class="updated thwmscf-update-msg"><p>'. __('Settings successfully reset', 'woo-multistep-checkout') .'</p></div>';
	}

	public function render_tabs_and_details(){
		$tabs = $this->get_tabs();
		$tab  = $this->get_current_tab();
		
		echo '<h2 class="nav-tab-wrapper woo-nav-tab-wrapper thwmscf-admin-tab-wrapper">';
		foreach( $tabs as $key => $value ) {
			$active = ( $key == $tab ) ? 'nav-tab-active' : '';
			echo '<a class="nav-tab thwmscf-admin-tab '.$active.'" href="'. esc_url(admin_url('admin.php?page=woo_multistep_checkout&tab='.$key)) .'"><span class="thwmscf-tab-icon thwmscf-icon-'.$key.'"></span><label>'.$value.'</label></a>';
		}
		echo '</h2>';
		
		// $this->output_premium_version_notice();		
	}

	public function output_premium_version_notice(){
		?>
        <div id="message" class="wc-connect updated thpladmin-notice">
            <div class="squeezer">
            	<table>
                	<tr>
                    	<td width="70%">
                        	<p><strong><i>WooCommerce Multi-Step Checkout</i></strong> premium version provides more features to customise checkout page step layout & design.</p>
                            <ul>
                            	<li>More layout options.</li>
                            	<li>More styling options.</li>
                            	<li>Option to enable validations at each step.</li>
                            	<li>Option to add custom step and display custom sections & fields created using our WooCommerce Checkout Field Editor plugin.</li>
                            	<li>Supports customization made with other checkout field editors and deeply integrated with our highly rated WooCommerce Checkout Field Editor plugin.</li>
                            </ul>
                        </td>
                        <td>
                        	<a target="_blank" href="https://www.themehigh.com/product/woocommerce-multi-step-checkout/" class="">
                            	<img src="<?php echo esc_url(plugins_url( '../assets/css/upgrade-btn.png', __FILE__ )); ?>" />
                            </a>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
        <?php
	}

	public function wmsc_design(){
		// $this->render_tabs_and_details();

		echo '<div class="wrap woocommerce"><div class="icon32 icon32-attributes" id="icon-woocommerce"><br /></div>';
		$tab  = $this->get_current_tab();

		if($tab == 'msc_settings'){
			$this->general_settings();
		}if($tab == 'premium_features'){
            $this->render_premium_tab();
        }
		
		echo '</div>';
	}

    function render_premium_tab() {
        echo '<h1>Hello World......</h1>';
    }

	function general_settings(){ 
		if(isset($_POST['save_settings']))
			echo $this->save_settings();

		if(isset($_POST['reset_settings']))
			echo $this->reset_settings();

		$fields = $this->get_settings_fields();
		$settings = $this->get_settings();
		
		foreach( $fields as $name => &$field ) { 
			if($field['type'] != 'separator'){
				if(is_array($settings) && isset($settings[$name])){
					if($field['type'] === 'checkbox'){
						if(isset($field['value']) && $field['value'] === $settings[$name]){
							$field['checked'] = 1;
						}else{
							$field['checked'] = 0;
						}
					}else{
						$field['value'] = $settings[$name];
					}
				}
			}
		}

		$back_to_cart_button = isset($settings['back_to_cart_button']) && $settings['back_to_cart_button'] ? wptexturize($settings['back_to_cart_button']) : '';
		$enable_login_step = isset($settings['enable_login_step']) && $settings['enable_login_step'] ? wptexturize($settings['enable_login_step']) : '';
		$billing_shipping_together = isset($settings['make_billing_shipping_together']) && $settings['make_billing_shipping_together'] ? wptexturize($settings['make_billing_shipping_together']) : '';

		$order_review_blur_class = isset($settings['make_order_review_separate']) && ($settings['make_order_review_separate'] == 'yes') ? 'wmsc-blur' : '';
		$order_review_separate = isset($settings['make_order_review_separate']) && $settings['make_order_review_separate'] ? wptexturize($settings['make_order_review_separate']) : '';

		$layout = isset($settings['thwmscf_layout']) && $settings['thwmscf_layout'] ? $settings['thwmscf_layout'] : '';

		$cart_text_display = $back_to_cart_button !== 'yes' ? 'display:none' : '';
        $display_login_step = $enable_login_step !== 'yes' ? 'wmsc-blur' : '';
		$step_style = $billing_shipping_together == 'yes' ? 'wmsc-blur' : '';
		$confirm_order_display_style =  $order_review_separate != 'yes' ? 'wmsc-blur' : '';
		$tab_style = $layout == 'thwmscf_time_line_step' || $layout == 'thwmscf_accordion_step' ? 'display:none' : '';
        $title_section_style = 'hide_top_border';

		?>		
		<div style="padding: 0px 35px;">               
		    <form id="wmsc_setting_form" method="post" action="">
		    	<?php wp_nonce_field( 'manage_msc_settings', 'manage_msc_nonce' ); ?>
				<table class="form-table thpladmin-form-table">
                    <?php $this->render_form_section_separator($fields['title_layouts'],$title_section_style); ?>
                    <tbody>
                        <tr>
                            <?php          
                            $this->render_form_field_element($fields['thwmscf_layout'], $this->cell_props_L);
                            ?>
                        </tr>
                        <tr class="display-tab-position" style="<?php echo $tab_style; ?>;">
                            <?php
                            $cell_props = $this->cell_props_L;
                            // $cell_props['input_width'] = '182px';
                            $this->render_form_field_element($fields['tab_align'], $cell_props);
                            $this->render_form_field_blank(2);
                            ?>
                        </tr>
                        <tr>
                            <?php
                                echo '<th style="font-size:14px; padding: 24px 0px;">'.esc_html__('Display Styles', 'woo-multistep-checkout').'</th>';
                            ?>
                        </tr>
                        <tr>
                            <?php          
                            $this->render_form_field_element($fields['step_bg_color'], $this->cell_props_L);
                            $this->render_form_field_element($fields['step_bg_color_active'], $this->cell_props_L);
                            $this->render_form_field_element($fields['step_text_color'], $this->cell_props_R);
                            ?>
                        </tr>
                        <tr>
                            <?php          
                            $this->render_form_field_element($fields['step_text_color_active'], $this->cell_props_R);
                            $this->render_form_field_element($fields['tab_panel_bg_color'], $this->cell_props_L);
                            $this->render_form_field_blank(1);
                            ?>
                        </tr>
                    </tbody>
                    <tbody>
                        <?php $this->render_form_section_separator($fields['title_display_general_sttng']); ?>
						<tr>
							<?php          
							$this->render_form_field_element($fields['enable_wmsc'], $this->cell_props_L);
							$this->render_form_field_blank(1);
							?>
						</tr> 
						<tr>
							<?php          
							$this->render_form_field_element($fields['enable_step_validation'], $this->cell_props_L);
							$this->render_form_field_blank(1);
							?>
						</tr>
						<tr>
							<?php          
							$this->render_form_field_element($fields['coupon_form_above_payment'], $this->cell_props_L);
							$this->render_form_field_blank(1);
							?>
						</tr>
						<tr>
							<?php          
							$this->render_form_field_element($fields['make_billing_shipping_together'], $this->cell_props_L);
							$this->render_form_field_blank(1);
							?>
						</tr>
						<tr>
							<?php          
							$this->render_form_field_element($fields['make_order_review_separate'], $this->cell_props_L);
							$this->render_form_field_blank(1);
							?>
						</tr>
						<tr id="th-show-review-right" class="<?php echo $order_review_blur_class ?>">
							<?php          
							$this->render_form_field_element($fields['show_order_review_right'], $this->cell_props_L);
							$this->render_form_field_blank(1);
							?>
						</tr>
                        <tr>
                            <?php          
                            $this->render_form_field_element($fields['enable_login_step'], $this->cell_props_R);
                            $this->render_form_field_blank(1);
                            ?>
                        </tr>
						<?php $this->render_form_section_separator($fields['title_display_texts']); ?>
						<tr>
							<?php          
							$this->render_form_field_element($fields['title_billing'], $this->cell_props_L);

                            $cell_property = $this->cell_props_L;
                            $cell_property['label_cell_props'] = 'style="width: 23%;" class="titledesc '.$step_style.'" scope="row"';

                            $this->render_form_field_element($fields['title_shipping'], $cell_property);
                            $this->render_form_field_element($fields['title_order_review'], $this->cell_props_L);

							?>
						</tr>
                        <tr>
							<?php          
                            $cell_property['label_cell_props'] = 'style="width: 23%;" class="titledesc '.$confirm_order_display_style.'" scope="row"';
							$this->render_form_field_element($fields['title_confirm_order'], $cell_property);

                            $cell_property['label_cell_props'] = 'style="width: 23%;" class="titledesc '.$display_login_step.'" scope="row"';

                            $this->render_form_field_element($fields['title_login'], $cell_property);
							$this->render_form_field_blank(1);
							?>
						</tr>
						<?php $this->render_form_section_separator($fields['next_previuos_button']); ?>
						<tr>
							<?php          
							$this->render_form_field_element($fields['button_prev_text'], $this->cell_props_L);
							$this->render_form_field_element($fields['button_next_text'], $this->cell_props_R);
                            $this->render_form_field_blank(1);
							?>
						</tr>
						<tr>
							<?php          
							$this->render_form_field_element($fields['back_to_cart_button'], $this->cell_props_L);
							$this->render_form_field_blank(1);
							?>
						</tr>
						<tr class="back-to-cart-show" style="<?php echo $cart_text_display; ?>">
							<?php          
							$this->render_form_field_element($fields['back_to_cart_button_text'], $this->cell_props_L);
							$this->render_form_field_blank(2);
							?>
						</tr>
                    </tbody>
                </table>
				                
                <p class="submit thwmscf-form-actions">
					<input type="submit" name="reset_settings" class="thwmscf-admin-button thwmscf-reset-btn" value="Reset to default"
					onclick="return confirm('Are you sure you want to reset to default settings? all your changes will be deleted.');">
                    <input type="submit" name="save_settings" class="thwmscf-admin-button thwmscf-save-btn" value="Save changes">
            	</p>
            </form>
    	</div>

	<?php }

	public function hide_checkout_coupon_form(){
		echo '<style>.woocommerce-form-coupon-toggle {display:none;}</style>';
	}

	public function woocommerce_checkout_coupon_form_custom(){
		?>
		<div class="checkout-coupon-toggle">
			<div class="woocommerce-info"><?php echo sprintf(__("Have a coupon? %s"), '<a href="#" class="show-coupon">' . esc_html("Click here to enter your code", "woocommerce") . '</a>') ?>
    		</div>
    	</div>
		<div class="coupon-form" style="margin-bottom:20px;" style="display:none!important;">
	        <p><?php esc_html_e("If you have a coupon code, please apply it below.", "woocommerce") ?></p>
	        <p class="form-row form-row-first woocommerce-validated">
	            <input type="text" name="coupon_code" class="input-text" placeholder="<?php esc_html_e("Coupon code", "woocommerce") ?>" id="coupon_code" value="">
	        </p>
	        <p class="form-row form-row-last">
	            <button type="button" class="button" name="apply_coupon" value="<?php echo esc_attr("Apply coupon") ?>"><?php esc_html_e("Apply coupon", "woocommerce") ?></button>
	        </p>
	        <div class="clear"></div>
	    </div>
	    <?php
	}

	public function thwmsc_make_order_review_on_right($steps){
		
		if(array_key_exists('show_order_review_right', $steps)){
			unset($steps['show_order_review_right']);
		}
		return $steps;
	}


	// Adding the Order review section in the right side
	public function add_review_order_on_right_side(){

        $display_prop = $this->get_settings();
        $order_review_right = isset($display_prop['show_order_review_right']) && $display_prop['show_order_review_right'] == 'yes' ? true : false;
		$coupon_form_above_payment =  isset($display_prop['coupon_form_above_payment']) ? $display_prop['coupon_form_above_payment'] : false;
		?>
		<div class="thwmscf-order-review-right">
			<?php do_action( 'woocommerce_checkout_before_order_review' ); ?>

			<div id="order_review" class="woocommerce-checkout-review-order">
				<?php //do_action( 'woocommerce_checkout_order_review' ); ?>
				<?php do_action( 'thwmscf_woocommerce_checkout_review_order' ); ?>

				<?php if ($order_review_right && $coupon_form_above_payment) {
                	do_action('thwmscf_woocommerce_review_order_before_payment');
				} ?>

                <?Php remove_action( 'woocommerce_checkout_order_review', 'woocommerce_order_review', 10 ); ?>
				<?php do_action( 'woocommerce_checkout_order_review' ); ?>

			</div>
			<?php do_action( 'woocommerce_checkout_after_order_review' ); ?>
		</div>
		<?php 
	}
	
	public function save_settings(){
		check_admin_referer( 'manage_msc_settings', 'manage_msc_nonce' );

		if(!current_user_can('manage_woocommerce')){
			wp_die();
		}

		$settings = array();
		$settings_fields = $this->get_settings_fields();
		
		foreach( $settings_fields as $name => $field ) {
			$type = $field['type'];
			if($type != 'separator'){
				$value = '';
				
				if($field['type'] === 'checkbox'){
					$value = !empty( $_POST['i_'.$name] ) ? 'yes' : '';

				}else if($field['type'] === 'multiselect_grouped'){
					$value = !empty( $_POST['i_'.$name] ) ? wc_clean(wp_unslash($_POST['i_'.$name])) : '';
					$value = is_array($value) ? implode(',', $value) : $value;

				}else if($field['type'] === 'textarea'){
					$value = !empty( $_POST['i_'.$name] ) ? sanitize_textarea_field(wp_unslash($_POST['i_'.$name])) : '';

				}else{
					if(isset($field['post_sanitize']) && $field['post_sanitize']){
						$value = !empty( $_POST['i_'.$name] ) ? wp_unslash(wp_filter_post_kses($_POST['i_'.$name])) : '';
					}else{
						$value = !empty( $_POST['i_'.$name] ) ? wc_clean(wp_unslash($_POST['i_'.$name])) : '';
					}
				}
				
				$settings[$name] = $value;
			}
		}
				
		$result = $this->update_settings($settings);
		if ($result == true) {
			echo '<div class="updated thwmscf-update-msg"><p>'. __('Your changes were saved.', 'woo-multistep-checkout') .'</p></div>';
		} else {
			echo '<div class="error thwmscf-update-msg"><p>'. __('Your changes were not saved due to an error (or you made none!).', 'woo-multistep-checkout') .'</p></div>';
		}
	}

	public function render_form_section_separator($props,$section_title='',$atts=array()){
        $section_title_style = isset($section_title) && $section_title === 'hide_top_border' ? 'border: none; padding-top: 3px;' : '';
		?>
		<tr valign="top"><td colspan="<?php echo $props['colspan']; ?>" style="height:10px;"></td></tr>
		<tr valign="top"><td colspan="<?php echo $props['colspan']; ?>" style="<?php echo $section_title_style; ?>" class="thpladmin-form-section-title" ><?php echo $props['title']; ?></td></tr>
		<tr valign="top"><td colspan="<?php echo $props['colspan']; ?>" style="height:0px;"></td></tr>
		<?php
	}

	public function render_form_field_element($field, $atts=array(), $render_cell=true){
		if($field && is_array($field)){
			$ftype = isset($field['type']) ? $field['type'] : 'text';
            $field_html = '';
			
			if($ftype == 'checkbox'){
				$atts['input_cell_props'] = ' style="width: 25%;" class="forminp thwmscf_checkbox"';
				$field_html .= $this->render_form_field_element_checkbox($field, $atts, $render_cell);
                if(!(isset($atts['render_label_cell']) && $atts['render_label_cell'])){   
                    $flabel = '&nbsp;';  
                }
			}
		
			$args = shortcode_atts( array(   
				'label_cell_props' => '',
				'input_cell_props' => '',
				'label_cell_th' => false,
				'input_width' => '',
				'rows' => '5',
				'cols' => '100',
				'input_name_prefix' => 'i_'
			), $atts );
			
			$fname  = $args['input_name_prefix'].$field['name'];						
			$flabel = __($field['label'], 'woo-multistep-checkout');
			$fvalue = isset($field['value']) ? $field['value'] : '';
			
			if($ftype == 'multiselect' && is_array($fvalue)){  
				$fvalue = !empty($fvalue) ? implode(',', $fvalue) : $fvalue;
			}
			/*if($ftype == 'multiselect' || $ftype == 'multiselect_grouped'){
				$fvalue = !empty($fvalue) ? explode(',', $fvalue) : $fvalue;
			}*/
						
			$input_width  = $args['input_width'] ? 'width:'.$args['input_width'].';' : '';
			$field_props  = 'name="'. $fname .'" value="'. esc_attr($fvalue) .'" style="'. $input_width .'"';
			$field_props .= ( isset($field['placeholder']) && !empty($field['placeholder']) ) ? ' placeholder="'.$field['placeholder'].'"' : '';

			$tooltip   = isset($field['hint_text']) && !empty($field['hint_text']) ? sprintf(__('%s', 'woo-multistep-checkout'), $field['hint_text']) : '';
			
			$required_html = ( isset($field['required']) && $field['required'] ) ? '<abbr class="required" title="required">*</abbr>' : '';
			
			if(isset($field['onchange']) && !empty($field['onchange'])){
				$field_props .= ' onchange="'.$field['onchange'].'"';
			}
			
			if($ftype == 'text'){
				$field_html = '<input type="text" class="thwmscf-input-text" '. $field_props .' />';
				
			}else if($ftype == 'number'){
				$field_html = '<input type="number" class="thwmsc_number" '. $field_props .' />';
				
			}else if($ftype == 'textarea'){
				$field_props  = 'name="'. $fname .'" style=""';
				$field_props .= ( isset($field['placeholder']) && !empty($field['placeholder']) ) ? ' placeholder="'.$field['placeholder'].'"' : '';
				$field_html = '<textarea '. $field_props .' rows="'.$args['rows'].'" cols="'.$args['cols'].'" >'. esc_textarea($fvalue) .'</textarea>';
				
			}else if($ftype == 'select'){
				$field_props .= 'class="thwmscf_select"';
				$field_html = '<select class="thwmscf-input-select" '. $field_props .' >';

				foreach($field['options'] as $value => $label){
					$selected = $value == $fvalue ? 'selected' : '';
					$field_html .= '<option value="'. trim($value) .'" '.$selected.'>'. __($label, 'woo-multistep-checkout') .'</option>';
				}

				$field_html .= '</select>';
				
			}else if($ftype == 'colorpicker'){
				$field_html = $this->render_form_field_element_colorpicker($field, $args);
			}else if($ftype == 'radio'){
				$args['input_cell_props'] = 'colspan="3" style="width: 100%;" class="forminp thwmscf_layout_wrap"';
				$field_html = $this->render_form_field_element_radio($field, $atts);
			}
			
			$label_cell_props = !empty($args['label_cell_props']) ? ' '.$args['label_cell_props'] : '';
			$input_cell_props = !empty($args['input_cell_props']) ? ' '.$args['input_cell_props'] : '';
            $cell_html = '';

            if($field['name'] != 'thwmscf_layout') {    
                $style      = $field['type'] === 'checkbox' ? 'style="width: 33.3%;"'   : 'style="width: 33.3%;"';  
                $cell_html .= '<td '.$style.' '.$label_cell_props.' >';
                $cell_html .= '<label class="thpladmin-td-label">' . $flabel . '</label>';
                $cell_html .= $required_html;

                if(isset($field['sub_label']) && !empty($field['sub_label'])){
                    $sub_label = $this->_ewcfe($field['sub_label']);
                    $cell_html .= '<br/><span class="thpladmin-subtitle">'.$sub_label.'</span>';
                }

                if ($field['type'] != 'checkbox') {
                    $cell_html .= $this->render_tooltip_new_ui($tooltip, true);
                    $cell_html .= '<span class="thpladmin-td-input" '.$input_cell_props.'>'.$field_html.'</span>';
                }
                
                $cell_html .= '</td>';
            }

            if ($field['name'] === 'thwmscf_layout' || $field['type'] === 'checkbox') {
                $cell_html .= $field['name'] === 'thwmscf_layout' ? '<td '.$input_cell_props.'style="width: 100%;" >' : '<td '.$input_cell_props.'style="width: 33.3%;" >';

                if($tooltip){
                    $cell_html .= $this->render_tooltip_new_ui($tooltip, true);
                }elseif(!$tooltip && !($field['name'] === 'thwmscf_layout')){
                    $cell_html .= '<span class="thpladmin_tooltip thwmscf-tooltip" ></span>';
                }
                
                $cell_html .= $field_html;
                $cell_html .= '</td>';
            }

            $field_html = $cell_html;
            echo $field_html;
		}
	}

	public function render_form_fragment_tooltip($tooltip = false, $return = false){
		$tooltip_html = '';
		
		if($tooltip){
			$tooltip_html .= '<td style="width: 26px; padding:0px;">';
			$tooltip_html .= '<a href="javascript:void(0)" title="'.$tooltip.'" class="thpladmin_tooltip"><img src="'.THWMSCF_ASSETS_URL.'/images/help.svg" title=""/></a>';
			$tooltip_html .= '</td>';
		}else{
			$tooltip_html .= '<td style="width: 26px; padding:0px;"></td>';
		}
		
		if($return){
			return $tooltip_html;
		}else{
			echo $tooltip_html;
		}
	}

    public function render_tooltip_new_ui($tooltip = false, $return = false){
        $tooltip_html = '';
        
        if($tooltip){
            $tooltip_html .= '<a href="javascript:void(0)" title="'.$tooltip.'" class="thpladmin_tooltip thwmscf-tooltip"><img src="'.THWMSCF_ASSETS_URL.'/images/help.svg" title=""/></a>';
        }
        
        if($return){
            return $tooltip_html;
        }else{
            echo $tooltip_html;
        }
    }

	public function render_form_field_element_checkbox($field, $atts=array(), $render_cell=false){
		$args = shortcode_atts( array( 'cell_props'  => '', 'input_props' => '', 'label_props' => '', 'name_prefix' => 'i_', 'id_prefix' => 'a_f', 'input_cell_props' => ''), $atts );
		
		$fid    = $args['id_prefix'].$field['name'];
		$fname  = $args['name_prefix'].$field['name'];
		$fvalue = isset($field['value']) ? $field['value'] : '';
		$flabel = __($field['label'], 'woo-multistep-checkout');
		
		$field_props  = 'id="'. $fid .'" name="'. $fname .'"';
		$field_props .= !empty($fvalue) ? ' value="'. esc_attr($fvalue) .'"' : '';
		$field_props .= $field['checked'] ? ' checked' : '';
		$field_props .= $args['input_props'];
		$field_props .= isset($field['onchange']) && !empty($field['onchange']) ? ' onchange="'.$field['onchange'].'"' : '';

		$input_cell_props = isset($args['input_cell_props']) ? $args['input_cell_props'] : '';
		$field_html = '';
		$tooltip = isset($field['hint_text']) && !empty($field['hint_text']) ? sprintf(__('%s', 'woo-multistep-checkout'), $field['hint_text']) : '';
		
		if($render_cell === 'inline'){
			$field_html = '<td colspan="3"><input type="checkbox" '. $field_props .' /><label for="'. $fid .'" '. $args['label_props'] .' > '. $flabel .'</label></td>';
        }else {
            $field_html  = '<input type="checkbox" id="'. $fid .'" '. $field_props .' />';
            $field_html .= '<label for="'. $fid .'"> '. $flabel .'</label>';
        }
		// }else{
		// 	$field_html = '<td><label for="'. $fid .'" '. $args['label_props'] .' > '. $flabel .'</label></td>';
		// 	// $field_html .= '<td style="width: 26px; padding:0px;"></td>';
		// 	$field_html .= $this->render_form_fragment_tooltip($tooltip, true);
		// 	$field_html .= '<td '. $input_cell_props .'><input type="checkbox" '. $field_props .' /><label for="' . $fid . '"class="thwmscf-checkbox-span"></label></td>';
		// }

        if(!$render_cell && $args['render_input_cell']){
            return '<td '. $args['cell_props'] .' >'. $field_html .'</td>';
        }else{
            return $field_html;
        }
	}

	private function render_form_field_element_radio($field, $atts = array()){
		$field_html = '';
		$args = shortcode_atts( array(
			'label_props' => '',
			'cell_props'  => 3,
			'render_input_cell' => false,
			'render_label_cell' => false,
			'input_cell_props'
		), $atts );

		// $cell_props_rd = $this->cell_props_CB;
		// $cell_props_rd['input_cell_props'] = 'class="forminp layout_wrap" colspan="4"';

		$atts = array(
			'input_width' => 'auto',
		);

		if($field && is_array($field)){
			
			$fvalue = isset($field['value']) ? $field['value'] : '';
			// $field_props = $this->prepare_form_field_props($field, $atts);			

			foreach($field['options'] as $value => $label){
				$checked ='';
				$img_layout = '';

				//$flabel = isset($label) && !empty($label) ? THWMSC_i18n::t($label) : '';
				$flabel = isset($label['name']) && !empty($label['name']) ? sprintf(__('%s', 'woocommerce-multistep-checkout'), $label['name']) : '';
				$onchange = ( isset($field['onchange']) && !empty($field['onchange']) ) ? ' onchange="'.$field['onchange'].'"' : '';
				$img_layout = isset($label['layout_image']) && !empty($label['layout_image']) ? $label['layout_image'] : '';

				$checked = $value === $fvalue ? 'checked' : '';				
				$field_html .='<label for="'. $value .'" '. $args['label_props'] .' > ';				

				$field_html .= '<input type="radio" name="i_' . $field['name'] . '" id="'. $value . '" value="'. trim($value) .'" ' . $checked . $onchange . '>';
				//$field_html .= '<span class ="layout-icon ' . $value . '"></span>';
				$field_html .= '<img class="thwmscf-layout" src= "'. THWMSCF_ASSETS_URL . 'images/' . $img_layout.'">';
				$field_html .= $flabel.'</label>';
			}
		}
		return $field_html;
	}

	private function render_form_field_element_colorpicker($field, $atts = array()){
		$field_html = '';
		if($field && is_array($field)){
			$args = shortcode_atts( array(
				'input_width' => '',
				'input_name_prefix' => 'i_'
			), $atts );
			
			$fname  = $args['input_name_prefix'].$field['name'];
			$fvalue = isset($field['value']) ? $field['value'] : '';
			
			$input_width  = $args['input_width'] ? 'width:'.$args['input_width'].';' : '';
			$field_props  = 'name="'. $fname .'" value="'. esc_attr($fvalue) .'" style="'. $input_width .'"';
			$field_props .= ( isset($field['placeholder']) && !empty($field['placeholder']) ) ? ' placeholder="'.$field['placeholder'].'"' : '';

			$field_html  = '<div class="thwmscf-clrpicker-wrapper">';
			$field_html .= '<span class="thwmscf-colorpreview thpladmin-colorpickpreview '.$field['name'].'_preview" style=""></span>';
            $field_html .= '<input type="text" '. $field_props .' class="thwmscf-colorpicker thpladmin-colorpick"/> </div>';
		}
		return $field_html;
	}
	
	public function init() {
		if(!is_admin() || (defined( 'DOING_AJAX' ) && DOING_AJAX)){
			if(is_array($this->settings) && isset($this->settings['enable_wmsc']) && $this->settings['enable_wmsc'] == 'yes'){
				$this->frontend_design();
			}
		}
	}

	public function frontend_design(){
		$thwmscf_settings = get_option('THWMSC_SETTINGS');
		$enable_login_step = isset($thwmscf_settings['enable_login_step']) ? $thwmscf_settings['enable_login_step'] : false;

		add_action( 'wp_enqueue_scripts', array( $this, 'thwmsc_frontend_scripts' ) );	
	    add_filter( 'woocommerce_locate_template', array( $this, 'wmsc_multistep_template' ), 10, 3 );
	    if($enable_login_step){
	        remove_action( 'woocommerce_before_checkout_form', 'woocommerce_checkout_login_form', 10 );
			add_action('thwmscf_before_checkout_form', 'woocommerce_checkout_login_form');
		}

		$current_theme = wp_get_theme();
		$theme_template = $current_theme->get_template();

		if($theme_template === 'astra'){
			$astra_priority = apply_filters('thwmscf_astra_theme_priority', 20);
			// add_filter('astra_woo_shop_product_structure_override', '__return_true');
			
			add_action( 'wp', array($this, 'astra_remove_shipping_from_billing'));
			add_action( 'woocommerce_checkout_shipping', array( WC()->checkout(), 'checkout_form_shipping' ), $astra_priority);
		}
	}

	public function astra_remove_shipping_from_billing(){
		remove_action('woocommerce_checkout_billing', array(WC()->checkout(), 'checkout_form_shipping'));
	}
	
	public function before_checkout_form(){
		if(!is_user_logged_in() && 'yes' === get_option( 'woocommerce_enable_checkout_login_reminder')){
			echo '<div class="thwmscf-tab-panel" id="thwmscf-tab-panel-0">';
			do_action( 'woocommerce_checkout_login_form' );
			echo '</div>';
		}
	}

	public function thwmsc_frontend_scripts(){
		if(!is_checkout()){
			return;
		}
		
		$in_footer = apply_filters( 'thwmscf_enqueue_script_in_footer', true );

        wp_register_style( 'thwmscf-checkout-css', THWMSCF_ASSETS_URL . 'css/thwmscf-frontend.css', array(), THWMSCF_VERSION );
        wp_register_script('thwmscf-frontend-js', THWMSCF_ASSETS_URL.'js/thwmscf-frontend.js', array(), THWMSCF_VERSION, $in_footer);  

        wp_enqueue_style('thwmscf-checkout-css');    

        $display_prop = $this->get_settings();

        if($display_prop){      
			$tab_panel_style = '';
			$tab_style = '';
			$tab_style_active = '';
			
			$tab_align = isset($display_prop['tab_align']) && $display_prop['tab_align'] ? 'text-align:'.$display_prop['tab_align'].';' : '';
			
			if(isset($display_prop['tab_panel_bg_color']) && $display_prop['tab_panel_bg_color']){
				$tab_panel_style = 'background:'.$display_prop['tab_panel_bg_color'].' !important;';
			}
			
			if(isset($display_prop['step_bg_color']) && $display_prop['step_bg_color']){
				$tab_style = 'background:'.$display_prop['step_bg_color'].' !important;';
			}
			if(isset($display_prop['step_text_color']) && $display_prop['step_text_color']){
				$tab_style .= $tab_style ? ' color:'.$display_prop['step_text_color'].'' : 'color:'.$display_prop['step_text_color'].'';
				$tab_style .= ' !important';
			}
			
			if(isset($display_prop['step_bg_color_active']) && $display_prop['step_bg_color_active']){
				$tab_style_active = 'background:'.$display_prop['step_bg_color_active'].' !important;';
			}
			if(isset($display_prop['step_text_color_active']) && $display_prop['step_text_color_active']){
				$tab_style_active .= $tab_style_active ? ' color:'.$display_prop['step_text_color_active'].'' : 'color:'.$display_prop['step_text_color_active'].'';
				$tab_style_active .= ' !important';
			}

            $plugin_style = "
                    ul.thwmscf-tabs{ $tab_align }    
                    li.thwmscf-tab a{ $tab_style }                       
                    li.thwmscf-tab a.active { $tab_style_active }
					.thwmscf-tab-panels{ $tab_panel_style }";

			if(isset($display_prop['thwmscf_layout']) && $display_prop['thwmscf_layout'] == 'thwmscf_time_line_step') {
		        $enable_login_step = isset($display_prop['enable_login_step']) ? $display_prop['enable_login_step'] : false;
		        $billing_shipping_together =  isset($display_prop['make_billing_shipping_together']) ? $display_prop['make_billing_shipping_together'] : false;
		        $order_review_separate =  isset($display_prop['make_order_review_separate']) ? $display_prop['make_order_review_separate'] : false;
		        $order_review_right = !$order_review_separate && isset($display_prop['show_order_review_right']) && $display_prop['show_order_review_right'] == 'yes' ? true : false;
		        $line_border_color = isset($display_prop['step_bg_color']) && $display_prop['step_bg_color'] ? 'border-top :4px solid '.$display_prop['step_bg_color'].';' : '';
		        $line_border_color_active = isset($display_prop['step_bg_color_active']) && $display_prop['step_bg_color_active'] ? 'border-top :4px solid '.$display_prop['step_bg_color_active'].';' : '';

		        if ($order_review_separate && $billing_shipping_together) {
		        	$step_count = $enable_login_step && !is_user_logged_in() && 'yes' === get_option( 'woocommerce_enable_checkout_login_reminder') ? 4 : 3;
		        }if ($billing_shipping_together && !$order_review_separate && $order_review_right) {
		        	$step_count = $enable_login_step && !is_user_logged_in() && 'yes' === get_option( 'woocommerce_enable_checkout_login_reminder') ? 2 : 1;
		        }if ($billing_shipping_together && !$order_review_separate && !$order_review_right) {
		        	$step_count = $enable_login_step && !is_user_logged_in() && 'yes' === get_option( 'woocommerce_enable_checkout_login_reminder') ? 3 : 2;
		        }if (!$billing_shipping_together && $order_review_separate) {
		        	$step_count = $enable_login_step && !is_user_logged_in() && 'yes' === get_option( 'woocommerce_enable_checkout_login_reminder') ? 5 : 4;
		        }if (!$billing_shipping_together && !$order_review_separate && $order_review_right) {
		        	$step_count = $enable_login_step && !is_user_logged_in() && 'yes' === get_option( 'woocommerce_enable_checkout_login_reminder') ? 3 : 2;
		        }if (!$billing_shipping_together && !$order_review_separate && !$order_review_right) {
		        	$step_count = $enable_login_step && !is_user_logged_in() && 'yes' === get_option( 'woocommerce_enable_checkout_login_reminder') ? 4 : 3;
		        }
		        $width_time_line = 'width:'. 100/$step_count .'%';

		        $plugin_style .= "
		        	.thwmscf_time_line_step ul.thwmscf-tabs li{ $width_time_line }
					.thwmscf_time_line_step ul.thwmscf-tabs li a {  $line_border_color }
		        	.thwmscf_time_line_step ul.thwmscf-tabs li a.active { $line_border_color_active }";
			}

			if(isset($display_prop['thwmscf_layout']) && $display_prop['thwmscf_layout'] == 'thwmscf_accordion_step') {
				$accordion_style = 'display:block;';
				$plugin_style .= "
					.thwmscf-accordion-label{ $accordion_style }
					.thwmscf-accordion-label.active{ $tab_style_active }
					.thwmscf-accordion-label{ $tab_style }
					.thwmscf_accordion_step .thwmscf-content{ $tab_panel_style }
				";
			}

		    $order_review_separate =  isset($display_prop['make_order_review_separate']) ? $display_prop['make_order_review_separate'] : false;
			$order_review_right = !$order_review_separate && isset($display_prop['show_order_review_right']) && $display_prop['show_order_review_right'] == 'yes' ? true : false;
		    $coupon_form_above_payment =  isset($display_prop['coupon_form_above_payment']) ? $display_prop['coupon_form_above_payment'] : false;


			if($order_review_right && !wp_is_mobile()){
				$plugin_style .= ".thwmscf-tabs { width: 100%; }
				.thwmscf-tab-panels { position: relative; }
				.thwmscf-tab-panel { float: left;width: 61%; }
				div#order_review { width: 100%!important; } 
				.thwmscf-wrapper .thwmsc-buttons { text-align: left; }
				.thwmscf-order-review-right { width: 38%;float: right; }
				.thwmscf_accordion_step .thwmscf-content { width: 61%; margin-right: 7px; }
				";
			}
		    
            wp_add_inline_style( 'thwmscf-checkout-css', $plugin_style );  
        }        

        if(is_array($this->settings) && isset($this->settings['enable_wmsc']) && $this->settings['enable_wmsc'] == 'yes'){
       		wp_enqueue_script('thwmscf-frontend-js');
			$enable_validation = isset($this->settings['enable_step_validation']) ? $this->settings['enable_step_validation'] : true;
			$validation_msg = __('Invalid or data missing in the required field(s)', 'woo-multistep-checkout');
			
       		$script_var = array(
	    	    'enable_validation' => apply_filters('thwmscf_enable_step_validation', $enable_validation),
	    		'validation_msg' => apply_filters('thwmscf_validation_error', $validation_msg),
  	 			'coupon_form_above_payment' => apply_filters('thwmsc_coupon_form_above_payment', $coupon_form_above_payment),

	    	);
	    	wp_localize_script('thwmscf-frontend-js', 'thwmscf_script_var', $script_var);
	    }

	} 

	public function wmsc_multistep_template( $template, $template_name, $template_path ){
        if('checkout/form-checkout.php' == $template_name ){         
        	if(is_array($this->settings) && isset($this->settings['enable_wmsc']) && $this->settings['enable_wmsc'] == 'yes'){  	
        		$template = THWMSCF_TEMPLATE_PATH . 'checkout/form-checkout.php';   
        	}
        }
        return $template;
    }

    public function thwmsc_notice_actions(){

		if( !(isset($_GET['thwmsc_remind']) || isset($_GET['thwmsc_dissmis']) || isset($_GET['thwmsc_reviewed'])) ) {
			return;
		}

		$nonse = isset($_GET['thwmsc_review_nonce']) ? $_GET['thwmsc_review_nonce'] : false;
		if(!wp_verify_nonce($nonse, 'thwmscf_notice_security')){
			die();
		}
		$now = time();
		$thwmsc_remind = isset($_GET['thwmsc_remind']) ? sanitize_text_field( wp_unslash($_GET['thwmsc_remind'])) : false;
		if($thwmsc_remind){
			update_user_meta( get_current_user_id(), 'thwmsc_review_skipped', true );
			update_user_meta( get_current_user_id(), 'thwmsc_review_skipped_time', $now );
		}

		$thwmsc_dissmis = isset($_GET['thwmsc_dissmis']) ? sanitize_text_field( wp_unslash($_GET['thwmsc_dissmis'])) : false;
		if($thwmsc_dissmis){
			update_user_meta( get_current_user_id(), 'thwmsc_review_dismissed', true );
			update_user_meta( get_current_user_id(), 'thwmsc_review_dismissed_time', $now );
		}

		$thwmsc_reviewed = isset($_GET['thwmsc_reviewed']) ? sanitize_text_field( wp_unslash($_GET['thwmsc_reviewed'])) : false;
		if($thwmsc_reviewed){
			update_user_meta( get_current_user_id(), 'thwmsc_reviewed', true );
			update_user_meta( get_current_user_id(), 'thwmsc_reviewed_time', $now );
		}
	}

	public function output_review_request_link(){

		if(!apply_filters('thwmscf_show_dismissable_admin_notice', true)){
			return;
		}
		if ( !current_user_can( 'manage_options' ) ) {
           return;
        }

		// $current_screen = get_current_screen();
		// if($current_screen->id !== 'woocommerce_page_woo_multistep_checkout'){
		// 	return;
		// }

		$thwmsc_reviewed = get_user_meta( get_current_user_id(), 'thwmsc_reviewed', true );
		if($thwmsc_reviewed){
			return;
		}

		$now = time();
		// $dismiss_life  = apply_filters('thwmscf_dismissed_review_request_notice_lifespan', 3 * MONTH_IN_SECONDS);
		// $reminder_life = apply_filters('thwmscf_skip_review_request_notice_lifespan', 1 * DAY_IN_SECONDS);

		$dismiss_life  = apply_filters('thwmscf_dismissed_review_request_notice_lifespan', 6 * MONTH_IN_SECONDS);
		$reminder_life = apply_filters('thwmscf_skip_review_request_notice_lifespan', 7 * DAY_IN_SECONDS);

		$is_dismissed   = get_user_meta( get_current_user_id(), 'thwmsc_review_dismissed', true );
		$dismisal_time  = get_user_meta( get_current_user_id(), 'thwmsc_review_dismissed_time', true );
		$dismisal_time  = $dismisal_time ? $dismisal_time : 0;
		$dismissed_time = $now - $dismisal_time;

		if( $is_dismissed && ($dismissed_time < $dismiss_life) ){
			return;
		}

		$is_skipped = get_user_meta( get_current_user_id(), 'thwmsc_review_skipped', true );
		$skipping_time = get_user_meta( get_current_user_id(), 'thwmsc_review_skipped_time', true );
		$skipping_time = $skipping_time ? $skipping_time : 0;
		$remind_time = $now - $skipping_time;

		if($is_skipped && ($remind_time < $reminder_life) ){
			return;
		}

		$thwmscf_since = get_option('thwmscf_since');
		if(!$thwmscf_since){
			$now = time();
			update_option('thwmscf_since', $now, 'no' );
		}

		// $this->render_review_request_notice();

		$thwmscf_since = $thwmscf_since ? $thwmscf_since : $now;
        $render_time  = apply_filters('thwmscf_show_review_banner_render_time' , 3 * DAY_IN_SECONDS);
        $render_time  = $thwmscf_since + $render_time;
        if($now > $render_time ){
            $this->render_review_request_notice();
        }

	}


	private function render_review_request_notice(){
		
		// $admin_url  = 'admin.php?page=woo_multistep_checkout';
		$remind_url   = add_query_arg(array('thwmsc_remind' => true , 'thwmsc_review_nonce' => wp_create_nonce('thwmscf_notice_security')));
        $dismiss_url  = add_query_arg(array('thwmsc_dissmis' => true, 'thwmsc_review_nonce' => wp_create_nonce( 'thwmscf_notice_security')));
        $reviewed_url = add_query_arg(array('thwmsc_reviewed' => true , 'thwmsc_review_nonce' => wp_create_nonce( 'thwmscf_notice_security')));

		// $remind_url  = $admin_url . '&thwmsc_remind=true&thwmsc_review_nonce=' . wp_create_nonce( 'thwmscf_notice_security');
		// $dismiss_url = $admin_url . '&thwmsc_dissmis=true&thwmsc_review_nonce=' . wp_create_nonce( 'thwmscf_notice_security');
		// $reviewed_url= $admin_url . '&thwmsc_reviewed=true&thwmsc_review_nonce=' . wp_create_nonce( 'thwmscf_notice_security');
		?>

		<div class="notice thwmsc-notice is-dismissible thwmsc-review-wrapper" data-nonce="<?php echo wp_create_nonce( 'thwmscf_notice_security'); ?>">
			<div class="thwmsc-review-image">
				<img src="<?php echo esc_url(THWMSCF_URL .'assets/images/review-left.svg'); ?>" alt="themehigh">
			</div>
			<div class="thwmsc-review-content">
				<h3><?php _e('We have a quick favour to ask ', 'woo-multistep-checkout'); ?>&#128519;</h3>
				<p style="margin-bottom: -11px"><?php _e("We're excited to launch a fresh new look for our Multi-step Checkout plugin! We've put in a lot of time and effort to make your experience better than before.", 'woo-multistep-checkout'); ?></p><p class="thwmsc-review-content-text"><?php _e("If you like it, please show us some love with a ", 'woo-multistep-checkout'); ?><b>5-star </b>rating  &#10084;</p>
				<div class="action-row"> 
			        <a class="thwmsc-notice-action thwmsc-yes" onclick="window.open('https://wordpress.org/support/plugin/woo-multistep-checkout/reviews/', '_blank')" style="margin-right:16px; text-decoration: none; cursor: pointer;">
			        	<?php _e("Yes, today", 'woo-multistep-checkout'); ?>
			        </a>

			        <a class="thwmsc-notice-action thwmsc-done" href="<?php echo esc_url($reviewed_url); ?>" style="margin-right:16px; text-decoration: none">
			        	<?php _e('Already, Did', 'woo-multistep-checkout'); ?>
			        </a>

			        <a class="thwmsc-notice-action thwmsc-remind" href="<?php echo esc_url($remind_url); ?>" style="margin-right:16px; text-decoration: none">
			        	<?php _e('Maybe later', 'woo-multistep-checkout'); ?>
			        </a>

			        <a class="thwmsc-notice-action thwmsc-dismiss" href="<?php echo esc_url($dismiss_url); ?>" style="margin-right:16px; text-decoration: none">
			        	<?php _e("Nah, Never", 'woo-multistep-checkout'); ?>
			        </a>
				</div>
			</div>
            <div class="thwmsc-review-star">
                <span class="logo" style="float: right">
                    <img src="<?php echo esc_url(THWMSCF_URL .'assets/images/stars.svg'); ?>" style="height:19px;margin-top:4px;" alt="themehigh"/>
                </span>
            </div>
			<div class="thwmsc-themehigh-logo">
				<span class="logo" style="float: right">
            		<a target="_blank" href="https://www.themehigh.com">
                		<img src="<?php echo esc_url(THWMSCF_URL .'assets/images/logo.svg'); ?>" style="height:15px;margin-top:4px;" alt="themehigh"/>
                	</a>
                </span>
			</div>
	    </div>

		<?php
	}

	public function hide_thwmscf_admin_notice(){

		check_ajax_referer('thwmscf_notice_security', 'thwmsc_review_nonce');

		$now = time();
		update_user_meta( get_current_user_id(), 'thwmsc_review_skipped', true );
		update_user_meta( get_current_user_id(), 'thwmsc_review_skipped_time', $now );
	}

	public function admin_notice_js_snippet(){

		if(!apply_filters('thwmsc_dismissable_admin_notice_javascript', true)){
			return;
		}		
		?>
	    <script>
			var thwmsc_dismissable_notice = (function($, window, document) {
				'use strict';

				$( document ).on( 'click', '.thwmsc-notice .notice-dismiss', function() {
					var wrapper = $(this).closest('div.thwmsc-notice');
					var nonce = wrapper.data("nonce");
					var data = {
						thwmsc_review_nonce: nonce,
						action: 'hide_thwmscf_admin_notice',
					};
					$.post( ajaxurl, data, function() {

					});
				});

			}(window.jQuery, window, document));	
	    </script>
	    <?php
	}

    public function render_form_field_blank($colspan = 3){
        ?>
        <td width="<?php echo $colspan * 33.3 ?>%" colspan="<?php echo $colspan; ?>">&nbsp;</td>  
        <?php
    }
}

endif;