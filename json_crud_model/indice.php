<?php
$getfile = file_get_contents('prueba.json');
$jsonfile = json_decode($getfile);
?>
<a href="anadir.php">Add</a>
<table align="center">
    <tr>
        <th>COIN</th>
        <th>Public Key</th>
        <th>Private</th>
        <th>Amount</th>
        <th></th>
    </tr>
    <tbody>
        <?php foreach ($jsonfile->playlist as $index => $obj): ?>
            <tr>
                <td><?php echo $obj->title; ?></td>
                <td><?php echo $obj->title_bg; ?></td>
                <td><?php echo $obj->link; ?></td>
                <td><?php echo $obj->description; ?></td>
                <td>
                    <a href="editar.php?id=<?php echo $index; ?>">Edit</a>
                    <a href="borrar.php?id=<?php echo $index; ?>">Delete</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>