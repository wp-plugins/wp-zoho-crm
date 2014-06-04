function alertMsgWpTiger( msg ){
	alert(msg);
}
function smack_validate_Fields() {
	var no_of_fields = jQuery('#no_of_vt_fields').val();
	for ( var i = 0; i < no_of_fields; i++) {
		if (jQuery('#field_type' + i).val() == 'M'
				&& !jQuery('#smack_vtlc_field' + i).is(':checked')) {
			alert(jQuery('#field_label' + i).val() + ' is mandatory');
			try {
				jQuery('#smack_vtlc_field' + i).focus();
			} catch (e) {
			}
			return false;
		}
	}
	return true;
}

function captureAlreadyRegisteredUsersWpTiger() {
	document.getElementById('please-upgrade').style.fontSize = "14px";
	document.getElementById('please-upgrade').style.fontFamily = "Sans Serif";
	document.getElementById('please-upgrade').style.color = "red";
	document.getElementById('please-upgrade').innerHTML = "Please Upgrade to WP-Tiger-Pro for Sync feature";
}

function testZohoCrmCredentials(siteurl) {
          
	document.getElementById('vt_fields_container').style.display="inline";
	jQuery.ajax({
		type: 'POST',
		url: ajaxurl,
		data: {
		    'action'	: 'SmackWPZohoCrmtestAccess',
		    'username'	: jQuery("#username").val(),
		    'password'	: jQuery("#password").val(),
		    'adminAction' : "getAuthkey",
		},
		success:function(data) {
			var jsonData = JSON.parse(data);
			if(jsonData['result'] == "TRUE")
			{
				jQuery("#authkey").val(jsonData['authToken']);
				jQuery( "#smack_vtlc_form" ).submit();
	document.getElementById('error_msg').innerHTML = "Settings Saved";
	document.getElementById('error_msg').style.color = "green";
	document.getElementById('vt_fields_container').style.display = "none ";
                                
			}
			else
			{

				if(jsonData['cause'] == 'EXCEEDED_MAXIMUM_ALLOWED_AUTHTOKENS') {
                                   jQuery("#error_msg").html("Please log in to <a target='_blank' href='https://accounts.zoho.com'>https://accounts.Zoho.com</a> - Click Active Authtoken - Remove unwanted Authtoken, so that you could generate new authtoken..").css("color","red");
	document.getElementById('vt_fields_container').style.display= "none ";
				//	alert("Please log in to https://accounts.zoho.com - Click Active Authtoken - Remove unwanted Authtoken, so that you could generate new authtoken..");
			          }	
                             else{
				     jQuery("#error_msg").html("Please Verify Username and Password." ).css("color","red");
	document.getElementById('vt_fields_container').style.display = "none";
                }
			}
			},
		error: function(errorThrown){
		    console.log(errorThrown);
		}
	});
}

function sync_zoho(){
           jQuery("#zoho_fetch").css('display','inline');
}

function upgradetopro() {
	window.setTimeout("showmessage()", 100);
	window.setTimeout("hidemessage()", 5000);
}

function move(val) {
	window.setTimeout("showmessage()", 100);
	window.setTimeout("hidemessage()", 5000);
}

function showmessage() {
	document.getElementById('upgradetopro').style.display = "";
}

function hidemessage() {
	document.getElementById('upgradetopro').style.display = "none";
	document.getElementById('skipduplicate').checked = false;
	document.getElementById('generateshortcode').checked = false;
}

function select_allfields(formid, module) {
	var i;
	var data = "";
	var form = document.getElementById(formid);
	var chkall = form.elements['selectall'];
	var chkBx_count = form.elements['no_of_vt_fields'].value;
	if (chkall.checked == true) {
		for (i = 0; i < chkBx_count; i++) {
			if (document.getElementById('smack_vtlc_field' + i).disabled == false)
				document.getElementById('smack_vtlc_field' + i).checked = true;
		}
	} else {
		for (i = 0; i < chkBx_count; i++) {
			if (document.getElementById('smack_vtlc_field' + i).disabled == false)
				document.getElementById('smack_vtlc_field' + i).checked = false;
		}
	}
}

function saveSettings(){
        window.setTimeout("showSuccessMessage()", 100);
        window.setTimeout("hideSuccessMessage()", 10000);
}

function showSuccessMessage(){
        document.getElementById('message-box').style.display = '';
}

function hideSuccessMessage(){
        document.getElementById('message-box').style.display = 'none';
}

