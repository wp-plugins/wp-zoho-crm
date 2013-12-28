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

function wp_zoho_crm_capture_registering_users($user_id)
{
	$siteurl=site_url();
	$config = get_option('smack_zoho_crm_settings');

	if($config['wp_zoho_crm_smack_user_capture'] =='on')
	{
		$user_data = get_userdata( $user_id );
		$user_email = $user_data->data->user_email;
		$user_lastname = get_user_meta( $user_id, 'last_name', 'true' );
		$user_firstname = get_user_meta( $user_id, 'first_name', 'true' );
		if(empty($user_lastname))
		{
			$user_lastname = $user_data->data->display_name;
		}

		
		$fields_string = "<Leads>\n<row no=\"1\">\n";
		$fields_string .= "<FL val=\"First Name\">".$user_firstname."</FL>\n";
		$fields_string .= "<FL val=\"Last Name\">".$user_lastname."</FL>\n";
		$fields_string .= "<FL val=\"Email\">".$user_email."</FL>\n";
		$fields_string .= "</row>\n</Leads>";
		include_once($plugin_dir_wp_zoho_crm."SmackZohoApi.php");
		$SmackZohoApiObj = new SmackZohoApi();

                $Result_Array = $SmackZohoApiObj->insertRecord("Contacts" , "insertRecords" , $config['authkey'] , $fields_string );

		if(is_array($Result_Array['result'])) {
			//$content.= $data;   //remove the comment to see the result from vtiger.
			if("Record(s) added successfully" == $Result_Array['result']['message']) {
				$content.= "<tr><td colspan='2' style='text-align:center;color:green;font-size: 1.2em;font-weight: bold;'>Thank you for submitting</td></tr>";
			} else{
				$content.= "<tr><td colspan='2' style='text-align:center;color:red;font-size: 1.2em;font-weight: bold;'>Submitting Failed</td></tr>";
			}
		}
	}
}
?>
