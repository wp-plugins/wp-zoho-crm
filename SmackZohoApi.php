<?php
class SmackZohoApi{
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


	public $zohocrmurl;

	public function __construct()
	{
		$this->zohocrmurl = "https://crm.zoho.com/crm/private/xml/";
	}

	public function APIMethod($modulename, $methodname, $authkey , $param="", $recordId = "")
	{
		$uri = $this->zohocrmurl . $modulename . "/".$methodname."";

		/* Append your parameters here */
		$postContent .= "scope=crmapi";
		$postContent .= "&authtoken={$authkey}";//Give your authtoken

		$ch = curl_init($uri);
		curl_setopt($ch, CURLOPT_POST, true);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $postContent);
		$result = curl_exec($ch);
		$xml = simplexml_load_string($result);
		$json = json_encode($xml);
		$result_array = json_decode($json,TRUE);
		return $result_array;
	}

	public function insertRecord( $modulename, $methodname, $authkey , $xmlData="" )
 	{
                $uri = $this->zohocrmurl . $modulename . "/".$methodname."";
//		$method = "insertRecords";
//		
                /* Append your parameters here */
                $postContent .= "scope=crmapi";
                $postContent .= "&authtoken={$authkey}";//Give your authtoken
		$postContent .= "&xmlData={$xmlData}";
                $ch = curl_init($uri);
                curl_setopt($ch, CURLOPT_POST, true);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($ch, CURLOPT_POSTFIELDS, $postContent);
                $result = curl_exec($ch);
                $xml = simplexml_load_string($result);
                $json = json_encode($xml);
                $result_array = json_decode($json,TRUE);
                return $result_array;
	}
}
?>
