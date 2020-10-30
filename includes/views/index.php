<?php
$_POST[CTS_TableCode] = stripslashes($_POST[CTS_TableCode]);
define('CTS_View_Path', dirname( __FILE__ ) );
include CTS_View_Path."/inc/paginate.php";
$action = $_POST['action'];
if(isset($action)){
	if($action == 'trash'){
		$bdReturn = ctsDeleteShortcodeById($_POST[CTS_TableId]);
		if(!$bdReturn){
			echo "<div class='error'><strong>";
			echo get_lang("EE");
			echo "</strong></div>";
		}
	}else if($action == 'edit'){
		if( !empty($_POST[CTS_TableAttName]) && !empty($_POST[CTS_TableCode]) ){
			$bdReturn = ctsUpdateShortcode($_POST[CTS_TableId],
					$_POST[CTS_TableAttName],
					$_POST[CTS_TableCode]);
		}
		if(!$bdReturn){
			echo "<div class='error'><strong>";
			echo get_lang("EA");
			echo "</strong></div>";
		}
	}else if($action == 'new'){
		if( !empty($_POST[CTS_TableAttName]) && !empty($_POST[CTS_TableCode]) ){
			$bdReturn = ctsAddNewShortcode($_POST[CTS_TableAttName],
					$_POST[CTS_TableCode]);
		}
		if(!$bdReturn){
			echo "<div class='error'><strong>";
			echo get_lang("EN");
			echo "</strong></div>";
		}
	}
}else if( isset($_POST[CTS_LangOption]) ){
	update_option(CTS_LangOption, $_POST[CTS_LangOption]);
}else if( isset($_POST[CTS_ItensPorPagOption]) ){
	update_option(CTS_ItensPorPagOption, $_POST[CTS_ItensPorPagOption]);
}
//constroi a tela
include CTS_View_Path."/template/header.php";
include CTS_View_Path."/template/edit.php";
include CTS_View_Path."/template/new.php";
include CTS_View_Path."/template/options.php";
include CTS_View_Path."/template/footer.php";