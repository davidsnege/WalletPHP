<?php
$getfile = file_get_contents('BBDDJSON.json');
$jsonfile = json_decode($getfile);

echo '<a href="add.php">Add Wallet</a>';

echo '<table align="center">';
echo '<tr>';
echo '<th>Coin</th>';
echo '<th>Public Key</th>';
echo '<th>Private</th>';
echo '<th>Amount</th>';
echo '<th></th>';
echo '</tr>';
echo '<tbody>';

foreach ($jsonfile->wallet as $index => $obj) {
    echo '<tr>';
    echo '<td>'.$obj->coin.'</td>';
    echo '<td>'.$obj->public_key.'</td>';
    echo '<td>'.$obj->private.'</td>';
    echo '<td>'.$obj->amount.'</td>';
    echo '<td>';
    echo '<a href="edit.php?id='.$index.'"> Edit Wallet </a>';
    echo '<a href="delete.php?id='.$index.'"> Delete Wallet </a>';
    echo '</td>';
    echo '</tr>';
}

echo '</tbody>';
echo '</table>';