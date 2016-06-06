<?php

include'facade.php';
//Verifica se o formulário foi enviado
if ($_SERVER['REQUEST_METHOD'] == 'GET') {

// Salva o valor das variáveis recebidas pelo formulário
    $code = (isset($_GET['code'])) ? intval($_GET['code']) : 0;
    $password = (isset($_GET['password'])) ? $_GET['password'] : '';

   
    $response = login($code, $password);
    $user = json_decode($response,true);
    //echo $response;
    if (!$user) {
        
       echo "<script>alert('Usuário ou senha inválida');</script>";
       echo "<script>javascript:window.location='../index.php';</script>";
        
         
    } else {
        session_start();
        //echo $user['username'];
       
        $_SESSION['usuarioUsername'] = $user['username'];
        $_SESSION['usuarioCode'] = $user['code'];
        
        
      header('Location: ../home.php');
      
    }
     
       
}

function expulsaVisitante() {
    unset($_SESSION['usuarioUsername']);
    header('index.php');
}
