<?php

if (isset($_GET["id"])) {
    $id = (int) $_GET["id"];
    $all = file_get_contents('prueba.json');
    $all = json_decode($all, true);
    $jsonfile = $all["playlist"];
    $jsonfile = $jsonfile[$id];

    if ($jsonfile) {
        unset($all["playlist"][$id]);
        $all["playlist"] = array_values($all["playlist"]);
        file_put_contents("prueba.json", json_encode($all));
    }
    header("Location: indice.php");
}