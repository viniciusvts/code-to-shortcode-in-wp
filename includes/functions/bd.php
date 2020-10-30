<?php
if( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * salvar uma entrada de shortcode
 * @param String $name
 * @param String $content
 * @return int|false|null quantidade de rows afetados
 * 		ou false se não houve inserção
 * @author Vinicius de Santana
 */
function ctsAddNewShortcode($name, $content){
	global $wpdb;
	$array = array(
		CTS_TableAttName => $name,
		CTS_TableCode => $content,
	);
	$return = $wpdb->insert( CTS_TableName, $array , CTS_TableFormat);
	return $return;
}

/**
 * deleta uma entrada de shortcode pelo nome
 * @param String $name
 * @return int|false quantidade de rows afetados ou false
 * @author Vinicius de Santana
 */
function ctsDeleteShortcodeByName($name){
	global $wpdb;
	$array = array(CTS_TableAttName => $name);
	$return = $wpdb->delete( CTS_TableName, $array );
	return $return;
}

/**
 * deleta uma entrada de shortcode pelo id
 * @param String $id
 * @return int|false quantidade de rows afetados ou false
 * @author Vinicius de Santana
 */
function ctsDeleteShortcodeById($id){
	global $wpdb;
	$array = array(CTS_TableId => $id);
	$return = $wpdb->delete( CTS_TableName, $array );
	return $return;
}

/**
 * atualiza uma entrada de shortcode
 * @param String $id
 * @param String $name
 * @param String $content
 * @return int|false quantidade de rows afetados ou false
 * @author Vinicius de Santana
 */
function ctsUpdateShortcode($id, $name, $content){
	global $wpdb;
	$ident = array(
		CTS_TableId => $id
	);
	$array = array(
		CTS_TableAttName => $name,
		CTS_TableCode => $content,
	);
	$return = $wpdb->update( CTS_TableName, $array, $ident, CTS_TableFormat, array( '%d' ) );
	return $return;
}

/**
 * resgata entradas de shortcode
 * @param int $page
 * @return ARRAY_A um array dos shorcodes
 * @author Vinicius de Santana
 */
function ctsQueryAllShortcodes($page = 1){
	$page--; //sim, página 1 é igual a pagina 0 pro banco
	if(!is_int($page) || $page<0) return null; //previne sql injection i pagina negativa
	$numMaxPages = ctsNumberOfPages();
	if($page > $numMaxPages) return null;//quer página que não existe
	
	global $wpdb;
	$qtdRownsPorPagina = get_option(CTS_ItensPorPagOption);
	$rowRelativoAPagina = $qtdRownsPorPagina * $page;
	$sql ="SELECT * FROM ".CTS_TableName.
			" LIMIT ".$rowRelativoAPagina.",".$qtdRownsPorPagina;
	$return = $wpdb->get_results( $sql, "ARRAY_A" );
	return $return;
}

/**
 * Retorna quantidade de páginas possiveis
 * @return int qutd de páginas possiveis
 * @author Vinicius de Santana
 */
function ctsNumberOfPages(){
	global $wpdb;
	$sql ="SELECT * FROM ".CTS_TableName;
	$resp = $wpdb->get_results( $sql, "ARRAY_A" );
	$numRows = count($resp);
	$qtdRownsPorPagina = get_option(CTS_ItensPorPagOption);
	$return = $numRows / $qtdRownsPorPagina;
	return $return;
}

/**
 * resgata entrada de shortcode baseado no id
 * @param int $id
 * @return ARRAY_A o array do shorcode
 * @author Vinicius de Santana
 */
function ctsQueryShortcodesById($id = 0){
	if(!is_int($id)) return null; //previne sql injection
	global $wpdb;
	$sql ="SELECT * FROM ".CTS_TableName.
			" WHERE ".CTS_TableId."=".$id;
	$return = $wpdb->get_row( $sql, "ARRAY_A" );
	return $return;
}

/**
 * resgata entrada de shortcode baseado no nome
 * @param String $name
 * @return ARRAY_A o array do shorcode
 * @author Vinicius de Santana
 */
function ctsQueryShortcodesByName($name){
	if(strpos($name, ';')) return null; //previne sql injection
	global $wpdb;
	$sql ="SELECT * FROM ".CTS_TableName.
			" WHERE ".CTS_TableAttName."='".$name."'";
	$return = $wpdb->get_row( $sql, "ARRAY_A" );
	return $return;
}