<?php

include 'facade.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    session_start();    
    $email = (isset($_POST['CAEmail'])) ? $_POST['CAEmail'] : '';
    $tia = $_SESSION['usuarioCode'];
    $password = (isset($_POST['CASenha'])) ? $_POST['CASenha'] : '';
    $username = (isset($_POST['CAName'])) ? $_POST['CAName'] : '';
    $confirm_password = (isset($_POST['CAConfirm'])) ? $_POST['CAConfirm'] : '';

    //$response = register($tia, $userName, $email, $password);
    //$user = json_decode($response, true);

    if ($password == $confirm_password) {

        $user = json_decode(register($tia, $username, $email, $password), true);
        if (!$user) {
            //nao pode ser feita a atualizacao
            echo "<script>alert('Perfil não pode ser atualizado');</script>";
            echo "<script>javascript:window.location='../edit_profile.php';</script>";
        } else {
            // edição concluida com sucesso 
           $_SESSION['usuarioUsername'] = $user['username'];
            echo "<script>alert('Perfil editado com sucesso');</script>";
            echo "<script>javascript:window.location='../edit_profile.php';</script>";
            //echo $_SESSION['usuarioUsername'];
            //echo $user['username'];
        }
    } else {
        // senhas nao sao iguais 
        echo "<script>alert('Senhas devem ser iguais');</script>";
        echo "<script>javascript:window.location='../edit_profile.php';</script>";
    }
}