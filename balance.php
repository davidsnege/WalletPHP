<?php
// https://blockchain.info/q/addressbalance/'. $address
function getBalance($address) {
    return file_get_contents('https://blockchain.info/q/addressbalance/'. $address);
}

echo 'Address Balance: ' . getBalance('1GPXGzrxaPEA5G85rcmt8XRvUvkvNxNsYK');