<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/Agencia/model/LandingModel.php';


class LandingController
{
    public $MODEL;

    public function __construct()
    {
        $this->MODEL = new modelo();
    }
    // Generales
    public function ListPais()
    {
        $data = $this->MODEL->ListPais();
        return $data;
    }
    public function SelectCiu()
    {
        $idPais = $_POST['Pais'];
        $data = $this->MODEL->ListCiudad($idPais);
        echo json_encode($data);
    }
    public function GetInfo()
    {

        $idCiudad = $_POST['Ciudad'];
        $data = $this->MODEL->GetInfoCiudad($idCiudad);

        if ($data) {
            include $_SERVER['DOCUMENT_ROOT'] . '/Agencia/views/pantalla2.php';
        }
    }
    public function InfoDetalle()
    {
        $idCiudad = $_POST['idCiudad'];
        $presupuesto = $_POST['Presupuesto'];
        $data = $this->MODEL->InfoDetalle($idCiudad);
        $userse = $_POST['userse'];
        if ($userse) {
            $Session = 1;
        } else {
            $Session = 0;
        }
        if ($data) {
            include $_SERVER['DOCUMENT_ROOT'] . '/Agencia/views/pantalla3.php';
        }
    }
}

// Crear instancia del controlnor
$controller = new LandingController();

if (isset($_POST['funcion'])) {
    call_user_func(array(new LandingController, $_POST['funcion']));
}
