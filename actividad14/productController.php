<?php
    session_start();

    if(isset($_POST['action'])){
        switch ($_POST['action']) {
            case 'add':

                $productController = new ProductController();

                $nombre=$_POST['nameProduct'];
                $slug=$_POST['Slug'];
                $description=$_POST['description'];
                $feature=$_POST['feature'];

                $productController->createProduct($nombre, $slug, $description, $feature);

                break;

            case 'update':
                echo "si se actualizo";
                $productController = new ProductController();

                $productId=$_POST['productId'];
                $nombre=$_POST['nameEditar'];
                $slug=$_POST['slugEditar'];
                $description=$_POST['descriptionEditar'];
                $feature=$_POST['featureEditar'];

                $productController->editarProducto($productId,$nombre, $slug, $description, $feature);

                break;

            default:
                echo "esta mal XD";
                break;
        }
    }

    class ProductController{


        function createProduct($nombre,$slug,$description,$feature){
            $curl = curl_init();

            if (isset($_SESSION['data'])) {
                $data = $_SESSION['data'];
            } else {
                echo "No se ha iniciado sesión o no hay datos disponibles.";
                exit;
            }

            curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://crud.jonathansoto.mx/api/products',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => array(
                'name' => $nombre,
                'slug' => $slug,
                'description' => $description,
                'features' => $feature),

                CURLOPT_HTTPHEADER => array(
                'Authorization: Bearer ' . $data['token']
            ),
            ));

            $response = curl_exec($curl);

            curl_close($curl);

            if(isset($response)){
                header("location: index.php?status=ok");
            }else{
                header("location: index.php?status=error");
            }
        }

        function editarProducto($productId,$name,$slug,$description,$features){

            if (isset($_SESSION['data'])) {
                $data = $_SESSION['data'];
            } else {
                echo "No se ha iniciado sesión o no hay datos disponibles.";
                exit;
            }

            $curl = curl_init();
            curl_setopt_array($curl, array(
                CURLOPT_URL => 'https://crud.jonathansoto.mx/api/products',
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'PUT',
                CURLOPT_POSTFIELDS => http_build_query(array(
                    'id' => $productId,
                    'name' => $name,
                    'slug' => $slug,
                    'description' => $description,
                    'features' => $features
                )),
                CURLOPT_HTTPHEADER => array(
                    'Authorization: Bearer ' . $data['token'],
                    'Content-Type: application/x-www-form-urlencoded'
                ),
            ));

            $response = curl_exec($curl);
            curl_close($curl);

            if(isset($response)){
                header("location: index.php?status=ok");
            }else{
                header("location: index.php?status=error");
            }
        }
    }

?>