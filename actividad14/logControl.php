<?php
    if (isset($_POST['access'])) {
        switch ($_POST['access']) {
            case 'access':
                $authController = new AuthController();
                $email = $_POST['correo'];
                $password = $_POST['contrasena'];

                $authController->authenticate($email, $password);
                break;

            default:
                echo "Error: Acción no reconocida.";
                break;
        }
    }

    class AuthController {
        public function authenticate($email = null, $contra = null) {
            $curl = curl_init();

            curl_setopt_array($curl, array(
                CURLOPT_URL => 'https://crud.jonathansoto.mx/api/login',
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'POST',
                CURLOPT_POSTFIELDS => array('email' => $email, 'password' => $contra),
            ));

            $response = curl_exec($curl);
            curl_close($curl);

            if (isset($response)) {
                $response = json_decode($response, true);

                if (isset($response['data'])) {
                    $data = $response['data'];
                    $id = $response['data']['id'];

                    session_start();

                    $_SESSION['data'] = $data;
                    $_SESSION['id'] = $id;

                    header("location: /Unidad-4R/unidad-4/actividad14/inicio");
                    exit();
                } else {

                    echo "Error: Credenciales inválidas.";
                }
            } else {

                echo "Error: No se pudo conectar con el servidor.";
            }
        }
    }
?>
