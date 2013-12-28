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

	global $plugin_dir_wp_zoho_crm;
	include_once($plugin_dir_wp_zoho_crm."SmackZohoApi.php");
	$SmackZohoApiObj = new SmackZohoApi();
	$config = get_option ( 'smack_zoho_crm_settings' );

        $config = get_option ( 'smack_zoho_crm_settings' );
	$i = 0;
	$Result_Array = $SmackZohoApiObj->APIMethod("Leads" , "getFields", $config['authkey']);
	foreach($Result_Array['section'] as $section ){
		foreach($section['FL'] as $key => $fields )
		{
			if( $key === '@attributes' )
			{
                                if( $fields['req'] == 'true' )
                                {
                                        $total_field[$i]['mandatory'] = 'true';
                                }
                                else
                                {
                                        $total_field[$i]['mandatory'] = 'false';
                                }
                                $total_field[$i]['fieldname'] = $fields['dv'];
                                $total_field[$i]['fieldlabel'] = $fields['label'];
                                $total_field[$i]['fieldtype'] = $fields['type'];
                                $i++;
			}
			elseif( $fields['@attributes']['isreadonly'] == 'false' && $fields['@attributes']['type'] != 'Lookup' )
			{
				if( $fields['@attributes']['req'] == 'true' )
				{
					$total_field[$i]['mandatory'] = 'true';
				}
				else
				{
					$total_field[$i]['mandatory'] = 'false';
				}
				$total_field[$i]['fieldname'] = $fields['@attributes']['dv'];
				$total_field[$i]['fieldlabel'] = $fields['@attributes']['label'];
				$total_field[$i]['fieldtype'] = $fields['@attributes']['type'];
				$i++;
			}
		}
		$j++;
	}

//	if($_REQUEST['action'] == "widget_fields")
	{
		update_option ( "smack_zoho_crm_total_widget_field_settings" , $total_field );
	}
//	else
	{
		update_option ( "smack_zoho_crm_total_field_settings" , $total_field );
	}

//      echo $plugin_dir_wp_zoho_crm."SmackZohoApi.php";

?>
