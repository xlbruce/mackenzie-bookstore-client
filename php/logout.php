<?php

session_start();
unset($_SESSION['usuarioUsername']);
unset($_SESSION['usuarioCode']);

session_abort();


header('Location: ../index.php');