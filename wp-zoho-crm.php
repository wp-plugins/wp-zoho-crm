<?php
/*********************************************************************************

Plugin Name: WP Zoho Crm
Plugin URI: http://www.smackcoders.com
Description: Easy Lead capture Zoho Crm Webforms and Contacts synchronization
Version: 1.1.1
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
	$AdminPages = new SmackWPZohoCrmAdminPages();
        echo $AdminPages->topContent();
        $action = getActionWpZohoCrm(); 
        ?>
        <div id="main-page">
                <?php echo wp_zoho_crm_topnavmenu(); ?>
                <div style="position:relative;overflow:hidden;">
                        <?php $AdminPages->$action(); ?>
                </div>
        </div>
        <?php
}

?>
