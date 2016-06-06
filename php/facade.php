<?php

$api_url = "http://bookstore-server-lbruce.c9users.io";
//$api_url = "localhost:8081";
$url_get_books = "$api_url/books/name/%s";
$url_login = "$api_url/login";
$url_register = "$api_url/users";
$url_add_announce = "$api_url/announces";
$url_get_announce = "$api_url/announce/%s/%s";
$url_get_user = "$api_url/user/%s";

function login($code, $password) {
	global $url_login;
	//$request = sprintf($url_login, $code, $password);
    $params = [
        "code" => $code,
        "password" => $password
    ];
    
	return doGet($url_login, $params);
}

function register($userCode, $username, $email, $password, $typeId = 1) {
	global $url_register;
    /*
	 * Faz a requisição de cadastro do usuário, e devolve a resposta da API.
	 * (Fazer tratamento da resposta!)
	 */
	$data = [
			 "userCode" => $userCode,
			 "username" => $username,
			 "email" => $email,
			 "password" => $password,
			 "typeId" => $typeId
			 ];

    return doPost($url_register, $data);
}


function doGet($url, array $get = NULL, array $options = array()) 
{    
    $defaults = array( 
        CURLOPT_URL => $url. (strpos($url, '?') === FALSE ? '?' : ''). http_build_query($get), 
        CURLOPT_HEADER => 0, 
        CURLOPT_RETURNTRANSFER => TRUE, 
        CURLOPT_TIMEOUT => 40 
    ); 
    
    $ch = curl_init(); 
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
    //curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    ini_set('allow_url_fopen', 1);
    curl_setopt_array($ch, ($options + $defaults)); 
    if( ! $result = curl_exec($ch)) 
    { 
        $error = trigger_error(curl_error($ch)); 
        
        echo $error;
    } 
    curl_close($ch); 
    return $result; 
}

function doPost($url, array $post = NULL, array $options = array()) 
{ 
    $defaults = array( 
        CURLOPT_POST => 1, 
        CURLOPT_HEADER => 0, 
        CURLOPT_URL => $url, 
        CURLOPT_FRESH_CONNECT => 1, 
        CURLOPT_RETURNTRANSFER => 1, 
        CURLOPT_FORBID_REUSE => 1, 
        CURLOPT_TIMEOUT => 4, 
        CURLOPT_POSTFIELDS => http_build_query($post) 
    ); 

    $ch = curl_init(); 
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
    ini_set('allow_url_fopen', 1);
    
    curl_setopt_array($ch, ($options + $defaults)); 
    if( ! $result = curl_exec($ch)) 
    { 
        trigger_error(curl_error($ch)); 
    } 
    curl_close($ch); 
    return $result; 
}






function add_announce($userCode, $isbn, $description){
	global $url_add_announce;
	
	$data = [
			"user_code" => $userCode,
			"isbn" => $isbn,
			"description" => $description,
			];
	
	return doPost($url_add_announce, $data);
}

function getAnnounceByPk($userCode, $isbn){
	global $url_get_announce;
	
	$url_get_announce = sprintf($url_get_announce, $userCode, $isbn);
	
	$data = [
			"user_code" => $userCode,
			"isbn" => $isbn
	];
	
	return doGet($url_get_announce, $data);
}

function getUserByPk($userCode){
	global $url_get_user;

	$url_get_user = sprintf($url_get_user, $userCode);

	$data = [
			"user_code" => $userCode
	];

	return doGet($url_get_user, $data);
}