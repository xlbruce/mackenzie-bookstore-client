<?php

include 'facade.php';





if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    session_start();
   
    $isbn = (isset($_POST['isbn'])) ? intval($_POST['isbn']) : 0;
    $description = (isset($_POST['description'])) ? $_POST['description'] : '';
    $user_code = $_SESSION['usuarioCode'];



    $json = add_announce($user_code, $isbn, $description);
    $announce = json_decode($json, true);

    if ($announce) {

        //anuncio efetuado cm sucesso
        echo "<script>alert('Anúncio efetuado com sucesso');</script>";
        echo "<script>javascript:window.location='../add_announce.php';</script>";
        
    } else {

        // falha em adicionar anuncio.
        echo "<script>alert('Anúncio não pode ser efetuado.');</script>";
        echo "<script>javascript:window.location='../add_announce.php';</script>";
    }
}
?>

