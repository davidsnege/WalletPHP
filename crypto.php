<?php
// ********************************************************************************************************
// CREATOR A KEY SECURE (require a words dictionary or a character dictionary to work)
// ********************************************************************************************************
    $fullPhraseSecureRecover = "";
// --------------------------------------------------------------------------------------------------------
for ($i=0; $i < 24; $i++) { 
    $file = file('words.txt'); // You can use words.txt or chars.txt 
    $wCount = count($file);
    $fullPhraseSecureRecover .= " ".$file[rand(0, $wCount - 1)];
}
// ********************************************************************************************************
// CREATE A HASH PRASE SECURE (Its impossible to recover the phrase, but you can use the hash)
// ********************************************************************************************************
    $opciones = [
        'cost' => 12,
    ];
    $myHash = password_hash($fullPhraseSecureRecover, PASSWORD_BCRYPT, $opciones);
// ********************************************************************************************************
// VERIFY A HASH PRASE SECURE  (thats the way to verify the phrase)
// ********************************************************************************************************
    if(password_verify($fullPhraseSecureRecover, $myHash)){
        echo "<br> YOUR SECURE PHRASE IS VERIFYED ";
    }else{
        echo "<br> YOUR PHRASE GENERATE A INVALID KEY ";
    }
// ********************************************************************************************************



// ********************************************************************************************************
// HELPERS
// ********************************************************************************************************
// ---> https://www.php.net/manual/es/function.password-hash.php
// ---> https://www.php.net/manual/es/function.crypt.php
// ---> https://www.php.net/manual/es/ref.mcrypt.php
// ---> https://www.php.net/manual/es/function.mcrypt-encrypt.php
// ********************************************************************************************************
// OPTIONS TO ENCRYPT WITH DIFERENT ALGORITHMS (It is your choice)
// ********************************************************************************************************
// PASSWORD_BCRYPT (recommended)
// CRYPT_STD_DES (recommended)
// CRYPT_EXT_DES (recommended)
// CRYPT_MD5 (Not Recommended) (deprecated) (Easier to crack)
// CRYPT_BLOWFISH (recommended)
// CRYPT_SHA256  (Not Recommended) (deprecated) (Easier to crack)
// CRYPT_SHA512  (Not Recommended) (deprecated) (Easier to crack)
// ********************************************************************************************************
// YOU CAN USE THIS FUNCTIONS
// ********************************************************************************************************
// password_hash
// crypt
// Mcrypt
// ********************************************************************************************************
// MORE INFO ABOUT CRYPT
// ********************************************************************************************************
// hash_equals() - Comparison of two hash strings in constant time.
// password_hash() - Create a password hash.
// md5() - Calculate the md5 hash of a string.
// The extension Mcrypt
// See the unix man manual to more information about encrypt algorithms
// ********************************************************************************************************

// TEST SERVER - php -S localhost:8000 -t testing