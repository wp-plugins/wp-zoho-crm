<?php
/*********************************************************************************
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
/**
 * User: smackcoder
 * Date: 27/12/13
 * WP Zoho CRM init class.
 */

class SmackWPZohoCrm {

    /*
     * Function to initialize this plugin
     */
    public static function init() {
        add_action ( 'admin_enqueue_scripts', 'LoadWpZohoCrmScript' );
        add_action ( 'admin_menu', 'wpzohocrmmenu' );
        add_action ( 'user_register', 'wp_zoho_crm_capture_registering_users' );
        add_action ( 'after_plugin_row_wp-tiger/wp-zoho-crm.php', array('SmackWPZohoCrm', 'plugin_row') );
        add_filter ( 'plugin_action_links_wp-tiger/wp-zoho-crm.php', array('SmackWPZohoCrm', 'plugin_settings_link'),10,2);
    }

    /*
     * Function to get the settings link
     * @$links string URL for the link
     * @$file string filename for the link
     * @return string html links
     */
    public static function plugin_settings_link( $links, $file ) {

        array_unshift($links, '<a href="' . admin_url("admin.php") . '?page=wp-tiger">' . __( 'Settings', 'wp-tiger' ) . '</a>');

        return $links;
    }

    /*
     * Function to get the plugin row
     * @$plugin_name as string
     */
    public static function plugin_row($plugin_name){
        echo '</tr><tr class="plugin-update-tr"><td colspan="3" class="plugin-update"><div class="update-message"> Now get 25% discount for purchasing pro version using the coupon "<b>OFF25WPTIGER</b>" <a href="http://www.smackcoders.com/wp-vtiger-pro.html">Purchase pro version now!</a></div></td>';
    }

}
