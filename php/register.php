<?php

include 'facade.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $email = (isset($_POST['CAEmail'])) ? $_POST['CAEmail'] : '';
    $tia = (isset($_POST['CATIA'])) ? $_POST['CATIA'] : '';
    $password = (isset($_POST['CASenha'])) ? $_POST['CASenha'] : '';
    $username = (isset($_POST['CAName'])) ? $_POST['CAName'] : '';

    //$response = register($tia, $userName, $email, $password);
    //$user = json_decode($response, true);
    $user = json_decode(register($tia, $username, $email, $password), true);

    if (!$user) {
        echo "<script>alert('Não foi possivel fazer o cadastro');</script>";
        echo "<script>javascript:window.location='../index.php';</script>";
    } else {
        session_start();

        $_SESSION['usuarioUsername'] = $user['username'];
        $_SESSION['usuarioCode'] = $user['code'];
        header('Location: ../home.php');
    }
}