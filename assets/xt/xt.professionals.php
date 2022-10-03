<?php
header("Content-Type: text/html; charset=UTF-8");

include_once("../../controllers/ControllerApi.php");

//Definindo o tipo de erro
$arrRetorno['strTipo']		= "success";

//Definindo o tipo de alerta
$arrRetorno['strTipoAlerta']      = "alert-success";

try {
	
	//Buscando os profissionais
    $objProfessionals = ControllerApi::getProfessional($_POST['id']);
	
}
catch( Exception $objEx )
{
	
	//Definindo o tipo de erro
	$arrRetorno['strTipo']		= "warning";

    //Definindo o tipo de alerta
    $arrRetorno['strTipoAlerta']      = "alert-warning";
	
	//Definindo a mensagem de erro
	$arrRetorno['strMensagem']	= $objEx->getMessage();
	
}

ob_start();

if($objProfessionals){
    foreach ($objProfessionals as $professionals){
?>
		<div class="col-md-6">
          <div class="card flex-md-row mb-4 shadow-sm h-md-250">
            <div class="card-body d-flex flex-column align-items-start">
              <h3 class="mb-0"><?php echo utf8_decode($professionals->nome);?></h3>
              <div class="mb-1 text-muted"><?php echo $professionals->conselho;?> <?php echo $professionals->documento_conselho;?></div>
              <button class="btn btn-primary" onclick="showAppoints(<?php echo $professionals->profissional_id;?>);">Agendar</button>
            </div>
            <?php
            if($professionals->foto){
            ?>
            <img class="card-img-right flex-auto d-none d-lg-block" data-src="<?php echo $professionals->foto;?>" alt="<?php echo $professionals->nome;?>">
            <?php
            }
            ?>
          </div>
        </div>
<?php 
}
}

$arrRetorno["strHtml"] = utf8_encode( ob_get_clean() );

echo json_encode( $arrRetorno );
?>