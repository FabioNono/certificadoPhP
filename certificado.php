
<?php
$data = 'my data';


$req_key = openssl_pkey_new(array(
    "private_key_bits" => 2048,
    "private_key_type" => OPENSSL_KEYTYPE_RSA,
));
$dn = array(
                "countryName"            => "BR",
                "stateOrProvinceName"    => "Natal",
                "organizationName"       => "Fabio.net",
                "organizationalUnitName" => "Seguranca",
                "commonName"             => "teste.net"
                );
$req_csr  = openssl_csr_new ($dn, $req_key);
$req_cert = openssl_csr_sign($req_csr, null, $req_key, 5000);
$cert_info 

// gerando arquivo do certificado
openssl_x509_export ($req_cert, $out_cert);
file_put_contents('certificate.pem', $out_cert);
echo '<p> certificado criado com sucesso </p>'."\n";
echo '</br>';
echo  $out_cert;
echo '</br>';
echo '<p>---------------------------- </p>'."\n";
echo '<p>verificando documento...</p>'."\n";


$x509_res = openssl_x509_read(file_get_contents('certificate.pem'));
if(empty($x509_res)) {
       
        echo 'x509 cert could not be read'."\n";
}
//validando certificado
$valid = openssl_x509_checkpurpose($x509_res,X509_PURPOSE_SSL_SERVER,array('certificate.pem'));
if ($valid === true) {
        echo 'Certificado valido usando o servidor ssl'."\n";

} else {

        echo 'Certificado validacao restorna'.$valid."\n";
}

/*

openssl_pkey_export($new_key_pair, $private_key_pem);
$details = openssl_pkey_get_details($new_key_pair);
$public_key_pem = $details['key'];

/*create signature
openssl_sign($data, $signature, $private_key_pem, OPENSSL_ALGO_SHA256);


//save for later
file_put_contents('private_key.pem', $private_key_pem);
file_put_contents('public_key.pem', $public_key_pem);
file_put_contents('signature.dat', $signature);

//verify signature
$r = openssl_verify($data, $signature, $public_key_pem, "sha256WithRSAEncryption");
var_dump($r);

*/


?>



