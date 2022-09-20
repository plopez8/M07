<?php
//Encryp
$original_string = "Alo presidentes";
$cipher_algo = "AES-128-CTR";
$iv_length = openssl_cipher_iv_length($cipher_algo);
$option = 0;
$encrypt_iv = '8746376827619797'; //Initialization vector, non-null
$encrypt_key = "Delftstack!"; // The encryption key
// Use openssl_encrypt() encrypt the given string
$encrypted_string = openssl_encrypt($original_string, $cipher_algo,
			$encrypt_key, $option, $encrypt_iv);

//Decryption
$decrypt_iv = '8746376827619797'; //Initialization vector, non-null
$decrypt_key = "Delftstack!"; // The encryption key
// Use openssl_decrypt() to decrypt the string
$decrypted_string=openssl_decrypt ($encrypted_string, $cipher_algo,
		$decrypt_key, $option, $decrypt_iv);

//Display Strings
echo "Original:<br>" . $original_string. "<br><br>" ;
echo "Encrypted:<br>" . $encrypted_string . "<br><br>";
echo "Decrypted:<br>" . $decrypted_string;
?>