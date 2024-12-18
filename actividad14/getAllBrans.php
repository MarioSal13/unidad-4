<?php
$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://crud.jonathansoto.mx/api/brands',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'GET',
  CURLOPT_HTTPHEADER => array(
    'Authorization: Bearer ' . $_SESSION['data']['token']
  ),
));

$response = curl_exec($curl);
curl_close($curl);

$brands = json_decode($response, true);

if (isset($brands['data'])) {
    $_SESSION['brands'] = $brands['data'];
} else {
    echo "Error fetching brands.";
}

?>