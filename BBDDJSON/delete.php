<?php
if (isset($_GET["id"])) {
    $id = (int) $_GET["id"];
    $all = file_get_contents('BBDDJSON.json');
    $all = json_decode($all, true);
    $jsonfile = $all["wallet"];
    $jsonfile = $jsonfile[$id];

    if ($jsonfile) {
        unset($all["wallet"][$id]);
        $all["wallet"] = array_values($all["wallet"]);
        file_put_contents("BBDDJSON.json", json_encode($all));
    }
    header("Location: index.php");
}