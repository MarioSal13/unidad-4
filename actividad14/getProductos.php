<?php

    $data = $_SESSION['data'];

    $curl = curl_init();

    curl_setopt_array($curl, array(
      CURLOPT_URL => 'https://crud.jonathansoto.mx/api/products',
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => '',
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 0,
      CURLOPT_FOLLOWLOCATION => true,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => 'GET',
      CURLOPT_HTTPHEADER => array(
        'Authorization: Bearer '.$data['token']
        ),
    ));

    $response = curl_exec($curl);
    curl_close($curl);

    $decodedResponse = json_decode($response, true);


    if (isset($decodedResponse['data'])) {

        $data = $decodedResponse['data'];
    } else {
        $data = [];
        echo "Error al obtener los productos.";
    }

?>