<pre>
<?php

// Set URL.
$url = 'https://webb19/14-api/products/write.php';

$data = '{"productCode":"S10_1681","productName":"1969 Harley Davidson Ultimate Chopper","productImage":"","productLine":"Motorcycles","productScale":"1:10","productVendor":"Min Lin Diecast","productDescription":"This replica features working kickstand, front suspension, gear-shift lever, footbrake lever, drive chain, wheels and steering. All parts are particularly delicate due to their precise scale and require special care and attention.","quantityInStock":"7933","buyPrice":"48.81","MSRP":"95.70"}';

// Create a curl instance.
$ch = curl_init($url);

// Setup curl options
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

// Don't check our self assigned SSL certificate.
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);

// Perform the request and get the response.
$response = curl_exec($ch);
curl_close($ch);

var_dump($response);
