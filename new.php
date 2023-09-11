<?php
$str='programming in php';
$str1="WjWc7Qan4LjZVw/vMUf8hmBl";
$key="namrata";
$chiper="AES-128-CTR";
$ivlen=openssl_cipher_iv_length($chiper);
$iv=openssl_random_pseudo_bytes(16);
$options=0;
echo $ivlen;
echo'<br>';

echo openssl_encrypt($str,$chiper,$key,$options,$iv);
echo'<br>';
$encrypt=openssl_encrypt($str,$chiper,$key,$options,$iv);
echo openssl_decrypt($encrypt,$chiper,$key,$options,$iv);

?>