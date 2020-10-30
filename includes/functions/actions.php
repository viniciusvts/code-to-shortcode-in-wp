<?php
//adiocionar admin menu
add_action ('admin_menu', 'mainAdminPage');

function mainAdminPage()
{
	add_menu_page(
		get_lang('PS'),
		get_lang('PS'),
		'manage_options',
		'cts-admin',
		'returnMainPage',
		'dashicons-admin-settings',
		150
	);
}
function returnMainPage(){
    include CTS_PATH."/includes/views/index.php"; 
}