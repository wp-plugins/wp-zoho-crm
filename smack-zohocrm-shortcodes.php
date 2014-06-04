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
add_filter('widget_text', 'do_shortcode');

add_shortcode('zoho_crm_lead_page', array('SmackWPZohoCrmShortcodes', 'display_page'));

add_shortcode('zoho_crm_lead_widget_area',array('SmackWPZohoCrmShortcodes', 'display_widget'));

class SmackWPZohoCrmShortcodes{
	public static function display_page($atts)
	{
		$config = get_option("smack_zoho_crm_settings");
		$config_field = get_option("smack_zoho_crm_field_settings");
		$config_widget_field = get_option("smack_zoho_crm_widget_field_settings");
		global $plugin_dir_wp_zoho_crm;

		$content = "<form id='contactform' name='contactform' method='post'>";
		//$content = "<form id='contactform' name='contactform' method='post' action='".$action."'>";
		$content.= "<table>";
		// Success message Added by Fredrick Marks
               
		if(isset($_REQUEST['page_contactform']))
		{
			extract($_POST);
			foreach($config_field['fieldlist'] as $key => $fields)	//	To add _ for field with spaces to capture the REQUEST
			{
				if( count($exploded_fields = explode(' ', $fields )) > 1 )
				{
					foreach( $exploded_fields as $exploded_field )
					{
						$underscored_field .= $exploded_field."_";
					}
					$underscored_field = rtrim($underscored_field, "_");
				}
				else
				{
					$underscored_field = $fields;
				}
				$config_underscored_fields[$underscored_field] = $fields;
				$underscored_field = "";
			}

			foreach($_POST as $field => $value)
			{
				if( array_key_exists($field , $config_underscored_fields) )
				{
					$post_fields[$config_underscored_fields[$field]]=$value;//urlencode($value);
				}
			}


			$fields_string = "<Leads>\n<row no=\"1\">\n";
			foreach($post_fields as $key=>$value) { $fields_string .= "<FL val=\"".$key."\">".$value."</FL>\n"; }
			$fields_string .= "</row>\n</Leads>";
			include_once($plugin_dir_wp_zoho_crm."SmackZohoApi.php");
			$SmackZohoApiObj = new SmackZohoApi();
			$Result_Array = $SmackZohoApiObj->insertRecord("Leads" , "insertRecords" , $config['authkey'] , $fields_string );

			$successfulAtemptsOption = get_option( "wp-zoho-contact-form-attempts");
			$total = $successfulAtemptsOption['total'];
			$success = $successfulAtemptsOption['success'];
			if(is_array($Result_Array['result'])) {
				$total++;
				//$content.= $data;   //remove the comment to see the result from vtiger.
//				if(preg_match("/Record(s) added successfully/",$Result_Array['result']['message']))
				if("Record(s) added successfully" == $Result_Array['result']['message']) {
					$success++;
					$content.= "<tr><td colspan='2' style='text-align:center;color:green;font-size: 1.2em;font-weight: bold;'>Thank you for submitting</td></tr>";
				} else{
					$content.= "<tr><td colspan='2' style='text-align:center;color:red;font-size: 1.2em;font-weight: bold;'>Submitting Failed</td></tr>";
				}
			}
                      

			$successfulAtemptsOption['total'] = $total;
			$successfulAtemptsOption['success'] = $success;
			update_option('wp-zoho-contact-form-attempts', $successfulAtemptsOption);
}
		// Fredrick Marks Code ends here
		$total_widget_fields = get_option('smack_zoho_crm_total_field_settings');
//		$total_widget_fields = get_option('smack_zoho_crm_total_widget_field_settings');
		if( is_array( $config_field['fieldlist'] ) ) foreach ( $total_widget_fields as $field ) {
		    if(in_array($field['fieldname'], $config_field['fieldlist'])){
			$content1="<p>";
			$content1.="<tr>";
			$content1.="<td>";
			$content1.="<label for='".$field['fieldname']."'>".$field['fieldlabel']."</label>";
			$typeofdata = $field['fieldtype'];
			if( $field['mandatory'] == "true" ){
			$content1.="<span  style='color:red;'>*</span>";
			}
			$content1.="</td><td>";
			$content1.="<input type='hidden' value='".$typeofdata[1]."' id='".$field['fieldname']."_type'>";
			if( $typeofdata == 'Email')
			{
				if( $field['mandatory'] == "true" )
				{
					$content1.="<input type='email' size='30' value='' required name='".$field['fieldname']."' id='".$field['fieldname']."'></p>";
				}
				else
				{
					$content1.="<input type='email' size='30' value='' name='".$field['fieldname']."' id='".$field['fieldname']."'></p>";
				}
			}
			elseif( $typeofdata == 'Website' )
			{
				if( $field['mandatory'] == "true" )
				{
					$content1.="<input type='url' size='30' value='' required name='".$field['fieldname']."' id='".$field['fieldname']."'></p>";
				}
				else
				{
					$content1.="<input type='url' size='30' value='' name='".$field['fieldname']."' id='".$field['fieldname']."'></p>";
				}
			}
			elseif( $typeofdata == 'TextArea' )
			{
				if( $field['mandatory'] == "true" )
				{
					$content1.="<textarea size='30' required name='".$field['fieldname']."' id='".$field['fieldname']."'></textarea></p>";
				}
				else
				{
					$content1.="<textarea size='30' required name='".$field['fieldname']."' id='".$field['fieldname']."'></textarea></p>";
				}
			}
			else
			{
                                if( $field['mandatory'] == "true" )
                                {
                                        $content1.="<input type='text' size='30' value='' required name='".$field['fieldname']."' id='".$field['fieldname']."'></p>";
                                }
                                else
                                {
					$content1.="<input type='text' size='30' value='' name='".$field['fieldname']."' id='".$field['fieldname']."'></p>";
				}
			}
			$content1.="</td></tr>";

			$content.=$content1;
		    }
		}
		$content.="<tr><td></td><td>";
		$content.="<p>";
		$content.="<input type='submit' value='Submit' id='submit' name='submit'></p><span style='font-size:11px;float:right;'>Generated by <a target='_blank' href='http://www.smackcoders.com'>WP-Zoho-CRM</a></td></tr></table>";
		$content.="<input type='hidden' value='contactform' name='page_contactform'>";
		$content.="<input type='hidden' value='Leads' name='moduleName' />
		</form>";
		//return $content;

		return $content;
	}

 public static function display_widget($atts)
	{
		$config = get_option("smack_zoho_crm_settings");
		$config_field = get_option("smack_zoho_crm_field_settings");
		$config_widget_field = get_option("smack_zoho_crm_widget_field_settings");
		global $plugin_dir_wp_zoho_crm;

		//$action=trim($config['url'], "/").'/modules/Webforms/post.php';
		$content = "<form id='contactform' method='post'>";
		$content.= "<table>";
		// Success message for widget area -- Code added by Fredrick Marks
		if(isset($_REQUEST['widget_contactform']))
		{
			extract($_POST);
                        foreach($config_widget_field['widgetfieldlist'] as $key => $fields)  //      To add _ for field with spaces to capture the REQUEST
                        {
                                if( count($exploded_fields = explode(' ', $fields )) > 1 )
                                {
                                        foreach( $exploded_fields as $exploded_field )
                                        {
                                                $underscored_field .= $exploded_field."_";
                                        }
                                        $underscored_field = rtrim($underscored_field, "_");
                                }
                                else
                                {
                                        $underscored_field = $fields;
                                }
                                $config_underscored_fields[$underscored_field] = $fields;
                                $underscored_field = "";
                        }

                        foreach($_POST as $field => $value)
                        {
                                if( array_key_exists($field , $config_underscored_fields) )
                                {
                                        $post_fields[$config_underscored_fields[$field]]=$value;//urlencode($value);
                                }
                        }

                        $fields_string = "<Leads>\n<row no=\"1\">\n";
                        foreach($post_fields as $key=>$value) { $fields_string .= "<FL val=\"".$key."\">".$value."</FL>\n"; }
                        $fields_string .= "</row>\n</Leads>";
                        include_once($plugin_dir_wp_zoho_crm."SmackZohoApi.php");
                        $SmackZohoApiObj = new SmackZohoApi();
                        $Result_Array = $SmackZohoApiObj->insertRecord("Leads" , "insertRecords" , $config['authkey'] , $fields_string );
                        $successfulAtemptsOption = get_option( "wp-zoho-contact-widget-form-attempts");

                        $total = $successfulAtemptsOption['total'];
                        $success = $successfulAtemptsOption['success'];

                        if(is_array($Result_Array)) {
                                $total++;
                                //$content.= $data;   //remove the comment to see the result from vtiger.
//                                if(preg_match("/Record(s) added successfully/",$Result_Array['result']['message'])) 
				if("Record(s) added successfully" == $Result_Array['result']['message']) {
                                        $success++;
                                        $content.= "<tr><td colspan='2' style='text-align:center;color:green;font-size: 1.2em;font-weight: bold;'>Thank you for submitting</td></tr>";
                                } else{
                                        $content.= "<tr><td colspan='2' style='text-align:center;color:red;font-size: 1.2em;font-weight: bold;'>Submitting Failed</td></tr>";
                                }
                        }

                        $successfulAtemptsOption['total'] = $total;
                        $successfulAtemptsOption['success'] = $success;
                        update_option('wp-zoho-contact-widget-form-attempts', $successfulAtemptsOption);

		} // Fredrick Marks Code ends here

		$total_widget_fields = get_option('smack_zoho_crm_total_widget_field_settings');
		if( is_array( $config_widget_field['widgetfieldlist'] ) ) foreach ($total_widget_fields as $field) {
		    if(in_array($field['fieldname'], $config_widget_field['widgetfieldlist'])){
			$content1="<p>";
			$content1.="<tr>";
			$content1.="<td>";
			$content1.="<label for='".$field['fieldname']."'>".$field['fieldlabel']."</label>";
			$typeofdata = $field['fieldtype'];
			if( $field['mandatory'] == 'true' ){
			$content1.="<span style='color:red;'>*</span>";
			}
			$content1.="</td><td>";
			$content1.="<input type='hidden' value='".$typeofdata."' id='".$field['fieldname']."_type'>";
			if( $typeofdata == 'Email' )
			{
				if( $field['mandatory'] == 'true' )
				{
					$content1.="<input type='email' size='20' value='' required name='".$field['fieldname']."' id='".$field['fieldname']."'></p>";
				}
				else
				{
					$content1.="<input type='email' size='20' value='' name='".$field['fieldname']."' id='".$field['fieldname']."'></p>";
				}
			}
			elseif( $typeofdata == 'Website' )
			{
				if( $field['mandatory'] == 'true' )
				{
					$content1.="<input type='url' size='20' value='' required name='".$field['fieldname']."' id='".$field['fieldname']."'></p>";
				}
				else
				{
					$content1.="<input type='url' size='20' value='' name='".$field['fieldname']."' id='".$field['fieldname']."'></p>";
				}
			}
                        elseif( $typeofdata == 'TextArea' )
                        {
                                if( $field['mandatory'] == "true" )
                                {
                                        $content1.="<textarea size='30' required name='".$field['fieldname']."' id='".$field['fieldname']."'></textarea></p>";
                                }
                                else
                                {
                                        $content1.="<textarea size='30' required name='".$field['fieldname']."' id='".$field['fieldname']."'></textarea></p>";
                                }
                        }
			else
			{
                                if( $field['mandatory'] == 'true' )
                                {
                                        $content1.="<input type='text' size='20' value='' required name='".$field['fieldname']."' id='".$field['fieldname']."'></p>";
                                }
				else
				{
					$content1.="<input type='text' size='20' value='' name='".$field['fieldname']."' id='".$field['fieldname']."'></p>";
				}
			}

//			$content1.="<input type='text' class='wp-tiger-widget-area-text' size='20' value='' name='".$field->fieldname."' id='".$field->fieldname."'></p>";
			$content1.="</td></tr>";
			$content.=$content1;
		    }
		}
		$content.="<tr><td></td><td>";
		$content.="<p>";
		$content.="<input type='submit' class='wp-tiger-widget-area-submit' value='Submit' id='submit' name='submit'></p>";
		$content.="<span style='font-size:9px;float:right;'>Generated by <a target='_blank' href='http://www.smackcoders.com'>WP-Zoho-CRM</a></span></tr></table>";
		$content.="<input type='hidden' value='contactform' name='widget_contactform'>";
		$content.="<input type='hidden' value='Leads' name='moduleName'/>
		</form>";

		//echo $content;
		return $content;
	}
}
?>
