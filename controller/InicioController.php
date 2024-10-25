<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/Agencia/model/InicioModel.php';


class InicioController
{
    public $MODEL;

    public function __construct()
    {
        $this->MODEL = new modelo();
    }
    public function NewRegistro()
    {
        $user = $_POST['Usuario'];
        $validate = $this->MODEL->ValidateUser($user);
        if ($validate) {
            $responde = array(
                "cod" => 0,
                "Mensaje" => 'Usuario Ya existe, intenta con otro.',
            );
            echo json_encode($responde);
        } else {
            $data = array(
                "UsuNombres" => $_POST['Nombres'],
                "UsuApellidos" => $_POST['Apellidos'],
                "UsuSexo" => $_POST['Sexo'],
                "UsuUser" => $_POST['Usuario'],
                "UsuPass" => md5($_POST['Contrasena']),
                "UsuTelefono" => $_POST['Telefono'],
                "Roles_idRoles " => 2,
            );
            $insert = $this->MODEL->InsertUser($data);
            $responde = array(
                "cod" => $insert,
                "Mensaje" => 'Usuario Registrado Exitosamente',
            );
            echo json_encode($responde);
        }
    }
    public function iniciarSesion()
    {
        $User = $_POST['User'];
        $Pass = md5($_POST['Pass']);

        $validateUser = $this->MODEL->GetProfile($User, $Pass);
        if ($validateUser) {
            session_start();
            // Almacenar datos en la sesión
            $_SESSION['idUsuarios'] = $validateUser['idUsuarios'];
            $_SESSION['Roles_idRoles'] = $validateUser['Roles_idRoles'];
            $_SESSION['UsuNombres'] = $validateUser['UsuNombres'];
            $_SESSION['UsuApellidos'] = $validateUser['UsuApellidos'];
            $_SESSION['UsuUser'] = $validateUser['UsuUser'];

            $LastSession = $this->MODEL->LastSession($validateUser['idUsuarios']);

            $responde = array(
                "cod" => 1,
                "Mensaje" => 'Creedenciales Validas',
                "User" => $validateUser['UsuNombres'],
            );
        } else {
            $responde = array(
                "cod" => 0,
                "Mensaje" => 'Creedenciales Invalidas',
            );
        }
        echo json_encode($responde);
    }
    public function SavePresupuesto()
    {
        $EUR = $this->consumo();
        $valorReal = $EUR * $_POST['PresuCOP'];
        $conversion = str_replace(',', '', $valorReal);
        $data = array(
            "Ciudad_idCiudad" => $_POST['idCiudad'],
            "PreValorLocal" => $_POST['PresuCOP'],
            "PreValorPaisSelect" => $_POST['ValorLocal'],
            "Usuarios_idUsuarios" => $_POST['userse'],
            "PreValorAlem" => $conversion,
            "PreEstado" => 0,
        );
        $insert = $this->MODEL->SavePresupuesto($data);
        $responde = array(
            "cod" => $insert,
            "Mensaje" => 'Presupuesto Guardado',
        );
        echo json_encode($responde);
    }
    private function consumo()
    {
        // URL de la API de tasas de cambio
        $url = "https://v6.exchangerate-api.com/v6/196aac1ec9bde08a039ab6cb/latest/COP";
        // Inicializar cURL
        $curl = curl_init($url);
        // Establecer opciones para la solicitud cURL
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        // Ejecutar la solicitud cURL
        $response = curl_exec($curl);
        // Verificar si la solicitud fue exitosa
        if ($response === false) {
            // Si la solicitud falla, mostrar el mensaje de error
            echo "Error en la solicitud cURL: " . curl_error($curl);
        } else {
            // Decodificar la respuesta JSON
            $data = json_decode($response, true);
            // Verificar si se pudo decodificar correctamente la respuesta JSON
            if ($data === null) {
                // Si la decodificación falla, mostrar el mensaje de error
                return "Error al decodificar la respuesta JSON";
            } else {
                // Obtener el valor de conversión de COP a EUR
                $valor_eur = $data['conversion_rates']['EUR'];
                return $valor_eur;
            }
        }

        curl_close($curl);
    }
}
// Crear instancia del controlnor
$controller = new InicioController();

if (isset($_POST['funcion'])) {
    call_user_func(array(new InicioController, $_POST['funcion']));
}
