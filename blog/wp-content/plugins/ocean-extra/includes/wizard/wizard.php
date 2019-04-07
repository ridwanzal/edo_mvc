<?php
/**
 * Theme Wizard
 *
 * @package Ocean_Extra
 * @category Core
 * @author OceanWP
 */
// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}

if (!class_exists('Ocean_Extra_Theme_Wizard')):

    // Start Class
    class Ocean_Extra_Theme_Wizard {

        /**
         * Current step
         *
         * @var string
         */
        private $step = '';

        /**
         * Steps for the setup wizard
         *
         * @var array
         */
        private $steps = array();

        public function __construct() {
            $this->includes();
            add_action('admin_menu', array($this, 'add_ocean_wizard_menu'));
            add_action('admin_init', array($this, 'ocean_wizard_setup'), 99);
            add_action('wp_loaded', array($this, 'remove_notice'));
            add_action('admin_print_styles', array($this, 'add_notice'));
        }

        public static function install() {
            if (!get_option("owp_wizard")) {
                update_option("owp_wizard", "un-setup");
                (wp_safe_redirect(admin_url('admin.php?page=owp_setup')));
            }
        }

        public function remove_notice() {
            if (isset($_GET['owp_wizard_hide_notice']) && $_GET['owp_wizard_hide_notice'] == "install") { // WPCS: input var ok, CSRF ok.
                delete_option("owp_wizard");

                if (isset($_GET['show'])) {
                    wp_safe_redirect(home_url());
                    exit;
                }
            }
        }

        public function add_notice() {
            if ((get_option("owp_wizard") == "un-setup") && (empty($_GET['page']) || 'owp_setup' !== $_GET['page'])) { ?>

                <div class="updated notice-success owp-extra-notice">
                    <div class="notice-inner">
                        <div class="notice-content">
                            <p><?php _e('<strong>Welcome to OceanWP</strong> - Are you ready to create an amazing website?', 'ocean-extra'); ?></p>
                            <p class="submit">
                                <a href="<?php echo esc_url(admin_url('admin.php?page=owp_setup')); ?>" class="btn button-primary"><?php _e('Run the Setup Wizard', 'ocean-extra'); ?></a>
                                <a class="btn button-secondary" href="<?php echo esc_url((add_query_arg('owp_wizard_hide_notice', 'install'))); ?>"><?php _e('Skip setup', 'ocean-extra'); ?></a>
                            </p>
                        </div>
                    </div>

                    <style type="text/css">
                        .owp-extra-notice.updated {
                            border-color: #13aff0;
                        }
                        .owp-extra-notice .button-primary {
                            background: #13aff0;
                            border-color: #1e9bd0;
                            box-shadow: inset 0 1px 0 rgba(255,255,255,.25), 0 1px 0 #1e9bd0;
                            color: #fff;
                            text-shadow: 0 -1px 1px #1e9bd0, 1px 0 1px #1e9bd0, 0 1px 1px #1e9bd0, -1px 0 1px #1e9bd0;
                        }
                    </style>

                </div>

            <?php
            }
        }

        private function includes() {
            require_once( OE_PATH . '/includes/wizard/classes/QuietSkin.php' );
            require_once( OE_PATH . '/includes/wizard/classes/WizardAjax.php' );
        }

        public function add_ocean_wizard_menu() {
            add_dashboard_page('', '', 'manage_options', 'owp_setup', '');
        }

        public function ocean_wizard_setup() {
            if (empty($_GET['page']) || 'owp_setup' !== $_GET['page']) { // WPCS: CSRF ok, input var ok.
                return;
            }
            $default_steps = array(
                'welcome' => array(
                    'name' => __('Welcome', 'ocean-extra'),
                    'view' => array($this, 'ocean_welcome'),
                ),
                'demo' => array(
                    'name' => __('Choosing Demo', 'ocean-extra'),
                    'view' => array($this, 'ocean_demo_setup'),
                ),
                'customize' => array(
                    'name' => __('Customize', 'ocean-extra'),
                    'view' => array($this, 'ocean_customize_setup'),
                ),
                'ready' => array(
                    'name' => __('Ready', 'ocean-extra'),
                    'view' => array($this, 'ocean_ready_setup'),
                )
            );
            $this->steps = apply_filters( 'owp_setup_wizard_steps', $default_steps );
            $this->step = isset($_GET['step']) ? sanitize_key($_GET['step']) : current(array_keys($this->steps)); // WPCS: CSRF ok, input var ok.
            // CSS
            wp_enqueue_style( 'owp-wizard-style', plugins_url( '/assets/css/style.min.css', __FILE__ ) );

            // RTL
            if ( is_RTL() ) {
                wp_enqueue_style( 'owp-wizard-rtl', plugins_url( '/assets/css/rtl.min.css', __FILE__ ) );
            }

            // JS
            wp_enqueue_script( 'owp-wizard-js', plugins_url( '/assets/js/wizard.min.js', __FILE__ ), array( 'jquery', 'wp-util', 'updates' ) );

            wp_localize_script( 'owp-wizard-js', 'owpDemos', array(
                'ajaxurl' => admin_url('admin-ajax.php'),
                'demo_data_nonce' => wp_create_nonce('get-demo-data'),
                'owp_import_data_nonce' => wp_create_nonce('owp_import_data_nonce'),
                'content_importing_error' => esc_html__('There was a problem during the importing process resulting in the following error from your server:', 'ocean-extra'),
                'button_activating' => esc_html__('Activating', 'ocean-extra') . '&hellip;',
                'button_active' => esc_html__('Active', 'ocean-extra'),
            ));

            global $current_screen, $hook_suffix, $wp_locale;
            if (empty($current_screen))
                set_current_screen();
            $admin_body_class = preg_replace('/[^a-z0-9_-]+/i', '-', $hook_suffix);

            ob_start();
            ?>
            <!DOCTYPE html>
            <html <?php language_attributes(); ?>>
                <head>
                    <meta name="viewport" content="width=device-width" />
                    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
                    <title><?php esc_html_e('OceanWP &rsaquo; Setup Wizard', 'ocean-extra'); ?></title>
                    <script type="text/javascript">
                        addLoadEvent = function (func) {
                            if (typeof jQuery != "undefined")
                                jQuery(document).ready(func);
                            else if (typeof wpOnload != 'function') {
                                wpOnload = func;
                            } else {
                                var oldonload = wpOnload;
                                wpOnload = function () {
                                    oldonload();
                                    func();
                                }
                            }
                        };
                        var ajaxurl = '<?php echo admin_url('admin-ajax.php', 'relative'); ?>',
                                pagenow = '<?php echo $current_screen->id; ?>',
                                typenow = '<?php echo $current_screen->post_type; ?>',
                                adminpage = '<?php echo $admin_body_class; ?>',
                                thousandsSeparator = '<?php echo addslashes($wp_locale->number_format['thousands_sep']); ?>',
                                decimalPoint = '<?php echo addslashes($wp_locale->number_format['decimal_point']); ?>',
                                isRtl = <?php echo (int) is_rtl(); ?>;
                    </script>
                    <?php
                    //include demos script
                    wp_print_scripts('owp-wizard-js');

                    //include custom scripts in specifiec steps
                    if ($this->step == 'demo' || $this->step == "welcome" || $this->step == 'customize') {
                        wp_print_styles('themes');
                        wp_print_styles('buttons');
                        wp_print_styles('dashboard');
                        wp_print_styles('common');
                    }

                    if ($this->step == 'customize') {
                        wp_print_styles('media');
                        wp_enqueue_media();
                        wp_enqueue_style('wp-color-picker');
                        wp_enqueue_script('wp-color-picker');
                    }

                    //add admin styles
                    do_action('admin_print_styles');

                    do_action('admin_head'); ?>
                </head>
                <body class="owp-setup wp-core-ui">
                    <?php
                    $logo = apply_filters( 'oceanwp_setup_wizard_logo', '<a href="https://oceanwp.org/?utm_source=dash&utm_medium=wizard&utm_campaign=logo">OceanWP<span class="circle"></span></a>' ); ?>
                    <div id="owp-logo"><?php echo $logo; ?></div>
                    <?php
                    $this->setup_wizard_steps();
                    $this->setup_wizard_content();
                    _wp_footer_scripts();
                    do_action('admin_footer'); ?>
                </body>
            </html>
            <?php
            exit;
        }

        /**
         * Output the steps.
         */
        public function setup_wizard_steps() {
            $output_steps = $this->steps;
            ?>
            <ol class="owp-setup-steps">
                <?php
                foreach ($output_steps as $step_key => $step) {
                    $is_completed = array_search($this->step, array_keys($this->steps), true) > array_search($step_key, array_keys($this->steps), true);

                    if ($step_key === $this->step) {
                        ?>
                        <li class="active"><?php echo esc_html($step['name']); ?></li>
                        <?php
                    } elseif ($is_completed) {
                        ?>
                        <li class="done">
                            <a href="<?php echo esc_url(add_query_arg('step', $step_key, remove_query_arg('activate_error'))); ?>"><?php echo esc_html($step['name']); ?></a>
                        </li>
                        <?php
                    } else {
                        ?>
                        <li><?php echo esc_html($step['name']); ?></li>
                        <?php
                    }
                }
                ?>
            </ol>
            <?php
        }

        /**
         * Output the content for the current step.
         */
        public function setup_wizard_content() {
            echo '<div class="owp-setup-content">';
                if (!empty($this->steps[$this->step]['view'])) {
                    call_user_func($this->steps[$this->step]['view'], $this);
                }
            echo '</div>';
        }

        /**
         * Get Next Step
         * @param type $step
         * @return string
         */
        public function get_next_step_link($step = '') {
            if (!$step) {
                $step = $this->step;
            }

            $keys = array_keys($this->steps);
            if (end($keys) === $step) {
                return admin_url();
            }

            $step_index = array_search($step, $keys, true);
            if (false === $step_index) {
                return '';
            }

            return add_query_arg('step', $keys[$step_index + 1], remove_query_arg('activate_error'));
        }

        /**
         * Get Previous Step
         * @param type $step
         * @return string
         */
        public function get_previous_step_link($step = '') {

            if (!$step) {
                $step = $this->step;
            }

            $keys = array_keys($this->steps);

            $step_index = array_search($step, $keys, true);

            if (false === $step_index) {
                return '';
            }
            $url = FALSE;

            if (isset($keys[$step_index - 1])) {
                $url = add_query_arg('step', $keys[$step_index - 1], remove_query_arg('activate_error'));
            }
            return $url;
        }

        /**
         * Helper method to retrieve the current user's email address.
         *
         * @return string Email address
         */
        protected function get_current_user_email() {
            $current_user = wp_get_current_user();
            $user_email   = $current_user->user_email;

            return $user_email;
        }

        /**
         * Step 1 Welcome
         */
        public function ocean_welcome() {
            // Image
            $img = plugins_url( '/assets/img/jack.png', __FILE__ );

            // Button icon
            if ( is_RTL() ) {
                $icon = 'left';
            } else {
                $icon = 'right';
            } ?>

            <div class="owp-welcome-wrap owp-wrap">
                <h2><?php esc_attr_e("Setup Wizard", 'ocean-extra'); ?></h2>
                <h1><?php esc_attr_e("Welcome!", 'ocean-extra'); ?></h1>
                <div class="owp-thumb">
                    <img src="<?php echo esc_url( $img ); ?>" width="425" height="290" alt="Jack the Shark" />
                </div>
                <p><?php esc_attr_e( "Thank you for choosing OceanWP, in this quick setup wizard we'll take you through the 2 essential steps for you to get started building your dream website. Make sure to go through it to the end, where we also included a little bonus as well.", 'ocean-extra' ); ?></p>
                <div class="owp-wizard-setup-actions">
                    <a class="skip-btn continue" href="<?php echo $this->get_next_step_link(); ?>"><?php esc_attr_e( "Get started", 'ocean-extra' ); ?><i class="dashicons dashicons-arrow-<?php echo esc_attr( $icon ); ?>-alt"></i></a>
                </div>
                <a class="owp-setup-footer-links" href="<?php echo esc_url( ( add_query_arg( array( 'owp_wizard_hide_notice' => 'install' ), admin_url() ) ) ); ?>"><?php esc_attr_e( "Skip Setup Wizard", 'ocean-extra' ); ?></a>
            </div>
        <?php
        }

        /**
         * Step 2 list demo
         */
        public function ocean_demo_setup() {
            $demos = OceanWP_Demos::get_demos_data();

            // Button icon
            if ( is_RTL() ) {
                $icon = 'left';
            } else {
                $icon = 'right';
            } ?>

            <div class="owp-demos-wrap owp-wrap">
                <div class="demo-import-loader preview-all"></div>
                <div class="demo-import-loader preview-icon"><i class="custom-loader"></i></div>

                <div class="owp-demo-wrap">
                    <h1><?php esc_attr_e("Selecting your demo template", 'ocean-extra'); ?></h1>
                    <p><?php echo
                        sprintf( __( 'Clicking %1$sLive Preview%2$s will open the demo in a new window for you to decide which template to use. Then %1$sSelect%2$s the demo you want and click %1$sInstall Demo%2$s in the bottom.', 'ocean-extra' ),
                        '<strong>', '</strong>'
                    ); ?></p>
                    <div class="theme-browser rendered">

                        <?php $categories = OceanWP_Demos::get_demo_all_categories($demos); ?>

                        <?php if (!empty($categories)) : ?>
                            <div class="owp-header-bar">
                                <nav class="owp-navigation">
                                    <ul>
                                        <li class="active"><a href="#all" class="owp-navigation-link"><?php esc_html_e('All', 'ocean-extra'); ?></a></li>
                                        <?php foreach ($categories as $key => $name) : ?>
                                            <li><a href="#<?php echo esc_attr($key); ?>" class="owp-navigation-link"><?php echo esc_html($name); ?></a></li>
                                        <?php endforeach; ?>
                                    </ul>
                                </nav>

                            </div>
                        <?php endif; ?>

                        <div class="themes wp-clearfix">

                            <?php
                            // Loop through all demos
                            foreach ($demos as $demo => $key) {

                                // Vars
                                $item_categories = OceanWP_Demos::get_demo_item_categories($key); ?>

                                <div class="theme-wrap" data-categories="<?php echo esc_attr($item_categories); ?>" data-name="<?php echo esc_attr(strtolower($demo)); ?>">

                                    <div class="theme owp-open-popup" data-demo-id="<?php echo esc_attr($demo); ?>">

                                        <div class="theme-screenshot">
                                            <img src="https://raw.githubusercontent.com/oceanwp/oceanwp-sample-data/master/preview/<?php echo esc_attr($demo); ?>.jpg" />

                                        </div>

                                        <div class="theme-id-container">

                                            <h2 class="theme-name" id="<?php echo esc_attr($demo); ?>"><span><?php echo ucwords($demo); ?></span></h2>
                                            <div class="theme-actions">
                                                <a class="button button-primary" href="https://<?php echo esc_attr($demo); ?>.oceanwp.org/" target="_blank"><?php _e('Live Preview', 'ocean-extra'); ?></a>
                                                <span class="button button-secondary"><?php _e('Select', 'ocean-extra'); ?></span>
                                            </div>
                                        </div>

                                    </div>

                                </div>

                            <?php } ?>

                        </div>
                        <div class="owp-wizard-setup-actions">
                            <button class="install-demos-button disabled" disabled data-next_step="<?php echo $this->get_next_step_link(); ?>"><?php esc_attr_e("Install Demo", 'ocean-extra'); ?></button>
                            <a class="skip-btn" href="<?php echo $this->get_next_step_link(); ?>"><?php esc_attr_e("Skip Step", 'ocean-extra'); ?></a>
                        </div>                
                    </div>

                </div>

                <div class="owp-wizard-setup-actions wizard-install-demos-buttons-wrapper final-step">
                    <a class="skip-btn continue" href="<?php echo $this->get_next_step_link(); ?>"><?php esc_attr_e("Next Step", 'ocean-extra'); ?><i class="dashicons dashicons-arrow-<?php echo esc_attr( $icon ); ?>-alt"></i></a>
                </div>
            </div>
            <?php
        }

        /**
         * Step 3 customize step
         */
        public function ocean_customize_setup() {

            if (isset($_POST['save_step']) && !empty($_POST['save_step'])) {
                $this->save_ocean_customize();
            }

            // Button icon
            if ( is_RTL() ) {
                $icon = 'left';
            } else {
                $icon = 'right';
            } ?>

            <div class="owp-customize-wrap owp-wrap">
                <form method="POST" name="owp-customize-form">
                    <div class="field-group">
                        <?php
                        $custom_logo = get_theme_mod("custom_logo");
                        $display = "none";
                        $url = "";

                        if ($custom_logo) {
                            $display = "inline-block";
                            if (!($url = wp_get_attachment_image_url($custom_logo))) {
                                $custom_logo = "";
                                $display = "none";
                            }
                        }
                        ?>
                        <h1><?php esc_attr_e("Logo", 'ocean-extra'); ?></h1>
                        <p><?php esc_attr_e("Please add your logo below.", 'ocean-extra'); ?></p>
                        <div class="upload">
                            <img  src="<?php echo $url; ?>"  width="115px" height="115px" id="ocean-logo-img" style="display:<?php echo $display; ?>;"/>
                            <div>
                                <input type="hidden" name="ocean-logo" id="ocean-logo" value="<?php echo $custom_logo; ?>" />
                                <button type="submit" data-name="ocean-logo" class="upload_image_button button"><?php esc_attr_e("Upload", 'ocean-extra'); ?></button>
                                <button  style="display:<?php echo $display; ?>;" type="submit" data-name="ocean-logo" class="remove_image_button button">&times;</button>
                            </div>
                        </div>

                    </div>

                    <div class="field-group">

                        <?php
                        $ocean_retina_logo = get_theme_mod("ocean_retina_logo");
                        $display = "none";
                        $url = "";

                        if ($ocean_retina_logo) {
                            $display = "inline-block";
                            $url = wp_get_attachment_image_url($ocean_retina_logo);
                            if (!($url = wp_get_attachment_image_url($ocean_retina_logo))) {
                                $ocean_retina_logo = "";
                                $display = "none";
                            }
                        }
                        ?>
                        <h1><?php esc_attr_e("Retina Logo", 'ocean-extra'); ?></h1>
                        <p><?php esc_attr_e("Please add your Retina Logo below.", 'ocean-extra'); ?></p>
                        <div class="upload">
                            <img src="<?php echo $url; ?>" width="115px" height="115px" id="ocean-retina-logo-img" style="display:<?php echo $display; ?>;"/>
                            <div>
                                <input type="hidden" name="ocean-retina-logo" id="ocean-retina-logo" value="<?php echo $ocean_retina_logo; ?>" />
                                <button type="submit" data-name="ocean-retina-logo" class="upload_image_button button"><?php esc_attr_e("Upload", 'ocean-extra'); ?></button>
                                <button  style="display:<?php echo $display; ?>;" type="submit" data-name="ocean-retina-logo" class="remove_image_button button">&times;</button>
                            </div>
                        </div>

                    </div>

                    <div class="field-group">
                        <h1><?php esc_attr_e("Site Title", 'ocean-extra'); ?></h1>
                        <p><?php esc_attr_e("Please add your Site Title below.", 'ocean-extra'); ?></p>
                        <input type="text" name="ocean-site-title" id="ocean-site-title" class="ocean-input" value="<?php echo get_option("blogname"); ?>">
                    </div>

                    <div class="field-group">
                        <h1><?php esc_attr_e("Tagline", 'ocean-extra'); ?></h1>
                        <p><?php esc_attr_e("Please add your Tagline below.", 'ocean-extra'); ?></p>
                        <input type="text" name="ocean-tagline" id="ocean-tagline" class="ocean-input" value="<?php echo get_option("blogdescription"); ?>">
                    </div>

                    <div class="field-group">

                        <?php
                        $favicon = get_option("site_icon");
                        $display = "none";
                        $url = "";

                        if ($favicon) {
                            $display = "inline-block";
                            $url = wp_get_attachment_image_url($favicon);
                            if (!($url = wp_get_attachment_image_url($favicon))) {
                                $favicon = "";
                                $display = "none";
                            }
                        }
                        ?>
                        <h1><?php esc_attr_e("Site Icon", 'ocean-extra'); ?></h1>
                        <p><?php esc_attr_e("Site Icons are what you see in browser tabs, bookmark bars, and within the WordPress mobile apps. Upload one here! Site Icons should be square and at least 512 × 512 pixels.", 'ocean-extra'); ?></p>
                        <div class="upload">
                            <img src="<?php echo $url; ?>" width="115px" height="115px" id="ocean-favicon-img" style="display:<?php echo $display; ?>;"/>
                            <div>
                                <input type="hidden" name="ocean-favicon" id="ocean-favicon" value="<?php echo $favicon; ?>" />
                                <button type="submit" data-name="ocean-favicon" class="upload_image_button button"><?php esc_attr_e("Upload", 'ocean-extra'); ?></button>
                                <button  style="display:<?php echo $display; ?>;" type="submit" data-name="ocean-favicon" class="remove_image_button button">&times;</button>
                            </div>
                        </div>

                    </div>

                    <div class="field-group">
                        <h1><?php esc_attr_e("Primary Color", 'ocean-extra'); ?></h1>
                        <p><?php esc_attr_e("Please add your Primary Color below.", 'ocean-extra'); ?></p>
                        <div class="upload">
                            <input name="ocean-primary-color" id="ocean-primary-color" class="color-picker-field" value="<?php echo get_theme_mod("ocean_primary_color"); ?>">
                        </div>
                    </div>

                    <div class="field-group">
                        <h1><?php esc_attr_e("Hover Primary Color", 'ocean-extra'); ?></h1>
                        <p><?php esc_attr_e("Please add your Hover Primary Color below.", 'ocean-extra'); ?></p>
                        <div class="upload">
                            <input name="ocean-hover-primary-color" id="ocean-hover-primary-color" class="color-picker-field" value="<?php echo get_theme_mod("ocean_hover_primary_color"); ?>">
                        </div>
                    </div>

                    <div class="field-group">
                        <h1><?php esc_attr_e("Main Border Color", 'ocean-extra'); ?></h1>
                        <p><?php esc_attr_e("Please add your Main Border Color below.", 'ocean-extra'); ?></p>
                        <div class="upload">
                            <input name="ocean-main-border-color" id="ocean-main-border-color" class="color-picker-field" value="<?php echo get_theme_mod("ocean_main_border_color"); ?>">
                        </div>
                    </div>

                    <div class="field-group">
                        <h1><?php esc_attr_e("Links Color", 'ocean-extra'); ?></h1>
                        <p><?php esc_attr_e("Please add your Links Color below.", 'ocean-extra'); ?></p>
                        <div class="upload">
                            <input name="ocean-links-color" id="ocean-links-color" class="color-picker-field" value="<?php echo get_theme_mod("ocean_links_color"); ?>">
                        </div>
                    </div>

                    <div class="field-group">
                        <h1><?php esc_attr_e("Links Hover Color", 'ocean-extra'); ?></h1>
                        <p><?php esc_attr_e("Please add your Links Hover Color below.", 'ocean-extra'); ?></p>
                        <div class="upload">
                            <input name="ocean-links-hover-color" id="ocean-links-hover-color" class="color-picker-field" value="<?php echo get_theme_mod("ocean_links_color_hover"); ?>">
                        </div>
                    </div>

                    <div class="owp-wizard-setup-actions">
                        <input type="hidden" name="save_step" value="save_step"/>
                        <button class="continue" type="submit" ><?php esc_attr_e("Continue", 'ocean-extra'); ?><i class="dashicons dashicons-arrow-<?php echo esc_attr( $icon ); ?>-alt"></i></button>
                        <a class="skip-btn" href="<?php echo $this->get_next_step_link(); ?>"><?php esc_attr_e("Skip Step", 'ocean-extra'); ?></a>
                    </div> 
                </form>
            </div>
            <?php
        }

        /**
         * Save Info In Step3
         */
        public function save_ocean_customize() {
            if (isset($_POST['ocean-logo']))
                set_theme_mod('custom_logo', $_POST['ocean-logo']);

            if (isset($_POST['ocean-retina-logo']))
                set_theme_mod('ocean_retina_logo', $_POST['ocean-retina-logo']);

            if (isset($_POST['ocean-site-title']))
                update_option('blogname', $_POST['ocean-site-title']);

            if (isset($_POST['ocean-tagline']))
                update_option('blogdescription', $_POST['ocean-tagline']);

            if (isset($_POST['ocean-favicon']))
                update_option('site_icon', $_POST['ocean-favicon']);

            if (isset($_POST['ocean-primary-color']))
                set_theme_mod('ocean_primary_color', $_POST['ocean-primary-color']);

            if (isset($_POST['ocean-hover-primary-color']))
                set_theme_mod('ocean_hover_primary_color', $_POST['ocean-hover-primary-color']);

            if (isset($_POST['ocean-main-border-color']))
                set_theme_mod('ocean_main_border_color', $_POST['ocean-main-border-color']);

            if (isset($_POST['ocean-links-color']))
                set_theme_mod('ocean_links_color', $_POST['ocean-links-color']);

            if (isset($_POST['ocean-links-hover-color']))
                set_theme_mod('ocean_links_color_hover', $_POST['ocean-links-hover-color']);

            wp_safe_redirect($this->get_next_step_link());
            exit;
        }

        /**
         * Step 4 ready step
         */
        public function ocean_ready_setup() {
            $user_email = $this->get_current_user_email(); ?>

            <div class="owp-ready-wrap owp-wrap">
                <h2><?php esc_attr_e("Congratulations", 'ocean-extra'); ?></h2>
                <h1><?php esc_attr_e("Your website is ready!", 'ocean-extra'); ?></h1>
                <p><?php echo
                    sprintf( __( 'The first part of creating your website is now done. There&rsquo;s still some work to be done, though. As promised, we&rsquo;ve created a %1$sbonus introduction video series%2$s, that&rsquo;ll get you up to speed in no time. It&rsquo;s highly recommended to watch it.', 'ocean-extra' ),
                    '<strong>', '</strong>'
                ); ?></p>
                <div class="owp-newsletter">
                    <p><?php esc_attr_e("Input your email below to receive the bonus video guide.", 'ocean-extra'); ?></p>

                    <form id="owp_email_signup" class="klaviyo_styling klaviyo_gdpr_embed_J7zjRA" action="//manage.kmail-lists.com/subscriptions/subscribe" data-ajax-submit="//manage.kmail-lists.com/ajax/subscriptions/subscribe" method="GET" target="_blank" novalidate="novalidate">
                        <input type="hidden" name="g" value="J7zjRA">
                        <div class="klaviyo_field_group">
                            <input class="" type="email" value="<?php echo esc_attr( $user_email ); ?>" name="email" id="k_id_email" placeholder="<?php esc_attr_e( 'Email address', 'ocean-extra' ); ?>"/>
                        </div>
                        <div class="klaviyo_form_actions">
                            <button type="submit" class="klaviyo_submit_button"><?php esc_html_e( 'Send the guide', 'ocean-extra' ); ?></button>
                        </div>
                        <div class="klaviyo_messages">
                            <div class="success_message" style="display:none;"><?php esc_html_e( 'Thank you for signing up!', 'ocean-extra' ); ?></div>
                            <div class="error_message" style="display:none;"></div>
                        </div>
                    </form>
                    <script type="text/javascript" src="//www.klaviyo.com/media/js/public/klaviyo_subscribe.js"></script>
                    <script type="text/javascript">
                     KlaviyoSubscribe.attachToForms('#owp_email_signup', {
                         custom_success_message: true,
                         extra_properties: {
                         $source: '$embed',
                         $method_type: "Klaviyo Form",
                         $method_id: 'embed',
                         $consent_version: 'Embed default text'
                     }
                     });
                    </script>
                </div>

                <div class="owp-wizard-setup-actions">
                    <a class="button button-next button-large" href="<?php echo esc_url( ( add_query_arg( array( 'owp_wizard_hide_notice' => 'install', 'show' => '1', ), admin_url() ) ) ); ?>"><?php esc_html_e( 'View Your Website', 'ocean-extra' ); ?></a>
                </div>
            </div>
            <?php
        }

    }

    new Ocean_Extra_Theme_Wizard();

    register_activation_hook( OE_FILE_PATH, "Ocean_Extra_Theme_Wizard::install" );
endif;