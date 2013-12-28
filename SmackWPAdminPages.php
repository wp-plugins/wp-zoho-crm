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
class SmackWPZohoCrmAdminPages{

	function wpzohocrm_rightContent(){
		global $plugin_url_wp_zoho_crm;
		$rightContent = '<div class="wptiger-plugindetail-box" id="wptiger-pluginDetails"><h3>Plugin Details</h3>
			<div class="wptiger-box-inside wptiger-plugin-details">
			<table>	<tbody>
			<tr><td><b>Plugin Name</b></td><td>WP Zoho Crm</td></tr>
			<tr><td><b>Version</b></td><td>1.0.0 <a style="text-decoration:none" href="http://www.smackcoders.com/free-wordpress-vtiger-webforms-module.html" target="_blank"></a></td></tr>
			</tbody></table>
			<div class="company-detials" id="company-detials">
			<div class="wptiger-rateus"><img width="70px" height="40px" style="margin-top:10px;" src="'.$plugin_url_wp_zoho_crm.'/images/SubscribeViaEmail.gif"><a style="margin-left:15px;margin-top:-10px;" class="dash-action" target="_blank" href="http://www.smackcoders.com/free-wordpress-vtiger-webforms-module.html">Rate Us</a></div>
			<div class="sociallinks">
			<label>Social Links :</label>
			<span><a target="_blank" href="https://plus.google.com/106094602431590125432"><img src="'.$plugin_url_wp_zoho_crm.'/images/googleplus.png"></a></span>
			<span><a target="_blank" href="https://www.facebook.com/smackcoders"><img src="'.$plugin_url_wp_zoho_crm.'/images/facebook.png"></a></span>
			<span><a target="_blank" href="https://twitter.com/smackcoders"><img src="'.$plugin_url_wp_zoho_crm.'/images/twitter.png"></a></span>
			<span><a target="_blank" href="http://www.linkedin.com/company/smackcoders"><img src="'.$plugin_url_wp_zoho_crm.'/images/linkedin.png"></a></span>
			</div>
			<div class="poweredby" id="poweredby"><a target="_blank" href="http://www.smackcoders.com/"><img src="http://www.smackcoders.com/wp-content/uploads/2012/09/Smack_poweredby_200.png"></a></div>
			</div>
			</div><!-- end inside div -->
			</div>';
			return $rightContent;
	}

	function topContent()
	{ //wptiger_topContent
		$header_content = '<div style="background-color: #FFFFE0;border-color: #E6DB55;border-radius: 3px 3px 3px 3px;border-style: solid;border-width: 1px;margin: 5px 15px 2px; margin-top:15px;padding: 5px;text-align:center"> Please check out <a href="http://www.smackcoders.com/blog/category/free-wordpress-plugins" target="_blank">www.smackcoders.com</a> for the latest news and details of other great plugins and tools. </div><br/>';
		return $header_content;
	}


	function wpzohocrm_listShortcodes(){
	?>
		<div class="upgradetopro" id="upgradetopro" style="display:none;">This feature is only available in Pro Version, Please <a href="http://www.smackcoders.com/wp-vtiger-pro.html">UPGRADE TO PRO</a></div>
		<table>
			<tr>
				<h2>List of Shortcodes</h2>
			</tr>
			<tr class='smack_alt'>
				<th class='list-view-th' style='width: 50px;'>#</th>
				<th class='list-view-th' style='width: 450px;'>Shortcodes</th>
				<th class='list-view-th' style='width: 90px;'>VT Module</th>
				<th class='list-view-th' style='width: 150px;'>Assigned To</th>
				<th class='list-view-th' style='width: 90px;'>IsWidget</th>
				<th class='list-view-th' style='width: 150px;'>Action</th>
			</tr>
			<tr class='smack_highlight'>
			<td style='text-align:center;'>1</td>
			<td style='text-align:center;'>[wp-zoho-crm-pro-form name="4YTcK"]</td>
			<td style='text-align:center;'>Contacts</td>
			<td style='text-align:center;'>Administrator</td>
			<td style='text-align:center;'>Yes</td>
			<td style='text-align:center;'>
			<select id='shortcode' name='shortcode' onchange='upgradetopro()'>
			<option value='Select Action'>Select Action</option>
			<option value='edit'>Edit</option>
			<option value='delete'>Delete</option>
			</select>
			</td>
			</tr>
			<tr class='smack_highlight smack_alt'>
			<td style='text-align:center;'>2</td>
			<td style='text-align:center;'>[wp-zoho-crm-pro-form name="SX8ru"]</td>
			<td style='text-align:center;'>Leads</td>
			<td style='text-align:center;'>Administrator</td>
			<td style='text-align:center;'>No</td>
			<td style='text-align:center;'>
			<select id='shortcode' name='shortcode' onchange='upgradetopro()'>
			<option value='Select Action'>Select Action</option>
			<option value='edit'>Edit</option>
			<option value='delete'>Delete</option>
			</select>
			</td>
			</tr>
			</table>

	<?php
	}

	function capture_wp_users(){
		global $plugin_url_wp_zoho_crm;
	?>
		<div class="upgradetopro" id="upgradetopro" style="display:none;">This feature is only available in Pro Version, Please <a href="http://www.smackcoders.com/wp-vtiger-pro.html">UPGRADE TO PRO</a></div>
		<div style="width:90%;margin-top:15px;">
		<div style="float:left">
		<form id="smack-vtiger-user-capture-settings-form" action="<?php echo $_SERVER['REQUEST_URI']; ?>" method="post">
		<input type="hidden" name="smack-vtiger-user-capture-settings-form" value="smack-vtiger-user-capture-settings-form" />
		<h3>Capture WordPress users</h3>
		<table>
			<tr>
				<td><br/>
					<label><div style='float:left;padding-right: 5px;'>Sync New Registration to VT Contacts </div> <div style='float:right;'>:</div> </label>
				</td>
				<td><br/>
					<input type='checkbox' class='smack-vtiger-settings-user-capture' name='smack_user_capture' id='smack_user_capture' 
		<?php
		if($config['smack_user_capture']=='on')
		{
			echo "checked";
		}
		?>
		>
				</td>
			</tr>
			<tr>
				<td>
					<label><div style='float:left;padding-right: 5px;'>Skip Duplicates</div><div style='float:right;'>:</div> </label>
				</td>
				<td>
					<input type='checkbox' class='smack-vtiger-settings-capture-duplicates' name='smack_capture_duplicates' id='smack_capture_duplicates' 
		<?php
		if($config['smack_capture_duplicates']=='on')
		{
			echo "checked";
		}
		$contentUrl = WP_CONTENT_URL;
		$imagepath = "{$plugin_url_wp_zoho_crm}/images/"; 
		?>
		>
				</td>
			</tr>

		</table>
		<table>
			<tr>
				<td>
					<input type="hidden" name="posted" value="<?php echo 'posted';?>">
					<p class="submit">
						<input type="button" value="<?php _e('Save Settings');?>" class="button-primary" onclick="upgradetopro();"/>
					</p>
				</td>
				<td>
				<input type="button" style="float:left;" value="<?php _e('Sync Now');?>" class="button-secondary submit-add-to-menu" onclick="upgradetopro();"/>
				<img style="display:none; float:left; padding-top:5px; padding-left:5px;" id="loading-image" src="<?php echo $imagepath.'loading-indicator.gif';?>" />
				</td>

			</tr>
		</table>
		</form>
		</div>
<!--
		<div style="float:right;">
		<p><h3>How to sync wp users and registrations as Contacts WP Tiger Pro?</h3></p>
		<iframe width="560" height="315" src="//www.youtube.com/embed/pEeL8sKgSv0?list=PL2k3Ck1bFtbR7d8nRq-oc5iMDBm2ITWuX" frameborder="0" allowfullscreen></iframe>
		</div>
-->
		</div>
	<?php
	}


	function plugin_settings() {

		$fieldNames = array(
				'username' => __('Username'),
				'password' => __('Password'),
				'authkey' => __('Authenticataion Key'),
				'wp_zoho_crm_smack_user_capture' => __('Capture User'),
			);
		if(isset($_REQUEST['sync_crm_fields']) && ($_REQUEST['sync_crm_fields'] == "Fetch CRM Fields"))
                {
                        include_once($plugin_dir_wp_zoho_crm."getFields.php");
                }

		if (sizeof ( $_POST ) && isset ( $_POST ["smack_vtlc_hidden"] )) {
			
			foreach ( $fieldNames as $field => $value ) {
				$config [$field] = $_POST [$field];
			}
			
			update_option ( 'smack_zoho_crm_settings', $config );
			$wp_tiger_contact_form_attempts = get_option( 'wp-zoho-contact-form-attempts' );
			$wp_tiger_contact_widget_form_attempts = get_option( 'wp-zoho-contact-widget-form-attempts' );
                        $successfulAtemptsOption['total'] = 0;
                        $successfulAtemptsOption['success'] = 0;

			if( !is_array($wp_tiger_contact_form_attempts) )
			{
        	                update_option('wp-zoho-contact-form-attempts', $successfulAtemptsOption );
			}
			if( !is_array($wp_tiger_contact_widget_form_attempts) )
			{
				update_option('wp-zoho-contact-widget-form-attempts' , $successfulAtemptsOption );
			}
		}

		$siteurl = site_url ();
		$config = get_option ( 'smack_zoho_crm_settings' );
		$config_field = get_option ( "smack_zoho_crm_field_settings" );
		
		$content = '<div style="width:95%">
				<div style="float:left">';
		
		if (! isset ( $config_field ['fieldlist'] )) {
			$content .= '<form class="left-side-content" id="smack_vtlc_form"
							action="" 
							method="post">';
		} else {
			$content .= '<form class="left-side-content" id="smack_vtlc_form" 
							action="' . $_SERVER ['REQUEST_URI'] . '" method="post">';
		}
			if(isset($_POST['Submit']) && $_POST['Submit'] == 'Save Settings'){ ?>
				<script>
				saveSettings();
				</script>
			<?php }	
		$content .= '<input type="hidden" name="page_options" value="smack_zoho_crm_settings" />
						<input type="hidden" name="smack_vtlc_hidden" value="1" />
						<h2>Zoho CRM Contact Form Settings</h2>
						<br />
						<div class="messageBox" id="message-box" style="display:none;" ><b>Settings Successfully Saved!</b></div>
						<h3>Credentials</h3>
						<div id="dbfields">
							<table>
								<tr>
									<td class="smack_settings_td_label"><label>Username</label>
									</td>
									<td><input class="smack_settings_input_text" type="text" id="username"
										name="username" value="' . $config ['username'] . '" /></td>
								</tr>
								<tr>
									<td class="smack_settings_td_label"><label>Password</label>
									</td>
									<td><input class="smack_settings_input_text" type="text" id="password"
										name="password" value="' . $config ['password'] . '" /><br /></td>
								</tr>
							</table>
						</div>
						<table>
							<tr>
								<td class="smack_settings_td_label"><input type="button"
									class="button" value="Get Authenticataion Token Key"
									onclick="testZohoCrmCredentials(\'' . $siteurl . '\');" /></td>
								<td id="smack-database-test-results"></td>
							</tr>
						
						</table>
						<div id=vtigersettings>
							<table>
								<tr>
									<td class="smack_settings_td_label"><label>Authenticataion Key</label></td>
									<td><input class="smack_settings_input_text" type="text" id="authkey"
										name="authkey" value="' . $config ['authkey'] . '" /></td>
								</tr>
							</table>
							<br />
							<h3>Capturing WordPress users</h3>
							<table>
								<tr>
									<td><br /> <label>
											<div style="float: left">Do you need to capture the registering
												users</div>
											<div style="float: right; padding-left: 5px;">:</div>
									</label></td>
									<td><br /> <input type="checkbox"
										class="smack-vtiger-settings-user-capture"
										name="wp_zoho_crm_smack_user_capture" id="wp_zoho_crm_smack_user_capture"';
		
		if ($config ['wp_zoho_crm_smack_user_capture'] == 'on') {
			$content .= "checked";
		}
		$content .= '>
						</td>
						</tr>
						<!--<tr>
							<td>
								<div style="float: left">Sync WP members to VtigerCRM contacts</div>
								<div style="float: right; padding-left: 5px;">:</div>
							</td>
							<td><input type="button" value="Sync"
								class="button-secondary submit-add-to-menu"
								onclick="captureAlreadyRegisteredUsersWpTiger();" />
								<div id="please-upgrade" style="position: absolute; z-index: 100;"></div>
							</td>
						</tr>-->
						
						</table>
						
						</div>
						<input type="hidden" name="posted" value="Posted">
						<p class="submit">
							<input name="Submit" type="submit" value="Save Settings" class="button-primary" />
						</p>
						<div id="vt_fields_container"></div>
						</form>';
	$smack_zoho_crm_settings_array = get_option("smack_zoho_crm_settings");
	if( (isset($smack_zoho_crm_settings_array['username']) && ($smack_zoho_crm_settings_array['username'] != '')) && (isset($smack_zoho_crm_settings_array['password']) && ($smack_zoho_crm_settings_array['password'] != '')) && (isset($smack_zoho_crm_settings_array['authkey']) && ($smack_zoho_crm_settings_array['authkey'] != '') ) )
	{
		$content.= '<form action="" method="POST" name="synccrmfields">
			<input type="submit" class="button-secondary submit-add-to-menu" name="sync_crm_fields" value="Fetch CRM Fields"/>';
		if(isset($_REQUEST['sync_crm_fields']) && ($_REQUEST['sync_crm_fields'] == "Fetch CRM Fields"))
                {
			$content .= "<span style='color:green; font-weight: bold;'>Crm Fields Synced</span>";
		}
		$content .= '</form>';
	}
$content .= '</div>
<!--
	<div style="float:right;">
	<p><h3>How To Configure WP-Tiger in wordpress?</h3></p>
	<iframe width="560" height="315" src="//www.youtube.com/embed/lX0evNGL5tc?list=PL2k3Ck1bFtbR7d8nRq-oc5iMDBm2ITWuX" frameborder="0" allowfullscreen></iframe>
	</div>
--
	</div>';
		echo $content;
	//	echo rightSideContent ();
	}


	function widget_fields() {
		global $plugin_url_wp_zoho_crm;
		global $plugin_dir_wp_zoho_crm;
		$config = get_option ( 'smack_zoho_crm_settings' );
		$config_widget_field = get_option ( "smack_zoho_crm_widget_field_settings" );
		if( !is_array($config_widget_field))
		{
			$config_widget_field = Array();
		}
		if( !is_array($config) )
		{
			$config = Array();
		}
		$topContent = $this->topContent ();
		$imagepath = "{$plugin_url_wp_zoho_crm}/images/";
	
		if (isset ( $_POST ['widget_field_posted'] )) {
			$config_widget_field ['widgetfieldlist'] = array ();
			if (isset ( $_POST ['no_of_vt_fields'] )) {
				$fieldArr = array ();
				for($i = 0; $i <= $_POST ['no_of_vt_fields']; $i ++) {
					if (isset ( $_POST ["smack_vtlc_field$i"] )) {
						array_push ( $fieldArr, $_POST ["smack_vtlc_field_hidden$i"] );
					}
				}
				$config_widget_field ['widgetfieldlist'] = $fieldArr;
			}
			update_option ( 'smack_zoho_crm_widget_field_settings', $config_widget_field );
		}
/*
		if(isset($_REQUEST['sync_crm_fields']) && ($_REQUEST['sync_crm_fields'] == "Fetch CRM Fields"))
		{
			include_once($plugin_dir_wp_zoho_crm."getFields.php");
		}
*/
		$total_widget_fields = get_option('smack_zoho_crm_total_widget_field_settings');
		$widgetContent = '<div class="left-side-content">
<!--
        <form action="" method="POST" name="synccrmfields">
                <input type="submit" class="button-secondary submit-add-to-menu" name="sync_crm_fields" value="Fetch CRM Fields"
/>
        </form>
-->
					 <div class="upgradetopro" id="upgradetopro" style="display:none;">This feature is only available in Pro Version, Please <a href="http://www.smackcoders.com/wp-vtiger-pro.html">UPGRADE TO PRO</a> </div>
					<div class="messageBox" id="message-box" style="display:none;" ><b>Successfully Saved!</b></div>
					<form id="smack_vtlc_field_form" action="' . $_SERVER ['REQUEST_URI'] . '" method="post">';

		if (is_array( $total_widget_fields )){
			if(isset($_POST['Submit']) && $_POST['Submit'] == 'Save Field Settings'){ ?>
				<script>
				saveSettings();
				</script>
			<?php }
			$wp_tiger_contact_form_attempts = get_option( 'wp-zoho-contact-widget-form-attempts' );
			$total = $wp_tiger_contact_form_attempts['total'];
			$success = $wp_tiger_contact_form_attempts['success'];
			$failure = $total - $success;
			if(isset($total))
			{
				$widgetContent .= '<b>Submissions :-</b> ( Success <span style="color:green; cursor:pointer;" onclick="alertMsgWpTiger(\' Successful captures from this form '.$success.' \')";> '.$success.' </span> / Failure <span style="color:red; cursor:pointer;" onclick="alertMsgWpTiger(\' Failed attempts from this form '.$failure.' \')";> '.$failure.' </span> </span> ) Total <span style="color:green; cursor:pointer;" onclick="alertMsgWpTiger(\' Total trials from this form '.$total.' \')"; > '.$total.' </span> <br/>';
			}

			$widgetContent .= '<div style="width:25%;float:left;"><h3 class="title">Widget Field settings</h3></div><div style="width:75%;float:right;"><p>( Please use the short code <b> [zoho_crm_lead_widget_area]';

			$widgetContent.= '</b> in widgets )</p></div><br/><br/>
							<div style="margin-top:10px;">
						<div style="padding:2px;"><input type="checkbox" id="skipduplicate" onclick="upgradetopro()" /> Skip Duplicates. Note: Email should be mandatory and enabled to make this work. </div>
						<div style="padding:2px;"><input type="checkbox" id="generateshortcode" onclick="upgradetopro()" /> Generate this Shortcode for widget form. </div>
						<div style="padding:2px;">Assign Leads to User: <select id="assignto" onclick="upgradetopro()" ><option>Administrator</option><option>Standard User</option></select></div>
					   </div><br/>
							<input type="hidden" name="posted" value="Posted"> 
							<label for="smack_vtlc_fields">Choose the fields you want to display in Widget Lead Capture page , Choose minimum fields</label><br/><br/>
							<input type="button" class="button-secondary submit-add-to-menu" name="sync_crm_fields" value="Fetch CRM Fields"
							onclick="upgradetopro()" />
							<input type="submit" value="Save Field Settings" class="button-secondary submit-add-to-menu" 
								name="Submit" />
							<input type="button" class="button-secondary submit-add-to-menu" name="make_mandatory" 
								id="make_mandatory" value="Save Mandatory Fields" onclick="upgradetopro()" /> 
							<input type="button" class="button-secondary submit-add-to-menu" name="save_display_name" 
								id="save_display_name" value="Save Labels" onclick="upgradetopro()" /> 
							<input type="button" class="button-create-shortcode" name="create_shortcode" id="create_shortcode" 
								value="Generate Shortcode" onclick="upgradetopro()" /><br/></br>

							<table class="tableborder">
								<tr class="smack_alt">
									<th style="width: 50px;"><input type="checkbox" name="selectall" id="selectall"
										onclick="select_allfields(\'smack_vtlc_field_form\',\'widget\')" /></th>
									<th style="width: 200px;"><h5>Field Name</h5></th>
									<th style="width: 100px;"><h5>Show Field</h5></th>
									<th style="width: 100px;"><h5>Order</h5></th>
									<th style="width: 120px;"><h5>Mandatory Fields</h5></th>
									<th style="width: 200px;"><h5>Field Label Display</h5></th>
								</tr>

								<tbody>
								<tr valign="top">
									<td><input type="hidden" id="no_of_vt_fields" name="no_of_vt_fields" value="' . sizeof ( $total_widget_fields ) . '">';
			
			$nooffields = count ( $total_widget_fields );
			$inc = 1;
			foreach ( $total_widget_fields as $key => $field ) {
				if($inc % 2 == 1){ 
					$widgetContent .= '<tr class="smack_highlight">';
				}else{
					$widgetContent .= '<tr class="smack_highlight smack_alt">';
				}
				$typeofdata = $field['fieldtype']; //explode ( '~', $field->typeofdata );
				$widgetContent .= '<td class="smack-field-td-middleit">
									<input type="hidden" value="' . $field['fieldlabel'] . '"id="field_label' . $key . '"> 
									<input type="hidden" value="' . $typeofdata . '" id="field_type' . $key . '"> 
									<input type="hidden" name="smack_vtlc_field_hidden' . $key . '"value="' . $field['fieldname'] . '" />';
				
				if ( $field['mandatory'] == 'true')
					$checked = 'checked="checked" disabled';
				else
					$checked = "";
				
				if ( $field['mandatory'] == 'true') {
					$widgetContent .= '<input type="hidden" value="' . $field['fieldname'] . '"id="smack_vtlc_field' . $key . '"
										name="smack_vtlc_field' . $key . '" /> 
									<input type="checkbox" value="' . $field['fieldname'] . '"' . $checked . '>';
				} else {
					$widgetContent .= '<input type="checkbox" value="' . $field['fieldname'] . '"id="smack_vtlc_field' . $key . '"
									name="smack_vtlc_field' . $key . '" ' . $checked . '>';
				}
				
				$widgetContent .= '</td>
								<td>' . $field['fieldlabel'];
				if ( $field['mandatory'] == 'true' ) {
					$widgetContent .= '<span style="color: #FF4B33">&nbsp;*</span>';
				}
				
				$widgetContent .= '</td>
								<td class="smack-field-td-middleit">';
				
				if (is_array($config_widget_field ['widgetfieldlist']) && in_array ( $field['fieldname'], $config_widget_field ['widgetfieldlist'] )) {
					if ( $field['mandatory'] == 'true' ) {
						$widgetContent .= '<img src="' . $imagepath . 'tick_strict.png" onclick="upgradetopro()" />';
					} else {
						$widgetContent .= '<img src="' . $imagepath . 'tick.png" onclick="upgradetopro()" />';
					}
				} else {
					$widgetContent .= '<img src="' . $imagepath . 'publish_x.png" onclick="upgradetopro()" />';
				}
				
				$widgetContent .= '</td>	<td class="smack-field-td-middleit">';
				
				if ($inc == 1) {
					$widgetContent .= '<a class="smack_pointer" id="down' . $i . '" onclick="move(\'down\');">
									<img src="' . $imagepath . 'downarrow.png" /></a>';
				} elseif ($inc == $nooffields) {
					$widgetContent .= '<a class="smack_pointer" id="up' . $i . '" onclick="move(\'up\');">
									<img src="' . $imagepath . 'uparrow.png" /></a>';
				} else {
					$widgetContent .= '<a class="smack_pointer" id="down' . $i . '" onclick="move(\'down\');">
									<img src="' . $imagepath . 'downarrow.png" /></a> 
									<a class="smack_pointer" id="up' . $i . '" onclick="move(\'up\');">
									<img src="' . $imagepath . 'uparrow.png" /></a>';
				}
				
				$widgetContent .= '</td>	<td class="smack-field-td-middleit">
								<input type="checkbox" name="check' . $i . '" id="check' . $i . '"';
				
				if ( $field['mandatory'] == 'true' ) {
					$widgetContent .= ' checked="checked" disabled ';
				}
				
				$widgetContent .= '/></td>	<td class="smack-field-td-middleit" id="field_label_display_td' . $i . '">
								<input type="text" id="field_label_display_textbox' . $i . '" class="readonly-text" onclick="upgradetopro()" 
										value="' . $field['fieldlabel'] . '" readonly /></td>
								</tr>';
				$inc ++;
			}
			
			$widgetContent .= '</td>
										</tr>
									</tbody>
								</table>
								<p class="submit">Please use the short code <b> [zoho_crm_lead_widget_area]</b> in widgets
								</p>
								<input type="hidden" name="widget_field_posted" value="Posted" />
								</form>
							</div>
							<div class="right-side-content" >'.$this->wpzohocrm_rightContent().'					
							</div>';
			
			echo $widgetContent;
		} else {
			$widgetContent = "<div style='margin-top:20px;font-weight:bold;'>
					Please enter a valid database <a href=".admin_url()."admin.php?page=wp-tiger&action=plugin_settings>settings</a>
					</div>";
			echo $widgetContent;
		}
	}

	/**
	 * 
	 * Function to get vtiger fields from the database
	 */
	function zoho_crm_lead_fields() {
		global $plugin_url_wp_zoho_crm;
		$config = get_option ( 'smack_zoho_crm_settings' );
		if (isset ( $_POST ['smack_vtlc_hidden'] )) {
			$config ['username'] = $_POST ['username'];
			$config ['password'] = $_POST ['password'];
			$config ['authkey'] = $_POST ['authkey'];
			$config ['wp_zoho_crm_smack_user_capture'] = $_POST ['wp_zoho_crm_smack_user_capture'];
			update_option ( 'smack_zoho_crm_settings', $config );
		} else {
			$config = get_option ( 'smack_zoho_crm_settings' );
			$config_field = get_option ( "smack_zoho_crm_field_settings" );
		}
		if (isset ( $_POST ['field_posted'] )) {
			$config_field ['fieldlist'] = array ();
			if (isset ( $_POST ['no_of_vt_fields'] )) {
				$fieldArr = array ();
				for($i = 0; $i <= $_POST ['no_of_vt_fields']; $i ++) {
					if (isset ( $_POST ["smack_vtlc_field$i"] )) {
						array_push ( $fieldArr, $_POST ["smack_vtlc_field_hidden$i"] );
					}
				}
				$config_field ['fieldlist'] = $fieldArr;
			}
			update_option ( 'smack_zoho_crm_field_settings', $config_field );
		}
/*
                if(isset($_REQUEST['sync_crm_fields']) && ($_REQUEST['sync_crm_fields'] == "Fetch CRM Fields"))
                {
                        include_once($plugin_dir_wp_zoho_crm."getFields.php");
                }
*/
                $total_widget_fields = get_option('smack_zoho_crm_total_field_settings');
?>
<!--
	<form action="" method="POST" name="synccrmfields">
		<input type="submit" class="button-secondary submit-add-to-menu" name="sync_crm_fields" value="Fetch CRM Fields"
/>
	</form>
-->
<?php
	$content = '';
	$content .= '<div class="left-side-content">
	<div class="upgradetopro" id="upgradetopro" style="display:none;">This feature is only available in Pro Version, Please <a href="http://www.smackcoders.com/wp-vtiger-pro.html">UPGRADE TO PRO</a></div>
	<div class="messageBox" id="message-box" style="display:none;" ><b>Successfully Saved!</b></div>
		<form id="smack_vtlc_field_form"
			action="'.$_SERVER['REQUEST_URI'].'" method="post">';

		if ( is_array( $total_widget_fields ) ) {
			if(isset($_POST['Submit']) && $_POST['Submit'] == 'Save Field Settings'){ ?>
				<script>
				saveSettings();
				</script>
			<?php }
				$wp_tiger_contact_form_attempts = get_option( 'wp-zoho-contact-form-attempts' );
				$total = $wp_tiger_contact_form_attempts['total'];
				$success = $wp_tiger_contact_form_attempts['success'];
				$failure = $total - $success;

				if(isset($total))
				{
	                                $content .= '<b>Submissions :- </b> ( Success <span style="color:green; cursor:pointer;" onclick="alertMsgWpTiger(\' Successful captures from this form '.$success.' \')" > '.$success.' </span> / Failures <span style="color:red; cursor:pointer;" onclick="alertMsgWpTiger(\' Failed attempts from this form '.$failure.' \')" > '.$failure.' </span> </span> ) Total <span style="color:green; cursor:pointer;"  onclick="alertMsgWpTiger(\' Total trials from this form '.$total.' \')" > '.$total.' </span> <br/>';
//					$content .= '<span style="color:green; cursor:pointer;"> 1 </span> ( <span style="color:green; cursor:pointer;"> 1 </span> / <span style="color:red; cursor:pointer;"> 2 </span> )';
				}

				$content .= '<div style="width:25%;float:left;"><h3 class="title">Field settings</h3></div><div style="width:75%;float:right;"><p>( Please use the short code <b> [zoho_crm_lead_page]';

				$content .= '</b> in page or post )</p></div><br/><br/>
				<div style="margin-top:10px;">
				<div style="padding:2px;"><input type="checkbox" id="skipduplicate" onclick="upgradetopro()" /> Skip Duplicates. Note: Email should be mandatory and enabled to make this work. </div>
				<div style="padding:2px;"><input type="checkbox" id="generateshortcode" onclick="upgradetopro()" /> Generate this Shortcode for widget form. </div>
				<div style="padding:2px;">Assign Leads to User: <select id="assignto" onclick="upgradetopro()" ><option>Administrator</option><option>Standard User</option></select></div>
				</div><br/>

			<input type="hidden" name="posted" value="posted" />
			<label for="smack_vtlc_fields">Choose the fields you want to display in Lead Capture page.</label><br/><br/>
			<input type="button" class="button-secondary submit-add-to-menu"
				name="sync_crm_fields" value="Fetch CRM Fields"
				onclick="upgradetopro()" />
			<input type="submit" value="Save Field Settings"
				class="button-secondary submit-add-to-menu" name="Submit" />
			<input type="button" class="button-secondary submit-add-to-menu"
				name="make_mandatory" id="make_mandatory"
				value="Save Mandatory Fields" onclick="upgradetopro()" /> <input
				type="button" class="button-secondary submit-add-to-menu"
				name="save_display_name" id="save_display_name" value="Save Labels"
				onclick="upgradetopro()" /> <input type="button"
				class="button-create-shortcode" name="create_shortcode"
				id="create_shortcode" value="Generate Shortcode"
				onclick="upgradetopro()" /><br/><br/>
			<table class="tableborder">
				<tr class="smack_alt">
					<th style="width: 50px;"><input type="checkbox" name="selectall"
						id="selectall"
						onclick="select_allfields(\'smack_vtlc_field_form\',\'lead\')" /></th>
					<th style="width: 200px;"><h5>Field Name</h5></th>
					<th style="width: 100px;"><h5>Show Field</h5></th>
					<th style="width: 100px;"><h5>Order</h5></th>
					<th style="width: 120px;"><h5>Mandatory Fields</h5></th>
					<th style="width: 200px;"><h5>Field Label Display</h5></th>
				</tr>
				<tbody>
					<tr valign="top">

						<td><input type="hidden" id="no_of_vt_fields"
							name="no_of_vt_fields" value="'. sizeof($total_widget_fields) .'">';
								
			$nooffields = count ( $total_widget_fields );
			$inc = 1;
			foreach ( $total_widget_fields as $key => $field ) {
				?>
			  <?php if($inc % 2 == 1){
			       $content .= '<tr class="smack_highlight">';
				} else{
				$content .= '<tr class="smack_highlight smack_alt">';
				}
				$typeofdata = $field['fieldtype']; //explode( '~', $field->typeofdata );
				$content .= '<td class="smack-field-td-middleit"><input type="hidden"
							value="'.$field['fieldlabel'].'"
							id="field_label'. $key .'"> <input type="hidden"
							value="'.$typeofdata.'"
							id="field_type'.$key.'"> <input type="hidden"
							name="smack_vtlc_field_hidden'.$key.'"
							value="'.$field['fieldname'].'" />';
				if ( $field['mandatory'] == "true" ) {
					$checked = 'checked="checked" disabled';
					$mandatory = 'checked="checked" disabled';
				} else {
					$checked = "";
				}
				if( $field['mandatory'] == "true" ){ 
					$content .= '<input type="hidden"
						value="'.$field['fieldname'] .'"
							id="smack_vtlc_field'.$key.'"
							name="smack_vtlc_field'.$key.'" /> <input
							type="checkbox" value="'.$field['fieldname'].'"'. $checked .' />';
				}else { 
					$content .= '<input type="checkbox"
								value="'.$field['fieldname'].'"
									id="smack_vtlc_field'.$key.'"
									name="smack_vtlc_field'.$key.'"'. $checked .'/>';
				}
				$content .= "</td>
						<td>{$field['fieldlabel']}";
				if( $field['mandatory'] == "true" ){ 
					$content .= '<span style="color: #FF4B33">&nbsp;*</span>';
				}
				$content .= '</td>';			
				$contentUrl = WP_CONTENT_URL;
				$imagepath = "{$plugin_url_wp_zoho_crm}/images/";
				$content .= '<td class="smack-field-td-middleit">';
				if (is_array($config_field ['fieldlist']) && in_array ( $field['fieldname'], $config_field ['fieldlist'] )) {
					if ( $field['mandatory'] == "true" ) {
						$content .= '<img src="'.$imagepath.'tick_strict.png"
							onclick="upgradetopro()" />';
					} else {
						$content .= '<img src="'.$imagepath.'tick.png"	onclick="upgradetopro()" />';
					}
				} else {
					$content .= '<img src="'.$imagepath.'publish_x.png"
							onclick="upgradetopro()" />';
				}
				$content .= '</td>
					<td class="smack-field-td-middleit">';
				if($inc == 1){ 
					$content .= '<a class="smack_pointer" id="down'.$i.'" onclick="move(\'down\');"><img
								src="'.$imagepath.'downarrow.png" /></a>';
				} elseif($inc == $nooffields){ 
					$content .= '<a class="smack_pointer" id="up'.$i.'" onclick="move(\'up\');"><img
								src="'.$imagepath.'uparrow.png" /></a>';
				}else{ 
					$content .= '<a class="smack_pointer" id="down'.$i.'" onclick="move(\'down\');"><img
								src="'.$imagepath.'downarrow.png" /></a> <a
							class="smack_pointer" id="up'.$i.'" onclick="move(\'up\');"><img
								src="'.$imagepath.'uparrow.png" /></a>';
				} 
				$content .= '</td>
						<td class="smack-field-td-middleit"><input type="checkbox"
							name="check'.$i.'" id="check'.$i.'"';
						 if( $field['mandatory'] == "true" ){ 
							$content .= 'checked="checked" disabled';
						 } 
				$content .=' /></td>
						<td class="smack-field-td-middleit"
							id="field_label_display_td'.$i.'"><input type="text"
							id="field_label_display_textbox'.$i.'" class="readonly-text" onclick="upgradetopro()"
							value="'.$field['fieldlabel'].'" readonly /></td>
					</tr>';
				$inc++;
				}
				$content .= '</td>
					</tr>
				</tbody>
			</table>
			<p>Please use the short code <b> [zoho_crm_lead_page]</b> in page or post</p>
			<input type="hidden" name="field_posted"
				value="posted" />

		</form>
	</div>
	<div class="right-side-content" >'.$this->wpzohocrm_rightContent().'                                     
	</div>';
		echo $content;
		} else{
			$Content = "<div style='margin-top:20px;font-weight:bold;'>
					Please enter a valid database <a href=".admin_url()."admin.php?page=wp-tiger&action=plugin_settings>settings</a>
					</div>";
			echo $Content;
		}
	}

}
?>
