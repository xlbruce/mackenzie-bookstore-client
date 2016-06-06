<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>Mack Books - Anúncios</title>
       <meta name="viewport" content="width=device-width, initial-scale=1"/>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link rel="stylesheet" type="text/css" href="bood/css/bootstrap.min.css"/>
        <link rel="stylesheet" type="text/css" href="bood/css/bootstrap-theme.min.css"/>
        <script type="text/javascript" src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
        <script type="text/javascript" src="js/bootstrap.min.js"></script>

        <link rel="stylesheet" type="text/css" href="../css/announces.css"/>

        <meta name="viewport" content="width=device-width, initial-scale=1.0"></head>
    
    <body>
        <header>
         <div class="logo">   <a href="home.php"><img src="image/logo.png"/></a></div>
            <h1>Mack Book's</h1>
            <div class="nome"><?php
                session_start();
                echo $_SESSION['usuarioUsername'];
                //echo 'ANTONIO';
                ?></div>


            <nav id="menu">
                <ul>
                    <li><a href="edit_profile.php"><img src="image/perfil.png"/></a></li>
                    <li><a href="add_announce.php"><img src="image/add_announce.png"/></a></li>
                    <li><a href="php/logout.php"><img src="image/sair.png"/></a></li>
                </ul>
            </nav>
        </header>
        
        <section>
            <div class="anuncio">
            <div class="emailU">antonio@hotmail.com</div> 
            <div class="bookname">Memorias postumas de bras cu</div>
            <div class="bookauthor">descrição</div>
            <div class="bookobs">nome do author </div>
            </div>
        </section>
        
         <footer>
                <h6>Esse projeto foi desenvolvido por meios acadêmicos com finalidade de servir à aula de Projeto Interdisciplinar</h6>
        </footer>
    </body>
</html>
