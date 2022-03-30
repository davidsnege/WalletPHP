<?php
if (isset($_GET["id"])) {
    $id = (int) $_GET["id"];
    $getfile = file_get_contents('BBDDJSON.json');
    $jsonfile = json_decode($getfile, true);
    $jsonfile = $jsonfile["wallet"];
    $jsonfile = $jsonfile[$id];
}

if (isset($_POST["id"])) {
    $id = (int) $_POST["id"];
    $getfile = file_get_contents('BBDDJSON.json');
    $all = json_decode($getfile, true);
    $jsonfile = $all["wallet"];
    $jsonfile = $jsonfile[$id];

    $post["coin"] = isset($_POST["coin"]) ? $_POST["coin"] : "";
    $post["public_key"] = isset($_POST["public_key"]) ? $_POST["public_key"] : "";
    $post["private"] = isset($_POST["private"]) ? $_POST["private"] : "";
    $post["amount"] = isset($_POST["amount"]) ? $_POST["amount"] : "";

    if ($jsonfile) {
        unset($all["wallet"][$id]);
        $all["wallet"][$id] = $post;
        $all["wallet"] = array_values($all["wallet"]);
        file_put_contents("BBDDJSON.json", json_encode($all));
    }
    header("Location: index.php");
}

if (isset($_GET["id"])) {
    echo '<form action="edit.php" method="POST">';
    echo '<input type="hidden" value="'.$id.'" name="id"/>';
    echo '<input type="text" value="'.$jsonfile["coin"].'" name="coin"/>';
    echo '<input type="text" value="'.$jsonfile["public_key"].'" name="public_key"/>';
    echo '<input type="text" value="'.$jsonfile["private"].'" name="private"/>';
    echo '<input type="text" value="'.$jsonfile["amount"].'" name="amount"/>';
    echo '<input type="submit"/>';
    echo '</form>';
}