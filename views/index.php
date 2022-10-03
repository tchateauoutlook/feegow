<?php
require_once("../controllers/ControllerApi.php");
try {
  
  //Buscando as especialidades
  $objSpecialties = ControllerApi::getSpecialties();
  
}
catch( Exception $objEx )
{
  
  //Definindo a mensagem de erro
  $strMessage  = $objEx->getMessage();
  
}

try {
  
  //Buscando as especialidades
  $objSources = ControllerApi::getSources();
  
}
catch( Exception $objEx )
{
  
  //Definindo a mensagem de erro
  $strMessage  = $objEx->getMessage();
  
}
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Marcação de consultas - Feegow</title>

    <!-- Bootstrap core CSS -->
    <link href="../dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="form-validation.css" rel="stylesheet">
  </head>

  <body class="bg-light">

    <div class="container">
      <div class="py-5">
        <label for="especialidades">Especialidades</label>
        <?php
        if($objSpecialties){
        ?>
        <select class="custom-select d-block w-100" id="country" onchange="showProfessionals(this.value);">
          <option value="">Escolha uma especialidade.</option>
          <?php
          foreach ($objSpecialties as $specialties){
          ?>
          <option value="<?php echo $specialties->especialidade_id;?>"><?php echo $specialties->nome;?></option>
          <?php
          }
          ?>
        </select>
        <?php
        }
        ?>
      </div>

      <div class="professionals" style="display: none;">

        <div class="alert alert-success" role="alert" id="alert-div-professionals" style="display: none;"></div>

        <label for="especialistas">Especialistas</label>

        <div class="row mb-2" id="professionals-list"></div>

      <div class="appoints" style="display: none;">

        <div class="alert alert-success" role="alert" id="alert-div-appoints" style="display: none;"></div>

        <label for="agendamento">Agendamento</label>

        <input type="hidden" id="professional_id">

        <div class="row mb-2">
          <div class="col-md-6">
            <div class="card-body d-flex flex-column align-items-start">
              <input type="text" class="form-control" id="name" placeholder="Name">
            </div>
          </div>
          <div class="col-md-6">
            <div class="card-body d-flex flex-column align-items-start">
              <select class="custom-select d-block w-100" id="source_id">
                <option value="">Como conheceu?</option>
                <?php
                foreach ($objSources as $sources){
                ?>
                <option value="<?php echo $sources->origem_id;?>"><?php echo $sources->nome_origem;?></option>
                <?php
                }
                ?>
              </select>
            </div>
          </div>
          <div class="col-md-6">
            <div class="card-body d-flex flex-column align-items-start">
              <input type="text" class="form-control" id="cpf" placeholder="CPF" onkeypress="return mask(this, event,'###.###.###-##')">
            </div>
          </div>
          <div class="col-md-6">
            <div class="card-body d-flex flex-column align-items-start">
              <input type="date" class="form-control" id="birthdate" placeholder="Nascimento">
            </div>
          </div>
        </div>

        <button class="btn btn-primary" onclick="newAppoint();">Agendar</button>

      </div>

    </div>

      <footer class="my-5 pt-5 text-muted text-center text-small">
      </footer>
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="../assets/js/jquery-2.0.3.js"></script>
    <script src="../assets/js/vendor/popper.min.js"></script>
    <script src="../dist/js/bootstrap.min.js"></script>
    <script src="../assets/js/vendor/holder.min.js"></script>
    <script src="../assets/js/common.js"></script>
  </body>
</html>
