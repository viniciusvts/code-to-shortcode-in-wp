<?php
/**
 * Retorna uma tradução possivel da string requisitada
 * @param String $string
 * @return String $lang
 * @author Vinicius de Santana
 */
function get_lang($string){
	require("translated.php");
	$lang = get_option(CTS_LangOption);//update_option($option_name, $option_value);
	$stringTraduzida = $arrayDeIdiomas[$lang][$string];
	
	return $stringTraduzida;
}

/**
 * Retorna um array com as linguagems dispoíveis
 * @return Array array de strings
 * @author Vinicius de Santana
 */
function get_my_laguages(){
	require("translated.php");
	return $idiomas;
}