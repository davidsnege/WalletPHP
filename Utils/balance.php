<?php
// https://blockchain.info/q/addressbalance/'. $address
function getBalance($address) {
    return file_get_contents('https://blockchain.info/q/addressbalance/'. $address);
}

$balance = getBalance('1GPXGzrxaPEA5G85rcmt8XRvUvkvNxNsYK');

$BTC = $balance / 100000000 ;
echo 'Blc: ' . $BTC;