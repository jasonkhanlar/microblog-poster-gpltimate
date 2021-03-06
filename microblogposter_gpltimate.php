<?php
/**
 *
 * Plugin Name: Microblog Poster GPLtimate
 * Plugin URI: https://wordpress.org/plugins/microblog-poster-gpltimate
 * Description: A GPL wordpress plugin helper which brings additional functionalities to the Microblog Poster free plugin comparable to the Ultimate Add-on
 * Version: 1.0.0
 * Author: Jason Khanlar
 * Author URI: http://nullvoid.org/jason.khanlar
 * License: GPL2
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain: microblog-poster-gpltimate
 *
 */

//$error_level = error_reporting();
//$display_errors = ini_get( ' display_errors' );
//error_reporting( E_ALL ); ini_set( 'display_errors', 1 );
//error_reporting( $error_level ); ini_set( 'display_errors', $display_errors) ;

/*
* $mp['val'] === 0
*    get_shortcodes()
*    $old === 1
*        $log_data['log_type'] = 'old'
* $mp['val'] === 1
*    $log_data['log_type'] = 'manual'
*    $mp['type'] === 'link'
*        get_shortcodes_mp()
* $_POST['mbp_control_dashboard_microblogposter'] === '1'
*    $dash = 1
* $dash ==== 1
*    $_POST['mbp_microblogposter_category_to_account'] === "on"
*        $cdriven = true
*/

// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;

if ( !class_exists( 'MicroblogPoster_Poster_GPLtimate' ) ) {
    class MicroblogPoster_Poster_GPLtimate {

        private static function check_dependencies() {
            if ( ! is_plugin_active( 'microblog-poster/microblogposter.php' ) && current_user_can( 'activate_plugins' ) ) {
                echo 'Sorry, but the ' . get_plugin_data( __FILE__ )['Name'] . ' plugin requires the Microblog Poster plugin to be installed and active.';
                exit;
            }
            if ( !MicroblogPoster_Poster::is_method_callable( 'MicroblogPoster_Poster', 'is_method_callable' ) == true ) {
                echo 'Sorry, but the Microblog Poster plugin is no longer compatible with the ' . get_plugin_data( __FILE__ )['Name'] . ' plugin.';
                exit;
            }
        }

        public static function activate() {
            self::check_dependencies();
            update_option( 'microblogposterpro_plg_customer_license_key', '{"key":"board", "verified":true}' );
        }

        public static function deactivate() {
            delete_option( 'microblogposterpro_plg_customer_license_key' );
        }

        public static function update() {
	    self::update_actions();
	    $customer_license_key_name = "microblogposterpro_plg_customer_license_key";
	    $customer_license_key_value = get_option( "microblogposterpro_plg_customer_license_key", '{"key":"board", "verified":true}' );
	}

        public static function update_actions() {
	    /* Replace Microblog Poster actions  */
            //remove_action( 'plugins_loaded', array( 'MicroblogPoster_Poster', 'load_languages' ) );

            remove_action( 'publish_post', array( 'MicroblogPoster_Poster', 'update' ) );
            add_action( 'publish_post', array( 'MicroblogPoster_Poster_Update', 'update' ) );

            //$page_mode_name = "microblogposter_page_mode";
            //$page_mode_value = get_option( $page_mode_name, "" );
            //if ( $page_mode_value ) {
            //    remove_action( 'publish_page', array( 'MicroblogPoster_Poster', 'update' ) );
            //}

            //$enabled_custom_types_name = "microblogposter_enabled_custom_types";
            //$enabled_custom_types_value = get_option( $enabled_custom_types_name, "" );
            //$enabled_custom_types = json_decode( $enabled_custom_types_value, true );
            //if ( is_array( $enabled_custom_types ) && !empty( $enabled_custom_types ) ) {
            //    foreach( $enabled_custom_types as $custom_type ) {
            //        remove_action( 'publish_' . $custom_type, array( 'MicroblogPoster_Poster', 'update' ) );
            //    }
            //}

            //remove_action( 'microblogposter_plg_old_posts_publish', array( 'MicroblogPoster_Poster', 'handle_old_posts_publish' ) );

            //remove_filter( 'cron_schedules', array( 'MicroblogPoster_Poster', 'add_new_cron_interval' ) );

            //remove_action( 'admin_menu', 'microblogposter_meta_box' );

            //$microblogposter_plugin = 'microblog-poster/microblogposter.php'; 
            //remove_filter( "plugin_action_links_{$microblogposter_plugin}", 'microblogposter_plugin_settings_link' );

            //remove_action( 'admin_init', 'microblogposter_admin_init' );

            //remove_action( 'admin_menu', 'microblogposter_settings' );
        }

    }
}

if ( !class_exists( 'MicroblogPoster_Poster_Enterprise' ) ) {
    class MicroblogPoster_Poster_Enterprise {

        // Incomplete
        public static function filter_single_account_cdriven( $account_id, $post_ID, $extra ) {
	// returns to set value of $active
        }

        // Incomplete
        public static function filter_single_account_cdriven_old( $account_id, $post_ID, $extra ) {
	// returns to set value of $active
        }

        // Incomplete
        public static function filter_single_account_cdriven_wodash( $account_id, $post_ID, $esxtra ) {
	// returns to set value of $active
        }

        // Incomplete
        public static function filter_single_account_mp( $account_id ) {
		if ( !isset( $_POST['mbp_social_account_microblogposter_' . $account_id] ) ) return false;
		return array( 'message_format' => $_POST['mbp_social_account_microblogposter_msg_' . $account_id] );
        }

        // Incomplete
        public static function shorten_with_adfly( $long_url ) {
        }

        // Incomplete
        public static function shorten_with_adfocus( $long_url ) {
        }

        // Incomplete
        public static function shorten_with_ppw( $long_url ) {
        }

    }
}

if ( !class_exists( 'MicroblogPoster_Poster_Enterprise_Options' ) ) {
    class MicroblogPoster_Poster_Enterprise_Options {

	/**
	 * Manually auto share to your configured social accounts
	 * @return bool
	 */
        // Incomplete
        public static function handle_manual_post() {
            $post_ID = 0;

            /* Adjust selected tab */
            if ( isset( $_POST["submit_manual_post"] ) ) {
?>
<script>jQuery(document).ready(function($) { setTimeout(function() {
	$('.mbp-selected-tab').removeClass('mbp-selected-tab').addClass('mbp-tab-background');
	$('#mbp-social-networks-accounts').hide();
	$('#mbp-general-section').hide();
	$('#mbp-logs-wrapper').hide();
	$('#mbp-old-posts-publish-wrapper').hide();
	$("#mbp-manual-post-tab").addClass('mbp-selected-tab').removeClass('mbp-tab-background');
	$('#mbp-manual-post-wrapper').show();
	console.log(4);
}, 50); });</script>
<?php
            }

	// Look for $_POST["submit_manual_post"] and other $_POST elements:
	// name="mbp_mp_post_type" == link or text
	// name="mbp_mp_title"  link
	// name="mbp_mp_url"  link
	// name="mbp_mp_description"  link
	// name="mbp_mp_message" if text
	
	// name="mbp_social_account_microblogposter_3" checkbox
	// name="mbp_social_account_microblogposter_msg_3" textarea
	
	// name="mbp_social_account_microblogposter_5" checkbox
	// name="mbp_social_account_microblogposter_msg_5" textarea

            $author_id = get_current_user_id();
            if ( !MicroblogPoster_Poster::can_user_auto_publish( get_current_user_id() ) ) return;


            $apply_filters = MicroblogPoster_Poster::is_apply_filters_activated();

            $shortcode_title_max_length = MicroblogPoster_Poster::get_shortcode_title_max_length();
            $shortcode_firstwords_max_length = MicroblogPoster_Poster::get_shortcode_firstwords_max_length();
            $shortcode_excerpt_max_length = MicroblogPoster_Poster::get_shortcode_excerpt_max_length();

            $post_title = '';
            $post_url = '';
            $post_message = '';
            if ( $_POST['mbp_mp_post_type'] == 'link' ) {
                $post_title = $_POST['mbp_mp_title'];
                $post_url = $_POST['mbp_mp_url'];
                $post_message = $_POST['mbp_mp_description'];
            } else if ( $_POST['mbp_mp_post_type'] == 'text' ) {
                $post_message = $_POST['mbp_mb_message'];
            }

            if ( $apply_filters ) {
                $post_title = apply_filters( 'the_title', $post_title );
                $post_content_actual = apply_filters( 'the_content', $post_message );
            } else {
                $post_content_actual = $post_message;
            }
            $post_title = MicroblogPoster_Poster_Update::shorten_title( $post_title, $shortcode_title_max_length, ' ' );

            $post_content_actual_lkn = MicroblogPoster_Poster_Update::clean_up_and_shorten_content( $post_content_actual, 350, ' ' );
            $post_content_actual_tmb = MicroblogPoster_Poster_Update::shorten_content( $post_content_actual, 500, '.' );

            $permalink = $post_url;
            $permalink_actual = $post_url;
            $update = $post_title . " $permalink";

            $post_thumbnail_id = '';
	    //$featured_image_path_full = wp_upload_dir()['basedir'] . '/' . wp_get_attachment_metadata( get_theme_mod( 'custom_logo' ) )['file'];
	    $featured_image_path_full = '';
            //$featured_image_src_full = wp_get_attachment_image_src( get_theme_mod( 'custom_logo' ) , 'full' )[0];
            $featured_image_src_full = '';
            //$featured_image_src_thumbnail = wp_get_attachment_image_src( get_theme_mod( 'custom_logo' ) , 'thumbnail' )[0];
            $featured_image_src_thumbnail = '';
            //$featured_image_src_medium = wp_get_attachment_image_src( get_theme_mod( 'custom_logo' ) , 'medium' )[0];
            $featured_image_src_medium = '';

            $post_content = array();
            //$post_content[] = home_url();
            $post_content[] = $post_url;
            $post_content[] = $post_title;
            $post_content[] = $permalink;

            $shortened_permalink = '';
            $shortened_permalink_twitter = '';
            $short_url_results = MicroblogPoster_Poster::shorten_long_url( $permalink );
            if ( $short_url_results['shortened_permalink'] ) {
                $shortened_permalink = $short_url_results['shortened_permalink'];
                $update = $post_title . " $shortened_permalink";
                $permalink = $shortened_permalink;
            }
            if ( $short_url_results['shortened_permalink_twitter'] ) {
                $shortened_permalink_twitter = $short_url_results['shortened_permalink_twitter'];
            }

            $post_content[] = $shortened_permalink;

            $post_excerpt_manual = '';
            if ( $apply_filters ) {
                $post_excerpt_tmp = apply_filters( 'the_content', $post_message );
                $post_excerpt_tmp = MicroblogPoster_Poster_Update::strip_shortcodes_and_tags( $post_excerpt_tmp );
            } else {
                $post_excerpt_tmp = MicroblogPoster_Poster_Update::strip_shortcodes_and_tags( $post_message );
            }

            if ( $post_excerpt_tmp ) {
                $post_excerpt_manual = $post_excerpt_tmp;
                $post_content_actual_lkn = $post_excerpt_tmp;
            }
            $post_content[] = $post_excerpt_manual;

            if ( $post_excerpt_manual != '' ) {
                $post_content[] = $post_excerpt_manual;
            } else {
                $post_excerpt = MicroblogPoster_Poster_Update::shorten_content( $post_content_actual, $shortcode_excerpt_max_length, '.' );
                $post_content[] = $post_excerpt;
            }

            $author = MicroblogPoster_Poster::get_author( get_current_user_id() );
            $post_content[] = get_current_user_id();

            $post_content_first_words = MicroblogPoster_Poster_Update::clean_up_and_shorten_content( $post_content_actual, $shortcode_firstwords_max_length, ' ' );
            $post_content[] = $post_content_first_words;
            $post_content[] = $post_content_actual;

            $post_content_twitter = $post_content;
            $post_content_twitter[3] = $shortened_permalink_twitter;

	    // Add featured image for next shortcode, see private static function get_shortcodes()
	    $post_content[] = $featured_image_src_full;

            $tags = '';
            $old = 0;

            $dash = 0;
            if ( isset( $_POST['mbp_control_dashboard_microblogposter'] ) && trim( $_POST['mbp_control_dashboard_microblogposter'] ) == '1' ) {
                $dash = 1;
            }

            $mp = array();
	    $mp['val'] = 1;
            $mp['type'] = $_POST['mbp_mp_post_type'];;

            $cdriven = 'manual';
            @ini_set( 'max_execution_time', '0' );

        MicroblogPoster_Poster_Update::update_twitter($cdriven, $old, $mp, $dash, $update, $post_content_twitter, $post_ID, $featured_image_src_full);
/*
        MicroblogPoster_Poster::update_plurk($cdriven, $old, $mp, $dash, $update, $post_content, $post_ID);
	MicroblogPoster_Poster::update_delicious($cdriven, $old, $mp, $dash, $post_title, $permalink, $tags, $post_content, $post_ID);
        MicroblogPoster_Poster::update_friendfeed($cdriven, $old, $mp, $dash, $post_title, $permalink, $post_content, $post_ID);
        MicroblogPoster_Poster::update_facebook($cdriven, $old, $mp, $dash, $update, $post_content, $post_ID, $post_title, $permalink, $post_content_actual_lkn, $featured_image_src_full);
        MicroblogPoster_Poster::update_diigo($cdriven, $old, $mp, $dash, $post_title, $permalink, $tags, $post_content, $post_ID);
        MicroblogPoster_Poster::update_linkedin($cdriven, $old, $mp, $dash, $update, $post_content, $post_ID, $post_title, $permalink, $post_content_actual_lkn, $featured_image_src_medium);
        MicroblogPoster_Poster::update_tumblr($cdriven, $old, $mp, $dash, $update, $post_content, $post_ID, $post_title, $permalink, $post_content_actual_tmb, $featured_image_src_full);
        MicroblogPoster_Poster::update_blogger($cdriven, $old, $mp, $dash, $update, $post_content, $post_ID, $post_title, $permalink, $post_content_actual_tmb, $featured_image_src_full);
        MicroblogPoster_Poster::update_instapaper($cdriven, $old, $mp, $dash, $post_title, $permalink, $post_content, $post_ID);
        MicroblogPoster_Poster::update_vkontakte($cdriven, $old, $mp, $dash, $update, $post_content, $post_ID, $post_title, $permalink, $post_content_actual_lkn, $featured_image_src_thumbnail, $permalink_actual);
        MicroblogPoster_Poster::update_xing($cdriven, $old, $mp, $dash, $update, $post_content, $post_ID, $post_title, $permalink, $post_content_actual_tmb);
        MicroblogPoster_Poster::update_pinterest($cdriven, $old, $mp, $dash, $update, $post_content, $post_ID, $post_title, $permalink_actual, $post_content_actual_lkn, $featured_image_src_full);
        MicroblogPoster_Poster::update_flickr($cdriven, $old, $mp, $dash, $post_title, $update, $tags, $post_content, $post_ID, $featured_image_path_full, $post_content_actual_lkn);
        MicroblogPoster_Poster::update_wordpress($cdriven, $old, $mp, $dash, $update, $post_content, $post_ID, $post_title, $permalink_actual, $post_content_actual_lkn, $featured_image_src_full, $tags);
*/

	// Look for $_POST["submit_manual_post"] and other $_POST elements:
	// name="mbp_mp_post_type" == link or text
	// name="mbp_mp_title"  link
	// name="mbp_mp_url"  link
	// name="mbp_mp_description"  link
	// name="mbp_mp_message" if text
	
	// name="mbp_social_account_microblogposter_3" checkbox
	// name="mbp_social_account_microblogposter_msg_3" textarea
	
	// name="mbp_social_account_microblogposter_5" checkbox
	// name="mbp_social_account_microblogposter_msg_5" textarea
	
	// logs
	// log_id (next)
	// account_id ????
	// account_type manual
	// username (wordpress user)
	// post_id ???
	// action_result == 1 success
	// action_result == 2 fail
	// update_message == Message
	// log_type == manual
	// log_message == Success or json error
	// log_datetime == datetime

                        $log_data = array();
//                        $log_data['log_type'] = "manual";
//                        $log_data['account_id'] = $twitter_account['account_id'];
////                        $log_data['account_type'] = "manual";
//                        $log_data['username'] = $twitter_account['username'] . ' - Upload Image';
//                        $log_data['post_id'] = 0;
//                        $log_data['action_result'] = 2;
//                        $log_data['update_message'] = '';
//                        $log_data['log_message'] = $upload_result;
                        //MicroblogPoster_Poster::insert_log($log_data);


	// returns to set value of $manual_share_completed as true or false
	return true;
        }

        // Incomplete
        public static function microblogposter_display_link_categories( $link_categories ) {
        }

    }
}

if ( !class_exists( 'MicroblogPoster_Poster_Pro' ) ) {
    class MicroblogPoster_Poster_Pro {

        /* Typo in original plugin */
        public static function filter_sifngle_account( $account_id ) {
            return self::filter_single_account( $account_id );
        }

        /**
        * Filters single social account
        *
        * @param int $account_id
        * @return mixed
        */
        // Incomplete
        public static function filter_single_account( $account_id ) {
            global $wpdb;

            $table_accounts = $wpdb->prefix . 'microblogposter_accounts';

            $sql = "SELECT * FROM $table_accounts WHERE account_id={$account_id}";
            if (MicroblogPoster_Poster::is_method_callable( 'MicroblogPoster_Poster_Ultimate', 'resolve_sql_old_posts' ) ) {
                $sql .= MicroblogPoster_Poster_Ultimate::resolve_sql_old_posts();
            }
            $rows = $wpdb->get_results( $sql );
            if ( empty( $rows ) ) return false;
            $row = $rows[0];
            $extra = json_decode( $row->extra, true );

            $active = false;
            if ( isset( $extra['old_posts_active'] ) && $extra['old_posts_active'] == 1 ) {
                $message_format = $extra['message_format_old'];
                $active = array();
                $active['message_format'] = $message_format;
            }

            return $active;
        }

        // Incomplete
        public static function handle_old_posts_publish() {
        }

        /**
        * Sends OAuth signed request
        *
        * @param   string  $curl curl
        * @param   string  $c_key Application consumer key
        * @param   string  $c_secret Application consumer secret
        * @param   string  $token Account access token
        * @param   string  $token_secret Account access token secret
        * @param   string  $api_url URL of the API end point
        * @param   string  $params Parameters to be passed
        * @return  void
        */
        // Incomplete
        public static function send_signed_request_and_upload( $curl, $c_key, $c_secret, $token, $token_secret, $api_url, $params ) {
            $consumer = new MicroblogPosterOAuthConsumer( $c_key, $c_secret );
            $access_token = new MicroblogPosterOAuthConsumer( $token, $token_secret );

            $request = MicroblogPosterOAuthRequest::from_consumer_and_token(
                $consumer,
                $access_token,
                "POST",
                $api_url,
                $params
            );
            $hmac_method = new MicroblogPosterOAuthSignatureMethod_HMAC_SHA1();
            $request->sign_request( $hmac_method, $consumer, $access_token );

            $body = new stdClass();
            $body->url = $params['image_url'];
	    $body->media_data = base64_encode( file_get_contents( $params['image_url'] ) );

            if ( ( $pos = strpos( $request, "?" ) ) !== false ) {
                $url = substr( $request, 0, $pos );
                $parameters = substr( $request, $pos + 1 );
            }
        
            $parametersArray = explode( '&', $parameters );
            $authHeader = "OAuth ";
            foreach( $parametersArray as $parametersE ) {
                $parametersTemp = explode( '=', $parametersE );
                $authHeader .= $parametersTemp[0] . '="' . $parametersTemp[1] . '",';
            }
        
            $headers = array(
                'Content-type'  => 'multipart/form-data',
                'Authorization' => $authHeader
            );
        
            $curl = new MicroblogPoster_Curl();
            $curl->set_headers( $headers );
            $result = $curl->send_post_data_json( $request->to_url(), $body );

            return $result;
        }

        // Incomplete
        public static function show_control_dashboard() {
            ?>
            <div>Implement dashboard here</div>
            <?php
        }

        // Incomplete
        public static function update_facebook_group( $curl, $acc_extra, $post_data ) {
        }

        // Incomplete
        public static function update_linkedin_company( $curl, $acc_extra, $post_data ) {
        }

        // Incomplete
        public static function update_linkedin_group( $curl, $acc_extra, $post_data ) {
        }

        // Incomplete
        public static function update_tumblr_link( $account, $acc_extra, $post_data ) {
        }

        // Incomplete
        public static function update_vkontakte_community( $curl, $acc_extra, $post_data ) {
        }

    }
}

if ( !class_exists( 'MicroblogPoster_Poster_Pro_Options' ) ) {
    class MicroblogPoster_Poster_Pro_Options {

        // Incomplete
        public static function get_facebook_group_access_token( $curl, $uid, $access_token, $app_access_token ) {
        }
        */

        public static function verify_license_key() {
            return array( 'key' => 'board', 'verified' => true );
        }

    }
}

if ( !class_exists( 'MicroblogPoster_Poster_Ultimate' ) ) {
    class MicroblogPoster_Poster_Ultimate {

        // Incomplete
        public static function resolve_accounts( $type, $post_ID ) {
        }

        // Incomplete
        public static function resolve_sql() {
        }

        // Incomplete
        public static function resolve_sql_allowed_authors() {
        }

        // Incomplete
        public static function resolve_sql_logs() {
        }

        // Incomplete
        public static function resolve_sql_old_posts() {
        }

        public static function sync( $user_id ) {
        }

        // Incomplete
        public static function unsync( $user_id ) {
        }

    }
}

if ( !class_exists( 'MicroblogPoster_Poster_Ultimate_Options' ) ) {
    class MicroblogPoster_Poster_Ultimate_Options {

        // Incomplete
        public static function add_cap( $role ) {
        }

        public static function is_loaded() { return true; }

        // to do: Save settings
        // Incomplete
        function microblogposter_display_role_ma( $role_id, $role, $sep, $who_can_auto_publish ) {
            ?>
            <?php echo $sep; ?>
            <input type="checkbox" class="mbp-excluded-category" id="microblogposter_who_can_auto_publish_ma_<?php echo $role_id; ?>" name="microblogposter_who_can_auto_publish_ma[]" value="<?php echo $role_id; ?>"
            <?php if ( in_array( $role_id, $who_can_auto_publish_ma ) ) echo 'checked="checked"'; ?> <?php if ( $role_id == 'administrator' ) echo 'disabled="disabled"'; ?>/> 
            <label for="microblogposter_who_can_auto_publish_ma_<?php echo $role_id; ?>" ><?php echo $role['name']; ?></label> 
            <br/>
            <?php
        }

        // Incomplete
        public static function remove_cap( $role ) {
        }

        // Incomplete
        public static function render_who_can_ma( $multi_author_mode_name, $multi_author_mode_value, $who_can_auto_publish_ma ) {
            $multi_author_mode_name = "microblogposter_plg_multi_author_mode";
            $multi_author_active = get_option($multi_author_mode_name, 0);
?>
                    <tr>
                        <td colspan="2">
                            <h3><span class="mbp-blue-title"><?php _e( 'Multi-Author :', 'microblog-poster' ); ?></span></h3>
                        </td>
                    </tr>
                    <tr>
                        <td class="label-input padding-left">
                            <h3><?php _e( 'Enable Multi-Author Mode :', 'microblog-poster' ); ?></h3>
                        </td>
                        <td>
			    <input type="checkbox" id="<?= $multi_author_mode_name; ?>" name="<?= $multi_author_mode_name; ?> " value="1" <?php if ( $multi_author_active ) echo 'checked="checked"'; ?> />
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2" class="padding-left">
                            <h3><?php _e( 'Who can create personal accounts and auto publish :', 'microblog-poster' ); ?></h3>
                        </td>
                    </tr>
                    <tr>
                        <td class="label-input padding-left" colspan="2" id="mbp-excluded-category-td">
                    <?php
                        
                        $roles = get_editable_roles();
                        if ( is_array( $roles ) && !empty( $roles ) ) {
                            foreach ( $roles as $role_id => $role ) {
                                self::microblogposter_display_role_ma( $role_id, $role, '<span class="mbp-separator-span"></span>', $who_can_auto_publish );
                            }
                        }
                        ?>
                        </td>
                    </tr>
<?php
/*
            'Enable Multi-Author Mode :'
	    "Who can create personal accounts and auto publish :"
	    var_dump($multi_author_mode_name);
	    var_dump($multi_author_mode_value);
	    var_dump($who_can_auto_publish_ma);
	    */
        }

        // Incomplete
        public static function sync_cap( $who_can_auto_publish_ma_value ) {
        }

        // Incomplete
        public static function sync_who_can( $who_can_auto_publish_ma_name, $who_can_auto_publish_ma_value ) {
        }

    }
}

if ( !class_exists( 'MicroblogPoster_Poster_Update' ) ) {
    class MicroblogPoster_Poster_Update {

        /*** Modified public static function from class MicroblogPoster_Poster ***/
        public static function update( $post_ID ) {
            $post = get_post( $post_ID );
            $author_id = (int)$post->post_author;
            if ( !MicroblogPoster_Poster::can_user_auto_publish( $author_id ) ) return;

            // Fixed
            if ( isset( $_POST['microblogposteroff'] ) && $_POST['microblogposteroff'] == "on" ) return;

            $post_categories = wp_get_post_categories( $post_ID );
            if ( MicroblogPoster_Poster::is_post_in_excluded_category( $post_categories ) ) return;

            $apply_filters = MicroblogPoster_Poster::is_apply_filters_activated();

            $shortcode_title_max_length = MicroblogPoster_Poster::get_shortcode_title_max_length();
            $shortcode_firstwords_max_length = MicroblogPoster_Poster::get_shortcode_firstwords_max_length();
            $shortcode_excerpt_max_length = MicroblogPoster_Poster::get_shortcode_excerpt_max_length();


            if ( $apply_filters ) {
                $post_title = apply_filters( 'the_title', $post->post_title );
            } else {
                $post_title = $post->post_title;
            }
            $post_title = MicroblogPoster_Poster_Update::shorten_title( $post_title, $shortcode_title_max_length, ' ' );


            if ( $apply_filters ) {
                $post_content_actual = apply_filters( 'the_content', $post->post_content );
            } else {
                $post_content_actual = $post->post_content;
            }
            $post_content_actual_lkn = MicroblogPoster_Poster_Update::clean_up_and_shorten_content( $post_content_actual, 350, ' ' );
            $post_content_actual_tmb = MicroblogPoster_Poster_Update::shorten_content( $post_content_actual, 500, '.' );

            $permalink = get_permalink( $post_ID );
            $permalink_actual = $permalink;
            $update = $post_title . " $permalink";

            $post_thumbnail_id = get_post_thumbnail_id( $post_ID );
            $featured_image_path_full = MicroblogPoster_Poster::get_featured_image_path_full( $post_thumbnail_id );
            $featured_image_src_full = MicroblogPoster_Poster::get_featured_image_src_full( $post_thumbnail_id );
            $featured_image_src_thumbnail = MicroblogPoster_Poster::get_featured_image_src_thumbnail( $post_thumbnail_id );
            $featured_image_src_medium = MicroblogPoster_Poster::get_featured_image_src_medium( $post_thumbnail_id );

            $post_content = array();
            $post_content[] = home_url();
            $post_content[] = $post_title;
            $post_content[] = $permalink;

            $shortened_permalink = '';
            $shortened_permalink_twitter = '';
            $short_url_results = MicroblogPoster_Poster::shorten_long_url( $permalink );
            if ( $short_url_results['shortened_permalink'] ) {
                $shortened_permalink = $short_url_results['shortened_permalink'];
                $update = $post_title . " $shortened_permalink";
                $permalink = $shortened_permalink;
            }
            if ( $short_url_results['shortened_permalink_twitter'] ) {
                $shortened_permalink_twitter = $short_url_results['shortened_permalink_twitter'];
            }

            $post_content[] = $shortened_permalink;

            $post_excerpt_manual = '';
            if ( $apply_filters ) {
                $post_excerpt_tmp = apply_filters( 'the_content', $post->post_excerpt );
                $post_excerpt_tmp = MicroblogPoster_Poster_Update::strip_shortcodes_and_tags( $post_excerpt_tmp );
            } else {
                $post_excerpt_tmp = MicroblogPoster_Poster_Update::strip_shortcodes_and_tags( $post->post_excerpt );
            }

            if ( $post_excerpt_tmp ) {
                $post_excerpt_manual = $post_excerpt_tmp;
                $post_content_actual_lkn = $post_excerpt_tmp;
            }
            $post_content[] = $post_excerpt_manual;

            if ( $post_excerpt_manual != '' ) {
                $post_content[] = $post_excerpt_manual;
            } else {
                $post_excerpt = MicroblogPoster_Poster_Update::shorten_content( $post_content_actual, $shortcode_excerpt_max_length, '.' );
                $post_content[] = $post_excerpt;
            }

            $author = MicroblogPoster_Poster::get_author( $author_id );
            $post_content[] = $author;

            $post_content_first_words = MicroblogPoster_Poster_Update::clean_up_and_shorten_content( $post_content_actual, $shortcode_firstwords_max_length, ' ' );
            $post_content[] = $post_content_first_words;
            $post_content[] = $post_content_actual;

            $post_content_twitter = $post_content;
            $post_content_twitter[3] = $shortened_permalink_twitter;

	    // Add featured image for next shortcode, see private static function get_shortcodes()
	    $post_content[] = $featured_image_src_full;

            $tags = MicroblogPoster_Poster::get_post_tags( $post_ID );

            $old = 0;

            $dash = 0;
            if ( isset( $_POST['mbp_control_dashboard_microblogposter'] ) && trim( $_POST['mbp_control_dashboard_microblogposter'] ) == '1' ) {
                $dash = 1;
            }

            $mp = array();
            $mp['val'] = 0;
            $mp['type'] = '';

            $cdriven = false;
            if ( $dash == 1 ) {
                if ( isset( $_POST['mbp_microblogposter_category_to_account'] ) && $_POST['mbp_microblogposter_category_to_account'] == "on" ) {
                    $cdriven = true;
                }
            } else {
                $default_behavior_cat_driven_name = "microblogposter_default_behavior_cat_driven";
                $cdriven = get_option( $default_behavior_cat_driven_name, false );
            }

            @ini_set( 'max_execution_time', '0' );

            MicroblogPoster_Poster_Update::update_twitter( $cdriven, $old, $mp, $dash, $update, $post_content_twitter, $post_ID, $featured_image_src_full );
            // Add to Plurk: Featured Image
            MicroblogPoster_Poster_Update::update_plurk( $cdriven, $old, $mp, $dash, $update, $post_content, $post_ID );
            MicroblogPoster_Poster::update_delicious( $cdriven, $old, $mp, $dash, $post_title, $permalink, $tags, $post_content, $post_ID );
            MicroblogPoster_Poster::update_friendfeed( $cdriven, $old, $mp, $dash, $post_title, $permalink, $post_content, $post_ID );
            MicroblogPoster_Poster::update_facebook( $cdriven, $old, $mp, $dash, $update, $post_content, $post_ID, $post_title, $permalink, $post_content_actual_lkn, $featured_image_src_full );
            MicroblogPoster_Poster::update_diigo( $cdriven, $old, $mp, $dash, $post_title, $permalink, $tags, $post_content, $post_ID );
            MicroblogPoster_Poster::update_linkedin( $cdriven, $old, $mp, $dash, $update, $post_content, $post_ID, $post_title, $permalink, $post_content_actual_lkn, $featured_image_src_medium );
            MicroblogPoster_Poster::update_tumblr( $cdriven, $old, $mp, $dash, $update, $post_content, $post_ID, $post_title, $permalink, $post_content_actual_tmb, $featured_image_src_full );
            MicroblogPoster_Poster::update_blogger( $cdriven, $old, $mp, $dash, $update, $post_content, $post_ID, $post_title, $permalink, $post_content_actual_tmb, $featured_image_src_full );
            MicroblogPoster_Poster::update_instapaper( $cdriven, $old, $mp, $dash, $post_title, $permalink, $post_content, $post_ID );
            MicroblogPoster_Poster::update_vkontakte( $cdriven, $old, $mp, $dash, $update, $post_content, $post_ID, $post_title, $permalink, $post_content_actual_lkn, $featured_image_src_thumbnail, $permalink_actual );
            MicroblogPoster_Poster::update_xing( $cdriven, $old, $mp, $dash, $update, $post_content, $post_ID, $post_title, $permalink, $post_content_actual_tmb );
            MicroblogPoster_Poster::update_pinterest( $cdriven, $old, $mp, $dash, $update, $post_content, $post_ID, $post_title, $permalink_actual, $post_content_actual_lkn, $featured_image_src_full );
            MicroblogPoster_Poster::update_flickr( $cdriven, $old, $mp, $dash, $post_title, $update, $tags, $post_content, $post_ID, $featured_image_path_full, $post_content_actual_lkn );
            MicroblogPoster_Poster::update_wordpress( $cdriven, $old, $mp, $dash, $update, $post_content, $post_ID, $post_title, $permalink_actual, $post_content_actual_lkn, $featured_image_src_full, $tags );

            MicroblogPoster_Poster_Update::maintain_logs();
        }

        public static function update_plurk( $cdriven, $old, $mp, $dash, $update, $post_content, $post_ID ) {
            $plurk_accounts = MicroblogPoster_Poster_Update::get_accounts_by_mode( 'plurk', $post_ID );
            if ( !empty( $plurk_accounts ) ) {
                foreach ( $plurk_accounts as $plurk_account ) {
                    if ( MicroblogPoster_Poster::is_method_callable( 'MicroblogPoster_Poster_Pro', 'filter_single_account' ) && $dash == 1 && $mp['val'] == 0 && $old == 0 ) {
                        if ( $cdriven && MicroblogPoster_Poster::is_method_callable( 'MicroblogPoster_Poster_Enterprise', 'filter_single_account_cdriven' ) ) {
                            $active = MicroblogPoster_Poster_Enterprise::filter_single_account_cdriven( $plurk_account['account_id'], $post_ID, $plurk_account['extra'] );
                            if ( $active === false ) {
                                continue;
                            } else {
                                if ( isset( $active['message_format'] ) && $active['message_format'] ) {
                                    $plurk_account['message_format'] = $active['message_format'];
                                }
                            }
                        } else {
                            $active = MicroblogPoster_Poster_Pro::filter_single_account( $plurk_account['account_id'] );
                            if ( $active === false ) {
                                continue;
                            } else {
                                if ( isset( $active['message_format'] ) && $active['message_format'] ) {
                                    $plurk_account['message_format'] = $active['message_format'];
                                }
                            }
                        }
                    } elseif ( MicroblogPoster_Poster::is_method_callable( 'MicroblogPoster_Poster_Enterprise', 'filter_single_account_mp' ) && $dash == 1 && $mp['val'] == 1 && $old == 0 ) {
                        $active = MicroblogPoster_Poster_Enterprise::filter_single_account_mp( $plurk_account['account_id'] );
                        if ( $active === false ) {
                            continue;
                        } else {
                            if ( isset( $active['message_format'] ) && $active['message_format'] ) {
                                $plurk_account['message_format'] = $active['message_format'];
                            }
                        }
                    } elseif ( MicroblogPoster_Poster::is_method_callable( 'MicroblogPoster_Poster', 'filter_single_account_old' ) && $dash == 1 && $mp['val'] == 0 && $old == 1 ) {
                        if ( $cdriven && MicroblogPoster_Poster::is_method_callable( 'MicroblogPoster_Poster_Enterprise', 'filter_single_account_cdriven_old' ) ) {
                            $active = MicroblogPoster_Poster_Enterprise::filter_single_account_cdriven_old( $plurk_account['account_id'], $post_ID, $plurk_account['extra'] );
                            if ( $active === false ) {
                                continue;
                            } else {
                                if ( isset( $active['message_format'] ) && $active['message_format'] ) {
                                    $plurk_account['message_format'] = $active['message_format'];
                                }
                            }
                        } else {
                            $active = MicroblogPoster_Poster::filter_single_account_old( $plurk_account['account_id'] );
                            if ( $active === false ) {
                                continue;
                            } else {
                                if ( isset( $active['message_format'] ) && $active['message_format'] ) {
                                    $plurk_account['message_format'] = $active['message_format'];
                                }
                            }
                        }
                    } elseif ( $cdriven && MicroblogPoster_Poster::is_method_callable( 'MicroblogPoster_Poster_Enterprise', 'filter_single_account_cdriven_wodash' ) ) {
                        $active = MicroblogPoster_Poster_Enterprise::filter_single_account_cdriven_wodash( $plurk_account['account_id'], $post_ID, $plurk_account['extra'] );
                        if ( $active === false ) {
                            continue;
                        }
                    }

                    if ( $plurk_account['message_format'] && $mp['val'] == 0 ) {
                        $plurk_account['message_format'] = str_ireplace( '{manual_excerpt}', '', $plurk_account['message_format'] );
                        $plurk_account['message_format'] = str_ireplace( '{excerpt}', '', $plurk_account['message_format'] );
                        $plurk_account['message_format'] = str_ireplace( '{content}', '', $plurk_account['message_format'] );
                        $update = str_ireplace( MicroblogPoster_Poster_Update::get_shortcodes(), $post_content, $plurk_account['message_format'] );
                    } elseif ( $plurk_account['message_format'] && $mp['val'] == 1 && $mp['type'] == 'link' ) {
                        $update = str_ireplace( MicroblogPoster_Poster_Update::get_shortcodes_mp(), $post_content, $plurk_account['message_format'] );
                    }

                    $qualifier = "says";
                    $extra = json_decode( $plurk_account['extra'], true );
                    if ( isset( $extra ) && is_array( $extra ) ) {
                        if ( isset( $extra['qualifier'] ) ) {
                            $qualifier = $extra['qualifier'];
                        }
                    }
                    $result = MicroblogPoster_Poster::send_signed_request(
                        $plurk_account['consumer_key'],
                        $plurk_account['consumer_secret'],
                        $plurk_account['access_token'],
                        $plurk_account['access_token_secret'],
                        "http://www.plurk.com/APP/Timeline/plurkAdd",
                        array( "content" => $update, "qualifier" => $qualifier )
                    );

                    $action_result = 2;
                    $result_dec = json_decode( $result, true );
                    if ( $result_dec && isset( $result_dec['plurk_id'] ) ) {
                        $action_result = 1;
                        $result = "Success";
                    }

                    $log_data = array();
                    $log_data['account_id'] = $plurk_account['account_id'];
                    $log_data['account_type'] = "plurk";
                    $log_data['username'] = $plurk_account['username'];
                    $log_data['post_id'] = $post_ID;
                    $log_data['action_result'] = $action_result;
                    $log_data['update_message'] = $update;
                    $log_data['log_message'] = $result;
                    if ( $mp['val'] == 1 ) {
                        $log_data['log_type'] = 'manual';
                    } elseif ( $old == 1 ) {
                        $log_data['log_type'] = 'old';
                    }
                    MicroblogPoster_Poster::insert_log( $log_data );
                }
            }
        }

        public static function update_twitter( $cdriven, $old, $mp, $dash, $update, $post_content, $post_ID, $featured_image_src_full ) {   
            $twitter_accounts = MicroblogPoster_Poster_Update::get_accounts_by_mode( 'twitter', $post_ID );
            if ( !empty( $twitter_accounts ) ) {
                foreach( $twitter_accounts as $twitter_account ) {
                    if ( MicroblogPoster_Poster::is_method_callable( 'MicroblogPoster_Poster_Pro', 'filter_single_account' ) && $dash == 1 && $mp['val'] == 0 && $old == 0 ) {
                        if ( $cdriven && MicroblogPoster_Poster::is_method_callable( 'MicroblogPoster_Poster_Enterprise', 'filter_single_account_cdriven' ) ) {
                            $active = MicroblogPoster_Poster_Enterprise::filter_single_account_cdriven( $twitter_account['account_id'], $post_ID, $twitter_account['extra'] );
                            if ( $active === false ) {
                                continue;
                            } else {
                                if ( isset( $active['message_format'] ) && $active['message_format'] ) {
                                    $twitter_account['message_format'] = $active['message_format'];
                                }
                            }
                        } else {
                            $active = MicroblogPoster_Poster_Pro::filter_single_account( $twitter_account['account_id'] );
                            if ( $active === false ) {
                                continue;
                            } else {
                                if ( isset( $active['message_format'] ) && $active['message_format'] ) {
                                    $twitter_account['message_format'] = $active['message_format'];
                                }
                            }
                        }
                    } elseif ( MicroblogPoster_Poster::is_method_callable( 'MicroblogPoster_Poster_Enterprise', 'filter_single_account_mp' ) && $dash == 1 && $mp['val'] == 1 && $old == 0 ) {
                        $active = MicroblogPoster_Poster_Enterprise::filter_single_account_mp( $twitter_account['account_id'] );
                        if ( $active === false ) {
                            continue;
                        } else {
                            if ( isset( $active['message_format'] ) && $active['message_format'] ) {
                                $twitter_account['message_format'] = $active['message_format'];
                            }
                        }
                    } elseif ( MicroblogPoster_Poster::is_method_callable( 'MicroblogPoster_Poster', 'filter_single_account_old' ) && $dash == 1 && $mp['val'] == 0 && $old == 1 ) {
                        if ( $cdriven && MicroblogPoster_Poster::is_method_callable( 'MicroblogPoster_Poster_Enterprise', 'filter_single_account_cdriven_old' ) ) {
                            $active = MicroblogPoster_Poster_Enterprise::filter_single_account_cdriven_old( $twitter_account['account_id'], $post_ID, $twitter_account['extra'] );
                            if ( $active === false ) {
                                continue;
                            } else {
                                if ( isset( $active['message_format'] ) && $active['message_format'] ) {
                                    $twitter_account['message_format'] = $active['message_format'];
                                }
                            }
                        } else {
                            $active = MicroblogPoster_Poster::filter_single_account_old( $twitter_account['account_id'] );
                            if ( $active === false ) {
                                continue;
                            } else {
                                if ( isset( $active['message_format'] ) && $active['message_format'] ) {
                                    $twitter_account['message_format'] = $active['message_format'];
                                }
                            }
                        }
                    } elseif ( $cdriven && MicroblogPoster_Poster::is_method_callable( 'MicroblogPoster_Poster_Enterprise', 'filter_single_account_cdriven_wodash' ) ) {
                        $active = MicroblogPoster_Poster_Enterprise::filter_single_account_cdriven_wodash( $twitter_account['account_id'], $post_ID, $twitter_account['extra'] );
                        if ( $active === false ) {
                            continue;
                        }
                    }

                    if ( $twitter_account['message_format'] && $mp['val'] == 0 ) {
                        $twitter_account['message_format'] = str_ireplace( '{manual_excerpt}', '', $twitter_account['message_format'] );
                        $twitter_account['message_format'] = str_ireplace( '{excerpt}', '', $twitter_account['message_format'] );
                        $twitter_account['message_format'] = str_ireplace( '{content}', '', $twitter_account['message_format'] );
echo 2;
                        $update = str_ireplace( MicroblogPoster_Poster_Update::get_shortcodes(), $post_content, $twitter_account['message_format'] );
                    } elseif ( $twitter_account['message_format'] && $mp['val'] == 1 && $mp['type'] == 'link' ) {
var_dump($update);
                        $update = str_ireplace( MicroblogPoster_Poster_Update::get_shortcodes_mp(), $post_content, $twitter_account['message_format'] );
var_dump($update);
                    }

                    $media_id_string = "";
                    $extra = json_decode( $twitter_account['extra'], true );
                    if ( isset( $extra ) && is_array( $extra ) && isset( $extra['include_featured_image'] ) && $extra['include_featured_image'] == 1 ) {
                        $include_featured_image = true;
                    } else {
                        $include_featured_image = false;
                    }
                    if ( MicroblogPoster_Poster::is_method_callable( 'MicroblogPoster_Poster_Pro', 'send_signed_request_and_upload' ) && $include_featured_image && $featured_image_src_full ) {
                        $curl = new MicroblogPoster_Curl();
                        $upload_result = MicroblogPoster_Poster_Pro::send_signed_request_and_upload(
                            $curl,
                            $twitter_account['consumer_key'],
                            $twitter_account['consumer_secret'],
                            $twitter_account['access_token'],
                            $twitter_account['access_token_secret'],
                            "https://upload.twitter.com/1.1/media/upload.json",
                            array( "image_url" => $featured_image_src_full )
                        );
                        $upload_result_dec = json_decode( $upload_result, true );
                        if ( isset( $upload_result_dec['media_id_string'] ) ) {
                            $media_id_string = $upload_result_dec['media_id_string'];
                        } else {
                            $log_data = array();
                            $log_data['account_id'] = $twitter_account['account_id'];
                            $log_data['account_type'] = "twitter";
                            $log_data['username'] = $twitter_account['username'] . ' - Upload Image';
                            $log_data['post_id'] = 0;
                            $log_data['action_result'] = 2;
                            $log_data['update_message'] = '';
                            $log_data['log_message'] = $upload_result;
                            MicroblogPoster_Poster::insert_log( $log_data );
                        }
                    }

                    $parameters = array( "status" => $update );
                    if ( isset( $media_id_string ) && $media_id_string ) {
                        $parameters["media_ids"] = $media_id_string;
                    }

                    $result = MicroblogPoster_Poster::send_signed_request(
                        $twitter_account['consumer_key'],
                        $twitter_account['consumer_secret'],
                        $twitter_account['access_token'],
                        $twitter_account['access_token_secret'],
                        "https://api.twitter.com/1.1/statuses/update.json",
                        $parameters
                    );

                    $action_result = 2;
                    $result_dec = json_decode( $result, true );
                    if ( $result_dec && isset( $result_dec['id'] ) ) {
                        $action_result = 1;
                        $result = "Success";
                    }

                    $log_data = array();
                    $log_data['account_id'] = $twitter_account['account_id'];
                    $log_data['account_type'] = "twitter";
                    $log_data['username'] = $twitter_account['username'];
                    $log_data['post_id'] = $post_ID;
                    $log_data['action_result'] = $action_result;
                    $log_data['update_message'] = $update;
                    $log_data['log_message'] = $result;
                    if ( $mp['val'] == 1 ) {
                        $log_data['log_type'] = 'manual';
                    } elseif ( $old == 1 ) {
                        $log_data['log_type'] = 'old';
                    }
                    MicroblogPoster_Poster::insert_log( $log_data );
                }
            }
        }

        /*** Duplicated private static function from class MicroblogPoster_Poster ***/
        public static function get_accounts_by_mode( $type, $post_ID ) {
            if ( MicroblogPoster_Poster::is_method_callable( 'MicroblogPoster_Poster_Ultimate', 'resolve_accounts' ) ) {
                $accounts = MicroblogPoster_Poster_Ultimate::resolve_accounts( $type, $post_ID );
            } else {
                $accounts = MicroblogPoster_Poster_Update::get_accounts( $type );
            }
            return $accounts;
        }

        /*** Duplicated private static function from class MicroblogPoster_Poster ***/
        public static function get_accounts( $type ) {
            global  $wpdb;

            $table_accounts = $wpdb->prefix . 'microblogposter_accounts';
            $table_user_accounts = $wpdb->prefix . 'microblogposter_user_accounts';

            $sql="SELECT * FROM $table_accounts WHERE type='{$type}'";
            $sql .= " AND account_id NOT IN (SELECT DISTINCT account_id FROM $table_user_accounts)";
            $rows = $wpdb->get_results( $sql, ARRAY_A );

            return $rows;
        }

        /*** Duplicated private static function from class MicroblogPoster_Poster ***/
        public static function maintain_logs() {
            global  $wpdb;

            $table_logs = $wpdb->prefix . 'microblogposter_logs';

            $sql="SELECT log_id FROM $table_logs ORDER BY log_id DESC LIMIT 2000";
            $rows = $wpdb->get_results( $sql );
            if ( is_array( $rows ) && count( $rows ) == 2000 ) {
                $log_ids = "(";
                foreach( $rows as $row ) {
                    $log_ids .= $row->log_id . ",";
                }
                $log_ids = rtrim( $log_ids, "," );
                $log_ids .= ")";

                $sql="DELETE FROM {$table_logs} WHERE log_id NOT IN {$log_ids}";
                $wpdb->query( $sql );
            }

            return true;
        }

        /*** Modified private static function from class MicroblogPoster_Poster ***/
        public static function get_shortcodes() {
            return array( '{site_url}', 
                        '{title}', 
                        '{url}', 
                        '{short_url}', 
                        '{manual_excerpt}',
                        '{excerpt}', 
                        '{author}', 
                        '{content_first_words}',
                        '{content}',
		    '{featured_image}'
            );
        }

        /*** Duplicated private static function from class MicroblogPoster_Poster ***/
        public static function get_shortcodes_mp() {
            return array( 
                        '{title}', 
                        '{url}', 
                        '{short_url}'
            );
        }

        /*** Duplicated private static function from class MicroblogPoster_Poster ***/
        public static function clean_up_and_shorten_content( $content, $length, $ending_char ) {
            $content = strip_shortcodes( $content );
            $content = strip_tags( $content );
            $content = preg_replace( "|(\r\n)+|", " ", $content );
            $content = preg_replace( "|(\t)+|", "", $content );
            $content = preg_replace( "|\&nbsp\;|", "", $content );
            $content = substr( $content, 0, $length );

            if ( strlen( $content ) == $length ) {
                $content = substr( $content, 0, strrpos( $content, $ending_char ) );
            }
            return $content;
        }

        /*** Duplicated private static function from class MicroblogPoster_Poster ***/
        public static function shorten_content( $content, $length, $ending_char ) {
            $content = strip_shortcodes( $content );
            $content = strip_tags( $content );
            $content = substr( $content, 0, $length );

            if ( strlen( $content ) == $length ) {
                $content = substr( $content, 0, strrpos( $content, $ending_char ) + 1 );
            }
            return $content;
        }

        /*** Duplicated private static function from class MicroblogPoster_Poster ***/
        public static function shorten_title( $title, $length, $ending_char ) {
            $title = substr( $title, 0, $length );

            if ( strlen( $title ) == $length ) {
                $title = substr( $title, 0, strrpos( $title, $ending_char ) );
                $title .= "...";
            }
            return $title;
        }

        /*** Duplicated private static function from class MicroblogPoster_Poster ***/
        public static function clean_up_content( $content ) {
            $content = strip_shortcodes( $content );
            $content = strip_tags( $content );
            $content = preg_replace( "|(\r\n)+|", " ", $content );
            $content = preg_replace( "|(\t)+|", "", $content );
            $content = preg_replace( "|\&nbsp\;|", "", $content );

            return $content;
        }

        /*** Duplicated private static function from class MicroblogPoster_Poster ***/
        public static function strip_shortcodes_and_tags( $content ) {
            $content = strip_shortcodes( $content );
            $content = strip_tags( $content );

            return $content;
        }

    }
}

register_activation_hook( __FILE__, array( 'MicroblogPoster_Poster_GPLtimate', 'activate' ) );
register_deactivation_hook( __FILE__, array( 'MicroblogPoster_Poster_GPLtimate', 'deactivate' ) );
add_action( 'plugins_loaded', array( 'MicroblogPoster_Poster_GPLtimate', 'update' ) );

