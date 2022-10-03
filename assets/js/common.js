/*
 * Arquivo que irá conter todas as funções javascript específicas do formulário
 * O uso do framework jQuery ér indispensável para o uso deste arquivo
 */

 /*
 * Função SHOWSPECIALISTS usada para mostrar os profissionais da especialidade selecionada
 */
function showProfessionals(id){

	$("#alert-div-professionals").hide();

	if(id!=""){
		
		$.post( "../assets/xt/xt.professionals.php",
		{
			
			id	: id
			
		},
		function( arrRetorno, textStatus )
		{
			
			if(arrRetorno.strTipo=='success'){
			
				$("#professionals-list").html(arrRetorno.strHtml);
				
			} else {
				
				$("#alert-div-professionals").hide();
				$("#alert-div-professionals").addClass(arrRetorno.strTipoAlerta);
				$("#alert-div-professionals").html(" "+arrRetorno.strMensagem);
				$("#alert-div-professionals").show();
				
			}
						
		},"json");
		$(".professionals").show("slow");
	} else {
		$(".professionals").hide("slow");
	}
}

 /*
 * Função SHOWSPECIALISTS usada para mostrar os profissionais da especialidade selecionada
 */

function showAppoints(professional){
	$("#professional_id").attr("value", professional);
	$(".appoints").show("slow");
}

function newAppoint(){

	erros = "";

	empty("name");
	empty("source_id");
	empty("cpf");
	empty("birthdate");

	if(erros!=""){
		$("#alert-div-appoints").hide();
		$("#alert-div-appoints").addClass("alert-danger");
		$("#alert-div-appoints").html(" É necessário preencher todos os campos.");
		$("#alert-div-appoints").show();
		return false;
	}

	$.post( "../assets/xt/xt.newAppoint.php",
	{

		name : $("#name").val(),
		source_id : $("#source_id").val(),
		cpf	: $("#cpf").val(),
		birthdate : $("#birthdate").val(),
		professional_id	: $("#professional_id").val()

	},
	function( arrRetorno, textStatus )
	{

		$("#alert-div-appoints").hide();
		$("#alert-div-appoints").addClass(arrRetorno.strTipoAlerta);
		$("#alert-div-appoints").html(" "+arrRetorno.strMensagem);
		$("#alert-div-appoints").show();

	},"json");

}

/*
 * Função EMPTY usada para verificar campos vazios
 */
function empty(strCampo, strSpan){
	if($("#"+strCampo).val() == "" || $("#"+strCampo).val() == null)
	{
		
		$("#" + strCampo).css('border', '1px solid red');
		erros += "erroVazio";
		return true;
		
	}
	else
	{
		$("#" + strCampo).css('border', '1px solid black');
        erros += "";
		return false;
		
	}
}

//evitando o envio do form
$('form').submit(function(evento){
	evento.preventDefault();
})

/*
 * Função MASK usada para formatar expressões numéricas
 * EX: data, CPF, telefone, etc...
 */
function mask(objeto, evt, mask){

	var LetrasU = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';

	var LetrasL = 'abcdefghijklmnopqrstuvwxyz';

	var Letras  = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';

	var Numeros = '0123456789';

	var Fixos  = '().-:/ ';

	var Charset = " !\"#$%&\'()*+,-./0123456789:;<=>?@ABCDEFGHIJKLMNOPQRSTUVWXYZ[\]^_/`´abcdefghijklmnopqrstuvwxyz{|}~";

	

	evt = (evt) ? evt : (window.event) ? window.event : "";

	var value = objeto.value;

	if (evt) {

	 var ntecla = (evt.which) ? evt.which : evt.keyCode;

	 tecla = Charset.substr(ntecla - 32, 1);

	 if (ntecla < 32) return true;

	

	 var tamanho = value.length;

	 if (tamanho >= mask.length) return false;

	

	 var pos = mask.substr(tamanho,1);

	 while (Fixos.indexOf(pos) != -1) {

	  value += pos;

	  tamanho = value.length;

	  if (tamanho >= mask.length) return false;

	  pos = mask.substr(tamanho,1);

	 }

	

	 switch (pos) {

	   case '#' : if (Numeros.indexOf(tecla) == -1) return false; break;

	   case 'A' : if (LetrasU.indexOf(tecla) == -1) return false; break;

	   case 'a' : if (LetrasL.indexOf(tecla) == -1) return false; break;

	   case 'Z' : if (Letras.indexOf(tecla) == -1) return false; break;

	   case '*' : objeto.value = value; return true; break;

	   default : return false; break;

	 }

	}

	objeto.value = value;

	return true;

}