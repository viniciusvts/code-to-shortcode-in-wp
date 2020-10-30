<?php
/**
 * Plugin Name: Code To ShortCode
 * Plugin URI: https://www.santanasolucoesweb.com..br/
 * Description: Salvar e gerenciar dados a serem inseridos como shortcodes no site
 * Version: 1.0
 * Author: Vinicius de Santana
 * Author URI: https://www.santanasolucoesweb.com.br/
 */
if( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

define('CTS_PATH', dirname( __FILE__ ) );
define('CTS_URL', plugins_url( '', __FILE__ ) );
define('CTS_LangOption', 'ctslang');
define('CTS_ItensPorPagOption', 'ctspageitens');
define('CTS_ShortcodeName', 'cts-wp');
define('CTS_TableName', 'wp_cts_to_shortcode');
define('CTS_TableAttName', 'attname');
define('CTS_TableCode', 'content');
define('CTS_TableId', 'id');
define('CTS_TableFormat', array('%s','%s'));

include_once CTS_PATH.'/includes/lang/get_lang.php';
include_once CTS_PATH.'/includes/functions/bd.php';
include_once CTS_PATH.'/includes/functions/actions.php';
include_once CTS_PATH.'/includes/functions/shortcode.php';//;)

register_activation_hook(__FILE__, 'install');
register_uninstall_hook(__FILE__, 'uninstall');
//==================================================================
//funções
/**
 * função de instalação do plugin
 */
function install(){
	global $wpdb;
	add_option(CTS_LangOption, 'pt_BR');
	add_option(CTS_ItensPorPagOption, 100);
	$wpdb->query("CREATE TABLE IF NOT EXISTS ".CTS_TableName." ("
			.CTS_TableId." int NOT NULL AUTO_INCREMENT, "
			.CTS_TableAttName." VARCHAR(64) NOT NULL, "
			.CTS_TableCode." TEXT NOT NULL, ".
			"UNIQUE INDEX(".CTS_TableAttName."),".
			"PRIMARY KEY (".CTS_TableId."))");
}

/**
 * função de desinstalação do plugin
 */
function uninstall(){
	global $wpdb;
	delete_option(CTS_LangOption);
	delete_option(CTS_ItensPorPagOption);
	$wpdb->query('DROP TABLE IF EXISTS '.CTS_TableName);
}