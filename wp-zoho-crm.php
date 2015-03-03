<?php
/*********************************************************************************

Plugin Name: WP Zoho Crm
Plugin URI: http://www.smackcoders.com
Description: Easy Lead capture Zoho Crm Webforms and Contacts synchronization
Version: 1.2
Author: smackcoders.com
Author URI: http://www.smackcoders.com

 * Zoho crm integerator for Wordpress is a plugin 
 * for capturing leads from form page/post and contacts from user registration to 
 * Zoho CRM directly from WordPress developed by Smackcoder. 
 * Copyright (C) 2013 Smackcoders.
 *
 * Zoho crm integerator for Wordpress is free plugin
 * software; you can redistribute it and/or modify it under the terms of the GNU 
 * Affero General Public License version 3 as published by the Free Software 
 * Foundation with the addition of the following permission added to Section 15 
 * as permitted in Section 7(a): FOR ANY PART OF THE COVERED WORK IN WHICH THE 
 * COPYRIGHT IS OWNED BY Smackcoders, FEasy Lead capture Vtiger Webforms and 
 * Contacts synchronization  DISCLAIMS THE WARRANTY OF NON INFRINGEMENT OF THIRD
 * PARTY RIGHTS.
 *
 * Zoho crm integerator for Wordpress is distributed in the hope that it will be useful, 
 * but WITHOUT ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or 
 * FITNESS FOR A PARTICULAR PURPOSE.  See the GNU Affero General Public License for more 
 * details.
 *
 * You should have received a copy of the GNU Affero General Public License along with
 * this program; if not, see http://www.gnu.org/licenses or write to the Free
 * Software Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA
 * 02110-1301 USA.
 *
 * You can contact Smackcoders at email address info@smackcoders.com.
 *
 * The interactive user interfaces in original and modified versions
 * of this program must display Appropriate Legal Notices, as required under
 * Section 5 of the GNU Affero General Public License version 3.
 *
 * In accordance with Section 7(b) of the GNU Affero General Public License version 3,
 * these Appropriate Legal Notices must retain the display of the Easy Lead capture 
 * Vtiger Webforms and Contacts synchronization copyright notice. If the
 * display of the logo is not reasonably feasible for technical reasons, the 
 * Appropriate Legal Notices must display the words "Copyright Smackcoders. 2013.
 * All rights reserved".
 ********************************************************************************/

global $plugin_url_wp_zoho_crm ;
$plugin_url_wp_zoho_crm = plugins_url( '' , __FILE__ );
global $plugin_dir_wp_zoho_crm;
$plugin_dir_wp_zoho_crm = plugin_dir_path( __FILE__ );

$get_debug_mode = get_option('smack_zoho_crm_settings');
	
if(isset($get_debug_mode['debug_mode']) && ($get_debug_mode['debug_mode'] != 'on')) {
	error_reporting(0);
	ini_set('display_errors', 'Off');
}

require_once( "{$plugin_dir_wp_zoho_crm}/SmackWPZohoCrm.php");
require_once( "{$plugin_dir_wp_zoho_crm}/smack-zohocrm-shortcodes.php");
require_once( "{$plugin_dir_wp_zoho_crm}/navMenu.php");
require_once( "{$plugin_dir_wp_zoho_crm}/SmackWPAdminPages.php");
require_once( "{$plugin_dir_wp_zoho_crm}/CaptureRegisteringUsers.php");

add_action('init',  array('SmackWPZohoCrm', 'init'));

register_deactivation_hook( __FILE__, 'wpzohocrm_deactivate' );

// Admin menu settings
function wpzohocrmmenu() {
	global $plugin_url_wp_zoho_crm;
	add_menu_page('WPZohoCrm Settings', 'WP-Zoho-Crm', 'manage_options', 'wp-zoho-crm', 'wpzohocrm_settings');
}

function LoadWpZohoCrmScript() {
	global $plugin_url_wp_zoho_crm;
	wp_enqueue_script("wp-zoho-crm-script", "{$plugin_url_wp_zoho_crm}/js/smack-vtlc-scripts.js", array("jquery"));
	wp_enqueue_style("wp-zoho-crm-css", "{$plugin_url_wp_zoho_crm}/css/smack-vtlc-css.css");
}

function wpzohocrm_deactivate()
{
	delete_option( 'smack_zoho_crm_settings' );
	delete_option( 'smack_zoho_crm_field_settings' );
	delete_option( 'smack_zoho_crm_widget_field_settings' );
	delete_option( 'smack_zoho_crm_total_widget_field_settings' );
        delete_option ('wp-zoho-contact-widget-form-attempts');
        delete_option ('smack_zoho_crm_total_field_settings');
}

function SmackWPZohoCrmtestAccess()
{
	global $plugin_dir_wp_zoho_crm;
	require_once("{$plugin_dir_wp_zoho_crm}/test-access.php");
	die;
}

add_action('wp_ajax_SmackWPZohoCrmtestAccess', 'SmackWPZohoCrmtestAccess');

function wpzohocrm_settings()
{

	$get_activate_plugin_list = get_option('active_plugins');
        if(!in_array('wp-leads-builder-for-any-crm/index.php', $get_activate_plugin_list)) { ?>
                <div align=center style="padding-top:220px;">
                        <form name="upgrade_to_latest" method="post">
                                <label style="font-size:2em;" id="info">Upgrade to Lead Builder CRM</label>
                                <input type="submit" class="" name="upgrade" id="upgrade" value="Click Here"/>
                        </form>
                </div>
                <?php if (isset($_POST['upgrade'])) { ?>
                <script>
                        document.getElementById('info').style.display = 'none';
                        document.getElementById('upgrade').style.display = 'none';
                </script>
                <div align=center style="padding-top:0px;">
                        <?php echo migrate_to_leadbuild_free(); ?>
                </div>
                <?php
                }
        }

}

function migrate_to_leadbuild_free() {

        require_once(ABSPATH . 'wp-admin/includes/class-wp-upgrader.php');
        $plugin['source'] = 'https://downloads.wordpress.org/plugin/wp-leads-builder-any-crm.1.1.zip';
        $source = ( 'upload' == $type ) ? $this->default_path . $plugin['source'] : $plugin['source'];
        /** Create a new instance of Plugin_Upgrader */
        $upgrader = new Plugin_Upgrader( $skin = new Plugin_Installer_Skin( compact( 'type', 'title', 'url', 'nonce', 'plugin', 'api' ) ) );
        /** Perform the action and install the plugin from the $source urldecode() */
        $upgrader->install( $source );
        /** Flush plugins cache so we can make sure that the installed plugins list is always up to date */
        wp_cache_flush();
        $plugin_activate = $upgrader->plugin_info(); // Grab the plugin info from the Plugin_Upgrader method
        $activate = activate_plugin( $plugin_activate ); // Activate the plugin
	if ( !is_wp_error( $activate ) )
		deactivate_plugins('wp-zoho-crm/wp-zoho-crm.php');//Deactivate zoho plugin
        $this->populate_file_path(); // Re-populate the file path now that the plugin has been installed and activated
        if ( is_wp_error( $activate ) ) {
                echo '<div id="message" class="error"><p>' . $activate->get_error_message() . '</p></div>';
                echo '<p><a href="' . add_query_arg( 'page', $this->menu, admin_url( $this->parent_url_slug ) ) . '" title="' . esc_attr( $this->strings['return'] ) . '" target="_parent">' . __( 'Return to Required Plugins Installer', $this->domain ) . '</a></p>';
                return true; // End it here if there is an error with automatic activation
        }
        else {
                echo '<p>' . $this->strings['plugin_activated'] . '</p>';
        }

}

?>
