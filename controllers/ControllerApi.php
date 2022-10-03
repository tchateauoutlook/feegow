<?php
/**
 * Classe de funções da PAI Feegow para utilização no sistema
 *
 * @author Tácio Chateaubriand
 * @package api
 * @version 1.0
 */
Final Class ControllerApi
{
	
	/**
	 * Método que irá trazer as especialidade da API
	 *
	 * @access public
	 * @return stdClass
	 */
	public static function getSpecialties()
	{


		$ch = curl_init();

		curl_setopt_array($ch, [

		    CURLOPT_URL => 'https://api.feegow.com/v1/api/specialties/list',

		    CURLOPT_POST => false,

		    CURLOPT_HTTPHEADER => [
		        'Content-Type: application/json',
		        'x-li-format: json',
		        'x-access-token: eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJmZWVnb3ciLCJhdWQiOiJwdWJsaWNhcGkiLCJpYXQiOjE2NDQyNDAzODQsImxpY2Vuc2VJRCI6IjEwNSJ9._v3HJr5GUYAc14WW6HDxM5BlxAl-1KJeaqq2OfG67sM'
		    ],

		    CURLOPT_RETURNTRANSFER => true,
		    CURLOPT_PROTOCOLS => CURLPROTO_HTTPS
		]);

		$resultado = curl_exec($ch);
		$resultado = json_decode($resultado);
		curl_close($ch);
		return $resultado->content;

	}

	/**
	 * Método que irá trazer as pções de "Como conheceu?" da API
	 *
	 * @access public
	 * @return stdClass
	 */
	public static function getSources()
	{


		$ch = curl_init();

		curl_setopt_array($ch, [

		    CURLOPT_URL => 'https://api.feegow.com/v1/api/patient/list-sources',

		    CURLOPT_POST => false,

		    CURLOPT_HTTPHEADER => [
		        'Content-Type: application/json',
		        'x-li-format: json',
		        'x-access-token: eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJmZWVnb3ciLCJhdWQiOiJwdWJsaWNhcGkiLCJpYXQiOjE2NDQyNDAzODQsImxpY2Vuc2VJRCI6IjEwNSJ9._v3HJr5GUYAc14WW6HDxM5BlxAl-1KJeaqq2OfG67sM'
		    ],

		    CURLOPT_RETURNTRANSFER => true,
		    CURLOPT_PROTOCOLS => CURLPROTO_HTTPS
		]);

		$resultado = curl_exec($ch);
		$resultado = json_decode($resultado);
		curl_close($ch);
		return $resultado->content;

	}

	/**
	 * Método que irá trazer as pções de "Como conheceu?" da API
	 *
	 * @access public
	 * @return stdClass
	 */
	public static function getProfessional($specialty)
	{

		$url = "https://api.feegow.com/v1/api/professional/list?ativo=1&unidade_id=0&especialidade_id=".$specialty;

		$ch = curl_init();

		curl_setopt_array($ch, [

		    CURLOPT_URL => $url,

		    CURLOPT_POST => false,

		    CURLOPT_HTTPHEADER => [
		        'Content-Type: application/json',
		        'x-li-format: json',
		        'x-access-token: eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJmZWVnb3ciLCJhdWQiOiJwdWJsaWNhcGkiLCJpYXQiOjE2NDQyNDAzODQsImxpY2Vuc2VJRCI6IjEwNSJ9._v3HJr5GUYAc14WW6HDxM5BlxAl-1KJeaqq2OfG67sM'
		    ],

		    CURLOPT_RETURNTRANSFER => true,
		    CURLOPT_PROTOCOLS => CURLPROTO_HTTPS
		]);

		$resultado = curl_exec($ch);
		$resultado = json_decode($resultado);
		curl_close($ch);
		return $resultado->content;

	}

}
?>