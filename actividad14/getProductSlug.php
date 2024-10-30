<?php 
session_start(); 

if (isset($_SESSION['data'])) {
    $data = $_SESSION['data'];
} else {
    echo "No se ha iniciado sesión o no hay datos disponibles.";
    exit;
}

if (isset($_GET['slug'])) {
    $slug = $_GET['slug'];
    echo "El slug es: " . $slug;

    $curl = curl_init();

    curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://crud.jonathansoto.mx/api/products/slug/' . $slug,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'GET',
        CURLOPT_HTTPHEADER => array(
            'Authorization: Bearer ' . $data['token']
        ),
    ));

    $response = curl_exec($curl);
    curl_close($curl);

    if ($response) {
        $response = json_decode($response, true);

        if (isset($response['data'])) {
            $producto = $response['data'];

            $_SESSION['producto'] = $producto;

            $product_id = $producto['id'];
            header("location: /Unidad-4R/unidad-4/actividad14/producto/$product_id");
            exit; 
        } else {
            echo "No se encontraron datos del producto.";
        }
    } else {
        echo "Error en la respuesta de la API.";
    }
} else {
    echo "No se ha proporcionado ningún slug.";
}
?>
