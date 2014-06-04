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
global $wpzohocrmmenus;
$wpzohocrmmenus = array (
		'zoho_crm_lead_fields' => __ ( 'Lead Form Fields' ),
		'widget_fields' => __ ( 'Widget Form Fields' ),
		'capture_wp_users' => __ ( 'Sync WP Users' ),
		'plugin_settings' => __ ( 'Settings' ),
		'wpzohocrm_listShortcodes' => __ ( 'List Shortcodes' )
);

function wp_zoho_crm_topnavmenu() {
	global $wpzohocrmmenus;
	$class = "";
	$top_nav_menu = "<div id='wptiger-free-top-navigation' class= 'wptiger-free-top-navigation-wrapper'>";
	$top_nav_menu .= "<ul class='wptiger-free-Navigation-menu-bar'>";
	if (is_array ( $wpzohocrmmenus )) {
		foreach ( $wpzohocrmmenus as $links => $text ) {
			if (! isset ( $_REQUEST ['action'] ) && ($links == "plugin_settings")) {
				$class = "button-secondary";
			}
			elseif (isset( $_REQUEST['action'] ) && ($_REQUEST ['action'] == $links) ) {
				$class = "button-secondary";
			}
                          else 
                               $class="button-primary";
			$top_nav_menu .= "<li class='wptiger-free-navigation-menu'><a class='wptiger-free-nav-menu-link' href='?page=wp-zoho-crm&action={$links}'><button class='$class' type='button'>{$text}</button></a></li>";
			$class = "";
		}
	}
	$top_nav_menu .= "</ul>";
	$top_nav_menu .= "</div>";
	return $top_nav_menu;
}

function getActionWpZohoCrm()
{
        if(isset($_REQUEST['action']))
        {
                $action = $_REQUEST['action'];
        }
        else
        {
                $action = 'plugin_settings';
        }
        return $action;
}

function wp_zoho_crm_displaySettings()
{
        echo "<h3>Please save the settings first</h3>";
}

?>
