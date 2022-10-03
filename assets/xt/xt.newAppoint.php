<?php
header("Content-Type: text/html; charset=UTF-8");

include_once("../../models/AppointsModel.php");

//Definindo o tipo de erro
$arrRetorno['strTipo']		= "success";

//Definindo o tipo de alerta
$arrRetorno['strTipoAlerta']      = "alert-success";

//Definindo a mensagem de erro
$arrRetorno['strMensagem']  = utf8_decode("Agendamento feito com sucesso!");

try {
	
	//Buscando os profissionais
    AppointsModel::newAppoint($_POST['name'], $_POST['source_id'], $_POST['cpf'], $_POST['birthdate'], $_POST['professional_id']);
	
}
catch( Exception $objEx )
{
	
	//Definindo o tipo de erro
	$arrRetorno['strTipo']		= "warning";

  //Definindo o tipo de alerta
  $arrRetorno['strTipoAlerta']      = "alert-danger";
	
	//Definindo a mensagem de erro
	$arrRetorno['strMensagem']	=  utf8_decode("Agendamento não realizado!");
	
}

$arrRetorno["strHtml"] = utf8_encode( ob_get_clean() );

echo json_encode( $arrRetorno );
?>