<?php
echo '<form action="add.php" method="POST">';
echo '<input type="text" name="coin" placeholder="coin"/>';
echo '<input type="text" name="public_key" placeholder="public_key"/>';
echo '<input type="text" name="private" placeholder="private"/>';
echo '<input type="text" name="amount" placeholder="amount"/>';
echo '<input type="submit" name="add"/>';
echo '</form>';

if(isset($_POST["add"])) {
    $file = file_get_contents('BBDDJSON.json');
    $data = json_decode($file, true);
    unset($_POST["add"]);
    $data["wallet"] = array_values($data["wallet"]);
    array_push($data["wallet"], $_POST);
    file_put_contents("BBDDJSON.json", json_encode($data));
    header("Location: index.php");
}