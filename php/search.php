<?php

include 'facade.php';

if ($_SERVER['REQUEST_METHOD'] == 'GET') {

    $name = (isset($_GET['item'])) ? ($_GET['item']) : '';
    

    
}

function getAnnounce($userCode, $isbn) {

    $done = getAnnounceByPk("31409695", "9789588173719");
// 		echo $done;

    $jsonDone = json_decode($done, true);

    if ($jsonDone) {
        return $jsonDone;
    } else {
        //nao valido
    }
}

?>