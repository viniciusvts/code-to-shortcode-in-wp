<?php 
function get_adsense() {
	$string = '<style>.bg-form-cta{background: #E2E2E2; padding: 20px; height: 600px; margin: 20px 0;}.col-left, .col-right{float: left; width: 50%}.col-right img{width: 85%; margin: 15px; margin-left: 15px}.bg-form-cta-header{ text-align: center; margin:20px}.bg-form-cta-header h3{font-size: 26px; line-height: 20px; color: #766c6c; font-weight:900 }.bg-form-cta-header h5{font-size: 18px; color: #918d8d}@media(max-width:700px){.col-left, .col-right{float:none; width:100%;} .bg-form-cta{height: 1060px} }</style>';
	$string .= '<div id="falar-com-um-consultor" class="bg-form-cta">';
	$string .= '<div class="bg-form-cta-header">';
	$string .= '<h2><b>Buscando Consultoria Full Service para sua empresa?</b></h2>';
	$string .= '<h5>Deixe seus dados para que um consultor possa entrar em contato</h5>';
	$string .= '</div><div class="col-left">';
	$string .= '<div id="consultoria-full-service-content-form-168153245a0a5a2c6118"></div>';
	$string .= '<script type="text/javascript" src="https://d335luupugsy2.cloudfront.net/js/rdstation-forms/stable/rdstation-forms.min.js"></script>';
	$string .= '<script type="text/javascript">new RDStationForms("consultoria-full-service-content-form-168153245a0a5a2c6118-html", "UA-25914892-1").createForm();</script>';
	$string .= '</div>';
	$string .= '<div class="col-right"><img src="https://www.dnadevendas.com.br/wp-content/uploads/consultor.jpg"; />';
	$string .= '</div></div>';
	return $string;
}
add_shortcode("adsense", "get_adsense"); 

//outro exemplo
function torque_hello_world_shortcode( $atts ) {
	$a = shortcode_atts( array('name' => 'world'), $atts );//ou o array ou o atributo, se houver
	return 'Hello ' . $a['name'] . '!';
	/*
	[helloworld]
	// Outputs "Hello world!"
	
	[helloworld name="Bob"]
	// Outputs "Hello Bob!"
	*/
}
add_shortcode( 'helloworld', 'torque_hello_world_shortcode');