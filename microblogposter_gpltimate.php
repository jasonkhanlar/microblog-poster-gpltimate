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

// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;
// Exit if class exists already
if ( class_exists( 'MicroblogPoster_Poster_GPLtimate' ) ) exit;

class MicroblogPoster_Poster_GPLtimate {

    private static function check_dependencies() {
        if ( ! is_plugin_active( 'microblog-poster/microblogposter.php' ) && current_user_can( 'activate_plugins' ) ) {
            echo 'Sorry, but the ' . get_plugin_data( __FILE__ )['Name'] . ' plugin requires the Microblog Poster plugin to be installed and active.';
            exit;
        }
        if ( ! MicroblogPoster_Poster::is_method_callable( 'MicroblogPoster_Poster', 'is_method_callable' ) == true ) {
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

class MicroblogPoster_Poster_Enterprise {

    /*
    public static function filter_single_account_cdriven() {
    }
    */

    /*
    public static function filter_single_account_cdriven_old() {
    }
    */

    /*
    public static function filter_single_account_cdriven_wodash() {
    }
    */

    /*
    public static function filter_single_account_mp() {
    }
    */

    /*
    public static function shorten_with_adfly() {
    }
    */

    /*
    public static function shorten_with_adfocus() {
    }
    */

    /*
    public static function shorten_with_ppw() {
    }
    */

}

class MicroblogPoster_Poster_Enterprise_Options {

    /*
    public static function handle_manual_post() {
    }
    */

    /*
    public static function microblogposter_display_link_categories() {
    }
    */

}

class MicroblogPoster_Poster_Pro {

    /* Typo in original plugin */
    /*
    public static function filter_sifngle_account() {
        return self::filter_single_account();
    }
    */

    /*
    public static function filter_single_account() {
    }
    */

    /*
    public static function handle_old_posts_publish() {
    }
    */

    /*
    public static function send_signed_request_and_upload() {
    }
    */

    /*
    public static function show_control_dashboard() {
    }
    */

    /*
    public static function update_facebook_group() {
    }
    */

    /*
    public static function update_linkedin_company() {
    }
    */

    /*
    public static function update_linkedin_group() {
    }
    */

    /*
    public static function update_tumblr_link() {
    }
    */

    /*
    public static function update_vkontakte_community() {
    }
    */

}

class MicroblogPoster_Poster_Pro_Options {

    /*
    public static function get_facebook_group_access_token() {
    }
    */

    public static function verify_license_key() {
        return array( 'key' => '', 'verified' => true );
    }

}

class MicroblogPoster_Poster_Ultimate {

    /*
    public static function resolve_accounts( $type, $post_ID ) {
    }
    */

    /*
    public static function resolve_sql_allowed_authors() {
    }
    */

    /*
    public static function resolve_sql() {
    }
    */

    /*
    public static function resolve_sql_logs() {
    }
    */

    /*
    public static function resolve_sql_old_posts() {
    }
    */

    /*
    public static function sync() {
    }
    */

    /*
    public static function unsync() {
    }
    */

}

class MicroblogPoster_Poster_Ultimate_Options {

    /*
    public static function add_cap() {
    }
    */

    /*
    public static function is_loaded() {
    }
    */

    /*
    public static function remove_cap() {
    }
    */

    /*
    public static function render_who_can_ma() {
    }
    */

    /*
    public static function sync_cap() {
    }
    */

    /*
    public static function sync_who_can() {
    }
    */

}

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

        MicroblogPoster_Poster::update_twitter( $cdriven, $old, $mp, $dash, $update, $post_content_twitter, $post_ID, $featured_image_src_full );
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
                if ( is_array( $extra ) ) {
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

    /*** Duplicated private static function from class MicroblogPoster_Poster ***/
    private static function get_accounts_by_mode( $type, $post_ID ) {
        if ( MicroblogPoster_Poster::is_method_callable( 'MicroblogPoster_Poster_Ultimate', 'resolve_accounts' ) ) {
            $accounts = MicroblogPoster_Poster_Ultimate::resolve_accounts( $type, $post_ID );
        } else {
            $accounts = MicroblogPoster_Poster_Update::get_accounts( $type );
        }
        return $accounts;
    }
    
    /*** Duplicated private static function from class MicroblogPoster_Poster ***/
    private static function get_accounts( $type ) {
        global  $wpdb;

        $table_accounts = $wpdb->prefix . 'microblogposter_accounts';
        $table_user_accounts = $wpdb->prefix . 'microblogposter_user_accounts';
        
        $sql="SELECT * FROM $table_accounts WHERE type='{$type}'";
        $sql .= " AND account_id NOT IN (SELECT DISTINCT account_id FROM $table_user_accounts)";
        $rows = $wpdb->get_results( $sql, ARRAY_A );
        
        return $rows;
    }

    /*** Duplicated private static function from class MicroblogPoster_Poster ***/
    private static function maintain_logs() {
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
    private static function get_shortcodes() {
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
    private static function get_shortcodes_mp() {
        return array( 
                    '{title}', 
                    '{url}', 
                    '{short_url}'
        );
    }

    /*** Duplicated private static function from class MicroblogPoster_Poster ***/
    private static function clean_up_and_shorten_content( $content, $length, $ending_char ) {
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
    private static function shorten_content( $content, $length, $ending_char ) {
        $content = strip_shortcodes( $content );
        $content = strip_tags( $content );
        $content = substr( $content, 0, $length );
        
        if ( strlen( $content ) == $length ) {
            $content = substr( $content, 0, strrpos( $content, $ending_char ) + 1 );
        }
        return $content;
    }

    /*** Duplicated private static function from class MicroblogPoster_Poster ***/
    private static function shorten_title( $title, $length, $ending_char ) {
        $title = substr( $title, 0, $length );
        
        if ( strlen( $title ) == $length ) {
            $title = substr( $title, 0, strrpos( $title, $ending_char ) );
            $title .= "...";
        }
        return $title;
    }

    /*** Duplicated private static function from class MicroblogPoster_Poster ***/
    private static function clean_up_content( $content ) {
        $content = strip_shortcodes( $content );
        $content = strip_tags( $content );
        $content = preg_replace( "|(\r\n)+|", " ", $content );
        $content = preg_replace( "|(\t)+|", "", $content );
        $content = preg_replace( "|\&nbsp\;|", "", $content );
        
        return $content;
    }

    /*** Duplicated private static function from class MicroblogPoster_Poster ***/
    private static function strip_shortcodes_and_tags( $content ) {
        $content = strip_shortcodes( $content );
        $content = strip_tags( $content );
        
        return $content;
    }
}

register_activation_hook( __FILE__, array( 'MicroblogPoster_Poster_GPLtimate', 'activate' ) );
register_deactivation_hook( __FILE__, array( 'MicroblogPoster_Poster_GPLtimate', 'deactivate' ) );
add_action( 'plugins_loaded', array( 'MicroblogPoster_Poster_GPLtimate', 'update_actions' ) );
