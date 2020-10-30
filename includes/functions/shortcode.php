<?php
/**
 * Função que retorna o conteudo  do shortcode, 
 * função mágica
 * @param Array $atts atributos do shortcode
 * @return String conteúdo do shortcode
 * @author Vinicius de Santana
 */
function cts_shortcode_add( $atts ) {
	$name = shortcode_atts( array(CTS_TableAttName => null), $atts );//ou o array ou o atributo, se houver
	if(!$name){return null;}//se não tem atributo, não tem shortcode
	$return = ctsQueryShortcodesByName($name[CTS_TableAttName]);
	return $return[CTS_TableCode];
}
add_shortcode( CTS_ShortcodeName, 'cts_shortcode_add');