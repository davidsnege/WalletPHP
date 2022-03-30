<form action="anadir.php" method="POST">
    <input type="text" name="title" placeholder="title"/>
    <input type="text" name="title_bg" placeholder="title_bg"/>
    <input type="text" name="link" placeholder="link"/>
    <input type="text" name="description" placeholder="description"/>
    <input type="submit" name="add"/>
</form>
<?php
if (isset($_POST["add"])) {
    $file = file_get_contents('prueba.json');
    $data = json_decode($file, true);
    unset($_POST["add"]);
    $data["playlist"] = array_values($data["playlist"]);
    array_push($data["playlist"], $_POST);
    file_put_contents("prueba.json", json_encode($data));
    header("Location: indice.php");
}
?>