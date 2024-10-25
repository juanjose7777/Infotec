<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/Agencia/model/PerfilModel.php';


class PerfilController
{
    public $MODEL;

    public function __construct()
    {
        $this->MODEL = new modelo();
    }
    // Generales
    public function InfoUser($user)
    {
        $data = $this->MODEL->InfoUser($user);
        return $data;
    }
    public function tbpropios()
    {
        $idUsuarios = $_POST['idUsuarios'];
        $data = $this->MODEL->MisPresupuestos($idUsuarios);
        $LisUser = $this->MODEL->UsuariosList($idUsuarios);

        if ($data) {
            include $_SERVER['DOCUMENT_ROOT'] . '/Agencia/views/Layouts/tbPropios.php';
        } else {
            echo 'No hay Presupuestos Guardados';
        }
    }
    public function tbComp()
    {
        $idUsuarios = $_POST['idUsuarios'];
        $data = $this->MODEL->tbComp($idUsuarios);
        if ($data) {
            include $_SERVER['DOCUMENT_ROOT'] . '/Agencia/views/Layouts/tbComp.php';
        } else {
            echo 'No hay Presupuestos Compartidos';
        }
    }
    public function CompartirPre()
    {
        $data = array(
            "presupuesto_idPresupuesto " => $_POST['idPresupuesto'],
            "Usuarios_idUsuarios  " => $_POST['CompUser'],
        );
        $insert = $this->MODEL->CompartirPre($data);
        $responde = array(
            "cod" => $insert,
            "Mensaje" => 'Presupuesto Guardado',
        );
        echo json_encode($responde);
    }
}
// Crear instancia del controlnor
$controller = new PerfilController();

if (isset($_POST['funcion'])) {
    call_user_func(array(new PerfilController, $_POST['funcion']));
}
