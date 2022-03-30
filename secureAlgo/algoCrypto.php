<?php
// ********************************************************************************************************
// CREATOR A KEY SECURE (require a words dictionary or a character dictionary to work)
// ********************************************************************************************************
    // Declare the variables to use
    $fullPhraseSecureRecover = "";
    $myHash = "";
// --------------------------------------------------------------------------------------------------------
    // Make a Phrase based on Dictionary and the length of the phrase 24 to a random phrase unique
    for ($i=0; $i < 24; $i++) { 
        $file = file('words.txt'); // You can use words.txt or chars.txt 
        $wCount = count($file);
        $fullPhraseSecureRecover .= " ".$file[rand(0, $wCount - 1)];
    }
    // Probe the phrase to make sure it is unique
    echo 'Secure Phrase Generated: '.$fullPhraseSecureRecover;
    echo '<br>';
// ********************************************************************************************************
// CREATE A HASH PRASE SECURE (Its impossible to recover the phrase, but you can use the hash)
// ********************************************************************************************************
    // The dificult config to generate a hash is to use a secure algo like PASSWORD_BCRYPT
    $opciones = [
        'cost' => 12,
    ];
    // Generate a Hash to save in database a secure phrase (It is impossible to recover the phrase)
    $myHash = password_hash($fullPhraseSecureRecover, PASSWORD_BCRYPT, $opciones);
    // Probe the hash
    echo 'Secure Phrase Conferenc: '.$fullPhraseSecureRecover;    
    echo '<br>';
    echo 'Secure Hash Gen. Viewer: '.$myHash;
    echo '<br>';
// ********************************************************************************************************
// VERIFY A HASH PRASE SECURE  (thats the way to verify the phrase)
// ********************************************************************************************************
    // Verify the hash and the phrase
    if(password_verify($fullPhraseSecureRecover, $myHash)){
        // Your Phrase is compatible with decrypt the Hash
        echo "<br> YOUR SECURE PHRASE IS VERIFYED "; 
        echo '- Secure Phrase Conferenc: '.$fullPhraseSecureRecover;  
    }else{
        // Your Phrase is not compatible with decrypt the Hash
        echo "<br> YOUR PHRASE GENERATE A INVALID KEY ";
        echo '- Secure Phrase Conferenc: '.$fullPhraseSecureRecover; 
    }
// ********************************************************************************************************
// OK the magic is maked, now you can use the hash to protect your data


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